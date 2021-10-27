<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cameleon";

// Creation de connection
$cnx = new mysqli($servername, $username, $password, $dbname);
// Validation de connection
if ($cnx->connect_error) {
  die("Connection failed: " . $cnx->connect_error);
}
$c_mdp="";
$n_mdp="";
$amdp="";
if(isset($_POST['modifiez'])){
    $adres=$_POST['adress'];
    $tel=$_POST['tel'];
    // if($_POST['ville']=="-- Choisissez votre ville --"){
    //     $vil=$_SESSION['ville'];
    // }else{
        $vil=$_POST['ville'];
    if($_POST['mdp']==null){
        $sqy = "UPDATE users SET address='$adres',phone='$tel',city='$vil' WHERE id_client=".$_SESSION['id_client'];
        if ($cnx->query($sqy) === true) {
            $_SESSION['tel']= $tel;
            $_SESSION['ville']= $vil;
            $_SESSION['adress']= $adres;
        
            echo'<script type="text/javascript">location.href = "index.php";</script>';
          }else{
            echo "Error ";
          }
    }else{
       if($_POST['mdp']==$_SESSION['pass']){
        $lowercase = preg_match('@[a-z]@', $_POST['nmdp']);
        $number    = preg_match('@[0-9]@', $_POST['nmdp']);
        
        if(!$lowercase || !$number || strlen($_POST['nmdp']) < 8) {
          $n_mdp="*";
        }else{
            if($_POST['cmdp']==$_POST['nmdp']) {
                $pass=$_POST['nmdp'];
                $sqy = "UPDATE users SET password='$pass', address='$adres',phone='$tel',city='$vil' WHERE id_client=".$_SESSION['id_client'];
                if ($cnx->query($sqy) === true) {
                    $_SESSION['pass']= $pass;
                    $_SESSION['tel']= $tel;
                    $_SESSION['ville']= $vil;
                    $_SESSION['adress']= $adres;
                
                    echo'<script type="text/javascript">location.href = "index.php";</script>';
                  }else{
                    echo "Error ";
                  }
              }else{
                $c_mdp="*";
              }
        }
       }else{
           $amdp="*";
       }
    }
  
  
    
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="img/icon-site.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/icon/icon-site.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pageparametre.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css=<?php echo time()?>">
    <script src="https://kit.fontawesome.com/2d7e4452a4.js" crossorigin="anonymous"></script></head>
    <title>Cameleon Shop | Profile</title>
<style>
.erreur{
    font-size: 22px;
    color: red;
    position: absolute;
    margin-top: 20px;
    margin-left: 12px;
}
</style>
</head>
<body>
<?php include 'header.php';?>
<div class="container mb-5">
    <div class="container-fluid main " style="height:100vh;padding-left:0px; position:relative;">
        
       
        <div class="col-md-9">
            
            <div class="container content clear-fix">
        
            <h2 class="mt-5 mb-5">Paramètre Profile</h2>
            
            <div class="row" style="height:100%">
            
            <div class="col-md-3">
                
                <div href=# class="d-inline">
                    <div id="profileImage"></div>
                 <br><p class="pl-2 mt-2"><a href="#" class="btn" style="font-weight:800; margin-left:10px;"><?php echo $_SESSION['username']?></a></p></div>
                
                
            </div>
                
                <div class="col-md-9">
                    
                    <div class="container">
                    
                        <form method="POST">
                    <div class="form-group">
                                <label for=pass>Numero Telephone</label>
                                <input type="tel" name="tel" value="<?php echo $_SESSION['tel']?>" class="form-control" id="pass">
                            </div>
                            <div class="form-group">
                                <label for=pass>Adress</label>
                                <input type="text" name="adress" value="<?php echo $_SESSION['adress']?>" class="form-control" id="pass">
                            </div>
                            <div class="form-group">
                            <label for=pass>Ville</label>
                            <select class="input_select" name="ville">
                                <option selected><?php echo $_SESSION['ville']?></option>
                                <option value="Marrakech">Marrakech</option>
                                <option value="Tanger">Tanger</option>
                                <option value="Casablanca">Casablanca</option>
                                <option value="Rabat">Rabat</option>
                                <option value="Agadir">Agadir</option>
                                <option value="Beni Melal">Beni Melal</option>
                                <option value="Safi">Safi</option>
                                <option value="Eljadida">Eljadida</option>
                                <option value="Ouejda">Ouejda</option>
                                <option value="Bengrir">Bengrir</option>
                            </select>
                            </div>
                            <div class="row mt-5">
                            
                            <div class="form-group">
                                <label for=pass>Ancien Mot de Pass</label>
                                <input type="password" class="form-control" name="mdp" id="pass">
                                <span class="erreur"><?php echo $amdp; ?></span>
                            </div>
                            <div class="form-group">
                                <label for=pass>Nouveau Mot de Pass</label>
                                <input type="password" class="form-control" name="nmdp" id="pass">
                                <span class="erreur"><?php echo $n_mdp; ?></span>
                            </div>
                            <div class="form-group">
                                <label for=pass>Confirmation Mot de Pass</label>
                                <input type="password" class="form-control" name="cmdp" id="pass">
                                <span class="erreur"><?php echo $c_mdp; ?></span>

                            </div>
                            
                            
                            
                                <div class="col">
                                
                                    <button type="submit" name="modifiez" class="registerbtn btn-block">Enregistrer</button>
                                
                                </div>
                                
                            
                            </div>
                        </form>
                    
                    </div>
                
                </div>
            
            </div>
        
        </div>
            
        </div>
    </div>
    <div class="fto"></div>
</div>
<?php include 'footer.php';?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script>
        $(document).ready(function(){
    
    $('.menu').on('click', function() {
        $('.bar').toggleClass('animate');
        $('.expand-menu').toggleClass('animate');
        $('.expand-menu .nav-link').toggleClass('animate');
        setTimeout(function(){
            $('.expand-menu .nav-link').toggleClass('animate-show');
        },500)
    })
    var firstName = <?php echo "'".$_SESSION['username']."'"?>;
    var res = firstName.toUpperCase();
    var intials = res.charAt(0);
    var profileImage = $('#profileImage').text(intials);
    $(".form-control").css("color", "#000");
    $(".input_selectl").css("color", "#000");
    $("select").css("color", "#000");
    $("input[@type=password]").css("font-size", "16px");
    $("input[@type=password]").css("font-weight:" , "bold");
});
    </script>
</body>
</html>