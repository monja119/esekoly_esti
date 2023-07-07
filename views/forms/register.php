<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link type="text/css" rel="stylesheet" href="../assets/main/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="../assets/main/main.css" />
    <link type="text/css" rel="stylesheet" href="../assets/main/fontawesome/font-awesome.min.css" />

    <title> <?php echo $title; ?>  </title>
</head>
<body>
<div class="container-fluid ">
    <div class="row mt-5 mb-5 justify-content-center">
        <div class="col-sm-10 col-md-12 col-lg-5">
            <div class="register-box">
                <div class="register-logo">
                    <b>Esekoly</b>
                </div>

                <div class="card elevation-3">
                    <div class="card-body register-card-body">

                        <!-- a propos -->
                        <p class="text-muted login-box-msg">A propos</p>

                        <p class="login-box-msg text-danger"><?php
                            if(isset($error_message))
                                echo $error_message;
                        ?></p>

                        <form action='/register' method="post" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <input id="first_name" name="first_name" type="text" class="form-control" placeholder="First name" required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text pt-3">
                                            <span class="fa mb-2 fa-user"></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="input-group mb-3">
                                <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Last name" required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text pt-3">
                                            <span class="fa mb-2 fa-user"></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="input-group mb-3">
                                <input id="birthday" name="birthday" type="date" max="2020-12-31" class="form-control w-100" placeholder="Birthday" required/>

                            </div>
                            <div class="input-group mb-3">
                                <input id="address" name="address" type="text" class="form-control" placeholder="Address" required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text pt-3">
                                            <span class="fa mb-2 fa-location-arrow"></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="input-group mb-3">
                                <input id="email" name="email" type="email" class="form-control" placeholder="Email" required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text pt-3">
                                            <span class="fa mb-2 fa-envelope"></span>
                                        </div>
                                    </div>
                            </div>

                            <div id="picture_container" class="input-group elevation-1 cursor-pointer border rounded d-flex flex-column justify-content-center align-items-center">
                                <span class="fa fa-file m-2 mt-3 fa-3x"></span>
                                <p class="text-muted">Photo d'identité</p>
                                <input type="file" id="picture" name="picture" class="d-none" accept="image/*" required>
                            </div>
                            <img id="picture_shower" class="image d-none w-100 rounded" />
                            <input id="btn_change" type="button" class="btn bg-success mt-2 form-control d-none" value="Changer" />
                            <!-- ./a propos -->

                            <!-- education -->
                            <p class="text-muted login-box-msg mt-5">Education</p>
                            <div class="input-group mb-3">
                                <select id="account_type" name="account_type" type="text" class="form-control"  required/>
                                    <option value="etudiant" selected>Etudiant</option>
                                    <option value="enseignant" >Enseignant</option>
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text pt-3">
                                        <span class="fa mb-2 fa-book"></span>
                                    </div>
                                </div>
                            </div>

                            <div id="div-etudiant">
                                <div class="input-group mb-3">
                                    <select id="level" name="level" type="text" class="form-control"/>
                                        <option value="L1" selected>L1</option>
                                        <option value="L2" >L2</option>
                                        <option value="L3" >L3</option>
                                        <option value="M1" >M1</option>
                                        <option value="M2" >M2</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text pt-3">
                                            <span class="fa mb-2 fa-level-up"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <select id="parcours" name="parcours" type="text" class="form-control"/>
                                        <option value="IDEV" selected>IDEV</option>
                                        <option value="RSI" >RSI</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text pt-3">
                                            <span class="fa mb-2 fa-code"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="div-enseignant" class="input-group mb-3">
                                <input name="module" id="module" type="text" class="form-control w-100" placeholder="Module"/>
                            </div>
                            <!-- ./education -->

                            <!-- SECURITY -->
                            <p class="text-muted login-box-msg mt-5">Securité</p>
                            <div class="input-group mb-3">
                                <input name="password" id="password" type="password" class="form-control" placeholder="Password" required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text pt-3">
                                            <span class="fa mb-2 fa-lock"></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="input-group mb-3">
                                <input name="password2" id="password2" type="password" class="form-control"
                                        placeholder="Retype password" required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text pt-3">
                                            <span class="fa mb-2 fa-lock"></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="agreeTerms" name="terms" value="agree" required/>
                                            <label htmlFor="agreeTerms" class="ml-1">
                                                    J'accepte les <a href="/terms">termes</a>
                                            </label>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Register
                                    </button>
                                </div>

                            </div>
                        </form>

                        <div class="social-auth-links text-center">
                            <p>- OR -</p>
                            <a href="#" class="mt-2 btn btn-block btn-primary">
                                <i class="fa fa-facebook mr-2"></i>
                                Créer avec Facebook
                            </a>
                            <a href="#" class="mt-2 btn btn-block btn-danger">
                                <i class="fa fa-google-plus mr-2"></i>
                                Créer avec Google+
                            </a>
                        </div>

                        <div class="mt-4 text-center">
                            <a href='/login' class="text-center " >J'ai déjà un compte</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<script type="application/javascript" src="../../assets/register/register.js"></script>

</body>
</html>