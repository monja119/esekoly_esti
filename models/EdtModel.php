<?php
require_once 'config/Database.php';

class EdtModel
{
    // get all edt
    public function getAllEdt(){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        $query = "
            SELECT 
                id,
                edt.module_id, 
                edt.niveau, 
                GROUP_CONCAT(DISTINCT edt.date) AS date,
                GROUP_CONCAT(DISTINCT edt.heure_debut) AS heure_debut,
                GROUP_CONCAT(DISTINCT edt.heure_fin) AS heure_fin, 
                GROUP_CONCAT(DISTINCT edt.numero_salle) AS numero_salle 
            FROM edt
            JOIN modules 
            ON edt.module_id = modules.module_id 
            GROUP BY edt.module_id, edt.niveau
            ";
        $statement = $connection->prepare($query);
        $statement->execute();

        $edts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $edts;
    }



    public function getEdt($id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        $query = "SELECT * FROM `edt` WHERE id = :id";
        $statement = $connection->prepare($query);

        // Binding des values
        $statement->bindParam(':id', $id);

        $statement->execute();

        $edt = $statement->fetch(PDO::FETCH_ASSOC);

        return $edt;
    }

    public function getEdtByModule($module_id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        $query = "SELECT * FROM `edt` WHERE module_id = :module_id";
        $statement = $connection->prepare($query);

        // Binding des values
        $statement->bindParam(':module_id', $module_id);

        $statement->execute();

        $edt = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $edt;
    }

    public function getEdtByNiveau($niveau){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        $query = "SELECT * FROM `edt` WHERE niveau = :niveau";
        $statement = $connection->prepare($query);

        // Binding des values
        $statement->bindParam(':niveau', $niveau);

        $statement->execute();

        $edt = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $edt;
    }

    public function updateEdt($id, $niveau, $module_id, $date, $heure_debut, $heure_fin, $numero_salle){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        $query = "UPDATE edt SET
                            niveau=:niveau,
                            module_id=:module_id,
                            date=:date,
                            heure_debut=:heure_debut,
                            heure_fin=:heure_fin,
                            numero_salle=:numero_salle
                            WHERE id=:id;
                         ";
        $statement = $connection->prepare($query);

        // Binding des values
        $statement->bindParam(':id', $id);
        $statement->bindParam(':niveau', $niveau);
        $statement->bindParam(':module_id', $module_id);
        $statement->bindParam(':date', $date);
        $statement->bindParam(':heure_debut', $heure_debut);
        $statement->bindParam(':heure_fin', $heure_fin);
        $statement->bindParam(':numero_salle', $numero_salle);

        $statement->execute();

        if($statement->rowCount() > 0)
            return true;
        else
            return false;
    }

    public function createEdt($niveau, $module_id, $date, $heure_debut, $heure_fin, $numero_salle){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        $query = "INSERT INTO `edt`
                             (niveau, module_id, date, heure_debut, heure_fin, numero_salle)  
                             VALUES
                            (:niveau, :module_id, :date, :heure_debut, :heure_fin, :numero_salle);
                         ";
        $statement = $connection->prepare($query);

        // Binding des values
        $statement->bindParam(':niveau', $niveau);
        $statement->bindParam(':module_id', $module_id);
        $statement->bindParam(':date', $date);
        $statement->bindParam(':heure_debut', $heure_debut);
        $statement->bindParam(':heure_fin', $heure_fin);
        $statement->bindParam(':numero_salle', $numero_salle);

        $statement->execute();

        if($statement->rowCount() > 0)
            return true;
        else
            return false;

    }

    public function deleteEdt($id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        $query = "DELETE FROM `edt` WHERE id = :id";
        $statement = $connection->prepare($query);

        // Binding des values
        $statement->bindParam(':id', $id);

        $statement->execute();

        if($statement->rowCount() > 0)
            return true;
        else
            return false;
    }
}