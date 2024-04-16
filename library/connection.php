<?php

//Connect to Kosapacha Database on AWS

function kosapachaConnect() {
    $servername = 'localhost/phpmyadmin';
    $dbname = 'kosapacha';
    $username = 'admin';
    $password = 'password';
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
