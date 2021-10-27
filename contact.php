<?php 
  session_start(); 

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cameleon shop | Contact</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/icon/icon-site.png">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/contact-style.css?v=<?php echo time(); ?>" type="text/css">
    <script src="https://kit.fontawesome.com/2d7e4452a4.js" crossorigin="anonymous"></script></head>

<body>

<?php include("header.php"); ?>

    <?php include("Mail.php"); ?>
    <?php
    if (isset($_POST['submit'])) {
        $Fullname = $_POST['nom'] . " " . $_POST['prenom'];
        $Comment = $_POST['Commentaire'];
        $mail = $_POST['email'];
        $bd = nl2br("Nom Complet : " . $Fullname . "\r\n" . ' Email : ' . $mail . "\r\n " . "Commentaire :" . "\r\n " . $Comment);

        Mail::senMail($bd);
        echo "<script>alert('Merci ,Votre commentaire a été bien reçu')</script>";
    }
    ?> 
<div class="container mt-5">
    <div class=" contact">
        <div class="row">
            <div class="col-md-3">
                <div class="contact-info ml-3">
                    <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image" />
                    <h2>Contactez-nous</h2>
                    <h4>Nous serions ravis de vous entendre !</h4>
                    <br><br>
                    <h5><i class="fas fa-phone-alt"></i> +(212)650296539</h5>
                    <br>
                </div>
            </div>
            <div class="col-md-9 ">
                <div class="contact-form ml-5">
                    <form method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fname">Nom:</label>
                            <div class="col-sm-10">
                                <input style="color: rgb(99, 99, 99); border: 1px solid rgb(99, 99, 99)" type="text" class="" id="fname" name="nom" placeholder="Entrez votre Nom" name="fname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="lname">Prénom:</label>
                            <div class="col-sm-10">
                                <input style="color: rgb(99, 99, 99); border: 1px solid rgb(99, 99, 99)" type="text" class="" name="prenom" id="lname" placeholder="Entrez Votre Prenom" name="lname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input style="color: rgb(99, 99, 99); border: 1px solid rgb(99, 99, 99)" type="email" class="" id="email" name="email" placeholder="Entrez Votre Email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="comment">Commentaire:</label>
                            <div class="col-sm-10">
                                <textarea style="color: rgb(99, 99, 99); border: 1px solid rgb(99, 99, 99)" class="" rows="5" name="Commentaire" id="comment" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="submit" class="btn btn-default">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>              
            </div>   
        </div>
    </div>
</div>
<div class="container mb-5">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>     

<?php include("footer.php"); ?>

</body>

</html>