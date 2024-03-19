<?php
    $dbname = "ResearchData";
    $hostname = 'localhost';
    $username = 'root';
    $password = '';


    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    if(!$conn){
        die("Connection Failed:" . mysqli_connect_error());
    }


?>