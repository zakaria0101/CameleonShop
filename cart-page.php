<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cameleon";
require_once("fonction/cart_produits.php");
// Creation de connection
$cnx = new mysqli($servername, $username, $password, $dbname);
// Validation de connection
if ($cnx->connect_error) {
  die("Connection failed: " . $cnx->connect_error);
}

  



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/icon/icon-site.png">
    <link rel="stylesheet" href="css/cart-page.css?v=<?php echo time()?>">
    <link rel="stylesheet" href="css/bootstrap.css?v=<?php echo time()?>">
    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    
    <title>Cameleon-Shop | Cart</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap');
body{
  color: #424874;
}
                .showLeft{
                    background: transparent;
                    border:none;
                    text-shadow: none !important;
                    color:#000 !important;
                    padding:1px;
                }
                .icons li {
                    background: none repeat scroll 0 0 #acb3b4;
                    height: 7px;
                    width: 7px;
                    line-height: 0;
                    list-style: none outside none;
                    margin-right: 15px;
                    margin-top: 3px;
                    vertical-align: top;
                    border-radius:50%;
                    pointer-events: none;
                }
                .btn-left {
                    left: 0.4em;
                }
                .btn-right {
                    right: 0.4em;
                }
                .btn-left, .btn-right {
                    position: absolute;
                    top: 0.24em;
                }
                .dropbtn {
                    position: fixed;
                    color: white;
                    font-size: 16px;
                    border: none;
                    cursor: pointer;
                }

                .dropdown {
                    position: absolute;
                    display: inline-block;
                    right: 0.4em;
                }
                .dropdown-content {
                    display: none;
                    position: relative;
                    margin-top: 60px;
                    background-color: #f9f9f9;
                    min-width: 160px;
                    overflow: auto;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                    z-index: 1;
                }
               .btnmo{
                 width: 100%;
                 border:none;
                 background: transparent;
                 color: #424874;
                 font-family: 'Roboto', sans-serif;
                 font-weight: bold;
               }
                .dropdown-content a {
                    color: black;
                    padding: 1px 10px;
                    text-decoration: none;
                    display: block;
                }
                .dropdown a:hover {background-color: #f1f1f1}
                .show {display:block;}
            </style>
            <script>
                function changeLanguage(language) {
                    var element = document.getElementById("url");
                    element.value = language;
                    element.innerHTML = language;
                }
                function showDropdown() {
                    document.getElementById("myDropdown").classList.toggle("show");
                }
                // Close the dropdown if the user clicks outside of it
                window.onclick = function(event) {
                    if (!event.target.matches('.dropbtn')) {
                        var dropdowns = document.getElementsByClassName("dropdown-content");
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                            if (openDropdown.classList.contains('show')) {
                                openDropdown.classList.remove('show');
                            }
                        }
                    }
                }
            </script>
</head>
<body>
    <section class="cart_wrapper">
        <div class="cart_lists">
          <div class="cart_title">
            <span class="material-icons-outlined">local_mall</span>
            Your Shopping Cart
          </div>
      
          <div class="cart_list_wrap">
            <div class="cart_responsive">
          
            <?php
              $cuint=0;
              $total =0;
             if(isset($_SESSION['panier'])){
              $idpr = array();
              $qtycm = array();
              $sizcm = array();
 
              $productid=array_column($_SESSION['panier'],'idproduit');
              $qanty=array_column($_SESSION['panier'],'idqty');
              $size=array_column($_SESSION['panier'],'idsize');
 
              $sqll = "SELECT * FROM product";
              $result = $cnx->query($sqll);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  for($x=0;$x<count($_SESSION['panier']);$x++){
                    if($row['id_product']==$productid[$x]){
                     $sizecm=$size[$x];
                     $qantycm=$qanty[$x];
                     $prix=$row["prix"];
                     $price=$qantycm*(int)$prix;
                     panierelements($row["name_product"],$row["id_product"],$row["image1"],$sizecm,$qantycm,$price);
                     $total=$total + (int)$price;
                     $sizcm[]=$sizecm;
                     $qtycm[]=$qantycm;
                     $idpr[]=$row['id_product'];
                     $cuint=$cuint+1;
                   }
                 }
                }
              }
             }else{
              echo"<h5>Panier vide</h5>";
            }
             
            if(isset($_POST['remove'])){
              if($_GET['action']=='remove'){
                 foreach($_SESSION['panier'] as $key=>$value){
                    if($value['idproduit']==$_GET['id']){
                      unset($_SESSION['panier'][$key]);
                      $cuint=$cuint-1;
                      echo"<script>window.location='cart-page.php'</script>";
                    }
                 }
              }
            }
            
            
             ?>
            </div>
            <div class="footer">
              <div class="back_cart">
                <a href="index.php">
                  <span class="material-icons-outlined">west</span>
                  Retour à Boutique
                </a>
              </div>
              <div class="subtotal">
              <label>Frais Livraison: </label>
                <strong>Gratuit</strong><br><br>
                <label>Total: </label>
                <strong><?php echo $total ?> DH</strong>
              </div>
            </div>
          </div>
        </div>
        <div class="cart_details">
          <div class="cart_title">
            Panier Detail
          </div>
          <div class="form_row">

<?php
if(isset($_SESSION['panier'])){
  if($cuint==0){
    echo'<script>swal("Pardon!", "Panier Vide!", "error");</script>';

  }else{
    if(isset($_POST['Commender'])){
      $date = date("Y-m-d H:i:s");
      $cnt=count($idpr);
      
      $sqlcomande = "INSERT INTO commande (id_client, date_com, prix_total,nbr_produit)
      VALUES (".$_SESSION['id_client'].",'$date',$total,$cnt)";
      if ($cnx->query($sqlcomande) === TRUE) {
        $sqly = "SELECT num_commande  FROM commande  ORDER BY num_commande DESC  LIMIT 1; ";
        $rslt = $cnx->query($sqly);
         if ($rslt->num_rows > 0) {
         // output data of each row
        foreach($rslt as $row){
          $_SESSION['num_commande']=$row['num_commande'];
        }
      } else {
        ;
      }
        for($x=0;$x<(int)$cnt;$x++ )
        {
          $valueid=$idpr[$x];
          $qtyid=$qtycm[$x];
          $sizid=$sizcm[$x];
          $sqlcm = "INSERT INTO detail_commande (num_commande,id_produit,date_commande,taille,qty_produit,id_client)
              VALUES (". $_SESSION['num_commande'].",$valueid,'$date','$sizid',$qtyid,".$_SESSION['id_client'].")";
              if ($cnx->query($sqlcm) === false) {
                echo "Error: " . $sqlcm . "<br>" . $cnx->error;
              }else{
                ?>
    <script type="text/javascript">
  window.location = "final.php";
  </script> 
    <?php
              unset($_SESSION['panier']);
              }
        } 
      } 
      else {
        echo "Error: " . $sqlcomande . "<br>" . $cnx->error;
      }  
  }
  }
  
  
  $cnx->close();     
}
?>
            <?php 
            if(isset($_SESSION['username'])){
              echo'<form method="POST">
              <div class="form_group cart_type">
              <label class="input_label1">Vos information</label>
              </label>
            </div><div class="form_group">
            <label class="input_label">'.$_SESSION["username"].'</label>
            <label class="input_label">'.$_SESSION["adress"].'</label>
            <label class="input_label">'. $_SESSION["ville"].'</label>
            <label class="input_label">'.$_SESSION["tel"].'</label>
          </div>
         
          <div class="form_group w_75">
            <a class="modifier"  href="profil.php">Modifier</a>
          </div>
          <input type="submit"  name="Commender" class="btn" value="Commender">
          </form>
          </div>';
            }else{
              echo'<div class="form_group cart_type">
              <label class="input_label1">Pour finaliser votre commande</label>
              <label class="input_label1">Vous devez Se connecter</label>
              </label>
            </div><div class="form_group">
            <label class="input_label">Si vous n\'avez pas de compte vous pouvez</label>
          </div>
         
          <div class="form_group w_75">
          <a href="register.php" onclick="directpanier()" class="modifier">S\'inscrire</a>
        </div>
        <input type="button" onclick="login()" class="btn" value="Se Connecter">
        </div>';
            }
            
            
            ?>
            

            
        </div>
        </form>
       
</section>
  <script>
  function login(){
    window.location.href="login.php";
    <?php  $_SESSION['direction']= true; ?>
  }
  function directpanier(){
    <?php  $_SESSION['direction']= true; ?>
  }
  
</script>
</body>
</html>