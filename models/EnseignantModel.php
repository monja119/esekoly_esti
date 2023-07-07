<?php
require_once 'config/Database.php';

class EnseignantModel{
    public function get($id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "SELECT * FROM enseignant WHERE user = :id";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':id', $_SESSION['id']);

        $statement->execute();

        // Utilisation de fetch(PDO::FETCH_ASSOC) pour récupérer une seule ligne
        $etudiant = $statement->fetch(PDO::FETCH_ASSOC);

        return $etudiant;
    }

    public function getAll(){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "SELECT * FROM enseignant";
        $statement = $connection->prepare($query);

        $statement->execute();

        // Utilisation de fetchAll(PDO::FETCH_ASSOC) pour récupérer plusieurs lignes
        $enseignants = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $enseignants;
    }
    public function create($user, $module, $first_name, $last_name, $email, $birthday, $address)
    {
        // db
        $database = new Database('localhost', 'user', 'password', 'esekoly');

        // obtention de cnx PDO
        $connection = $database -> getConnection();

        // verification si l'email est déjà utilisé
        $query = "INSERT INTO `enseignant`
                             (first_name, last_name, email, birthday, address, user, module)  
                             VALUES
                            (:first_name, :last_name, :email, :birthday, :address, :user, :module);
                         ";

        $statement = $connection->prepare($query);

        // Binding des values
        $statement->bindParam(':first_name', $first_name);
        $statement->bindParam(':last_name', $last_name);
        $statement->bindParam(':birthday', $birthday);
        $statement->bindParam(':address', $address);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':user', $user);
        $statement->bindParam(':module', $module);

        $statement->execute();

        return true;
    }

    public function update($user_id, $module, $first_name, $last_name, $email, $birthday, $address){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // verification si l'email est déjà utilisé
        $query = "UPDATE enseignant SET
                            first_name=:first_name,
                            last_name=:last_name,
                            email=:email,
                            birthday=:birthday, 
                            address=:address, user=:user, 
                            module=:module;
                WHERE user = :user;
                         ";

        $statement = $connection->prepare($query);

        // Binding des values
        $statement->bindParam(':first_name', $first_name);
        $statement->bindParam(':last_name', $last_name);
        $statement->bindParam(':birthday', $birthday);
        $statement->bindParam(':address', $address);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':user', $user_id);
        $statement->bindParam(':module', $module);

        $statement->execute();

        return true;
    }

    public function delete($id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "DELETE FROM enseingnant WHERE id = :id";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':id', $id);

        $statement->execute();

        return true;
    }
}

?>