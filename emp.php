<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "company");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert employee data when form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employees (name, designation, salary) VALUES ('$name', '$designation', '$salary')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<p style='color:green;'>Employee added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
    }
}

// Fetch all employees
$result = mysqli_query($conn, "SELECT * FROM employees");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; }
        th { background-color: #f2f2f2; }
        input[type=text], input[type=number] { padding: 5px; width: 200px; }
        input[type=submit] { padding: 8px 15px; background-color: blue; color: white; border: none; }
    </style>
</head>
<body>

<h2>Add Employee</h2>
<form method="post" action="">
    Name: <input type="text" name="name" required><br><br>
    Designation: <input type="text" name="designation" required><br><br>
    Salary: <input type="number" name="salary" required><br><br>
    <input type="submit" name="submit" value="Add Employee">
</form>

<hr>
<h2>Employee List</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Salary</th>
    </tr>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['designation']}</td>
                    <td>{$row['salary']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No employees found</td></tr>";
    }

    mysqli_close($conn);
    ?>
</table>

</body>
</html>

