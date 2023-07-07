<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if(isset($title)) echo $title; else echo 'Sekoly'; ?></title>

    <!-- Bootstrap -->
    <link href="../../../assets/home/css/bootstrap-4.4.1.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/home/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


  </head>
  <body>

  <?php
    // requiring header
    require_once 'views/Header.php';
  ?>
   <main>
    <div class="jumbotron jumbotron-fluid text-center mt-2">
       <h1 class="display-4">L'avenir de la technologie commence à Esekoly</h1>
      <div class="container">
        <span class="text first-text"></span>
        <span class="text sec-text"></span>
       </div>
       <hr class="my-4">
       <p class="intro">"Esekoly forme des étudiants spécialisés dans les domaines du développement web, mobile et intelligence artificielle, afin de les préparer à exceller dans ces technologies en constante évolution.".</p>
       <p class="lead">
          <a class="btn bg-primary" href="/about" role="button">En savoir plus</a>
       </p>
    </div>
    <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="background-color: #057885">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active"> <img class="d-block mx-auto img" src="../../../media/images/home/Carousel_Placeholder.jpg" alt="First slide">
          <div class="carousel-caption">
            <h5>Esekoly</h5>
            <p>Etudiants d'Esekoly</p>
          </div>
        </div>
        <div class="carousel-item"> <img class="d-block mx-auto img" src="../../../media/images/home/Informatique.jpg" alt="Second slide">
          <div class="carousel-caption">
            <h5>Esekoly</h5>
            <p>Esekoly Coworking</p>
          </div>
        </div>
        <div class="carousel-item"> <img class="d-block mx-auto img" src="../../../media/images/home/working2.jpg" alt="Third slide">
          <div class="carousel-caption">
            <h5>Esekoly</h5>
            <p>Esekoly Coworking</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
      <div class="container">
       <br>
       <hr>
       <br>
       <div class="row">
         <div class="col-md-4">
             <div class="card">
                <img class="card-img-top " src="../../../media/images/home/card-img.png" alt="Card image cap">
                <div class="card-body">
                   <h4 class="card-title">Module Développement web</h4>
                   <p class="card-text">A la fin de ce moule les étudiants pourront créer des applications, des sites Internet et des fonctionnalités interactives, afin de fournir des expériences en ligne attrayantes et fonctionnelles.</p>
                   <br><br>
                   <a href="/follow" class="btn bg-primary">Suivre</a>
                </div>
             </div>
         </div>
         <div class="col-md-4">
            <div class="card">
               <img class="card-img-top img-card" src="../../../media/images/home/card-img1.png" alt="Card image cap">
               <div class="card-body">
                  <h4 class="card-title">Module Développement Mobile</h4>
                  <p class="card-text">A la fin de ce moule les étudiants pourront créer des applications, spécifiquement conçues pour les appareils mobiles tels que les smartphones et les tablettes.</p>
                  <br><br>
                  <a href="/follow" class="btn bg-primary">Suivre</a>
               </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
               <img class="card-img-top " src="../../../media/images/home/card-img2.png" alt="Card image cap" >
               <div class="card-body">
                  <h4 class="card-title">Module Intelligence artificielle</h4>
                  <p class="card-text">A la fin de ce moule les étudiants pourront s'initier  à la conception de systèmes informatiques capables de simuler des comportements intelligents.</p>
                  <br><br>
                  <a href="/follow" class="btn bg-primary">Suivre</a>
               </div>
            </div>
         </div>
       </div>
       <br/>
       <br/>
       <br/>
       <br/>
	</main>
       <br>
       <hr>
  
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
      <script src="../../../assets/home/js/jquery-3.4.1.min.js"></script>

      <!-- Include all compiled plugins (below), or include individual files as needed --> 
      <script type="text/javascript" src="../../../assets/home/js/popper.min.js"></script>
      <script type="text/javascript" src="../../../assets/home/js/bootstrap-4.4.1.js"></script>
      <script type="text/javascript" src="../../../assets/home/js/script.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


         <?php
            include 'views/footer.php'
         ?>
    </div>
  </body>
</html>
