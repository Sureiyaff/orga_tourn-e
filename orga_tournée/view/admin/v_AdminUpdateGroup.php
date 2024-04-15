<?php require_once('controllers/admin/c_AdminUpdateGroup.php') ?>
<?php $title = "Virtuose - Modification d'un groupe"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminUpdateGroup = new AdminUpdateGroup ?>

<main>
    <h1>Modifier un groupe</h1>
    <?php $ControllerAdminUpdateGroup->printUpdateGroupForm(); ?>
    <form method="POST" action="index.php">
    <input type="hidden" name="action" value="adminRedirection" >
    <input type="hidden" name="step" value="view" >
    <button type="submit">Annuler</button>
</form>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>