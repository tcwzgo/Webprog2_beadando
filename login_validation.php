<?php
  if (isset($_POST['login']))
    $con = mysqli_connect("localhost", "root", "", "webprog2_beadando");

    $sql = "select name, pass from felhasznalo_tabla where name='".$_POST['felhasznalo']."'";
    $result = mysqli_query($con, $sql) or die ("HIBA: ".mysqli_error($con));

    list($username, $passwd)=mysqli_fetch_row($result);

    if ($passwd == md5($_POST['pass'])) {
      session_start();
      $_SESSION["felhasznalo"]=$username;

      header("refresh:1; url=home.php");
    }
    else {
      echo "<br/>Hibás jelszó vagy felhasználónév";
      echo "<br/><a href=login.php>Vissza a bejelentkezéshez</a>";
    }

  mysqli_close($con);

?>
