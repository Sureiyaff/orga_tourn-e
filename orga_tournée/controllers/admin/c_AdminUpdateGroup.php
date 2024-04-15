<?php

class AdminUpdateGroup
{
    private $groupToUpdate;

    function __construct()
    {
        $groupID = intval($_POST["id"]);
        $groupPDO = new GroupPDO();
        $this->groupToUpdate = $groupPDO->read($groupID);
    }

    function printUpdateGroupForm()
    {
        echo '
        <form method="POST" action="index.php">
        <label for="groupname">Nom du groupe :</label></br>
        <input type="text" style="width:50%" name="groupname" id="groupname" value="' .
            $this->groupToUpdate->getName() . '" required>
        <br><br>
        <label for="description">Description du groupe :</label></br>
        <input type="text" style="width:80%" name="description" id="description" value="' .
            $this->groupToUpdate->getDescription() . '" required>
        <br><br>
        <label for="picture">Image :</label></br>
        <input type="text" style="width:80%" name="picture" id="picture" value="' .
            $this->groupToUpdate->getPicture() . '" required>
        <br><br>
        <input type="hidden" name="id_group" value="' . $this->groupToUpdate->getIdGroup() . '">
        <input type="hidden" name="action" value="adminRedirection" >
        <input type="hidden" name="step" value="updateGroupAction" >
        <button type="submit">Modifier le groupe</button>
        </form>';
    }
}
