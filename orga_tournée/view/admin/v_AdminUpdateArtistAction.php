<?php require_once('controllers/admin/c_AdminUpdateArtistAction.php') ?>
<?php $title = "Virtuose - Modification Effectué"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminUpdateArtistAction = new AdminUpdateArtistAction ?>

<main>
    <?php $ControllerAdminUpdateArtistAction->executeArtistUpdate(); ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>