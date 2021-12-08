<?php

session_start();
$id = $_SESSION['id'];

if(isset($_POST['update'])) {
  $con = mysqli_connect("localhost", "root", "", "webprog2_beadando");

  $nev = $_POST['nev'];
  $szarmazas = $_POST['szarmazas'];
  $iskola = $_POST['iskola'];
  $csalad = $_POST['csalad'];
  $szornyek = $_POST['szornyek'];

  $sql = "UPDATE witcherek SET
  neve ='".$nev."',
  szarmazas ='".$szarmazas."',
  iskola ='".$iskola."',
  csalad = '".$csalad."',
  szornyek_megolve = '$szornyek'
  WHERE Id ='$id'";

  $result = mysqli_query($con, $sql);
  if($result) {
    header("refresh:1; url=home.php");
  }
  else {
    echo "Sikertelen módosítás!";
    echo "<br><a href=home.php>Vissza a főoldalra</a>";
  }
}

?>
