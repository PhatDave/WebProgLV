<?php
    session_start();

    include "utils.php";

    consoleLog($_SESSION);

    if (!$_SESSION['prijavljen'])
        header("Location: prijava.php");
?>

<html>
    <head>
        <title>Ispis</title>
    </head>
    <body>
        <?php
            include "spoj.php";

            $sql = "SELECT * FROM proizvodi";
            $q = mysqli_query($conn, $sql);

            echo "<table>";
            echo "<tr>";
            echo "<th>Ime</th>";
            echo "<th>Opis</th>";
            echo "<th>Kolicina</th>";
            echo "<th>Cijena</th>";
            echo "<th></th>";
            echo "<th></th>";
            echo "</tr>";
            while ($redak = mysqli_fetch_array($q, MYSQLI_ASSOC)) {
                consoleLog($redak);
                echo "<tr>";
                echo "<td>" . $redak['proizvod'] . "</td>";
                echo "<td>" . $redak['opis'] . "</td>";
                echo "<td>" . $redak['kolicina'] . "</td>";
                echo "<td>" . $redak['cijena'] . "</td>";
                if ($_SESSION['uloga'] == "Admin") {
                    ?>
                    <td>
                        <a href=delete.php?id=<?php echo $redak['id']; ?>>
                            <button>Delete</button>
                        </a>
                    </td>
                    <td>
                        <a href=edit.php?id=<?php echo $redak['id']; ?>>
                            <button>Modify</button>
                        </a>
                    </td>
                    <?php
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
        <?php
            if ($_SESSION['uloga'] == "Admin")
                makeButton("dodaj_proizvod.php", "Dodaj Proizvod");
            makeButton("odjava.php", "Odjava");
        ?>
    </body>
</html>