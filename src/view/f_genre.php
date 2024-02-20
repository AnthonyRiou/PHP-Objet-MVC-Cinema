<?php
    require "./src/view/header.php";
?>

    <div id="selection">
<h2>Ajouter genre</h2>
  <form method="post" action="addgenre">
    <div>
      <label for="nom">Genre de  film :</label><br>
      <input placeholder="Entrez ici le nouveau genre" name="nom" required/>
    </div>
    <br>
    <button type="submit">Ajouter le nouveau genre</button>

  </form>
  </div>

  <?php
    require "./src/view/footer.php";
    ?>

  </body>
