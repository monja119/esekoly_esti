<?php
require_once 'models/NotesModel.php';
require_once 'models/UserModel.php';
require_once 'config/render.php';
require_once 'models/ModuleModel.php';

class NotesController {
    // index to show mynote.php per module or listeNotes.php in my module
    public function index() {
        session_start();
        $user_id = $_SESSION['id'];

        $user = (new UserModel()) -> getUserWithAccount($user_id);

        if($user['account_type'] == 'etudiant') {
            // getting my note
            $notes = (new NotesModel()) -> getNotesEtudiant($user_id);
            render('onglets/sac/notes/listeNotes', 'Mes notes - '.$user['account_type'], compact('user', 'notes'));
        }
        else if ($user['account_type'] == 'enseignant'){
            // getting my module
            $module = (new ModuleModel()) -> getModuleByEnseignantId($_SESSION['id']);

            // getting all notes in my module
            $notes = (new NotesModel()) -> getNotesModule($module['module_id']);
            render('onglets/sac/notes/listeNotes', null, compact('user', 'notes', 'module'));

        }
        else if($user['account_type'] == 'admin') {
            $this->listeNotes();
        }
    }

    public function addNote($enseignant_id, $module_id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // adding new note
            $id_etudiant = $_POST["etudiant"];
            $note_obtenue = $_POST["note_obtenue"];
            $sur = $_POST["sur"];

            $adding_note = (new NotesModel()) -> addNote(
                $id_etudiant,
                $module_id,
                $note_obtenue,
                $sur
            );

            // redirection
            // getting module
            if($adding_note) {
                $success = "Note ajoutée avec succès";
                $module = (new ModuleModel()) -> getModuleByEnseignantId($enseignant_id);
                $user = (new UserModel()) -> getUserWithAccount($enseignant_id);
                render('onglets/sac/notes/ajouterNote', 'Ajouter une note', compact('module','user', 'success'));
            }
            else {
                $error = "Erreur lors de l'ajout de la note";
                $module = (new ModuleModel()) -> getModuleByEnseignantId($enseignant_id);
                $user = (new UserModel()) -> getUserWithAccount($enseignant_id);
                render('onglets/sac/notes/ajouterNote', 'Ajouter une note', compact('module','user','error'));
            }
            exit();
        }
        else{
            // getting module
            $module = (new ModuleModel()) -> getModuleByEnseignantId($enseignant_id);
            $user = (new UserModel()) -> getUserWithAccount($enseignant_id);
            render('onglets/sac/notes/ajouterNote', 'Ajouter une note', compact('module','user'));
        }
    }

    public function deleteNote($noteId) {
        $deleting = (new NotesModel()) -> removeNote($noteId);
        if($deleting) {
            return 'success';
        }
        else {
            return 'Impossible de supprimer la note';
        }
    }

    
    
    public function updateNote($note_id, $enseignant_id, $module_id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // adding new note
            $id_etudiant = $_POST["etudiant"];
            $note_obtenue = $_POST["note_obtenue"];
            $sur = $_POST["sur"];

            $updating_note = (new NotesModel()) -> updateNote(
                $note_id,
                $id_etudiant,
                $module_id,
                $note_obtenue,
                $sur
            );

            // redirection
            // getting module
            if($updating_note) {
                $success = "Note modifiée avec succès";
                // getting module
                $module = (new ModuleModel()) -> getModuleByEnseignantId($enseignant_id);
                $user = (new UserModel()) -> getUserWithAccount($enseignant_id);
                $note = (new NotesModel()) -> get($note_id);
                render('onglets/sac/notes/modifierNote', 'Modifier une note', compact('module','user', 'note', 'success'));

            }
            else {
                $error = "Erreur lors de l'ajout de la note";
                // getting module
                $module = (new ModuleModel()) -> getModuleByEnseignantId($enseignant_id);
                $user = (new UserModel()) -> getUserWithAccount($enseignant_id);
                $note = (new NotesModel()) -> get($note_id);
                render('onglets/sac/notes/modifierNote', 'Modifier une note', compact('module','user', 'note', 'error'));
            }
            exit();
        }
        else{
            // getting module
            $module = (new ModuleModel()) -> getModuleByEnseignantId($enseignant_id);
            $user = (new UserModel()) -> getUserWithAccount($enseignant_id);
            $note = (new NotesModel()) -> get($note_id);
            render('onglets/sac/notes/modifierNote', 'Modifier une note', compact('module','user', 'note'));
        }
    }



    public function getEtudiants() {
        return $this->model->getAllEtudiants();
    }

    public function getModules() {
        return $this->model->getAllModules();
    }

    public function getNotesEtudiants() {
        return $this->model->getAllNotes();
    }

    public function getNoteById($noteId) {
        return $this->model->getNoteById($noteId);
    }

    
}
