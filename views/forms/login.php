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
    <div class="container-fluid">
        <div class="row mt-5 justify-content-center">
            <div class="col-sm-10 col-md-10 col-lg-5 ">
                <div class="login-box">
                    <div class="login-logo">
                        <b>Esekoly</b>
                    </div>

                    <div class="card elevation-3">
                        <div class="card-body login-card-body">
                            <p class="login-box-msg">S'identifier</p>
                            <p id='error' class="login-box-msg text-danger">
                                <?php
                                    if(isset($error_message))
                                        echo $error_message;
                                ?>
                            </p>

                            <form action="/login" method="post" onSubmit="" >
                                <div class="    input-group mb-3">
                                    <input name="email"
                                        type="email"
                                         id="email"
                                         class="form-control"
                                         placeholder="Email"
                                         <?php
                                            // mentient de la valeur précedente
                                            if(isset($email))
                                                echo 'value='.$email;

                                          ?>
                                         />

                                        <div class="input-group-append">
                                            <div class="input-group-text  pt-3">
                                                <i class="fa fa-envelope mb-2"></i>
                                            </div>
                                        </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input name="password" type="password" id="password" class="form-control" placeholder="Mot de passe" />
                                        <div class="input-group-append">
                                            <div class="input-group-text pt-3">
                                                <span class="fa fa-lock mb-2"></span>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="remember" name="remeber"/>
                                                <label for="remember" class="ml-1">
                                                    Se souvenir de moi
                                                </label>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <input type="submit" id="signin" class="btn btn-primary btn-block" value="Sign In" />
                                    </div>

                                </div>
                            </form>

                            <div class="social-auth-links text-center mb-3">
                                <p>- OR -</p>
                                <a href="#" class="mt-2 btn btn-block btn-primary">
                                    <i class="fa fa-facebook mr-2"></i> S'identifier via Facebook
                                </a>
                                <a href="#" class="mt-2 btn btn-block btn-danger">
                                    <i class="fa fa-google-plus mr-2"></i> S'identifier via Google+
                                </a>
                            </div>

                            <p class="mb-1">
                                <a href="">Mot de passe oublié ?</a>
                            </p>
                            <p class="mb-0">
                                <a href="/register" class="text-center">Créer un compte</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>