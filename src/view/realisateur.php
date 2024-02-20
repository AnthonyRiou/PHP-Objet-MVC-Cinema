<?php
    require "./src/view/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realisateur</title>
</head>
<body>
    <div id="selection">
    <div class="film">
        <li><?= $realisateur->getFirstName() ." ". $realisateur->getLastName() ?></li>
        <img src = "../public/images/<?= $realisateur->getPhoto() ?>" width="250"><br>
    </div>
    </div>

    <?php
    require "./src/view/footer.php";
    ?>
    
</body>
</html>

