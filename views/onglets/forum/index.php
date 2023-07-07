<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link type="text/css" rel="stylesheet" href="../../../assets/main/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="../../../assets/main/fontawesome/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="../../../assets/main/main.css" />
    <link type="text/css" rel="stylesheet" href="../../../assets/forum/css/index.css" />
    <link type="text/css" rel="stylesheet" href="../../../assets/forum/css/responsive.css" />
</head>
<body>
    <?php require_once 'views/Header.php'; ?>

    <div class="wrapper">
        <div class="container-fluid">
            <!-- search bar -->
            <div class="row" style="margin-top: 80px">
                <div class="col-12">
                <div class="input-group">
                    <input id="search" type="text" class="form-control" placeholder="Search">
                    <div class="input-group-append ml-1 rounded-right">
                        <button id="btn-search" class="btn w-100 h-100 btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-4 col-md-12 creation pt-3">
                    <!-- creation forum form -->
                    <div class="row justify-content-center">
                        <div class="card col-12">
                            <form action="/forum/create" method="POST">

                                <div class="card-header bg-white">
                                    <h5 class="card-title">Créer un forum</h5>
                                    <?php
                                    if(isset($error)){
                                        echo '<div class="alert alert-danger">'.$error.'</div>';
                                    }
                                    ?>
                                </div>
                                <div class="card-body" >

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="titre" id="titre" placeholder="Titre" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <textarea name="textarea-forum" id="textarea-forum" class="form-control "></textarea>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-success w-100" value="Poster"/>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-12 pl-5 pt-3">
                    <?php
                        require_once 'config/forumRouter.php';
                    ?>

                </div>
            </div>
        </div>
    </div>

</body>
</html>