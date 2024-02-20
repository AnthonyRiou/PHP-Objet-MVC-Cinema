<?php
    require "./src/view/header.php";
?>



    <div id="selection">
    <ul>
    <div class="film">
        <li><?= $acteur->getFirstName() ." ". $acteur->getLastName() ?></li>
        <img src = "../public/images/<?= $acteur->getPhoto() ?>" width="250">
    </div>
    </ul>
    </div>

    <?php
    require "./src/view/footer.php";
    ?>
</body>
</html>