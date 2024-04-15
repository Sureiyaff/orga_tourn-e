<?php require_once('controllers/admin/c_AdminUpdateInstrument.php') ?>
<?php $title = "Virtuose - Modification d'un instrument"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminUpdateInstrument = new AdminUpdateInstrument ?>

<main>
    <h1>Modifier un Instrument</h1>
    <?php $ControllerAdminUpdateInstrument->printUpdateInstrumentForm(); ?>
    <form method="POST" action="index.php">
    <input type="hidden" name="action" value="adminRedirection" >
    <input type="hidden" name="step" value="view" >
    <button type="submit">Annuler</button>
</form>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>