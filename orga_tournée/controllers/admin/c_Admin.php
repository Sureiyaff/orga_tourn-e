<?php

class Admin
{
    private $activities;
    private $situations;
    private $login;
    private $groups;
    private $concerts;

    function __construct()
    {
        $groupPDO = new GroupPDO();
        $this->groups = $groupPDO->readAll();
        $concertPDO = new ConcertPDO();
        $this->concerts = $concertPDO->readAll();
        $this->login = $_SESSION['login'];
    }

    function printInfoConnection()
    {
        echo '<p>Connecté en tant que ' . $this->login . '</p>';
    }

    function printGroup()
    {
        foreach ($this->groups as $group) {
            echo '<tr>

                <td>' . $group->getIdGroup() . '</td>

                <form method="post" action="index.php">
                <input type="hidden" name="action" value="adminRedirection">
                <input type="hidden" name="step" value="pageGroup">
                <input type="hidden" name="type" value="group">
                <input type="hidden" name="groupId" value="'. $group->getIdGroup() .'">
                <td> <button class="adminTableAction" type="submit">'. $group->getName() . '</td>
                </form>
            
                <td>' . $group->getDescription() . '</td>

                <form method="post" action="index.php">
                <input type="hidden" name="action" value="adminRedirection">
                <input type="hidden" name="step" value="updateGroup">
                <input type="hidden" name="type" value="group">
                <input type="hidden" name="id" value="'. $group->getIdGroup() .'">
                <td> <button class="adminTableAction" type="submit">
                <img class="adminIcon" src="view/img/edit.ico" />
                </button></td>
                </form>

                <form method="post" action="index.php">
                <input type="hidden" name="action" value="adminRedirection">
                <input type="hidden" name="step" value="deleteGroup">
                <input type="hidden" name="type" value="group">
                <input type="hidden" name="id" value="'. $group->getIdGroup() .'">
                <td> <button class="adminTableAction" type="submit">
                <img class="adminIcon" src="view/img/delete.ico" />
                </button></td>
                </form>
                </td></tr>
                ';
        }
    }

    function printConcert()
    {
        $groupPDO = new GroupPDO();
        foreach ($this->concerts as $concert) {
            $groupName = $groupPDO->readGroupName($concert->getIdGroup());
            echo '<tr>

                <td>' . $groupName . '</td>
                <td>' . $concert->getPlace() . '</td>
                <td>' . $concert->getDate() . '</td>
                </td></tr>
                ';
        }
    }
}
