<?php
include "traitement/fonctions.php";

echo "<h4 class='mt-5'> Nombre total de parties : ".nbreEntreeTotal()."</h4>";
?>

<div class="d-flex justify-content-around border mt-2">
    <div class="d-column">
    <p class="text-center">Ganks Total : </p>
<?php
include "camemberts/camembertgank.php";?>
</div>
<div  class="d-column">
<p class="text-center">Ratio vicoires / Défaites : </p>
<?php
include "camemberts/camembertResult.php";
?>
</div>
</div>
<div class="d-flex justify-content-around border mt-2">
    <div class="d-column">
    <p class="text-center">Ganks lors des Victoires :</p>
<?php
include "camemberts/camembertWinGank.php";?>
</div>
<div  class="d-column">
<p class="text-center">Ganks lors des Défaites :</p>
<?php
include "camemberts/camembertLooseGank.php";
?>
</div>
</div>
<div class="d-flex justify-content-center mt-2">
    <div class="border">
    <?php include "camemberts/camembertJour.php";
    ?>
</div>
</div>









