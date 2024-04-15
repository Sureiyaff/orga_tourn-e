<?php require_once('controllers/admin/c_AdminUpdateArtist.php') ?>
<?php $title = "Virtuose - Modification d'un artiste"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminUpdateArtist = new AdminUpdateArtist ?>

<main>
    <h1>Modifier un artiste</h1>
    <?php $ControllerAdminUpdateArtist->printUpdateArtistForm(); ?>
    <form method="POST" action="index.php">
    <input type="hidden" name="action" value="adminRedirection" >
    <input type="hidden" name="step" value="view" >
    <button type="submit">Annuler</button>
</form>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>