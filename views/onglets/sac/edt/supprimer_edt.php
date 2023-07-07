<?php
    $id = $_GET['id'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/supprimer.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <div class="contenairs1">
            <span>Voulez-vous vraiment supprimer l'emploi du temps</span>
        </div>
        <div class="containers2">
            <div>
                <form action="../controllers/edt_delete.php?id=<?php echo $id ?>" method="POST">
                    <button name="supprimer">OUI</button>
                </form>
            </div>
            <div>
                <form action="index.php">
                    <button>NON</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>