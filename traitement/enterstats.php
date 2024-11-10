<?php
include "connect.php";
$requetes = $connexion->prepare("INSERT INTO game (result, gank) VALUES (:result, :gank)");
$requetes -> execute(array(
    ':result'=> $_POST['result'],
    ':gank' => $_POST['gank'],
  ));

if($requetes) {
    echo "<h3>Voilà, tout est good, on est contents</h3>";
    echo "<p>Retourner au formulaire :<a href=index.php?page=formulaire>ICI</a>";
} else {
    echo "Merde, ca marche pas.";
}