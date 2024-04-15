<?php require_once('controllers/admin/c_AdminDeleteConcert.php') ?>
<?php $title = "Virtuose - Suppression d'un concert"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminDeleteConcert = new AdminDeleteConcert ?>

<main>
    <h1>Suppression</h1>
    <?php $ControllerAdminDeleteConcert->printDeleteResult(); ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>