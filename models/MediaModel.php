<?php
require_once 'config/Database.php';

class MediaModel{
    public function getProfilePicture($id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "SELECT * FROM media WHERE utilisation = 'profile_picture' AND user = :id";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':id', $id);

        $statement->execute();

        // Utilisation de fetch(PDO::FETCH_ASSOC) pour récupérer une seule ligne
        $etudiant = $statement->fetch(PDO::FETCH_ASSOC);

        return $etudiant;
    }

    public function create($type_mime, $utilisation, $user, $donnees){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // verification si l'email est déjà utilisé
        $query = "INSERT INTO `media`
                             (type_mime, utilisation, user, donnees)  
                             VALUES
                            (:type_mime, :utilisation, :user, :donnees);
                         ";

        $statement = $connection->prepare($query);

        // Binding des values
        $statement->bindParam(':type_mime', $type_mime);
        $statement->bindParam(':utilisation', $utilisation);
        $statement->bindParam(':user', $user);
        $statement->bindParam(':donnees', $donnees);

        $statement->execute();

        return true;
    }

    public function updateMedia($type_mime, $utilisation, $user, $donnees){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // verification si l'email est déjà utilisé
        $query = "UPDATE `media`
                             SET
                             type_mime = :type_mime,
                             donnees = :donnees
                             WHERE
                             utilisation = :utilisation
                             AND
                             user = :user

                         ";

        $statement = $connection->prepare($query);

        // Binding des values
        $statement->bindParam(':type_mime', $type_mime);
        $statement->bindParam(':utilisation', $utilisation);
        $statement->bindParam(':user', $user);
        $statement->bindParam(':donnees', $donnees);

        $statement->execute();

        return true;
    }

    public function delete($id, $utilisation){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "DELETE FROM media WHERE id = :id and utilisation =:utilisation";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':id', $id);
        $statement->bindParam(':utilisaiton', $utilisaiton);

        $statement->execute();

        return true;
    }

    public function request($query){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete;
        $statement = $connection->prepare($query);

        $statement->execute();

        // Utilisation de fetch(PDO::FETCH_ASSOC) pour récupérer une seule ligne
        $response = $statement->fetch(PDO::FETCH_ASSOC);

        return $response;
    }
}
?>