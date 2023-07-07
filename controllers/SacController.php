<?php
require_once('config/Database.php');
require_once('config/render.php');

require_once 'models/UserModel.php';

class SacController{
    public function index(){
        session_start();
        $user_id = $_SESSION['id'];

        $user = (new UserModel()) -> getUserWithAccount($user_id);

        render('onglets/sac/base', 'Sac - '.$user['account_type'], compact('user'));
    }

    public function getInitSac(){
        $user_id = $_SESSION['id'];

        $user = (new UserModel()) -> getUserWithAccount($user_id);

        switch ($user['account_type']){
            case 'etudiant':
            case 'enseignant':
                require_once 'controllers/ModuleController.php';
                (new ModuleController()) -> home();
                break;

            case 'admin':
                require_once 'controllers/EtudiantController.php';
                (new EtudiantController()) -> home();
                break;

        }
    }
}

?>