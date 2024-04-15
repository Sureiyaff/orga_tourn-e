<?php require_once('controllers/admin/c_AdminUpdateConcertAction.php') ?>
<?php $title = "Virtuose - Modification Effectué"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminUpdateConcertAction = new AdminUpdateConcertAction ?>

<main>
    <?php $ControllerAdminUpdateConcertAction->executeConcertUpdate(); ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>