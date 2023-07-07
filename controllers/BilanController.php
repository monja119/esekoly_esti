<?php
require_once 'models/NotesModel.php';
require_once 'models/ModuleModel.php';
require_once 'models/UserModel.php';
require_once 'models/EtudiantModel.php';
require_once 'models/EnseignantModel.php';
require_once 'models/EdtModel.php';

class BilanController
{
    public function index(){
        $user = (new UserModel()) -> getUserWithAccount($_SESSION['id']);
        $notes_less_than_mean = (new NotesModel()) -> getNotesLessThanMean($user['id']);
        $notes_greater_than_mean = (new NotesModel()) -> getNotesGreaterThanMean($user['id']);
        $notes_equal_to_mean = (new NotesModel()) -> getNotesEqualsThanMean($user['id']);
        $note_general = (new NotesModel()) -> getNoteGeneral($user['id']);
        render('onglets/sac/bilan/bilan', null,
            compact('user', 'notes_less_than_mean', 'notes_greater_than_mean', 'notes_equal_to_mean', 'note_general'));
    }
}