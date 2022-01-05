<?php
    session_start();

    include "utils.php";
    include "spoj.php";

    consoleLog($_SESSION);

    if ($_SESSION['uloga'] != "Admin")
        header("Location: ispis.php");

    
    $sql = 'DELETE FROM proizvodi WHERE id LIKE"' . $_GET['id'] . '"';
    $q = mysqli_query($conn, $sql);

    header("Location: ispis.php");
?>