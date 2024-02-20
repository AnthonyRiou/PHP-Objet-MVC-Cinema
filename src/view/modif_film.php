<?php
    require "./src/view/header.php";
?>

    <div id="selection">
<h2>Modifier un film</h2>
  <form method="post" action="modif_film">
    <div>
        <label for="titre">Nom du film</label>
        <select name="id_film" id="idfilm">
        <?php foreach ($films as $film) {?>
            <option value="<?= $film->getId_film() ?>"><?= $film->getTitre() ?></option>
            <?php }?>
        </select>
        <br>
        <label for="date_de_sortie">Date de sortie</label>
        <input type="date" placeholder="Date de sortie" name="date_de_sortie" required/><br>
        <br>
        <input type="text" placeholder="urlphoto" name="affiche"><br>
        <label for="real">Sélectionner un réalisateur</label>
        <select name="id_realisateur" id="idreals">
            <?php foreach ($reals as $real) {?>
            <option value="<?= $real->getId_realisateur() ?>"> <?=$real->getFirstName() ?> <?= $real->getLastName() ?></option>
            <?php }?>
        </select>
        <br>
        <br>
        <label for="genre">Sélectionner un genre</label>
        <select name="id_genre" id="idgenre">
            <?php foreach ($genres as $genre) {?>
            <option value="<?= $genre->getId_genre() ?>"> <?=$genre->getNom_genre() ?> </option>
            <?php }?>
        </select>
        </div>
    <br>
    <button type="submit">Modifier le film</button>
  </form>
  </div>

  <div id="selection">
  <h2>Ajouter un acteur au film</h2>
  <form method="post" action="addacteur_film">
    <div>
    <label for="titre">Nom du film</label>
        <select name="id_film" id="idfilm">
        <?php foreach ($films as $film) {?>
            <option value="<?= $film->getId_film() ?>"><?= $film->getTitre() ?></option>
            <?php }?>
        </select>
        <br>
        <label for="nom">Nom de l'acteur</label>
        <input placeholder="Nom de l'acteur" name="nom" required/><br>
        <br>
        <label for="prenom">Prénom de l'acteur</label>
        <input placeholder="Prénom de l'acteur" name="prenom" required/>
    </div>
    <br>
    <button type="submit">Ajouter le nouvel acteur</button>
  </form>
  </div>

  <?php
    require "./src/view/footer.php";
  ?>
  
    </body>