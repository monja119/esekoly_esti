<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../assets/etudiant/list/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../assets/etudiant/list/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="wrapper mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 d-flex justify-content-between">
                        <h2 class="pull-left">Liste des étudiants</h2>
                        <a href="/sac/etudiant/add" class="btn btn-success mt-5"><i class="bi bi-plus"></i> Ajouter</a>
                    </div>        
                </div>
            </div>        
        </div>
    <!-- listes des etudiant -->
    <section style="margi">
        <div class="container">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>classe</th>
                        <th>Date de Naissance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($result){
                            foreach ($result as $row) {
                                // Access values of each column
                                echo '
                                    <tr>
                                        <td>' . $row["user"] . '</td>
                                        <td>' . $row["first_name"] . ' '.$row["last_name"].'</td>
                                        <td>' . $row["level"] . ' '.$row["parcours"].'</td>
                                        <td>' . $row["birthday"].'</td>
                                        <td>
                                            <a href="read.php?id='. $row['user'] .'" class="me-3" ><span class="bi bi-eye"></span></a>
                                            <a href="update.php?id='. $row['user'] .'" class="me-3" ><span class="bi bi-pencil"></span></a>
                                            <a href="delete.php?id='. $row['user'] .'" ><span class="bi bi-trash"></span></a>
                                        </td>
                                    </tr>
                                ';
                            }
                            ;
                    }
                    else{
                        echo "no result";
                    }
                    ?>
                </tbody>
            </table>
        
    </section>

    </div>
</body>
</html>