<?php
require_once('config/Database.php');
require_once('config/render.php');

require_once 'models/UserModel.php';
require_once  'models/MediaModel.php';
require_once 'models/EnseignantModel.php';
require_once 'models/EtudiantModel.php';

class HomePageController {

    
    public function index() {
        session_start();

        if(isset($_SESSION['id'])){
            $user = (new UserModel())->getUser($_SESSION['id']);
            if(!$user){
                render('forms/login', 'Identification');
            }
            else {
                // media profil
                $media = new MediaModel();
                $profile_picture = $media -> getProfilePicture($user['id']);

                if($user['account_type'] == 'etudiant') {
                    $etudiant = new EtudiantModel();
                    $user = $etudiant->get($user['id']);
                }
                else if ($user['account_type'] == 'enseignant'){
                    $enseignant = new EnseignantModel();
                    $user = $enseignant->get($user['id']);
                }

                render('onglets/home/home', 'Acceuil - Esekoly', compact('user'));
            }

        }   
        else{
            render('HomePage', 'E-Sekoly Page Landing');
        }
    }

    public function about (){
        render('about', 'A propos');
    }

    public function contact (){
        render('contact', 'Contact');
    }
    
}

?>