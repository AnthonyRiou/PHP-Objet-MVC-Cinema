<?php
    require "./src/view/header.php";
?>



    <div id="selection">
    <?php
    foreach ($acteurs as $acteur) { ?>
           <div class="act">
        <li><?= $acteur->getFirstName() ." ". $acteur->getLastName()?></li> 
        <a href = "acteur/<?= $acteur->getId_acteur() ?>"><img src = "public/images/<?= $acteur->getPhoto() ?>" width="250"><br>
        <br>
        </div>   
    <?php } ?>
    </div> 
    
    <?php
    require "./src/view/footer.php";
    ?>
    
</body>
</html>