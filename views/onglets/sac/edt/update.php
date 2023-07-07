<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Main CSS-->
    <link href="../../../../assets/edt/css/ajouter.css" rel="stylesheet" media="all">
</head>

<body>
<div class="page-wrapper p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
        <div class="card card-1">
            <div class="card-body">
                <h2 class="title">Modifier l' emploi du temps</h2>
                <form method="POST" action="/sac/edt/update/?id=<?= $edt['id'] ?>">
                    <div class="input-group">
                        <label for="classe">Classe</label>
                        <input value="<?= $edt['niveau'] ?>" class="input--style-1" type="text" placeholder="ex: L1G2" name="niveau">
                    </div>
                    <div class="input-group">
                        <label for="module_id">Module</label>
                        <input value="<?= $edt['module_id'] ?>" class="input--style-1" type="number" placeholder="Module ID" name="module_id">
                    </div>
                    <div class="input-group">
                        <label for="edt_date">Date</label>
                        <input value="<?= $edt['date'] ?>" class="input--style-1" type="date" placeholder="Date" name="date">
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label for="heure1">Début</label>
                                <input value="<?= $edt['heure_debut'] ?>" class="input--style-1 js-datepicker" type="time" placeholder="Début" name="heure_debut">
                                <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label for="heure2">Fin</label>
                                <input value="<?= $edt['heure_fin'] ?>" class="input--style-1 js-datepicker" type="time" placeholder="Fin" name="heure_fin">
                                <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="num_salle">Numéro Salle</label>
                        <input value="<?= $edt['numero_salle'] ?>" class="input--style-1" type="text" placeholder="Numéro Salle" name="numero_salle">
                    </div>
                    <div class="p-t-20">
                        <button class="btn btn--radius btn--green" type="submit" name="ajouter">Modifier</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

</body>

</html>
<!-- end document-->
