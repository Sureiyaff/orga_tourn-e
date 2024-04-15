<?php require_once('controllers/admin/c_AdminAddInstrument.php') ?>
<?php $title = "Virtuose - Ajout d'un instrument"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminAddInstrument = new AdminAddInstrument ?>

<main>
<?php $ControllerAdminAddInstrument->printAddInstrumentResult() ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>