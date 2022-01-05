<?php
    function consoleLog($data) {
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

    function makeButton($link, $text) {
        echo '<a href="' . $link . '"><button>' . $text . '</button></a>';
    }
?>