<?php

class AdminDeleteGroup
{
    private $group;

    function __construct()
    {
        $type = $_POST["type"];
        $id = $_POST["id"];
        switch ($type) {
            case 'group':
                $groupPDO = new GroupPDO();
                $this->group = $groupPDO->read($id);
                break;
        }
    }

    function printDeleteResult()
    {
        if ($this->group != null) {
            $groupPDO = new GroupPDO();
            $groupPDO->delete($this->group->getIdGroup());
            echo '<p>Le groupe a été supprimé</br><a href="index.php?action=adminRedirection&step=view">Retour</a></p>';
        }
    }
}
