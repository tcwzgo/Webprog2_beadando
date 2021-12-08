<?php
  session_start();
  $con = mysqli_connect("localhost", "root", "", "webprog2_beadando");
  $nev = $_POST['nev'];
  $szarmazas = $_POST['szarmazas'];
  $iskola = $_POST['iskola'];
  $csalad = $_POST['csalad'];
  $szornyek = $_POST['szornyek'];

  $sql = "INSERT INTO witcherek(neve, szarmazas, iskola, csalad, szornyek_megolve)
  VALUES ('$nev', '$szarmazas', '$iskola', '$csalad', '$szornyek');";

  mysqli_query($con, $sql);
  header("Location: home.php");
?>
