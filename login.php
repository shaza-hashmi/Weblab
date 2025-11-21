<?php
// Start session to store login status
session_start();

// Database connection
$conn = mysqli_connect("localhost", "root", "", "login_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// When form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check user in database
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($password == $row['password']) {
            $_SESSION['username'] = $username;
        } else {
            $error = "Incorrect Password!";
        }
    } else {
        $error = "Incorrect Username!";
    }
}

// If user is logged in — show welcome message
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    echo "
    <h2 align='center'>Welcome, $user!</h2>
    <p align='center'>You have successfully logged in.</p>
    <form method='post' align='center'>
        <input type='submit' name='logout' value='Logout'>
    </form>
    ";
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: login.php");
    }
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h2 align="center">User Login</h2>
    <?php if (!empty($error)) echo "<h4 align='center' style='color:red;'>$error</h4>"; ?>
    <form action="" method="post">
        <table border="1" align="center" cellpadding="10">
            <tr>
                <th>Username:</th>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <th>Password:</th>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Login">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

