<?php require_once('controllers/admin/c_AdminDeleteInstrument.php') ?>
<?php $title = "Virtuose - Suppression d'un instrument"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminDeleteInstrument = new AdminDeleteInstrument ?>

<main>
    <h1>Suppression</h1>
    <?php $ControllerAdminDeleteInstrument->printDeleteResult(); ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>