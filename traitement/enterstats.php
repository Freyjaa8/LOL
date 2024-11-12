<?php
include "connect.php";
$requetes = $connexion->prepare("INSERT INTO game (result, gank,jour) VALUES (:result, :gank, :jour)");
$requetes -> execute(array(
    ':result'=> $_POST['result'],
    ':gank' => $_POST['gank'],
    ':jour' => $_POST['jour'],
  ));

if($requetes) {
    echo "<h3>Voilà, tout est good, on est contents</h3>";
    echo "<p>Retourner au formulaire :<a href=index.php?page=formulaire>ICI</a>";
} else {
    echo "Merde, ca marche pas.";
}