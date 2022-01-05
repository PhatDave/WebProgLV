<?php
    session_start();

    if (!$_SESSION['prijavljen'])
        header("Location: prijava.php");
?>

<html>
    <body>
        <h1>Proizvod unesen!</h1>
        <?php
            include "utils.php";
            makeButton("dodaj_proizvod.php", "Natrag");
            makeButton("ispis.php", "Ispis");
        ?>
    </body>
</html>