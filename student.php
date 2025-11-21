<!DOCTYPE html>
<html>
<body>

<h3>Student Details Form</h3>

<form method="post">
  Name: <input type="text" name="name"><br><br>
  Email: <input type="email" name="email"><br><br>
  Address: <input type="text" name="address"><br><br>
  Gender:
  <input type="radio" name="gender" value="Male">Male
  <input type="radio" name="gender" value="Female">Female<br><br>
  DOB: <input type="date" name="dob"><br><br>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
if(isset($_REQUEST['submit'])) {
    echo "<h3>Entered Student Details:</h3>";
    echo "Name: ".$_REQUEST['name']."<br>";
    echo "Email: ".$_REQUEST['email']."<br>";
    echo "Address: ".$_REQUEST['address']."<br>";
    echo "Gender: ".$_REQUEST['gender']."<br>";
    echo "Date of Birth: ".$_REQUEST['dob']."<br>";
}
?>

</body>
</html>

