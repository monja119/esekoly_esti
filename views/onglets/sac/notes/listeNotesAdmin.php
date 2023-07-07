<?php
require_once '../config.php';
require_once '../NoteModel.php';
require_once '../NoteController.php';

$noteModel = new NoteModel($conn);
$noteController = new NoteController($noteModel);

$notes = $noteController->getNotesEtudiants();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["supprimer"])) {
    $noteId = $_POST["note_id"];
    $result = $noteController->deleteNote($noteId);

    if ($result) {
        header("Location: listeNotes.php");
        exit();
    } else {
        echo "Erreur lors de la suppression de la note.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modifier"])) {
    $noteId = $_POST["note_id"];
    
    // Vérifier si la note existe
    $note = $noteController->getNoteById($noteId);
    
    if ($note) {
        // Afficher le formulaire de modification avec la valeur actuelle de la note
        $currentNote = $note["note"];
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <link rel="stylesheet" href="../assets/bootstrap.min.css">

            <title>Modifier une note</title>
        </head>
        <body>
             <h1 class="text-center">Modifier une note</h1>

            <form method="POST" action="listeNotes.php" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="nouvelle_note">Nouvelle note :</label>
                    <input type="text" id="nouvelle_note" name="nouvelle_note" value="<?php echo $currentNote; ?>" class="form-control" required>
                    <div class="invalid-feedback">
                        Veuillez entrer une nouvelle note.
                    </div>
                </div>
                <input type="hidden" name="note_id" value="<?php echo $noteId; ?>">
                <input type="submit"  name="modifier_note" class="btn btn-primary" value="Modifier">
            </form>

        </body>
        </html>
        <?php
        exit();
    } else {
        echo "La note n'existe pas.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modifier_note"])) {
    $noteId = $_POST["note_id"];
    $newNoteValue = $_POST["nouvelle_note"];
    $result = $noteController->updateNoteValue($noteId, $newNoteValue);

    if ($result) {
        echo "La note a été modifiée avec succès.";
        header("Location: listeNotes.php");
        exit();
    } else {
        echo "Erreur lors de la modification de la note.";
    }
}
?>

<html>
<head>
<link rel="stylesheet" href="../assets/bootstrap.min.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Liste des notes</title>
</head>
<body >
<h1 class="text-center">Liste des notes</h1>

<?php while ($rowNote = $notes->fetch_assoc()) : ?>
    <div class="card mb-3">
        <h3 class="card-header text-primary">
            <b>Nom de l'élève :</b> <?php echo $rowNote["nom"]; ?>
        </h3>
        <div class="card-body">
            <p class="card-text text-muted">
                <b>Classe :</b> <?php echo $rowNote["classe"]; ?>
            </p>
            <p class="card-text text-muted">
                <b>Matière :</b> <?php echo $rowNote["titre"]; ?>
            </p>

            <p class="card-text">
                <b>Note :</b> <?php echo $rowNote["note"]; ?>
            </p>

            <!-- Formulaire de modification de note -->
            <form method="POST" action="listeNotes.php" class="d-inline">
                <input type="hidden" name="note_id" value="<?php echo $rowNote["note_id"]; ?>">
               
            </form>

            <!-- Formulaire de suppression de note -->
            <form method="POST" action="listeNotes.php" class="d-inline">
                <input type="hidden" name="note_id" value="<?php echo $rowNote["note_id"]; ?>">
               
            </form>
        </div>
    </div>
    <hr>
<?php endwhile; ?>




</body>
</html>

