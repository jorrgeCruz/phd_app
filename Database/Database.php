<?php
    $host = "sql9.freesqldatabase.com";
    $user = "sql9586967";
    $pass = "ENVCWIaZwg";
    $dbname = "sql9586967";
    $conn = new mysqli($host , $user, $pass, $dbname);
    mysqli_query($conn , "SET character_set_result=utf8");
    if($conn->connect_error){
        die("Database Error: " . $conn->connect_error);
    }
?>