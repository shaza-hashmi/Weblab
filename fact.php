<!DOCTYPE html>
<html>
<body>

<form method="get">
  Enter a number: <input type="text" name="num">
  <input type="submit" value="Find Factorial">
</form>

<?php
if (isset($_GET['num'])) {
  $n = $_GET['num'];
  $fact = 1;

  for ($i = 1; $i <= $n; $i++) {
    $fact = $fact * $i;
  }

  echo "Factorial of $n is $fact";
}
?>

</body>
</html>

