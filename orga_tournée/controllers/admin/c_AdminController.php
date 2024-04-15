<?php
require_once('pdo/userPDO.php');

class AdminController
{
    public function tryToGetAdmin(): int
    {
        $userInputLogin = $_POST['login'];
        $userInputPwd = $_POST['pwd'];
        $userPDO = new UserPDO();
        $userID = $userPDO->getId($userInputLogin, $userInputPwd);
        echo "<script>console.log('Console: " . $userID . "' );</script>";
        return $userID;
    }
}
