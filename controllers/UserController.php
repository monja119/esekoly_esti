<?php
require_once('config/Database.php');
require_once('config/render.php');
require_once 'models/UserModel.php';
require_once 'models/MediaModel.php';
require_once 'models/MediaModel.php';
require_once 'models/EnseignantModel.php';
require_once 'models/EtudiantModel.php';

class UserController {

    public function index() {
        session_start();
        if(isset($_SESSION['id'])){

            $user = (new UserModel())->getUser($_SESSION['id']);

            // media
            $media = new MediaModel();
            $query = "SELECT * FROM media WHERE utilisation='profile_picture' and user = ".$_SESSION['id'];
            $response = $media->request($query);
            $profile_picture = $response['donnees'];

            if(!$user){
                render('forms/login', 'Identification');
            }
            else {
                // media profil
                $media = new MediaModel();
                $profile_picture = $media -> getProfilePicture($user['id']);

                $user_email = $user['email'];
                $account_type = $user['account_type'];

                if($user['account_type'] == 'etudiant') {
                    $etudiant = new EtudiantModel();
                    $user = $etudiant->get($user['id']);
                }
                else if ($user['account_type'] == 'enseignant') {
                    $enseignant = new EnseignantModel();
                    $user = $enseignant->get($user['id']);
                }

                render(
                    'onglets/profile/profile',
                    $user['first_name'].' '.$user['last_name'].' - Profil',
                    compact('user', 'profile_picture','account_type', 'user_email')
                );
            }

        }
        else{
            render('HomePage', 'E-Sekoly');
        }

    }
    
    public function updateProfile() {
        session_start();
        $user_id = $_SESSION['id'];
        $user = (new UserModel())-> getUser($user_id);
        $account_type = $user['account_type'];

        // media profil
        if($_FILES['picture']['error'] !== UPLOAD_ERR_NO_FILE){
            // creation de media ( photo de profil )
            $file = $_FILES['picture'];
            // Emplacement actuel temporaire du fichier téléchargé
            $tempFilePath = $file['tmp_name'];
            // Emplacement de destination du fichier téléchargé
            $uploadDir = 'media/images/profile_picture/';
            // Création d'un nom de fichier unique
            $picture = uniqid() . '_' . $file['name'];
            // Emplacement de destination finale du fichier téléchargé
            $uploadFilePath = $uploadDir . $picture;
            // Déplacement du fichier téléchargé vers la destination finale
            move_uploaded_file($tempFilePath, $uploadFilePath);

            $media = new MediaModel();
            $media -> updateMedia('images', 'profile_picture', $user['id'], $uploadFilePath);

        }

        $email = $user_email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $birthday = $_POST['birthday'];

        if($account_type == 'etudiant') {
            $level = $_POST['level'];
            $parcours = $_POST['parcours'];
            (new EtudiantModel()) -> update($user_id, $level, $parcours, $first_name, $last_name, $email, $birthday, $address);

        }else if ($user['account_type'] == 'enseignant') {
            $module = $_POST['module'];
            (new EnseignantModel()) -> update($user_id, $module, $first_name, $last_name, $email, $birthday, $address);
        }


        // updated data
        // media profil
        $media = new MediaModel();
        $profile_picture = $media -> getProfilePicture($user['id']);

        $user_email = $user['email'];
        $account_type = $user['account_type'];

        if($user['account_type'] == 'etudiant') {
            $etudiant = new EtudiantModel();
            $user = $etudiant->get($user['id']);
        }
        else {
            $enseignant = new EnseignantModel();
            $user = $enseignant->get($user['id']);
        }

        render(
            'onglets/profile/profile',
            $user['first_name'].' '.$user['last_name'].' - Profil',
            compact('user', 'profile_picture','account_type', 'user_email')
        );

    }

    public function removeUser($id){
        session_start();
        $user = (new UserModel())-> getUser($id);
        $account_type = $user['account_type'];

        if($account_type == 'etudiant') {
            (new EtudiantModel()) -> delete($id);
        }else {
            (new EnseignantModel()) -> delete($id);
        }

        (new UserModel()) -> delete($id);

        header('Location: /');

    }
}

?>