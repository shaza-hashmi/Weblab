<?php
// Connect to MySQL
$conn = mysqli_connect("localhost", "root", "", "library");
if (!$conn) {
    die("Connection failed");
}

// When form is submitted
if (isset($_POST['submit'])) {
    $bno = $_POST['bno'];
    $title = $_POST['title'];
    $edition = $_POST['edition'];
    $publisher = $_POST['publisher'];
    mysqli_query($conn, "INSERT INTO book_details VALUES('$bno', '$title', '$edition', '$publisher')");
}
?>

<!DOCTYPE html>
<html>
<head><title>Book Details</title></head>
<body>
<h2>Enter Book Details</h2>
<form method="post">
Book No: <input type="text" name="bno"><br><br>
Title: <input type="text" name="title"><br><br>
Edition: <input type="text" name="edition"><br><br>
Publisher: <input type="text" name="publisher"><br><br>
<input type="submit" name="submit" value="Add Book">
</form>

<h2>All Books</h2>
<table border="1" cellpadding="5">
<tr><th>Book No</th><th>Title</th><th>Edition</th><th>Publisher</th></tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM book_details");
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>
            <td>$row[book_no]</td>
            <td>$row[title]</td>
            <td>$row[edition]</td>
            <td>$row[publisher]</td>
          </tr>";
}
?>
</table>
</body>
</html>

