<?php

$server = "localhost";
$base = "laleague";
$user = "root";
$password = "";         
try {
    $connexion = new PDO("mysql:host=$server; dbname=$base", $user, $password);
} catch (Exception $e){
    echo "Erreur :".$e->getMessage();
};