<?php

require_once('config/Database.php');
require_once('config/render.php');
require_once 'models/EtudiantModel.php';
require_once 'models/MediaModel.php';
require_once 'models/UserModel.php';
require_once 'models/EdtModel.php';
require_once 'models/ModuleModel.php';

class EdtController{
    public function index()
    {
        // getting user with account
        $user = (new UserModel()) -> getUserWithAccount($_SESSION['id']);
        if($user['account_type'] == 'admin'){
            // getting all edts
            $edts = (new EdtModel()) -> getAllEdt();
            // rendu
            render('onglets/sac/edt/index', null, compact('user', 'edts'));
        }
        else if($user['account_type'] == 'etudiant'){
            // getting my edt
            $etudiant = (new EtudiantModel()) -> get($user['id']);
            $edts = (new EdtModel()) -> getEdtByNiveau($etudiant['level']);
            // rendu
            render('onglets/sac/edt/index', null, compact('user', 'edts'));
        }
        else if($user['account_type'] == 'enseignant'){
            // getting my module
            $module = (new ModuleModel()) -> getModuleByEnseignantId($user['id']);
            $edts = (new EdtModel()) -> getEdtByModule($module['module_id']);

            // rendu
            render('onglets/sac/edt/index', null, compact('user', 'module', 'edts'));
        }

    }

    public function create()
    {
        // verifying is account type is admin
        $user = (new UserModel()) -> getUser($_SESSION['id']);

        if($user['account_type'] == 'admin') {
            // if post
            if ($_POST) {
                // getting post data
                $niveau = $_POST['niveau'];
                $module_id = $_POST['module_id'];
                $date = $_POST['date'];
                $heure_debut = $_POST['heure_debut'];
                $heure_fin = $_POST['heure_fin'];
                $numero_salle = $_POST['numero_salle'];

                // creating edt
                $creation_edt = (new EdtModel()) -> createEdt($niveau, $module_id, $date, $heure_debut, $heure_fin, $numero_salle);

                // if edt created
                if($creation_edt){
                    $edts = (new EdtModel()) -> getAllEdt();
                    render('onglets/sac/edt/index', 'Edt créé', compact('user', 'edts'));
                }
                else{
                    echo 'Erreur lors de la création de l\'edt';
                }
                exit();
            }

            else {
                // rendu
                render('onglets/sac/edt/create', null, compact('user'));
            }
        }
        else{
            echo 'Vous n\'avez pas les droits pour accéder à cette page';
        }
    }

    public function update($id){
        // verifying is account type is admin
        $user = (new UserModel()) -> getUser($_SESSION['id']);

        if($user['account_type'] == 'admin') {
            // if post
            if ($_POST) {
                // getting post data
                $niveau = $_POST['niveau'];
                $module_id = $_POST['module_id'];
                $date = $_POST['date'];
                $heure_debut = $_POST['heure_debut'];
                $heure_fin = $_POST['heure_fin'];
                $numero_salle = $_POST['numero_salle'];

                // updating edt
                $updating_edt = (new EdtModel()) -> updateEdt($id, $niveau, $module_id, $date, $heure_debut, $heure_fin, $numero_salle);

                // if edt updated
                if($updating_edt){
                    $edts = (new EdtModel()) -> getAllEdt();
                    render('onglets/sac/edt/index', 'Edt modifié', compact('user', 'edts'));
                }
                else{
                    echo 'Erreur lors de la modification de l\'edt';
                }
                exit();
            }

            else {
                // rendu
                $edt = (new EdtModel()) -> getEdt($id);
                render('onglets/sac/edt/update', null, compact('edt'));
            }
        }
        else{
            echo 'Vous n\'avez pas les droits pour accéder à cette page';
        }
    }

    public function delete($id)
    {
        // verifying is account type is admin
        $user = (new UserModel()) -> getUser($_SESSION['id']);

        if($user['account_type'] == 'admin') {
            // deleting edt
            $deleting_edt = (new EdtModel()) -> deleteEdt($id);

            // if edt deleted
            if($deleting_edt){
                return 'Edt supprimé avec succès';
            }
            else{
                echo 'Erreur lors de la suppression de l\'edt';
            }
            exit();
        }
        else{
            echo 'Vous n\'avez pas les droits pour accéder à cette page';
        }
    }
}