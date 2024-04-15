<?php require_once('controllers/admin/c_AdminUpdateInstrumentAction.php') ?>
<?php $title = "Virtuose - Modification Effectué"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminUpdateInstrumentAction = new AdminUpdateInstrumentAction ?>

<main>
    <?php $ControllerAdminUpdateInstrumentAction->executeInstrumentUpdate(); ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>