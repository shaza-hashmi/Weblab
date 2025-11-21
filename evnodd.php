<!DOCTYPE html>
<html>
<body>

<form method="get">
  Enter a number: <input type="text" name="num">
  <input type="submit" value="Check">
</form>

<?php
if (isset($_GET['num'])) {
  $n = $_GET['num'];
  if ($n % 2 == 0)
    echo "$n is Even";
  else
    echo "$n is Odd";
}
?>

</body>
</html>

