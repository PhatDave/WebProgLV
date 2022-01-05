<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>neki naslov</h1>
    </body>
    <?php
    $myfile = fopen("text.txt", "r+");
    $str_tekst = fread($myfile, filesize("text.txt"));
    fclose($myfile);
    echo "<h1>" . $str_tekst . "</h1>";

    $izrezani_tekst = explode(" ", $str_tekst);
    $myfile = fopen("text.txt", "a");
    fwrite($myfile, implode("\n", $izrezani_tekst));
    fclose($myfile);

    $prviK = strpos($str_tekst, "k") + 1;
    echo "Prvi put se slovo k pojavljuje na " . $prviK . " mjestu i ukupno se " . substr_count($str_tekst, "k") . " puta."
    ?>
</html>