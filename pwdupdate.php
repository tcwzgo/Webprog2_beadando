<?php
  session_start();
  $felhasznalo = $_SESSION['felhasznalo'];
?>


<html>
<head>
  <title> Jelszó/Felhasználó módosítása </title>
  <link rel="stylesheet" type="text/css" href="homestyle.css">
</head>
<body>
  <a href="home.php">Mégse</a>
  <h1>Jelszó/Felhasználó módosítása</h1>
  <form action="pwdupdate.php" method="POST">
    <input type="text" name="new_name" placeholder="Új felhasználónév" required>
    <input type="password" name="old_pass" placeholder="Régi jelszó" required>
    <input type="password" name="new_pass" placeholder="Új jelszó" required>
    <button type="submit" name="submit_change">Módosítás</button>
  </form>
</body>
</html>

<?php
  $con = mysqli_connect("localhost", "root", "", "webprog2_beadando");

  $sql = "SELECT name, pass FROM felhasznalo_tabla WHERE name = '".$felhasznalo."'";
  $result = mysqli_query($con, $sql);

  list($nev, $pass) = mysqli_fetch_row($result);
  if(isset($_POST['submit_change'])) {
    if($pass == md5($_POST['old_pass'])) {
      $sql = "UPDATE felhasznalo_tabla SET name = '".$_POST['new_name']."', pass = md5('".$_POST['new_pass']."')
      WHERE name = '".$felhasznalo."'";

      $result = mysqli_query($con, $sql);
      if ($result) {
        echo "Sikeres módosítás!";
        echo "<br><a href=login.php>Vissza a bejelentkezéshez</a></br>";
      }
      else {
        echo "Sikertelen módosítás";
        echo "<br><a href=pwdupdate.php>Vissza a bejelentkezéshez</a></br>";
      }
    }
    else {
    echo "Rosszul adott meg egy adatot!";
    }
  }
?>
