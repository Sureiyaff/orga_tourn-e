<?php
require_once('controllers/c_HomePage.php');
$title = "Virtuose - Accueil";
ob_start();
$ControllerHomePage = new HomePage;
?>

<main id="mainHome">
    <img class="banner" src="view/img/banniere.png" alt="">

    <div class="SelectSwimmingPool">
        <div class="line"></div>
        <?php $ControllerHomePage->printGroups() ?>
    </div>

    <div class="groupBox">
        <?php $ControllerHomePage->printGroupName() ?>
        <div class="info">
            <h2> Description : </h2>
            <?php $ControllerHomePage->printDescription() ?>
        </div>
    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>