<?php

//Connect to Kosapacha Database on AWS
echo 'we did it';

function kosapachaConnect() {
    $server = 'kosapacha-database-1.cz4vwbbidkxm.us-east-2.rds.amazonaws.com';
    $dbname = 'kosapacha-database-1';
    $username = 'admin';
    $password = 'password';
    $dsn= "mysql:host=$server;dbname=$dbname";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $link = new PDO($dsn, $username, $password, $options); 
        return $link;
    } catch (PDOException $e) {
        header('Location: views/500.php');
        exit;
    }
}

kosapachaConnect();