<?php
    require "./src/view/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres </title>
</head>
<body>

<div id="selection">
    <?php
    foreach ($genres as $gen) {  ?>
        <div class="genre">
        <li><?= $gen->getNom_genre()?></li>
        </div>
    <?php } ?>
    </div>

    <?php
    require "./src/view/footer.php";
    ?>
    
</body>
</html>