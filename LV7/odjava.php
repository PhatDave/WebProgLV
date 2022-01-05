<html>
    <?php
        include "utils.php";
        session_start();

        consoleLog($_SESSION);
        $WHATTHEFUCK = session_destroy();
        consoleLog($_SESSION);

        header("Location: index.php");
    ?>
</html>