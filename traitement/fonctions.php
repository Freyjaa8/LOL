<?php
function connect($instruction){
    include "connect.php";
    $requete = $instruction;
    $stmt = $connexion->prepare($requete);
    $stmt-> execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultat['total'];
}

function nbreEntreeTotal(){
    return connect("SELECT COUNT(*) as total FROM game");
};

function nosGanks(){
    return connect("SELECT COUNT(*) as total FROM game WHERE gank='nous :(' OR gank='Les deux'");
};

function leursGanks(){
    return connect("SELECT COUNT(*) as total FROM game WHERE gank='Eux :D' OR gank='Les deux'");
};

function gameWin(){
    return connect("SELECT COUNT(*) as total FROM game WHERE result='Gagnée'");
};

function gameLose(){
    return connect("SELECT COUNT(*) as total FROM game WHERE result='Perdue'");
};

function nosWinGank(){
    return connect("SELECT COUNT(*) as total FROM game WHERE result='Gagnée' AND (gank='nous :(' OR gank='Les deux')");
};

function leurWinGank(){
    return connect("SELECT COUNT(*) as total FROM game WHERE result='Gagnée' AND (gank='Eux :D' OR gank='Les deux')");
};

function noslooseGank(){
    return connect("SELECT COUNT(*) as total FROM game WHERE result='Perdue' AND (gank='nous :(' OR gank='Les deux')");
};

function leurlooseGank(){
    return connect("SELECT COUNT(*) as total FROM game WHERE result='Perdue' AND (gank='Eux :D' OR gank='Les deux')");
}

function getGanksForToday($jour) {
    include 'connect.php';
    $requete = "SELECT gank, COUNT(*) as total FROM game WHERE jour = :jour GROUP BY gank";
    $stmt = $connexion->prepare($requete);
    $stmt->execute([':jour' => $jour]);
    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultat;
}

function getResultForToday($jour) {
    include 'connect.php';
    $requete = "SELECT result, COUNT(*) as total FROM game WHERE jour = :jour GROUP BY result";
    $stmt = $connexion->prepare($requete);
    $stmt->execute([':jour' => $jour]);
    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultat;
}