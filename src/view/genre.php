<?php
    require "./src/view/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genre</title>
</head>
<body>
    
<div id="selection">
        <li><?= $genre->getNom_genre() ?></li>
</div> 

<?php
    require "./src/view/footer.php";
?>

</body>
</html>