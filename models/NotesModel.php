<?php
require_once 'config/Database.php';
require_once 'models/MediaModel.php';
require_once 'models/EtudiantModel.php';
require_once 'models/EnseignantModel.php';
require_once 'models/UserModel.php';


class NotesModel {
    // get all notes of a student
    public function get($note_id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "select * from notes where id=:id";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':id', $note_id);

        $statement->execute();

        // Utilisation de fetchAll(PDO::FETCH_ASSOC) pour récupérer plusieurs lignes
        $notes = $statement->fetch(PDO::FETCH_ASSOC);

        return $notes;
    }
    public function getNotesEtudiant($id) {
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "select * from notes JOIN modules on notes.module_id = modules.module_id where user_id=:id order by id desc;";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':id', $id);

        $statement->execute();

        // Utilisation de fetchAll(PDO::FETCH_ASSOC) pour récupérer plusieurs lignes
        $notes = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $notes;
    }



    // select all notes of a student for a specific module
    public function getNotesEtudiantModule($user_id, $module_id) {
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "SELECT * FROM notes WHERE user_id = :id AND module_id = :module_id";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':id', $id);
        $statement->bindParam(':module_id', $module_id);

        $statement->execute();

        // Utilisation de fetchAll(PDO::FETCH_ASSOC) pour récupérer plusieurs lignes
        $notes = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $notes;
    }

    // get all notes of all students for a specific module
    public function getNotesModule($module_id) {
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete_id
        $query = "
                SELECT *
                FROM notes
                JOIN modules ON notes.module_id = modules.module_id
                JOIN etudiant ON notes.user_id = etudiant.user
                WHERE notes.module_id = :module_id
                ORDER BY notes.id DESC;

        ";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':module_id', $module_id);

        $statement->execute();

        // Utilisation de fetchAll(PDO::FETCH_ASSOC) pour récupérer plusieurs lignes
        $notes = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $notes;
    }

    public function addNote($user_id, $module_id, $note, $note_max) {
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "INSERT INTO notes (user_id, module_id, note, note_max) VALUES (:user_id, :module_id, :note, :note_max)";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':module_id', $module_id);
        $statement->bindParam(':note', $note);
        $statement->bindParam(':note_max', $note_max);

        if($statement->execute()){
            return true;
        } else {
            return false;
        };
    }

    public function removeNote($note_id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "DELETE FROM notes WHERE id = :note_id";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':note_id', $note_id);

        if($statement->execute()){
            return true;
        } else {
            return false;
        };
    }

    public function updateNote($note_id, $id_etudiant, $module_id, $note_obtenue, $sur){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "UPDATE notes SET user_id = :id_etudiant, module_id = :module_id, note = :note_obtenue, note_max = :sur WHERE id = :note_id";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':note_id', $note_id);
        $statement->bindParam(':id_etudiant', $id_etudiant);
        $statement->bindParam(':module_id', $module_id);
        $statement->bindParam(':note_obtenue', $note_obtenue);
        $statement->bindParam(':sur', $sur);

        if($statement->execute()){
            return true;
        } else {
            return false;
        }
    }


    // get all notes less than max_note column
    public function getNotesLessThanMean($etudiant_id) {
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "
                    select * from notes 
                        LEFT JOIN modules 
                            on notes.module_id = modules.module_id 
                             WHERE notes.user_id = :etudiant_id 
                               AND notes.note < (notes.note_max/2);
                    ";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':etudiant_id', $etudiant_id);

        $statement->execute();

        // Utilisation de fetchAll(PDO::FETCH_ASSOC) pour récupérer plusieurs lignes
        $notes = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $notes;
    }


    // get all notes less than mean max_note column
    public function getNotesGreaterThanMean($etudiant_id) {
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "
                    select * from notes 
                        LEFT JOIN modules 
                            on notes.module_id = modules.module_id 
                             WHERE notes.user_id = :etudiant_id 
                               AND notes.note > (notes.note_max/2);
                    ";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':etudiant_id', $etudiant_id);

        $statement->execute();

        // Utilisation de fetchAll(PDO::FETCH_ASSOC) pour récupérer plusieurs lignes
        $notes = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $notes;
    }

    // get all notes equals than mean max_note column
    public function getNotesEqualsThanMean($etudiant_id)
    {
        // obtention de cnx PDO
        $connection = (new Database())->getConnection();

        // requete
        $query = "
                    select * from notes 
                        LEFT JOIN modules 
                            on notes.module_id = modules.module_id 
                             WHERE notes.user_id = :etudiant_id 
                               AND notes.note = (notes.note_max/2);
                    ";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':etudiant_id', $etudiant_id);

        $statement->execute();

        // Utilisation de fetchAll(PDO::FETCH_ASSOC) pour récupérer plusieurs lignes
        $notes = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $notes;
    }

    public function getNoteGeneral($user_id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "select sum(note)/sum(note_max) as note_general from notes where user_id=:user_id;";
        $statement = $connection->prepare($query);

        // Bind des valeurs
        $statement->bindParam(':user_id', $user_id);

        $statement->execute();

        // Utilisation de fetchAll(PDO::FETCH_ASSOC) pour récupérer plusieurs lignes
        $notes = $statement->fetch(PDO::FETCH_ASSOC);

        return $notes;
    }
}