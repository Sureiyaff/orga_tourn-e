<?php require_once('controllers/admin/c_AdminUpdateGroupAction.php') ?>
<?php $title = "Virtuose - Modification Effectué"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminUpdateGroupAction = new AdminUpdateGroupAction ?>

<main>
    <?php $ControllerAdminUpdateGroupAction->executeGroupUpdate(); ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>