<?php
    require_once('views/Header.php');
?>

<!-- Font Awesome -->
<link rel="stylesheet" href="assets/profile/css/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="assets/profile/css/adminlte.min.css">

<link rel="stylesheet" href="../../../assets/profile/css/style.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row main-row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <?php
                                    if($profile_picture != null)
                                        echo '
                                         <img class="profile-user-img img-fluid img-circle"
                                         src="/'.$profile_picture['donnees'].'"
                                         alt="User picture"
                                         style="width: 150px; height: 150px;"
                                         >
                                         ';
                                    else
                                        echo '
                                         <span class="profile-user-img img-fluid img-circle fa fa-user fa-5x" >
                                          </span>
                                         ';
                                ?>

                            </div>

                            <h3 class="profile-username text-center"><?= $user['first_name'].' '.$user['last_name'] ?></h3>
                            <?php
                                if($account_type === 'etudiant'){
                             ?>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Niveau</b> <a class="float-right"><?= $user['level'] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Parcours</b> <a class="float-right"><?= $user['parcours'] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right"><?= $user_email; ?></a>
                                </li>
                            </ul>
                            <?php
                                } else if ($account_type == 'enseignant'){
                            ?>
                                <p class="text-muted text-center"><?= $user['module'] ?></p>

                            <?php
                                }
                            ?>
                            <a href="#update" data-toggle="tab" class="nav-link btn btn-block bg-primary"><b>Mettre à jour</b></a>
                            <a href="/logout" class="btn mt-2 btn-block bg-secondary"><b>Se Deconnecter</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">A propos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Nom Complet</strong>
                            <p class="text-muted"><?= $user['first_name'].' '.$user['last_name'] ?></p>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Date de Naissance</strong>
                            <p class="text-muted"> <?= $user['birthday'] ?></p>


                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Localisation </strong>
                            <p class="text-muted"> <?= $user['address'] ?></p>

                            <hr>

                            <?php
                            if($account_type === 'etudiant'){
                            ?>
                            <strong><i class="far fa-file-alt mr-1"></i> Classe</strong>

                            <p class="text-muted"><?= $user["level"]?> <?= $user["parcours"]?></p>
                            <?php
                                }
                                    else if ($account_type == 'enseignant'){
                            ?>
                                <strong><i class="far fa-file-alt mr-1"></i> Module</strong>

                                <p class="text-muted"><?= $user["module"]?></p>
                            <?php
                                    }
                            ?>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activités</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                                <li class="nav-item"><a class="nav-link" href="#update" data-toggle="tab">Mise à jour</a></li>
                                <li class="nav-item"><a class="nav-link" href="#feedback" data-toggle="tab">Feedback</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                            <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                                            <span class="description">Shared publicly - 7:30 PM today</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                            <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                                        </p>

                                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post clearfix">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                            <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                                            <span class="description">Sent you a message - 3 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <form class="form-horizontal">
                                            <div class="input-group input-group-sm mb-0">
                                                <input class="form-control form-control-sm" placeholder="Response">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-danger">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                            <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                                            <span class="description">Posted 5 photos - 5 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                                                        <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                                                        <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                            <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                                        </p>

                                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-envelope bg-primary"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                                <div class="timeline-body">
                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                    quora plaxo ideeli hulu weebly balihoo...
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-user bg-info"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                                </h3>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-comments bg-warning"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                                <div class="timeline-body">
                                                    Take me to your leader!
                                                    Switzerland is small and neutral!
                                                    We are more like Germany, ambitious and misunderstood!
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline time label -->
                                        <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-camera bg-purple"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                                <div class="timeline-body">
                                                    <img src="http://placehold.it/150x100" alt="...">
                                                    <img src="http://placehold.it/150x100" alt="...">
                                                    <img src="http://placehold.it/150x100" alt="...">
                                                    <img src="http://placehold.it/150x100" alt="...">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="update">
                                    <div class="card elevation-3">
                                        <div class="card-body register-card-body">

                                            <!-- a propos -->
                                            <p class="text-muted login-box-msg">A propos</p>

                                            <p class="login-box-msg text-danger"><?php
                                                if(isset($error_message))
                                                    echo $error_message;
                                                ?></p>

                                            <form action='/user/update' method="post" enctype="multipart/form-data">
                                                <div class="input-group mb-3">
                                                    <input value="<?= $user['first_name'] ?>" id="first_name" name="first_name" type="text" class="form-control" placeholder="First name" required/>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input value="<?= $user['last_name'] ?>" id="last_name" name="last_name" type="text" class="form-control" placeholder="Last name" required/>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input value="<?= $user['birthday'] ?>" id="birthday" name="birthday" type="date" max="2020-12-31" class="form-control w-100" placeholder="Birthday" required/>

                                                </div>
                                                <div class="input-group mb-3">
                                                    <input value="<?= $user['address'] ?>" id="address" name="address" type="text" class="form-control" placeholder="Address" required/>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input value="<?= $user['email'] ?>" id="email" name="email" type="email" class="form-control" placeholder="Email" required/>
                                                </div>

                                                <input type="file" id="picture" name="picture" class="d-none" accept="image/*">
                                                <img src="/<?= $profile_picture['donnees'] ?>" id="picture_shower" class="image rounded" style="width: 450px" />
                                                <input id="btn_change" type="button" class="m-5 w-25 text-center col-2 btn bg-primary mt-2 form-control " value="Changer" />
                                                <!-- ./a propos -->

                                                <!-- education -->
                                                <?php
                                                    if($account_type == 'etudiant'){
                                                ?>
                                                <p class="text-muted login-box-msg mt-5">Education</p>
                                                <div id="div-etudiant">
                                                    <div class="input-group mb-3">
                                                        <p class="d-none" disabled><?= $user['level'] ?></p>
                                                        <select id="level" name="level" type="text" class="form-control"/>
                                                        <option value="L1" selected>L1</option>
                                                        <option value="L2" >L2</option>
                                                        <option value="L3" >L3</option>
                                                        <option value="M1" >M1</option>
                                                        <option value="M2" >M2</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <select id="parcours" name="parcours" type="text" class="form-control"/>
                                                        <option value="IDEV" selected>IDEV</option>
                                                        <option value="RSI" >RSI</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php } else if ($account_type == 'enseignant') { ?>
                                                <div id="div-enseignant" class="input-group mb-3">
                                                    <input value="<?= $user['module'] ?>" name="module" id="module" type="text" class="mt-2 form-control w-100" placeholder="Module"/>
                                                </div>
                                                <?php } ?>
                                                <!-- ./education -->

                                                <input type="submit" value="Valider" class="btn bg-success col-12 mt-5" >
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="feedback">

                                    <div class="row mt-5 mb-5 justify-content-center">
                                        <form method="post" action="/feedback" class="col-10">
                                            <textarea class="form-control mt-2 " placeholder="Ecrire de retour ou remarque à nous ..." rows=10></textarea>
                                            <input type="button" class="btn btn-success mt-2 w-100" value="Evoyer">
                                        </form>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>


<!-- jQuery -->
<script src="../../../assets/profile/js/jquery.min.js"></script>
<script src="../../../assets/profile/js/profile.js"></script>
<!-- AdminLTE App -->
<script src="../../../assets/profile/js/adminlte.min.js"></script>

<?php
    require_once('views/footer.php');
?>