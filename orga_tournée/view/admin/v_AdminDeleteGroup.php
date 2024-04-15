<?php require_once('controllers/admin/c_AdminDeleteGroup.php') ?>
<?php $title = "Virtuose - Suppression d'un groupe"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminDeleteGroup = new AdminDeleteGroup ?>

<main>
    <h1>Suppression</h1>
    <?php $ControllerAdminDeleteGroup->printDeleteResult(); ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>