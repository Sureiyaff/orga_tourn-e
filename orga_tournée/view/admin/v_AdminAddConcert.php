<?php require_once('controllers/admin/c_AdminAddConcert.php') ?>
<?php $title = "Virtuose - Ajout d'un concert"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminAddConcert = new AdminAddConcert ?>

<main>
<?php $ControllerAdminAddConcert->printAddConcertResult() ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>