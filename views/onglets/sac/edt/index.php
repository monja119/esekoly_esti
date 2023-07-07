<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../assets/edt/css/edt.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="main">
        <div class="containers1">
            <div class="title">
                <span>Emploi du temps</span>
            </div>

                <?php

                    if($user['account_type'] == 'admin'){
                        echo '

                                <a href="/sac/edt/add/"><i class="fa fa-plus-circle fa-2x mr-4"></i></a>

                        ';
                    }
                ?>

        </div>

        <!-- itering $edts -->
        <?php
            $last_level = '';
            foreach ($edts as $edt){
                if($edt['niveau'] != $last_level) {
                    echo '<span>'.$edt['niveau'].'</span><hr />';
                    $last_level = $edt['niveau'];
                }
            ?>
        <div class="containers2">
            <div class="test1">
                <div class="date"><?= $edt['date'];?></div>
            </div>
            <div class="test2">
                <div><?= $edt['module_id'];?></div>
                <div class="content">
                    <div class="content1">
                        <span><?= $edt['niveau'];?></span>
                    </div>
                    <div class="content2">
                        <span><?= $edt['heure_debut'].' - '.$edt['heure_fin'];?></span>
                    </div>
                    <div class="content3">
                        <span>Salle N°: <?= $edt['numero_salle'];?></span>
                    </div>
                </div>
            </div>
            <?php if($user['account_type'] == 'admin') {?>
                <div class="test3">
                    <div class="modifier">
                        <a href="/sac/edt/update/?id=<?= $edt['id'];?>" id="modifier" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </div>
                    <div id="<?= $edt['id'];?>" class="supprimer cursor-pointer">
                        <i class="fa fa-trash text-danger cursor-pointer" aria-hidden="true"></i>
                    </div>
               </div>
            <?php } ?>
        </div>

        <?php } ?>
    </div>
    <script type="application/javascript">
        // suppression par xhr
        let supprimer = document.querySelectorAll('.supprimer');
        for(let i = 0; i < supprimer.length; i++){
            let id = supprimer[i].id;
            supprimer[i].addEventListener('click', function(){
                if(confirm('Voulez-vous vraiment supprimer cet emploi de temps ?')){
                    let xhr = new XMLHttpRequest();
                    xhr.open('GET', '/sac/edt/delete/?id=' + id);
                    xhr.onreadystatechange = function(){
                        if(xhr.readyState === 4){
                            if(xhr.status === 200){
                                window.location.reload();
                            }
                        }
                    }
                    xhr.send();

                }
            })
        }
    </script>
</body>

</html>