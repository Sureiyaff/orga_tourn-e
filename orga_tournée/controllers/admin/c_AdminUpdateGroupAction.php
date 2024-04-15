<?php

class AdminUpdateGroupAction
{
    function __construct()
    {
    }

    function executeGroupUpdate()
    {
        if (isset($_POST['id_group'])) {
            $id_group = htmlspecialchars($_POST['id_group']);
            $name = htmlspecialchars($_POST['groupname']);
            $description = htmlspecialchars($_POST['description']);
            $picture = htmlspecialchars($_POST['picture']);
            $updatedGroup = new Group($name, $description, $picture, $id_group);
            $groupPDO = new GroupPDO();
            if ($groupPDO->update($updatedGroup)) {
                echo '<p>Le groupe a été modifiée</br><a href="index.php?action=adminRedirection&step=view">Retour</a></p>';
            } else {
                echo "Une erreur est survenue lors de la modification de l'activité.";
            }
        }
    }
}
