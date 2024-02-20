<?php
    require "./src/view/header.php";
?>


<div id="selection">
  <h2>Ajouter un acteur au film</h2>
  <h3><?= $film->getTitre() ?></h3>
  <br>
  <form method="post" action="../addacteur_film">
    <div>
        <br>
        <label for="id-acteur">Nom de l'acteur</label>
        <select name="id_acteur" id="id_acteur"> <?php
            foreach ($acteurs as $acteur) {?>
        <option value="<?= $acteur->getId_acteur() ?>"> <?=$acteur->getFirstName() ." ". $acteur->getLastName() ?></option>
        <?php } ?>
        </select>
        <br>
        <br>
        <label for="photo">Photo de l'acteur</label>
        <input type="text" name="photo" placeholder="url photo"><br>
        <input type="hidden" name="id_film" value="<?= $film->getId_film() ?>">
    </div>
    <br>
    <button type="submit">Ajouter le nouvel acteur</button>
  </form>
  </div>

  <?php
    require "./src/view/footer.php";
  ?>