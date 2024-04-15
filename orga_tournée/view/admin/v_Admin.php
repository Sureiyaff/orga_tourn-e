<?php require_once('controllers/admin/c_Admin.php') ?>
<?php $title = "Virtuose - Espace interne"; ?>

<?php ob_start(); ?>

<?php $ControllerAdmin = new Admin ?>

<main>
    <h1>Espace interne</h1>
    <div class="lineAdminTop"></div>
    <div id="adminAction">
        <input class="btnSmall btnNotClicked btnAdminOption" type="button" value="Groupes" name="divGroup" onclick="adminClickEvent(this)" />
        <input class="btnSmall btnNotClicked btnAdminOption" type="button" value="Calendrier" name="divCal" onclick="adminClickEvent(this)" />
        <form method="POST" action="index.php">
                <input type="hidden" name="action" value="adminRedirection" >
                <input type="hidden" name="step" value="disconnect" >
                <input class="btnSmall btnNotClicked btnAdminOption" type="submit" value="Déconnexion">
        </form>
    </div>
    <div class="lineAdminBottom"></div>
    <div class="divInvisible divAdminOption" id="divGroup">
        <h2>Groupes</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Libellé</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php $ControllerAdmin->printGroup(); ?>
            </tbody>
        </table>
        <input class="btnNotClicked btnAdminOption btnAdd" type="button" value="Ajouter" name="addGroup" onclick="adminClickEvent(this)" />
    </div>
    
    <div class="divInvisible divAdminOption" id="addGroup">
    <h2>Ajouter une activité</h2>
        <form method="POST" action="index.php">
            <div class="colDiv">
                <div class="vDiv divAlignRight">
                    <label for="groupname">* Nom du groupe</label>
                    <label for="description">* Description</label>
                    <label for="picture">* Image</label>
                </div>
                <div class="vDiv divAlignLeft">
                    <input type="text" name="groupname" required>
                    <input class="txtDescription" type="text" name="description" required>
                    <input class="txtDescription" type="text" name="picture" required>
                    <input type="hidden" name="action" value="adminRedirection" >
                    <input type="hidden" name="step" value="addGroup" >
                    <input type="submit" value="Ajouter le groupe"></input>
                    <a href="index.php?action=adminRedirection&step=disconnect"><button type="button">Annuler</button></a>
                </div>
            </div>
        </form>
    </div>

    <div class="divInvisible divAdminOption" id="divCal">
        <h2>Concerts</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Groupe</th>
                    <th>Lieu</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $ControllerAdmin->printConcert(); ?>
            </tbody>
        </table>
    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>