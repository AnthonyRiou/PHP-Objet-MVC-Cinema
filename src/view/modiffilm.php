<?php



    require "./src/view/header.php";
?>

    <div id="selection">
<h2>Modifier le film </h2>

<h1><?= $film->getTitre() ?> </h1>

  <form method="post" action="../modif_film/<?= $film->getId_film() ?>">
    <div>
        <br>
        <label for="titre">Nouveau nom du film : </label>
        <input type="text" name="titre" value="<?=$film->getTitre() ?>"><br>
        <br>
        <label for="date_de_sortie">Date de sortie : </label>
        <input type="date" placeholder="Date de sortie" name="date_de_sortie" required/><br>
        <br>
        <label for="affiche">Affiche : </label>
        <input type="text" placeholder="url photo" name="affiche"><br>
        <br>
        <label for="real">Sélectionner un réalisateur : </label>
        <select name="id_realisateur" id="idreals">
            <?php foreach ($reals as $real) {?>
            <option value="<?= $real->getId_realisateur() ?>"> <?=$real->getFirstName() ?> <?= $real->getLastName() ?></option>
            <?php }?>
        </select>
        <br>
        <br>
        <label for="genre">Sélectionner un genre : </label>
        
        <select name="id_genre" id="idgenre">

            <?php foreach ($genres as $genre) {?>
            <option value="<?= $genre->getId_genre() ?>"> <?=$genre->getNom_genre() ?> </option>
            <?php }?>
        </select>
        <input type="hidden" name="id_film" value="<?= $film->getId_film() ?>">
        </div>
    <br>
    <button  class="bouton">Modifier le film</button>
  </form>
  </div>

  <?php
    require "./src/view/footer.php";
    ?>

