<?php
    require "src/view/header.php";
?>

<div id="selection">

    <ul>
    <div class="film">
        <li><?= $film->getTitre() ?></li>
        <br>
        <img src = "../public/images/<?= $film->getAffiche()?>" width="250" >
        <br>
        <li>Date de sortie : <?= $film->getDate_de_sortie() ?></li>
        <br>
        <li>Acteurs : </li>
        <?php foreach ($film->getActors() as $actor) {?>
                <li><a href = "../acteur/<?= $actor->getId_acteur()?>"><?= $actor->getFirstName() ." ". $actor->getLastName() ?></a></li>
         <?php }?>
        
        <li>Réalisateur : <br><a href = ../realisateur/<?= $film->getDirector()->getId_realisateur() ?>><?= $film->getDirector()->getFirstName() ?> <?= $film->getDirector()->getLastName()?></a></li>
        <li>Genre : <br><?= $film->getGenre()->getNom_Genre()?></li>
        <br>
        <button><a href = "../modiffilm/<?= $film->getId_film() ?>">Modifier le film</a></button>
        <br>
        <button><a href = "../ajouteacteur/<?= $film->getId_film() ?>">Ajouter un acteur</a></button>
    </div> 
    </ul> 
    
    </div>

    <?php
    require "./src/view/footer.php";
    ?>
    
    </body>
</html>
      
