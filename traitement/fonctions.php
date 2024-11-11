<?php

function nbreEntreeTotal(){
    include "connect.php";
    $requete = "SELECT COUNT(*) as total FROM game";
    $stmt = $connexion->prepare($requete);
    $stmt-> execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultat['total'];
};

function nosGanks(){
    include "connect.php";
    $requete = "SELECT COUNT(*) as total FROM game WHERE gank='nous :(' OR gank='Les deux'";
    $stmt = $connexion->prepare($requete);
    $stmt-> execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultat['total'];
}

function leursGanks(){
    include "connect.php";
    $requete = "SELECT COUNT(*) as total FROM game WHERE gank='Eux :D' OR gank='Les deux'";
    $stmt = $connexion->prepare($requete);
    $stmt-> execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultat['total'];
}