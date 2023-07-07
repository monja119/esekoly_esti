<?php
require_once 'config/Database.php';

class ForumModel
{
    public function get($id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "SELECT *, forum.id as fr_id FROM forum 
            LEFT JOIN enseignant on forum.user_id = enseignant.user 
            LEFT JOIN etudiant on forum.user_id = etudiant.user  
            LEFT JOIN media on forum.user_id = media.user;    
            WHERE id = :id;";

        $statement = $connection->prepare($query);

        // Binding des values
        $statement->bindParam(':id', $id);

        // Execution de la requete
        $statement->execute();

        $forum =  $statement->fetch(PDO::FETCH_ASSOC);

        return $forum;
    }
    public function create($user_id, $titre, $text){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "INSERT INTO forum (user_id,titre, text)
                            VALUES
                            (:user_id,:titre, :text);
                         ";

        $statement = $connection->prepare($query);

        // Binding des values
        $statement->bindParam(':titre', $titre);
        $statement->bindParam(':text', $text);
        $statement->bindParam(':user_id', $user_id);

        // Execution de la requete
        $statement->execute();

        return $statement->rowCount();

    }

    public function getAll(){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "select *, forum.id as fr_id, media.donnees as donnees from forum 
                LEFT JOIN enseignant on forum.user_id = enseignant.user 
                LEFT JOIN etudiant on forum.user_id = etudiant.user 
                LEFT JOIN media on forum.user_id = media.user;";

        $statement = $connection->prepare($query);

        // Execution de la requete
        $statement->execute();

        $forums =  $statement->fetchAll(PDO::FETCH_ASSOC);

        return $forums;
    }

    public function answerForum($forum_id, $answer, $answerer){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "insert into answer (answer, answerer, forum_id) values (:answer, :answerer, :forum_id)";

        $statement = $connection->prepare($query);

        // binding
        // Binding des values
        $statement->bindParam(':answer', $answer);
        $statement->bindParam(':answerer', $answerer);
        $statement->bindParam(':forum_id', $forum_id);

        // Execution de la requete
        $statement->execute();

        if($statement){
            return true;
        }
        else {
            return false;
        }

    }

    public function getAllAnswer($forum_id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "select * from  answer JOIN user on answer.answerer = user.id where answer.forum_id  = :forum_id";

        $statement = $connection->prepare($query);

        // binding
        // Binding des values
        $statement->bindParam(':forum_id', $forum_id);

        // Execution de la requete
        $statement->execute();


        $answers =  $statement->fetchAll(PDO::FETCH_ASSOC);

        return $answers;

    }

    public function incrementView($forum_id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "update forum set views = views + 1 where id = :forum_id";

        $statement = $connection->prepare($query);

        // binding
        // Binding des values
        $statement->bindParam(':forum_id', $forum_id);

        // Execution de la requete
        $statement->execute();

        if($statement){
            return true;
        }
        else {
            return false;
        }

    }

    public function incrementComment($forum_id){
        // obtention de cnx PDO
        $connection = (new Database()) -> getConnection();

        // requete
        $query = "update forum set comment = comment + 1 where id = :forum_id";

        $statement = $connection->prepare($query);

        // binding
        // Binding des values
        $statement->bindParam(':forum_id', $forum_id);

        // Execution de la requete
        $statement->execute();

        if($statement){
            return true;
        }
        else {
            return false;
        }

    }
}