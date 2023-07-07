
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link type="text/css" rel="stylesheet" href="../../../assets/main/fontawesome/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="../../../assets/main/adminlte.min.css" />

    <link type="text/css" rel="stylesheet" href="../../../assets/sac/main/css/OverlayScrollbars.min.css" />
    <link type="text/css" rel="stylesheet" href="../../../assets/sac/main/css/style.css" />
    <link type="text/css" rel="stylesheet" href="../../../assets/sac/main/css/bootstrap.min.css" />

    <title> <?php echo $title; ?>  </title>
</head>
<body style="background-color:#f5f5f5">
<!-- ino header if admin -->
<?php
    if($user['account_type'] !== 'admin'){
        require_once 'views/Header.php';
        echo '<div class="wrapper" style="margin-top: 65px; overflow-x:hidden">
                <!-- Navbar  -->
                <nav class="d-sm-inline d-md-inline d-lg-none d-xl-none header main-header navbar navbar-expand navbar-white navbar-light">
                    <i id="fa_bar_header" class="right fa fa-bars ml-3 pointer"></i>
                </nav>
                <!--  navbar  -->
            
                <!-- Main Sidebar Container  -->
                <aside style="position: fixed;margin-top: 65px;" id="main_sidebar" class="main-sidebar sidebar-dark-primary elevation-4">
        ';
    }
    else {
        echo '<div class="wrapper" style="overflow-x:hidden">
            <!-- Navbar  -->
        <nav class="d-sm-inline d-md-inline d-lg-none d-xl-none header main-header navbar navbar-expand navbar-white navbar-light">
            <i id="fa_bar_header" class="right fa fa-bars ml-3 pointer"></i>
        </nav>
        <!--  navbar  -->
    
        <!-- Main Sidebar Container  -->
        <aside style="position: fixed;" id="main_sidebar" class="main-sidebar sidebar-dark-primary elevation-4">
        ';
    }
?>

        <!-- Picture  -->
        <?php
            if($user['account_type'] === 'admin'){
                echo
                '<p class="text-center mt-3">
                    <img src="/media/images/profile_picture/esti.png" alt="ESTI"
                     class="img img-circle elevation-3"
                     style="opacity: 0.8; width: 100px; height: 100px" />
                 </p>';

            }
            else {
                 echo '
                    <a href="/user/profile" class="brand-link d-flex flex-column flex-nowrap align-items-center text-center justify-content-center" style="text-decoration: none" >
                    <img src="/'.$user['picture'].'" alt="'.$user['first_name'].'"
                         class="img img-circle elevation-3"
                         style="opacity: 0.8; width: 100px; height: 100px" />
                    <span class="brand-text font-weight-light">'.$user['first_name'].'</span>
                    </a>';

            }
        ?>

        <!-- Sidebar  -->
        <div  id="sidebar" class="sidebar mb-5">
            <!-- Sidebar user panel (optional)  -->
            <div class="user-panel info text-white p-1 d-flex flex-nowrap align-items-center justify-content-center">
                    <?php
                        if($user['account_type'] === 'etudiant'){
                            echo $user['level'].' '.$user['parcours'];
                        }
                        else if($user['account_type'] === 'enseignant'){
                            echo $user['module'];
                        }else{
                            echo 'Admin';
                        }
                    ?>
            </div>

            <!-- Sidebar Menu  -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library  -->
                    <?php
                    // show if account_type is prof or admin
                        if ($user['account_type'] == 'admin' ){
                           echo ' 
                                <li class="nav-item has-treeview menu-open">
    
                                    <a href="/sac/etudiant" class="nav-parent nav-link active">
                                        <i class="fa fa-user mr-2"></i>
                                        <p>
                                        Etudiants
                                            <i class="fa fa-angle-left right"></i>
                                        </p>
                                    </a>
                                </li>';
                        }
                       ?>

                    <li class="nav-item has-treeview menu-open">
                        <a href="/sac/module" class="nav-parent nav-link">
                            <i class="fa fa-book mr-2"></i>
                            <p>
                                Modules
                            </p>
                        </a>
                    </li>

                    <?php
                        if($user['account_type'] != 'admin'){
                    ?>
                    <li class="nav-item has-treeview menu-open">

                        <a href="/sac/notes" class="nav-parent nav-link">
                            <i class="fa fa-check-circle mr-2"></i>
                            <p>
                                Notes
                            </p>
                        </a>

                    </li>
                    <?php } ?>
                    <li class="nav-item has-treeview menu-open">
                        <a href="/sac/edt" class="nav-parent nav-link">
                            <i class="fa fa-calendar mr-2"></i>
                            <p>
                                Emploi du temps
                            </p>
                        </a>
                    </li>
                    <?php
                        // show if account_type is etudiant
                        if ($user['account_type'] == 'etudiant'){
                    ?>

                    <li class="nav-item has-treeview menu-open">
                        <a href="/sac/bilan" class="nav-parent nav-link">
                            <i class="fa fa-tachometer mr-2"></i>
                            <p>
                                Bilan
                            </p>
                        </a>
                    </li>
                    <?php } ?>

                    <?php
                        // button deconnexion pour admin
                        if ($user['account_type'] == 'admin'){
                            echo  '
                            <li class="nav-item has-treeview bg-danger mt-5">
                                <a href="/logout" class="nav-parent nav-link">
                                    <i class="fa fa-sign-out mr-2"></i>
                                    <p>
                                        Se déconnecter
                                    </p>
                                </a>
                            </li>
                            ';
                        }
                    ?>

                </ul>
            </nav>
            <!-- /.sidebar-menu  -->
        </div>
        <!-- /.sidebar  -->
    </aside>

    <!-- Content Wrapper. Contains page content  -->
    <div id="content" class="content-wrapper" style="width: 81vw;background-color: white;">
        <!-- /.content  -->

        <?php require_once 'config/sacRouter.php'; ?>

    </div>
</div>
<!-- ./wrapper  -->

    <script type="application/javascript" src="../../../assets/sac/main/js/script.js"></script>
    </body>
</html>


