<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="images/icon/icon-site.png">
<link rel="stylesheet" href="css/bootstrap.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
<script src="https://kit.fontawesome.com/2d7e4452a4.js" crossorigin="anonymous"></script>
</head>
<body>

  <header class="sticky-top shadow">
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="images/icon/cameleon-logo.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><b><a class="nav-link active"  href="index.php">Acceuil</a></b></li>
            <li class="nav-item"><b><a class="nav-link active"  href="hommes.php">Hommes</a></b></li>
            <li class="nav-item"><b><a class="nav-link active"  href="femmes.php">Femmes</a></b></li>
            <li class="nav-item"><b><a class="nav-link active"  href="enfants.php">Enfants</a></b></li>
            <li class="nav-item"><b><a class="nav-link active"  href="contact.php">Contact</a></b></li>
          </ul>
        </div>

        <?php  if (isset($_SESSION['username'])) { ?>
          <div class="dropdown">
            <a class="btn dropdown-toggle"  role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" ><b><i class="fas fa-user"></i> Bienvenue </b><?php echo $_SESSION['username']; ?> !</a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item red" href="profil.php"><img src="images/icon/icon-profil.png" width="20px">  Profil</a></li>
              <li><a class="dropdown-item red" href="mes_commandes.php"><img src="images/icon/icon-historique.png" width="20px">  Mes commandes</a></li>
              <li><a class="dropdown-item red" href="index.php?logout='1'"><img src="images/icon/icon-deconnexion.png" width="20px">  Déconnexion</a></li>
            </ul>
          </div>
        <?php } ?>
        
        <?php  if (!isset($_SESSION['username'])) { ?>
          <span class="navbar-text ml-1"><a href="login.php"><img class="img-icon-animation" src="images/icon/icon-login.png"width="24px" height="24px"></a></span>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php } ?>
          <span class="navbar-text ml-1"><a href="cart-page.php"><img class="img-icon-animation" src="images/icon/icon-cart.png"width="24px" height="24px"><span class="badge rounded-pill bg-color-cameleon ">         
           <?php
           if(isset($_SESSION['panier'])){
             $count=count($_SESSION['panier']);
             echo $count;
           }else{
             echo "0";
           }
           
           ?>
          </span>&nbsp;</a></span>


      </div>
    </nav>      
  </header>

</body>
</html>