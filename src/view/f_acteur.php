<?php
    require "./src/view/header.php";
?>

    <div id="selection">
<h2>Ajouter un acteur ou une actrice</h2>
  <form method="post" action="addacteur">
    <div>
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

</body