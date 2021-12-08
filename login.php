<!DOCTYPE html>

<html>
<head>
    <title> Bejelentkezés </title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
  <div class="container">
    <div class="login-box">
    <div class="row">
    <div class="col-md-6 left">
      <h2> Jelentkezz be </h2>
      <form action="login_validation.php" class="form-control" method="post">
        <table>
        <tr><td>Felhasználónév: </td><td><input type="text" name="felhasznalo" required size="15"></td></tr>
              <tr><td>Jelszó: </td><td><input type="password" name="pass" required size="15"></td></tr>
              <tr><td><input type='submit' value='Bejelentkezés' name='login'></a></td></tr>
        </table>
      </form>
    </div>
      <div class="col-md-6 right">
        <h2> Regisztráció </h2>
        <form action="registration.php" class="form-control" method="post">
          <table>
              <tr><td>Felhasználónév:*</td><td><input type="text" name="felhasznalo" required></td></tr>
              <tr><td>E-mail:*</td><td><input type="email" name="email" required></td></tr>
              <tr><td>Jelszó:*</td>
              <td><input type="password" name="pass" required /></td></tr>
              <tr><td><input type="submit" value="Regisztráció" name="reg"></td></tr>
          </table>
        </form>
      </div>
    </div>
    </div>
  </div>
</body>
</hmtl>
