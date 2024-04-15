<?php require_once('controllers/admin/c_AdminPageArtist.php') ?>
<?php $title = "Virtuose - Page Artiste"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminPageArtist = new AdminPageArtist ?>

<main>
    <?php $ControllerAdminPageArtist->printArtistName() ?>
    <div class="lineAdmin"></div>
    <div class="divAdminOption" id="divArtist">
        <table>
            <thead>
                <tr>
                    <th>ID Instrument</th>
                    <th>Nom</th>
                    <th>Poids</th>
                    <th>Volume</th>
                </tr>
            </thead>
            <tbody>
                <?php $ControllerAdminPageArtist->printInstrument(); ?>
            </tbody>
        </table>
        <input class="btnNotClicked btnAdminOption btnAdd" type="button" value="Ajouter" name="addInstrument" onclick="adminClickEvent(this)" />
    </div>
    
    <div class="divInvisible divAdminOption" id="addInstrument">
        <h1>Ajouter un instrument</h1>
        <?php $ControllerAdminPageArtist->printAddInstrument(); ?>
        <form method="POST" action="index.php">
            <input type="hidden" name="action" value="adminRedirection" >
            <input type="hidden" name="step" value="view" >
            <button type="submit">Annuler</button>
        </form>
    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>