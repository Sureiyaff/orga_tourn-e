<?php require_once('controllers/admin/c_AdminAddGroup.php') ?>
<?php $title = "Virtuose - Ajout d'un groupe"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminAddGroup = new AdminAddGroup ?>

<main>
<?php $ControllerAdminAddGroup->printAddGroupResult() ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>