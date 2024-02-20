<?php
    require "./src/view/header.php";
?>

    <div id="selection">
<h2>Ajouter un film</h2>
  <form method="post" action="addfilm">
    <div>
        <label for="titre">Nom du film</label>
        <input type="text" placeholder="Titre du film" name="titre" required/><br>
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
    <button type="submit">Ajouter le nouveau film</button>
  </form>
  </div>

  <?php
    require "./src/view/footer.php";
  ?>
  
</body>