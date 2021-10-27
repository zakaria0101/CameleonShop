<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="images/icon/icon-site.png">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/slider.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
  <footer>
    <div class="container py-5">
      <div class="row py-4">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0"><img src="images/icon/cameleon-logo-footer.png" width="180" class="mb-3">
          <p class="text-muted">Cameleon Shop est un magasin qui vend des vêtements de prêt-à-porter, de haute qualité et à un prix raisonnable.</p>
          <ul class="list-inline mt-4">
            <li class="list-inline-item"><a href="#" title="twitter"><img src="images/icon/icon-twitter.png" width="20px" height="20px"></a></li>
            <li class="list-inline-item"><a href="#" title="facebook"><img src="images/icon/icon-facebook.png" width="20px" height="20px"></a></li>
            <li class="list-inline-item"><a href="https://www.instagram.com/cameleon.shop.contact/" title="instagram"><img src="images/icon/icon-instagram.png" width="20px" height="20px"></a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase mb-4">Shop</h6>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="hommes.php" class="text-muted text-hv-op">Pour les hommes</a></li>
            <li class="mb-2"><a href="femmes.php" class="text-muted text-hv-op">Pour les femmes</a></li>
            <li class="mb-2"><a href="enfants.php" class="text-muted text-hv-op">Pour les enfants</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase mb-4">Compangnie</h6>
          <ul class="list-unstyled mb-0">
            <?php  if (!isset($_SESSION['username'])) { ?>
            <li class="mb-2"><a href="login.php" class="text-muted text-hv-op">Connexion</a></li>
            <li class="mb-2"><a href="register.php" class="text-muted text-hv-op">S'inscrire</a></li>
            <?php } ?>
            <li class="mb-2"><a href="index.php" class="text-muted text-hv-op">Nos produits</a></li>
          </ul>

        </div>
        <div class="col-lg-4 col-md-6 mb-lg-0">
          <h6 class="text-uppercase mb-4">Contact</h6>
          <p class="text-muted mb-2"><i class="fas fa-phone"></i>  +(212)650296539</p>
          <p class="text-muted mb-4"><i class="fas fa-envelope"></i>  cameleonshop.contact@gmail.com </p>
          <div class="p-1 ">
            <div class="input-group">
              <input type="" placeholder="Entrer votre address email" class="email-sub">
              <button class="btn-send"><img src="images/icon/send-icon.png" width="32px" height="32px"></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <p class="text-muted mb-0 py-2 text-center">© 2021 Créer par équipe Cameleon.</p>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>