<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/icon/icon-site.png">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
    <title>Cameleon Shop | Mercii!!</title>
    <style>
        #img1{
            margin-left: 26%;
        }
        .thank-you-pop h1{
            text-align: center;
        }
        .thank-you-pop p{
            text-align: center;
        }
    </style>
</head>
<body>
<?php include 'header.php';?>

       <br><br>
      <!--Modal openning-->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                 </div>
                <div class="modal-body">                  
                    <div class="thank-you-pop">
                        <img src="images/icon/Green-Round-Tick.png" id="img1">
                        <h1>Commende Confirmer!</h1>
                        <p>Votre commende sera recever Merci pour votre Confiance</p>                       
                     </div>                   
                </div>              
            </div>
        </div>
    </div>
      <!--Final Modal-->
      <!--body-->
    <div class="jumbotron text-center">
        <h1 class="display-3">Mercii!</h1>
        <p class="lead"><strong>Checkez-votre email</strong> pour plus des informations voulez vous nous contactez!</p>
        <hr>
        <p>
          Pour votre reclamation! <a href="contact.php" style="color: #424874;">Contactez nous</a>
        </p>
        <p class="lead">
          <a class="btn btn-primary btn-sm outline-no" style="background-color: #424874;" href="index.php" role="button">Retour à Boutique</a>
        </p>
      </div>
<!--Footer-->
<?php include 'footer.php';?>

</body>
</html>