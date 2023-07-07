<?php
require_once 'config/Database.php';

class ModuleModel{

    public function get($module_id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "SELECT * FROM modules WHERE module_id = :module_id";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':module_id', $module_id);

        $statement->execute();

        // Utilisation de fetchAll(PDO::FETCH_ASSOC) pour récupérer plusieurs lignes
        $module = $statement->fetch(PDO::FETCH_ASSOC);

        return $module;
    }

    public function getModuleByEnseignantId($enseignant_id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "SELECT * FROM modules JOIN enseignant on modules.enseignant_id = enseignant.user WHERE enseignant_id = :enseignant_id";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':enseignant_id', $enseignant_id);

        $statement->execute();

        // Utilisation de fetchAll(PDO::FETCH_ASSOC) pour récupérer plusieurs lignes
        $module = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $module;
    }

    public function getAll(){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "SELECT * FROM modules JOIN enseignant ON modules.enseignant_id = enseignant.user";
        $statement = $connection->prepare($query);

        $statement->execute();

        // Utilisation de fetchAll(PDO::FETCH_ASSOC) pour récupérer plusieurs lignes
        $modules = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $modules;
    }
    public function create($name, $module_id, $enseignant_id, $level){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "INSERT INTO modules (module_id, name, level, enseignant_id) VALUES (:module_id, :name, :level, :enseignant_id)";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':module_id', $module_id);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':level', $level);
        $statement->bindParam(':enseignant_id', $enseignant_id);

        $creation = $statement->execute();

        if($creation){
            return true;
        }
        else{
            return false;
        }

    }

    public function delete($module_id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "DELETE FROM modules WHERE module_id = :module_id";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':module_id', $module_id);

        $deletion = $statement->execute();

        if($deletion){
            return true;
        }
        else{
            return false;
        }
    }

    public function update($module_id, $name, $level, $enseignant_id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "UPDATE modules SET name = :name, level = :level, enseignant_id = :enseignant_id WHERE module_id = :module_id";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':module_id', $module_id);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':level', $level);
        $statement->bindParam(':enseignant_id', $enseignant_id);

        $update = $statement->execute();

        if($update){
            return true;
        }
        else{
            return false;
        }
    }

    public function getModuleByEtudiantLevel($level){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "SELECT * FROM modules JOIN enseignant on modules.enseignant_id = enseignant.user WHERE level = :level";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':level', $level);

        $statement->execute();

        // Utilisation de fetchAll(PDO::FETCH_ASSOC) pour récupérer plusieurs lignes
        $module = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $module;
    }
}
?>