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
        <div class="col-10">
        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>404 Error Page</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">404 Error Page</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </section>


            <section class="content">
                <div class="error-page">
                    <h2 class="headline text-warning"> 404</h2>

                    <div class="error-content">
                        <h3>
                            <i class="fa fa-exclamation-triangle text-warning"></i> Oops! Page not found :
                            <?= $_SERVER['REQUEST_URI']; ?>
                        </h3>


                        <p>
                            We could not find the page you were looking for.
                            Meanwhile, you may <a href="/">Home</a> or try using the
                            search form.
                        </p>

                        <form class="search-form">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search" />

                                    <div class="input-group-append">
                                        <button type="submit" name="submit" class="btn btn-warning"><i
                                            class="fas fa-search"></i>
                                        </button>
                                    </div>
                            </div>

                        </form>
                    </div>

                </div>

            </section>

        </div>
        </div>
    </div>
</div>


</body>
</html>