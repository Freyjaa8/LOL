<?php
include "traitement/fonctions.php";
?>

<div class="container-fluid mt-5 d-flex justify-content-center col-12 ">
    <div class = "d-flex flex-column col-6 mr-4">

        <div class="col d-flex justify-content-center ml-5" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1); border-radius: 12px; padding: 20px; border: 2px solid #ddd;">
            <div class="d-column">
            <p class="text-center">Ganks Total : </p>
            <?php include "camemberts/camembertgank.php";?>
            </div>
            <div  class="d-column">
            <p class="text-center">Ratio vicoires / Défaites : </p>
            <?php include "camemberts/camembertResult.php"; ?>
            </div>
        </div>

        <div class="col d-flex justify-content-center mt-2 ml-5" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1); border-radius: 12px; padding: 20px; border: 2px solid #ddd;">
            <div class="d-column">
            <p class="text-center">Ganks Lors des Victoires : </p>
            <?php include "camemberts/camembertWingank.php";?>
            </div>
            <div  class="d-column">
            <p class="text-center">Gank Lors des Défaites : </p>
            <?php include "camemberts/camembertLooseGank.php"; ?>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column mt-2 row ml-4" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 8px 20px rgba(0, 0, 0, 0.1); border-radius: 12px; padding: 20px; border: 2px solid #ddd;">
        <div>
            <?php include "camemberts/camembertJourGank.php"; ?>
        </div>
        <div>
            <div>
                <?php include "camemberts/camembertJourResult.php"; ?>
            </div>
        </div>
        <div class='text-center mt-5'>
            <a name="showDays" id="showDays" class="btn btn-dark" href="#" role="button">Voir Stats des jours</a>
        </div>
    </div>
</div>

<?php
echo "<h4 class='mt-5 mb-5 text-center custom-title'> Nombre total de parties : ".nbreEntreeTotal()."</h4>";







