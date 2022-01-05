<!-- Na stranici dodaj_proizvod.php potrebno je napraviti formu za dodavanje novog
proizvoda i njegov upis u tablicu proizvodi. Također je potrebno ispisati naslov „Dobro
došao ime i prezime!“ koje ste dohvatili pomoću sesije. Potrebo je dodati dva linka koji
vode na ispis.php i odjava.php -->
<?php
    session_start();
?>

<html>
    <head>
        <title>Prijava</title>
    </head>
    <body>
        <?php
            include "spoj.php";
            include "utils.php";

            if (!$_SESSION['prijavljen'])
                header("Location: prijava.php");

            if ($_SESSION['uloga'] == "User")
                header("Location: ispis.php");

            echo "<span> Dobro dosli " . $_SESSION['ime'] . " " . $_SESSION['prezime'] . "!";
        ?>

        <?php
            if (!empty($_POST['proizvod']) && !empty($_POST['opis']) && !empty($_POST['kolicina']) && !empty($_POST['cijena'])) {
                $sql = 'INSERT INTO proizvodi(proizvod, opis, kolicina, cijena) VALUES("' . $_POST['proizvod'] . '","' . $_POST['opis'] . '","' . $_POST['kolicina'] . '","' . $_POST['cijena'] . '")';
                consoleLog($sql);
                $q = mysqli_query($conn, $sql);
                consoleLog($q);
                if ($q)
                    header("Location: unos.php");
            }
        ?>

        <form action="" method="post">
            <label for="proizvod">Ime proizvoda: </label>
            <input type="text" name="proizvod" required autofocus><br>
            <label for="opis">Opis proizvoda: </label>
            <textarea name="opis" rows="8" cols="20" required></textarea><br>
            <label for="kolicina">Kolicina: </label>
            <input type="number" name="kolicina" required><br>
            <label for="cijena">Cijena: </label>
            <input type="text" name="cijena" required><br>
            <button type="submit" name="deder">Deder</button>
        </form>

        <?php
            include "utils.php";
            makeButton("ispis.php", "Ispis");
            makeButton("odjava.php", "Odjava");
        ?>
    </body>
</html>