<?php
    require "src/view/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
</head>
<body>
 <div id=legend>
<h1>Les films du moment</h1>
</div>

    <div id="selection">
    
    <?php
        foreach ($films as $film) { ?>
            <div class="film">
            <li><?= $film->getTitre() ?></li>
            <a href = "film/<?= $film->getId_Film() ?>"><img src = "public/images/<?= $film->getAffiche()?>" width="300"></a>
            <li>Date de sortie : <br><?= $film->getDate_de_sortie() ?></li><br>
        </div>
        <br><br>
        <?php }?>
    </div>

    <?php
    require "./src/view/footer.php";
    ?>
    
</body>
</html>