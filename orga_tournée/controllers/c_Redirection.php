<?php

require_once('controllers/admin/c_AdminController.php');

// a cause de booking dans codeRedirection 
require_once('./pdo/artistPDO.php');
require_once('./pdo/concertPDO.php');
require_once('./pdo/groupPDO.php');
require_once('./pdo/instrumentPDO.php');
require_once('./pdo/userPDO.php');

class Redirection
{

    private static ?Redirection $ControllerRedirection = null;

    public static function getInstance(): Redirection
    {
        if (Redirection::$ControllerRedirection === null) {
            try {
                Redirection::$ControllerRedirection = new Redirection();
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }
        return Redirection::$ControllerRedirection;
    }
    private function __construct()
    {
    }

    public function adminRedirection()
    {
        $adminController = new AdminController();
        $step = 'view';
        if (isset($_POST['step'])) {
            $step = htmlspecialchars($_POST['step']);
        }
        switch ($step) {
            case 'view':
                if (isset($_SESSION['login'])) {
                    require('view/admin/v_Admin.php');
                } else {
                    require('view/admin/v_AdminLogin.php');
                }
                break;
            case 'login':
                $user_id = $adminController->tryToGetAdmin();
                if ($user_id != null) {
                    // On définit des variables de session
                    $userPDO = new UserPDO();
                    $user = $userPDO->read($user_id);
                    echo '<script>console.log("' . $user_id . '")</script>';
                    $_SESSION['login'] = $user->getLogin();
                    require('view/admin/v_Admin.php');
                } else {
                    require('view/admin/v_AdminLogin.php');
                }
                break;
            case 'addGroup':
                require('view/admin/v_AdminAddGroup.php');
                break;
            case 'updateGroup':
                require('view/admin/v_AdminUpdateGroup.php');
                break;
            case 'updateGroupAction':
                require('view/admin/v_AdminUpdateGroupAction.php');
                break;
            case 'deleteGroup':
                require('view/admin/v_AdminDeleteGroup.php');
                break;
            case 'pageGroup':
                require('view/admin/v_AdminPageGroup.php');
                break;
            case 'updateArtist':
                require('view/admin/v_AdminUpdateArtist.php');
                break;
            case 'updateArtistAction':
                require('view/admin/v_AdminUpdateArtistAction.php');
                break;
            case 'deleteArtist':
                require('view/admin/v_AdminDeleteArtist.php');
                break;
            case 'addArtist':
                require('view/admin/v_AdminAddArtist.php');
                break;
            case 'pageArtist':
                require('view/admin/v_AdminPageArtist.php');
                break;
            case 'updateInstrument':
                require('view/admin/v_AdminUpdateInstrument.php');
                break;
            case 'updateInstrumentAction':
                require('view/admin/v_AdminUpdateInstrumentAction.php');
                break;
            case 'deleteInstrument':
                require('view/admin/v_AdminDeleteInstrument.php');
                break;
            case 'addConcert':
                require('view/admin/v_AdminAddConcert.php');
                break;
            case 'updateConcert':
                require('view/admin/v_AdminUpdateConcert.php');
                break;
            case 'updateConcertAction':
                require('view/admin/v_AdminUpdateConcertAction.php');
                break;
            case 'deleteConcert':
                require('view/admin/v_AdminDeleteConcert.php');
                break;
            case 'addInstrument':
                require('view/admin/v_AdminAddInstrument.php');
                break;
            case 'disconnect':
                unset($_SESSION['login']);
                require('view/admin/v_AdminLogin.php');
                break;
        }
    }
}
