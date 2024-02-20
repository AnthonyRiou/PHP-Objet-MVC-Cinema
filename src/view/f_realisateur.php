<?php
    require "./src/view/header.php";
?>

    <div id="selection">
<h2>Ajouter un réalisateur ou une realisatrice</h2>
  <form method="post" action="addrealisateur">
    <div>
        <label for="nom">Nom de l'acteur</label>
        <input placeholder="Nom du realisateur" name="nom" required/><br>
        <br>
        <label for="prenom">Prénom de l'acteur</label>
        <input placeholder="Prénom du realisateur" name="prenom" required/>
    </div>
    <br>
    <button type="submit">Ajouter le nouveau réalisateur</button>

  </form>
  </div>

  <?php
    require "./src/view/footer.php";
  ?>
  
</body>