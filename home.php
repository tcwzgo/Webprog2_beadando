<?php
  session_start();
  $felh = $_SESSION['felhasznalo'];
?>

<html>
<head>
  <title> Fő oldal </title>
  <link rel="stylesheet" type="text/css" href="homestyle.css">
</head>
<body>

  <a href="logout.php"> Kijelentkezés </a>
  <h1>Üdvözlünk <?php echo $felh; ?>!</h1>
  <a href="pwdupdate.php"> Felhasználó/jelszó módosítása </a>
  <form action="insert_db.php" method="POST">
    <h1> Witcher hozzáadása </h1>
    <input type="text" name="nev" placeholder="Neve" required>
    <input type="text" name="szarmazas" placeholder="Sármazása" required>
    <input type="text" name="iskola" placeholder="Iskola" required>
    <input type="text" name="csalad" placeholder="Család" required>
    <input type="integer" name="szornyek" placeholder="Szörnyek megölve" required>
    <button type="submit" name="hozzaadas"> Hozzáadás </button>
  </form>
  <h1> Az összes witcher adatai: </h1>
  <form action="home.php" method="POST">
    <input type="text" name="search" placeholder="Keresés">
    <button type="submit" name="submit_search">Keresés</button>
  </form>
  <table>
    <tr>
    <th>Neve</th>
    <th>Származása</th>
    <th>Iskola</th>
    <th>Család</th>
    <th>Megölt szörnyek száma</th>
    </tr>
    <?php
      $con = mysqli_connect("localhost", "root", "", "webprog2_beadando");
      if(isset($_POST['submit_search']) && empty($_POST['search'])) {
        $sql = "SELECT * FROM witcherek";

        $result = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($result))
        {
          echo "<tr>";
          echo "<td>" . $row['neve'] . "</td>";
          echo "<td>" . $row['szarmazas'] . "</td>";
          echo "<td>" . $row['iskola'] . "</td>";
          echo "<td>" . $row['csalad'] . "</td>";
          echo "<td>" . $row['szornyek_megolve'] . "</td>";
          echo "<td><a href=delete.php?id=".$row['neve'].">Törlés</a></td>";
          echo "<td><a href=updateform.php?id=".$row['Id'].">Módosítás</a></td>";
          echo "</tr>";
        }
        echo "</table>";
      }
      elseif(isset($_POST['submit_search']) && !empty($_POST['search'])) {
        $search = mysqli_real_escape_string($con, $_POST['search']);

        $sql = "SELECT * FROM witcherek WHERE
        neve LIKE '%$search%' OR
        szarmazas LIKE '%$search%' OR
        iskola LIKE '%$search%' OR
        csalad LIKE '%$search%'";

        $result = mysqli_query($con, $sql);
        $query = mysqli_num_rows($result);

        if ($query > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['neve'] . "</td>";
            echo "<td>" . $row['szarmazas'] . "</td>";
            echo "<td>" . $row['iskola'] . "</td>";
            echo "<td>" . $row['csalad'] . "</td>";
            echo "<td>" . $row['szornyek_megolve'] . "</td>";
            echo "<td><a href=delete.php?id=".$row['neve'].">Törlés</a></td>";
            echo "<td><a href=updateform.php?id=".$row['Id'].">Módosítás</a></td>";
            echo "</tr>";
          }
          echo "</table>";

        }
        else {
          echo "Nincs találat";
        }
      }
      else {
        $sql = "SELECT * FROM witcherek";

        $result = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($result))
        {
          echo "<tr>";
          echo "<td>" . $row['neve'] . "</td>";
          echo "<td>" . $row['szarmazas'] . "</td>";
          echo "<td>" . $row['iskola'] . "</td>";
          echo "<td>" . $row['csalad'] . "</td>";
          echo "<td>" . $row['szornyek_megolve'] . "</td>";
          echo "<td><a href=delete.php?id=".$row['neve'].">Törlés</a></td>";
          echo "<td><a href=updateform.php?id=".$row['Id'].">Módosítás</a></td>";
          echo "</tr>";
        }
        echo "</table>";
      }
    ?>

  <h1>A vajákokról (witcherekről) röviden:</h1>
  <div class="text_container">
    <?php echo"
    A vajákok céhe különböző iskolákba tömörül, tagjaikat pedig már egész fiatal koruk óta brutális fizikai és szellemi felkészítésnek,
    valamint nem egy titkos rituálénak teszik ki, hogy képesek legyenek
    felvenni a harcot a legmegátalkodottabb rémekkel is.
    A kíméletlen kiképzés és a számtalan mutáció eredményeképp a vajákok gyorsabbak, ügyesebbek, ellenállóbbak és erősebbek, mint az átlagemberek,
    cserébe viszont mindannyian sterilek és a szemük is egy macskáéhoz hasonlatos.
    Emberfeletti erejüknek és kemény kiképzésüknek hála a legtöbb szörnyeteget könnyedén le tudják vágni, de ha mégis megszorulnának a harcban, egyszerűbb varázsjeleket és
    mágikus bájitalokat is bevethetnek, hogy ezzel növeljék esélyeiket.
    Jellemzően két karddal harcolnak: egy acél pengével az egyszerű halandók és egy ezüsttel a mágikus bestiák ellen.
    A vajákok megítélése az Északi Királyságok területén eléggé vegyes. Az őket övező rengeteg pletyka és féligazság,
    valamint emberfeletti erejük és macskáéra hasonlító szemük miatt a legtöbben félelemmel vegyes lenézéssel tekintenek rájuk,
    de akadnak olyan helyek, ahol kifejezetten gyűlölik vagy kedvelik őket, annak függvényében,
    hogy korábban milyen tapasztalataik voltak velük.
    "
    ?>
  </div>

  <h1>A Kontinens térképe:</h1>
  <img src="map.jpg" width="728" height="410">
</body>
</html>
