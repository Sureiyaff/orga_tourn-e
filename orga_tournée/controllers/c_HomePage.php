<?php
require_once('model/group.php');
require_once('pdo/groupPDO.php');

class HomePage {

    public $groups;
    public $selectGroup;

    function __construct()
    {
        $groupPDO = new GroupPDO();
        $this->groups = $groupPDO->readAll();
        $this->selectGroup =  $this->groups[0];
    } 

    function printGroups(){
        foreach ($this->groups as $group) {
            echo '<div class="SwimmingPool--Pool">';
            echo '<img class="SwimmingPool--Img" src="' . $group->getPicture() . '" value="' . $group->getName() . '*' . $group->getDescription() . '" alt="" onclick="PiscineClickEvent(this)">';
            echo '<div class="SwimmingPool--Name">' . $group->getName() . '</div>';
            echo '</div>';
        }
    }

    function printGroupName(){
        echo '<h1 id="FocusSwimmingPool--Title">' . $this->selectGroup->getName() . '</h1>';
    }
    function printDescription(){
        echo '<p id="FocusSwimmingPool--Descriptif">' . $this->selectGroup->getDescription() . '<p></br>';
    }
}
   