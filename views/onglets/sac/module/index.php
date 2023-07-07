<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="../../../../assets/module/index.css">

<div class="wrapper p-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-3 d-flex justify-content-between">
                    <h2 class="pull-left">Liste des modules</h2>
                    <?php
                        if($user['account_type'] == 'admin'){
                            echo '<a href="/sac/module/add" class="btn btn-success mt-5"><i class="bi bi-plus"></i> Ajouter</a>';
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <!-- listes des modules sous forme de card-->
    <div class="row d-flex flex-row flex-wrap justify-content-between flex-fill">
        <?php
            $counter = 0;
            // for each modules
            foreach ($modules as $module){
                if($counter % 2 == 0){
                    // first card
                    echo '<div class="card m-1">';
                }else {
                    // second card
                    echo '<div class="card m-1 second-card">';
                }
                $counter++;
            ?>

            <div class="card-header">
                <?= $module['module_id'].' - '.$module['name']?>
            </div>
            <div class="card-body">
                <p class="card-text">Niveau : <?= $module['level'] ?></p>
                <p class="card-text">Enseignant : <?= $module['first_name'].' '.$module['last_name'] ?></p>
            </div>
        <?php if($user['account_type'] == 'admin'){ ?>
            <div class="card-footer">
                <div class="row">
                    <div class="col-6">
                        <a href="/sac/module/update/?id=<?= $module['module_id'] ?>" class="btn btn-primary w-100"><i class="fa fa-pencil"></i></a>
                    </div>
                    <div class="col-6 btn btn-danger delete" id="<?= $module['module_id'] ?>">
                        <i class="fa fa-trash-o"></i>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>

<script type="application/javascript">
    let deleteButtons = document.querySelectorAll('.delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            if(confirm('Voulez-vous vraiment supprimer ce module ?')){
                let id = button.getAttribute('id');
                let xhr = new XMLHttpRequest();
                xhr.open('GET', '/sac/module/delete/?id=' + id);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            window.location.reload();
                        } else {
                            alert('Erreur');
                        }
                    }
                }

                xhr.send();
            }
        });
    });
</script>
