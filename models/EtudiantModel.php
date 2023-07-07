<?php
require_once 'config/Database.php';

class EtudiantModel{
    public function get($id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "SELECT * FROM etudiant WHERE user = :id";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':id', $id);

        $statement->execute();

        // Utilisation de fetch(PDO::FETCH_ASSOC) pour récupérer une seule ligne
        $etudiant = $statement->fetch(PDO::FETCH_ASSOC);
        return $etudiant;
    }


    public function getAll(){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "select * from etudiant";
        $statement = $connection->prepare($query);

        $statement->execute();

        // Utilisation de fetch(PDO::FETCH_ASSOC) pour récupérer une seule ligne
        $etudiant = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $etudiant;
    }


    public function create($user, $level, $parcours, $first_name, $last_name, $email, $birthday, $address)
    {
        // db
        $database = new Database('localhost', 'user', 'password', 'esekoly');

        // obtention de cnx PDO
        $connection = $database -> getConnection();

        // verification si l'email est déjà utilisé
        $query = "INSERT INTO `etudiant`
                             (first_name, last_name, email, birthday, address, user, level, parcours)  
                             VALUES
                            (:first_name, :last_name, :email, :birthday, :address, :user, :level, :parcours);
                         ";

        $statement = $connection->prepare($query);

        // Binding des values
        $statement->bindParam(':first_name', $first_name);
        $statement->bindParam(':last_name', $last_name);
        $statement->bindParam(':birthday', $birthday);
        $statement->bindParam(':address', $address);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':user', $user);
        $statement->bindParam(':level', $level);
        $statement->bindParam(':parcours', $parcours);

        $statement->execute();

        return true;
    }

    public function update($user_id, $level, $parcours, $first_name, $last_name, $email, $birthday, $address){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // verification si l'email est déjà utilisé
        $query = "UPDATE etudiant SET
                            first_name=:first_name,
                            last_name=:last_name,
                            email=:email,
                            birthday=:birthday, 
                            address=:address, user=:user, 
                            level=:level,
                            parcours=:parcours
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
        $statement->bindParam(':level', $level);
        $statement->bindParam(':parcours', $parcours);

        $statement->execute();

        return true;
    }

    public function delete($id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "DELETE FROM etudiant WHERE id = :id";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':id', $id);

        $statement->execute();

        return true;
    }
}

?>