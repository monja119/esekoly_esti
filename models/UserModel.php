<?php
require_once 'config/Database.php';
require_once 'models/MediaModel.php';
require_once 'models/EtudiantModel.php';
require_once 'models/EnseignantModel.php';

class UserModel {
    public function getUser($id) {
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "SELECT * FROM user WHERE id = :id";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':id', $_SESSION['id']);

        $statement->execute();

        // Utilisation de fetch(PDO::FETCH_ASSOC) pour récupérer une seule ligne
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    // methode pour retourner le user avec selon son type de compte
    public function getUserWithAccount($id) {
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "SELECT * FROM user WHERE id = :id";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':id', $_SESSION['id']);

        $statement->execute();

        // Utilisation de fetch(PDO::FETCH_ASSOC) pour récupérer une seule ligne
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $user_email = $user['email'];
        $account_type = $user['account_type'];

        // media profil
        $media = new MediaModel();
        $profile_picture = $media -> getProfilePicture($user['id'])['donnees'];

        if($user['account_type'] == 'etudiant') {
            $etudiant = new EtudiantModel();
            $user = $etudiant->get($user['id']);
        }
        else if ($user['account_type'] == 'enseignant'){
            $enseignant = new EnseignantModel();
            $user = $enseignant->get($user['id']);
        }

        $user['picture'] = $profile_picture;
        $user['email'] = $user_email;
        $user['account_type'] = $account_type;
        $user['id'] = $id;
        return $user;

    }

    public function getUserByEmail($email){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "SELECT * FROM user WHERE email = :email";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':email', $email);

        $statement->execute();

        // Utilisation de fetch(PDO::FETCH_ASSOC) pour récupérer une seule ligne
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if($user)
            return $user;
        else
            return false;
    }


    public function createUser($email, $account_type, $password) {
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();



        // verification si l'email est déjà utilisé
        $query = "INSERT INTO `user`
                             (email, account_type, password)  
                             VALUES
                            (:email, :account_type, :password);
                         ";

        $statement = $connection->prepare($query);

        // Binding des values
        $statement->bindParam(':account_type', $account_type);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);

        $statement->execute();

        return true;
    }

    public function delete($id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "DELETE FROM user WHERE id = :id";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':id', $id);

        $statement->execute();

        return true;
    }
}

?>