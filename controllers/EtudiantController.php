<?php
require_once('config/Database.php');
require_once('config/render.php');
require_once 'models/EtudiantModel.php';
require_once 'models/MediaModel.php';

    class EtudiantController{
        public function home(){

            $result = (new EtudiantModel()) -> getAll();

            // rendu
            render('onglets/sac/etudiant/home', 'Liste des étudaints', compact('result'));
            exit();

        }

        public function get($id){
            $etudiant = (new EtudiantModel()) -> get($id);
            // getting user photo
            $etudiant['photo'] = (new MediaModel()) -> getProfilePicture($id)['donnees'];
            // rendu
            render('onglets/sac/etudiant/read', 'Etudiant - '.$etudiant['first_name'].' '.$etudiant['last_name'], compact('etudiant'));
        }
        public function create(){
            if(!$_POST){
                render('onglets/sac/etudiant/create', 'Ajouter un etudiant');
            }
        }
    }
?>