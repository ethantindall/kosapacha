<?php

//Connect to Kosapacha Database on AWS

function kosapachaConnect() {
    $servername = 'kosapacha-database-1.cz4vwbbidkxm.us-east-2.rds.amazonaws.com:3306';
    $dbname = 'kosapacha_group_db';
    $username = 'admin';
    $password = 'Ho1aKo$apacha';
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $link = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $options); 
        return $link;
        //$conn = new PDO("mysql:host=$servername", $username, $password);
        // set the PDO error mode to exception
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        header('Location: views/500.php');
      }
}
//kosapachaConnect();