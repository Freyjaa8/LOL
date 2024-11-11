<?php
include "HTMLfiles/header.html";
// Les pages pour plus tard, je me fait mon petit switch des familles
$page = (isset($_GET['page']))?$_GET['page']:"accueil";
switch($page){
    case "enterstats" : 
        include "traitement/enterstats.php";
        break;
    case "formulaire" : 
        include "formulaire.php";
        break;
    case "gank" : 
        include "gank.php";
        break;
    case "accueil" : 
        include "accueil.php";
        break;
    case "camembert" :
        include "traitement/camembert.php";
}
?>

<?php
include "HTMLfiles/footer.html";
?>