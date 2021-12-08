<?php
  session_start();
  $id = $_GET['id'];
  $_SESSION['id'] = $id;

  echo "
      <a href=home.php>Mégse</a>
      <form action=update.php method=POST>
        <h1> Witcher módosítása </h1>
        <input type=text name=nev placeholder=Új név required>
        <input type=text name=szarmazas placeholder=Származás required>
        <input type=text name=iskola placeholder=Iskola required>
        <input type=text name=csalad placeholder=Család required>
        <input type=integer name=szornyek placeholder=Szörnyek megölve required>
        <button type=submit name=update>Módosítás</button>
      </form>
  ";
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="homestyle.css">
</head>

<body>

</body>

</html>
