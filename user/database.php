<?php

    $server = "localhost";
    $user = "root";
    $password = "Adamafitraj2730";
    $nama_database = "aktual_cendekia_course";

    try {
        $db = mysqli_connect($server, $user, $password, $nama_database);
    } catch(mysqli_sql_exception) {
        echo "Could not connect";
    }

?>