<?php
require_once('config/Database.php');
require_once('config/render.php');
require_once('models/UserModel.php');
require_once('models/MediaModel.php');
require_once('models/EtudiantModel.php');
require_once('models/EnseignantModel.php');

class AuthController{
    public function login(){

        if($_POST){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = (new UserModel()) -> getUserByEmail($email);

            // Vérification du résultat
            if ($user) {
                // si le type de count est admin on verifie par le mot de passe brute
                if($user['account_type'] == 'admin'){
                    // verfiy password
                    if($password == $user['password']){
                        session_start();
                        $_SESSION['id'] = $user['id'];
                        header('Location: /sac');
                    }
                    else{
                        $error_message = 'Mot de passe incorrect';
                        $data = compact('error_message', 'email');
                        render('forms/login', 'Identification - Mot de passe incorrect', $data);
                    }
                }

                else {
                    // Le mot de passe correspond, l'utilisateur est authentifié
                    if (!password_verify($password, $user['password'])) {
                        $error_message = 'Mot de passe incorrect';

                        $data = compact('error_message', 'email');

                        render('forms/login', 'Identification - Mot de passe incorrect', $data);

                    } else {

                        session_start();

                        $_SESSION['id'] = $user['id'];

                        header('Location: /');


                    }
                }
                
            } else {
                $error_message = 'Email non existant';
                
                $data = compact('error_message');
                
                render('forms/login', 'Email non existant', $data);
                
            }
            

        }
        else {
            render('forms/login', 'Identification');
            
        }

    }



    public function register(){

        if($_POST){
            $user = new UserModel();
            $email = $_POST['email'];

            // Vérification du résultat
            if ($user -> getUserByEmail($email)) {
                $error_message = "l'addresse mail est déjà utilisé";

                $data = compact('error_message');
                render('forms/register', 'Email déjà utilisé', $data);
            }
            else {

                // si email nest pas encore utlisé
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                if($password != $password2){
                    $error_message = 'les deux mot de passe ne collent pas';
                    $data = compact('error_message');
                    render('forms/register.php', 'Erreur de création', $data);

                }else{ // nouveau utilisateur
                    // hashage de password
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    $address = $_POST['address'];
                    $birthday = $_POST['birthday'];
                    $account_type = $_POST['account_type'];

                    // si la création de user est reussi
                    if( $user -> createUser($email, $account_type, $password)){

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
                        $user = $user -> getUserByEmail($email);
                        $media -> create('images', 'profile_picture', $user['id'], $uploadFilePath);

                        // création de compte selon le type
                        if($_POST['account_type'] == 'etudiant'){
                            $level = $_POST['level'];
                            $parcours = $_POST['parcours'];
                            $etudiant = new EtudiantModel();
                            $etudiant -> create($user['id'], $level, $parcours,  $first_name, $last_name, $email, $birthday, $address);

                        } else if($_POST['account_type'] == 'enseignant') {
                            $module = $_POST['module'];
                            $enseignant = new EnseignantModel();
                            $enseignant -> create($user['id'], $module,  $first_name, $last_name, $email, $birthday, $address);
                        }
                        
                        render('forms/login', 'Identification - Esekoly');
                    } else {
                        echo "erreur";
                    }
                    exit;
                    
                }
            }

        }

        else {
            render('forms/register', 'Création de compte - Esekoly');
        }
    }


    public function logout(){
        session_start();
        session_destroy();

        header('Location: /');
    }
}

?>