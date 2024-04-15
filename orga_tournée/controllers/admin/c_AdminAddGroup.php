<?php

class AdminAddGroup
{
    private $newGroup;

    function __construct()
    {
        $groupname = $_POST["groupname"];
        $description = $_POST["description"];
        $picture = $_POST["picture"];
        $this->newGroup = new Group($groupname, $description, $picture);
    }

    function printAddGroupResult()
    {
        $groupPDO = new GroupPDO();
        if ($groupPDO->create($this->newGroup)) {
            echo '<p>Le groupe a été ajoutée</br><a href="index.php?action=adminRedirection&step=view">Retour</a></p>';
        } else {
            echo "<p>Echec de l'enregistrement</p>";
        }
    }
}
