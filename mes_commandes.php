<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cameleon";
require_once("fonction/order_function.php");
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
    <link rel="stylesheet" href="css/my-orders.css?v=<?php echo time()?>">
    <title>Cameleon-Shop | Historique des Commandes</title>
</head>
<body>
    <section class="cart_wrapper">
        <div class="cart_lists">
          <div class="cart_title">
            <span class="material-icons-outlined">local_mall</span>
            Historique des Commandes
          </div>
          <div class="cart_list_wrap">
    <div class="cart_responsive">
      
    <?php
              $total =0;
              if(isset($_SESSION['username'])){
                $sqly = "SELECT * FROM detail_commande where id_client=".$_SESSION['id_client'].";";
                $result = $cnx->query($sqly);
            
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    $num=$row['num_commande'];
                    $sql = "select statut from commande JOIN detail_commande where commande.num_commande = $num";
                    $rsult = $cnx->query($sql);
                    if ($rsult->num_rows > 0) {
                      while($row2 = $rsult->fetch_assoc()) {
                        $statut=$row2['statut'];   
                        if($statut=="Confirmé"){
                          $stut="images/icon/confirme-icon.png";
                        }else{
                          $stut="images/icon/nonconfirme-icon.png";
                        }                   
                      }                        
                    }
                      $sql = "SELECT * FROM product where id_product=".$row['id_produit'].";";
                      $rslt = $cnx->query($sql);
                      if ($rslt->num_rows > 0) {
                        while($row1 = $rslt->fetch_assoc()) {
                          $nom=$row1['name_product'];
                          $image1=$row1['image1'];
                          $prix=$row1['prix'];
                          $qty=$row['qty_produit'];
                          $price=$prix*(int)$qty;
                         
                        }                        
                      }
                      historyelements($nom,$row['id_produit'],$image1,$row['taille'],$row['qty_produit'],$price,$row['date_commande'],$stut);
                      $total=$total + $price;
                    }
                    
                }else{
                    echo"<h2>Vous n'avez aucun Commande!</h2>";
                }
              }
             ?>
            </div>
            <div class="footer">
              <div class="back_cart">
                <a href="index.php">
                  <span class="material-icons-outlined">west</span>
                  Retour à la Boutique
                </a>
              </div>
              <div class="subtotal">
                <label>Total: </label>
                <strong><?php echo $total; ?> DH</strong>
              </div>
            </div>
          </div>
        </div>
        </div>
      </section>
</body>
</html>