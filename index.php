<?php 
  session_start(); 

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
?>
<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Cameleon shop | Acceuil</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="images/icon/icon-site.png">
<link rel="stylesheet" href="css/hommes.css">
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

  <?php include('header.php') ?>

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active ">
        <img src="images/items/slide-men.jpg" class="d-block w-screen ">
        <div class="carousel-caption  d-md-block d-md-block-1">
          <h6 class="sup-title">Style de mode</h6>
          <h5 class="fash-title">Hommes Mode</h5>
          <p class="fash-des">Des vêtements pour hommes élégants pour tous les goûts sont disponibles dans le magasin Plus que des offres intéressantes.</p>
          <a href="hommes.php" class="link-find">Découvrir maintenant</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/items/slide-women.jpg" class="d-block w-screen">
        <div class="carousel-caption  d-md-block d-md-block-1">
          <h6 class="sup-title">Style de mode</h6>
          <h5 class="fash-title">Femmes Mode</h5>
          <p class="fash-des">Des vêtements pour hommes élégants pour tous les goûts sont disponibles dans le magasin Plus que des offres intéressantes.</p>
          <a href="femmes.php" class="link-find">Découvrir maintenant</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/items/slide-children.jpg" class="d-block w-screen">
        <div class="carousel-caption  d-md-block d-md-block-1">
          <h6 class="sup-title">Style de mode</h6>
          <h5 class="fash-title">Enfants Mode</h5>
          <p class="fash-des">Des vêtements pour hommes élégants pour tous les goûts sont disponibles dans le magasin Plus que des offres intéressantes.</p>
          <a href="enfants.php" class="link-find">Découvrir maintenant</a>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Précedent</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Suivant</span>
    </button>
  </div>



  <div class="container">
    <h1 class="Trending-text text-center mt-3">Catégorie Vêtements</h1>
    <hr>
        <div class="single-items">
            <img class="img-cat" src="images/items/cat-men.jpg" width="100%" height="100%">
            <h3 class="items-name">Hommes Mode</h3>
        </div>
        <div class="single-items">
            <img class="img-cat" src="images/items/cat-women.jpg" width="100%" height="100%">
            <h3 class="items-name">Femmes Mode</h3>
        </div>
        <div class="single-items">
            <img class="img-cat" src="images/items/cat-child.jpg" width="100%" height="100%">
            <h3 class="items-name">Enfants Mode</h3>
        </div>
  




        <br>
        <h1 class="Trending-text text-center mt-3">Nouvelle collections</h1>
        <hr>


        <!--------------------------------- 1 Tend ---------------------------------------------------->


     <div class="container mt-3 mb-4" >
        <div class="row">  
          <?php
          $Connection = mysqli_connect('127.0.0.1', 'root', '', 'cameleon');
          $query = "SELECT *FROM product LIMIT 4 ";
          $result = mysqli_query($Connection, $query);
          if (mysqli_num_rows($result) > 0) {
              while ($col = mysqli_fetch_assoc($result)) {
                  $ID = $col['id_product'];
                  $Nom = $col['name_product'];
                  $Image1 = $col['image1'];
                  $Image2 = $col['image2'];
                  $prix = $col['prix'];
                  $categorie = $col['cat'];
                  $Sous_categorie = $col['sous_cat'];
          ?>

                              <div class="col-md-3 col-sm-6 mt-5 ">
                                  <div class="product-grid">
                                      <div class="product-image">
                                          <a href="pageproduit.php?produit=<?php echo $ID ?>" class="image">
                                              <img class="pic-1" src="data:image/jpeg;base64,<?php echo base64_encode($Image1)?>">
                                              <img class="pic-2" src="data:image/jpeg;base64,<?php echo base64_encode($Image2)?>">
                                          </a>
                                          <ul class="product-links">
                                              <li><a href="pageproduit.php?produit=<?php echo $ID ?>"><i class="fa fa-shopping-cart" ></i></a></li>
                                          </ul>
                                      </div>
                                      <div class="product-content">
                                          <h3 class="title"><a href="pageproduit.php?produit=<?php echo $ID ?>"><?php echo $Nom ?></a></h3>
                                          <div class="price"><?php echo $prix ?> DH</div>
                                      </div>
                                  </div>
                              </div>
          <?php
              }
          }
          ?>
        </div>
      </div>
        <!--------------------------------- 2 Tend ---------------------------------------------------->



        <!--------------------------------- 4 Tend ---------------------------------------------------->


        <!--------------------------------- End Tend ---------------------------------------------------->
  </div>
  





  <h1 class="Trending-text text-center">Services</h1>
  <hr>
  <div class="">
    <div class="service-items br-left">
      <img class="img-service" src="images/items/services1.png" width="100%" height="100%">
      <h3 class="service-name">Rapide & Livraison gratuit</h3>
      <p class="service-detail">Livraison gratuit de tous les commandes</p>
    </div>
    <div class="service-items br-left">
      <img class="img-service" src="images/items/services2.png" width="100%" height="100%">
      <h3 class="service-name">Paiement à la réception</h3>
      <p class="service-detail">Paiement lors de la réception des commandes</p>
    </div>
    <div class="service-items br-left">
      <img class="img-service" src="images/items/services3.png" width="100%" height="100%">
      <h3 class="service-name">Garantie de remboursement</h3>
      <p class="service-detail">Remboursement si vous avez des problèmes</p>
    </div>
    <div class="service-items">
      <img class="img-service" src="images/items/services4.png" width="100%" height="100%">
      <h3 class="service-name">Support en ligne</h3>
      <p class="service-detail">Assistance en ligne pour vos questions</p>
    </div>    
  </div><br>

  <?php include('footer.php') ?>



</body>
</html>