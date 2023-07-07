<?php
    require_once 'models/UserModel.php';
    require_once 'models/EnseignantModel.php';
    require_once 'models/EtudiantModel.php';

    session_start();

    if(isset($_SESSION['id'])){
        $user = (new UserModel())-> getUserWithAccount($_SESSION['id']);
        if(!$user){
            header('Location: /login');
        }
    }
    else{
        header('Location: /login');
    }

?>
<!-- Bootstrap -->
<link href="../assets/main/bootstrap.css" rel="stylesheet">
<link href="../assets/main/header.css" rel="stylesheet">
<link href="../assets/main/main.css" rel="stylesheet">
<link href="../assets/main/responsive.css" rel="stylesheet">

<header id="header" class="fixed-top mb-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow justify-content-center align-items-center">
        <div class="d-flex flex-row justify-content-between w-sm-100 w-md-100">
            <a class="navbar-brand text-primary" href="/">E-sekoly</a>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse align-items-start" id="navbarNav">
            <ul class="navbar-nav w-100 justify-content-end">
                <li class="nav-item active">
                    <a class="nav-link" href="/">
                        <i class="d-sm-none d-md-none d-lg-inline d-xl-inline fa fa-home mr-1"></i>
                        Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sac">
                        <i class="fa fa-briefcase mr-1"></i>
                        Mon Sac
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/forum">
                        <i class="fa fa-question mr-1"></i>
                        Forum
                    </a>
                </li>
                <li class="nav-item ml-4">
                <?php
                    if($user['account_type'] ==  'admin'){
                        echo '<p class="mt-3"> Admin </p>';
                    }

                    else {
                        echo
                            '<a class="nav-link" href="/user/profile">
                                <i class="fa fa-user"></i>
                                <b>'.$user['first_name'].'</b>
                            </a>';
                    }
                ?>
                </li>
            </ul>
        </div>
    </nav>
</header>
