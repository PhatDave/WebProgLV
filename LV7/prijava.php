<?php
    session_start();
?>

<html>
    <head>
        <title>Deder</title>
    </head>
    <body>
        <div>
            <?php
                include "spoj.php";

                if (!empty($_POST['email']) && !empty($_POST['password'])) {
                    $sql = "SELECT * FROM korisnici";
                    $q = mysqli_query($conn, $sql);

                    // consoleLog($_POST);
                    while ($redak = mysqli_fetch_array($q, MYSQLI_ASSOC)) {
                        // consoleLog($redak);
                        // consoleLog($_POST['email'] == $redak['email'] && $_POST['password'] == $redak['lozinka']);
                        if ($_POST['email'] == $redak['email'] && $_POST['password'] == $redak['lozinka']) {
                            $_SESSION['prijavljen'] = true;
                            $_SESSION['timeout'] = time();
                            $_SESSION['email'] = $redak['email'];
                            $_SESSION['ime'] = $redak['ime'];
                            $_SESSION['prezime'] = $redak['prezime'];
                            $_SESSION['uloga'] = $redak['uloga'];
    
                            if ($redak['uloga'] == "Admin")
                                header("Location: ispis.php");
                            else
                                header("Location: dodaj_proizvod.php");
                        }
                    }
                }
            ?>
        </div>
        <div>
            <form action="" method="post">
                <label for="email">Email: </label>
                <input type="text" name="email" required autofocus><br>
                <label for="password">Password: </label>
                <input type="password" name="password" required><br>
                <button type="submit" name="deder">Deder</button>
            </form>
        </div>
    </body>
</html>