<?php
    $nev = "";
    $email = "";
    if (isset($_POST['reg'])) {

      $con = mysqli_connect('localhost', 'root', '', 'webprog2_beadando');
      $nev = $_POST['felhasznalo'];
      $email = $_POST['email'];
      $pass = $_POST['pass'];

      $sql = "SELECT * FROM felhasznalo_tabla WHERE name = '$nev' AND email = '$email'";
      $result = mysqli_query($con, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo "Az email már használatban van!";
        echo "<br/><a href=login.php>Vissza a regisztrációhoz</a>";
      }

      else {
        $query = "INSERT INTO felhasznalo_tabla(name, pass, email, authority)
        VALUES ('$nev', md5('".$_POST['pass']."'), '$email', 'user');";
        $result = mysqli_query($con, $query);
        echo "Mentve";
        echo "<br/><a href=login.php>Vissza a bejelentkezéshez</a>";
      }

  }
?>
