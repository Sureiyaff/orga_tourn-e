<?php require_once('controllers/admin/c_AdminAddArtist.php') ?>
<?php $title = "Virtuose - Ajout d'un artiste"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminAddArtist = new AdminAddArtist ?>

<main>
<?php $ControllerAdminAddArtist->printAddArtistResult() ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>