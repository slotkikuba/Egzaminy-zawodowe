<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "islandia";

    $conn = mysqli_connect($host, $user, $pass, $db);
    if(!$conn) {
        die("Błąd połączenia" . mysqli_connect_error());
    }

?>