    <div class="container">
    <h1 class="mt-4 mb-5">Voyons les stats de cette partie... (probablement merdique)</h1>
    <form action="index.php?page=enterstats" method="POST" class="mt-4 p-2">
    <fieldset class="border p-4">
        <legend class="text-center">Rentrez les statistiques</legend>
        <div class="form-group">
        <label for="result">Résultat de la partie :</label>
        <select class="form-control" name="result" id="result" >
            <option>Gagnée</option>
            <option>Perdue</option>
        </select>
        </div>
        <div class="form-group">
        <label for="gank">Qui a eu la chance d'être gank cette game ?</label>
        <select class="form-control" name="gank" id="gank">
            <option>Nous :(</option>
            <option>Eux :D</option>
            <option>Les deux</option>
            <option>Aucun</option>
        </select>
        </div>
        <div class="form-group">
          <label for="jour">Quel jour de la semaine ?</label>
          <select class="form-control" name="jour" id="jour">
            <option>Lundi</option>
            <option>Mardi</option>
            <option>Mercredi</option>
            <option>Jeudi</option>
            <option>Vendredi</option>
            <option>Samedi</option>
            <option>Dimanche</option>
        </select>
        </div>
        <div class="text-center">
        <button type="submit" class="btn btn-dark" name="send">Envoyer</button>
        </div>
    </fieldset>
    </form>
</div>
</div>
