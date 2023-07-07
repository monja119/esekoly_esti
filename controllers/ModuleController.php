<?php
require_once('config/Database.php');
require_once('config/render.php');
require_once 'models/EnseignantModel.php';
require_once 'models/ModuleModel.php';

class ModuleController{
    public function home(){
        $user = (new UserModel()) -> getUser($_SESSION['id']);
        switch ($user['account_type']) {
            case 'admin':
                $modules = (new ModuleModel()) -> getAll();
                render('onglets/sac/module/index', 'Liste des modules', compact('modules', 'user'));
                break;
            case 'enseignant':
                $user = (new UserModel()) -> getUserWithAccount($_SESSION['id']);
                $modules = (new ModuleModel()) -> getModuleByEnseignantId($_SESSION['id']);
                render('onglets/sac/module/index', 'Liste des modules', compact('modules', 'user'));
                break;
            case 'etudiant':
                $user = (new UserModel()) -> getUserWithAccount($_SESSION['id']);
                $level = substr($user['level'],0 ,2);
                $modules = (new ModuleModel()) -> getModuleByEtudiantLevel($level);
                render('onglets/sac/module/index', 'Liste des modules', compact('modules', 'user'));
                break;
            default:
                echo 'Vous n\'avez pas le droit d\'accéder à cette page';
                break;
        }

    }

    public function create(){
        // verifier si le account_type est admin
        $user_id = $_SESSION['id'];
        $user = (new UserModel()) -> getUser($user_id);
        if($user['account_type'] != 'admin'){
            echo 'Vous n\'avez pas le droit d\'accéder à cette page';
        }
        else{
            if(!$_POST){
                $enseignants = (new EnseignantModel()) -> getAll();
                render('onglets/sac/module/create', 'Ajouter un module', compact('enseignants'));
            }
            else{
                // creation
                $name = $_POST['name'];
                $module_id = $_POST['module_id'];
                $enseignant_id = $_POST['enseignant_id'];
                $level = $_POST['level'];

                // tansform type (string) of module id to int
                $module_id = (int) $module_id;
                $enseignant_id = (int) $enseignant_id;

                $creation = (new ModuleModel()) -> create($name, $module_id, $enseignant_id, $level);

                if($creation){
                    $modules = (new ModuleModel()) -> getAll();
                    $user = (new UserModel()) -> getUser($_SESSION['id']);
                    render('onglets/sac/module/index', 'Liste des modules', compact('modules', 'user'));
                }
                else{
                    $error = 'Erreur lors de la création';
                    $enseignants = (new EnseignantModel()) -> getAll();
                    render('onglets/sac/module/create', 'Ajouter un module', compact('enseignants'));

                }
            }
        }

    }

    public function update($id){
        // verifier si le account_type est admin
        $user_id = $_SESSION['id'];
        $user = (new UserModel()) -> getUser($user_id);
        if($user['account_type'] != 'admin'){
            echo 'Vous n\'avez pas le droit d\'accéder à cette page';
        }
        else{
            if(!$_POST){
                $module = (new ModuleModel()) -> get($id);
                $enseignants = (new EnseignantModel()) -> getAll();
                render('onglets/sac/module/update', 'Modifier un module', compact('module', 'enseignants'));
            }
            else{
                // creation
                $name = $_POST['name'];
                $module_id = $_POST['module_id'];
                $enseignant_id = $_POST['enseignant_id'];
                $level = $_POST['level'];

                // tansform type (string) of module id to int
                $module_id = (int) $module_id;
                $enseignant_id = (int) $enseignant_id;

                $update = (new ModuleModel()) -> update($module_id, $name, $level, $enseignant_id);

                if($update){
                    $modules = (new ModuleModel()) -> getAll();
                    $user = (new UserModel()) -> getUser($_SESSION['id']);
                    render('onglets/sac/module/index', 'Liste des modules', compact('modules', 'user'));
                }
                else{
                    $error = 'Erreur lors de la modification';
                    $module = (new ModuleModel()) -> get($module_id);
                    $enseignants = (new EnseignantModel()) -> getAll();
                    render('onglets/sac/module/update', 'Modifier un module', compact('module', 'enseignants'));

                }
            }
        }

    }

    public function delete($id){
        // verifier si le account_type est admin
        $user_id = $_SESSION['id'];
        $user = (new UserModel()) -> getUser($user_id);
        if($user['account_type'] != 'admin'){
            echo 'Vous n\'avez pas le droit d\'accéder à cette page';
        }
        else{
            $delete = (new ModuleModel()) -> delete($id);
            if($delete){
                return true;
            }
            else{
                return false;
            }
        }
    }
}
?>