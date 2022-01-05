<?php
    session_start();
    include "spoj.php";
    include "utils.php";
?>

<html>
    <head>
        <title>Deder</title>
    </head>
    <body>
        <div>
            <?php
                if (!empty($_POST['email']) && !empty($_POST['password'])) {
                    $sql = 'SELECT * FROM korisnici WHERE email LIKE ("' . $_POST['email'] . '")';
                    consoleLog($sql);
                    $q = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($q);
                    if ($row) {
                        echo "Korisnik postoji!";
                    } else {
                        $sql = 'INSERT INTO korisnici(ime, prezime, email, k_ime, lozinka, uloga) VALUES ("' . $_POST['ime'] . '","' . $_POST['prezime'] . '","' . $_POST['email'] . '","' . $_POST['korisnickoIme'] . '","' . $_POST['password'] . '","User")';
                        consoleLog($sql);
                        $q = mysqli_query($conn, $sql);
                        consoleLog($q);

                        $_SESSION['prijavljen'] = true;
                        $_SESSION['timeout'] = time();
                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['ime'] = $_POST['ime'];
                        $_SESSION['prezime'] = $_POST['prezime'];
                        $_SESSION['uloga'] = "User";

                        header("Location: ispis.php");
                    }
                }
            ?>
        </div>
        <div>
            <form action="" method="post">
                <label for="ime">Ime: </label>
                <input type="text" name="ime" required autofocus><br>
                <label for="prezime">Prezime: </label>
                <input type="text" name="prezime" required autofocus><br>
                <label for="email">Email: </label>
                <input type="text" name="email" required autofocus><br>
                <label for="korisnickoIme">Korisnicko Ime: </label>
                <input type="text" name="korisnickoIme" required autofocus><br>
                <label for="password">Password: </label>
                <input type="password" name="password" required><br>
                <button type="submit" name="deder">Deder</button>
            </form>
        </div>
    </body>
</html>