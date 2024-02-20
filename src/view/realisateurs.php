<?php
    require "./src/view/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realisateurs</title>
</head>
<body>

    <div id="selection">
    
    <?php
    foreach ($realisateurs as $real) { ?>
    <div class="real">
        <li><?= $real->getFirstName() ." ". $real->getLastName() ?></li>
        <a href = "realisateur/<?= $real->getId_realisateur() ?>"><img src = "public/images/<?= $real->getPhoto() ?>" width="250"><br>
        <br>
        </div>
    <?php } ?>
    </div>
    
    <?php
    require "./src/view/footer.php";
    ?>
</body>
</html>