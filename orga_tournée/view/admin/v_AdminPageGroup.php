<?php require_once('controllers/admin/c_AdminPageGroup.php') ?>
<?php $title = "Virtuose - Page Groupe"; ?>

<?php ob_start(); ?>

<?php $ControllerAdminPageGroup = new AdminPageGroup ?>

<main>
    <?php $ControllerAdminPageGroup->printGroupName() ?>
    <div class="lineAdmin"></div>
    <div class="divAdminOption" id="divGroup">
        <h2>Artistes</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Artiste</th>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody>
                <?php $ControllerAdminPageGroup->printArtist(); ?>
            </tbody>
        </table>
        <input class="btnNotClicked btnAdminOption btnAdd" type="button" value="Ajouter" name="addArtist" onclick="adminClickEvent(this)" />
    </div>
    
    <div class="divInvisible divAdminOption" id="addArtist">
        <h1>Ajouter un artiste</h1>
        <?php $ControllerAdminPageGroup->printAddArtist(); ?>
        <form method="POST" action="index.php">
            <input type="hidden" name="action" value="adminRedirection" >
            <input type="hidden" name="step" value="view" >
            <button type="submit">Annuler</button>
        </form>
    </div>

    <div class="divAdminOption" id="divConcert">
        <h2>Concerts</h2>
        <table>
            <thead>
                <tr>
                    <th>Lieu</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $ControllerAdminPageGroup->printConcert(); ?>
            </tbody>
        </table>
        <input class="btnNotClicked btnAdminOption btnAdd" type="button" value="Ajouter" name="addConcert" onclick="adminClickEvent(this)" />
    </div>

    <div class="divInvisible divAdminOption" id="addConcert">
        <h1>Ajouter un concert</h1>
        <?php $ControllerAdminPageGroup->printAddConcert(); ?>
        <form method="POST" action="index.php">
            <input type="hidden" name="action" value="adminRedirection" >
            <input type="hidden" name="step" value="view" >
            <button type="submit">Annuler</button>
        </form>
    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>