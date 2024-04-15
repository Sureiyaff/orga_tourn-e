<?php require_once('controllers/admin/c_AdminDeleteArtist.php') ?>
<?php $title = "Virtuose - Suppression d'un artiste"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminDeleteArtist = new AdminDeleteArtist ?>

<main>
    <h1>Suppression</h1>
    <?php $ControllerAdminDeleteArtist->printDeleteResult(); ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>