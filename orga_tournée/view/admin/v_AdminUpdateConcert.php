<?php require_once('controllers/admin/c_AdminUpdateConcert.php') ?>
<?php $title = "Virtuose - Modification d'un concert"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminUpdateConcert = new AdminUpdateConcert ?>

<main>
    <h1>Modifier un Concert</h1>
    <?php $ControllerAdminUpdateConcert->printUpdateConcertForm(); ?>
    <form method="POST" action="index.php">
    <input type="hidden" name="action" value="adminRedirection" >
    <input type="hidden" name="step" value="view" >
    <button type="submit">Annuler</button>
</form>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>