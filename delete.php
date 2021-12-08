<?php
  $con = mysqli_connect("localhost", "root", "", "webprog2_beadando");

  $sql = "DELETE FROM witcherek WHERE neve='$_GET[id]'";

  if(mysqli_query($con, $sql)) {
    header("refresh:1; url=home.php");
  }
  else {
    echo "Sikertelen törlés!";
    echo "<br><a href=home.php>Vissza a főoldalra</a>";
  }

?>
