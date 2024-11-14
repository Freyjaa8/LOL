<?php
include "connect.php";
$requetes = $connexion->prepare("INSERT INTO game (result, gank,jour) VALUES (:result, :gank, :jour)");
$requetes -> execute(array(
    ':result'=> $_POST['result'],
    ':gank' => $_POST['gank'],
    ':jour' => $_POST['jour'],
  ));

if($requetes) {
    echo "<div class='d-flex align-items-center justify-content-center' style='height:80vh;'><div class='container mt-2 border d-flex flex-column align-items-center'><h3 class='text-center'>Bien envoyé en BDD, on oublie pas le Bisous Mr. Bébou ! </h3>";
    echo "<p class='mt-4'>Clique sur l'image pour retourner au formulaire de saisie des données : </p>";
    echo "<div class = 'text-center mb-2 mt-4'><a href=index.php?page=formulaire><img src='image/bebouchoupi.webp' style='max-height:30rem;'></a></div>";
    echo "</br>OU retourne sur les stats : <a href=index.php?page=gank>ICI</a><div></div>";
} else {
    echo "Merde, ca marche pas.";
}