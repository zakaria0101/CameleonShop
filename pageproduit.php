<?php
session_start();
$id = $_GET['produit'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cameleon";
// Creation de connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Validation de connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM product where id_product=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id2= $row["id_product"];
    $nom= $row["name_product"];
    $prix= $row["prix"];
    $description= $row["description"];
    $img1= $row["image1"];
    $img2= $row["image2"];
    $_SESSION['cat']= $row["cat"];
    $_SESSION['sous_cat']= $row["sous_cat"];  }
} else {
  header("Location: errorpage.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/icon/icon-site.png">
    <link rel="stylesheet" href="css/pageproduit.css?v=<?php echo time()?>">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Cameleon Shop | <?php echo $nom ?></title>
</head>
<body>
<?php
$id=$_GET['produit'];
if($id==null){
  header("Location: errorpage.php"); 
exit();
}

if(isset($_POST['acceuille'])){
  if(isset($_SESSION['panier'])){
    $item_array_id=array_column($_SESSION['panier'],'idproduit');
    if(in_array($_POST['idprod'],$item_array_id)){
      echo'<script>swal("Pardon!", "Produit déjà ajouter!", "error");</script>';
    }else{
      $count=count($_SESSION['panier']);
      $item_array=array('idproduit'=>$_POST['idprod'],'idqty'=>$_POST['qty'],'idsize'=>$_POST['size']);
      $_SESSION['panier'][$count]=$item_array;
      ?>
      <script type="text/javascript">
    window.location = "index.php";
    </script> 
      <?php
    }
  }
  else{
   $item_array=array('idproduit'=>$_POST['idprod'],'idqty'=>$_POST['qty'],'idsize'=>$_POST['size']);
   $_SESSION['panier'][0]=$item_array;
   ?>
   <script type="text/javascript">
 window.location = "index.php";
 </script> 
   <?php
 }
 
  
}
if(isset($_POST['cart'])){
  if(isset($_SESSION['panier'])){
    $item_array_id=array_column($_SESSION['panier'],'idproduit');
    if(in_array($_POST['idprod'],$item_array_id)){
      echo'<script>swal("Pardon!", "Produit déjà ajouter!", "error");</script>';
    }else{
      $count=count($_SESSION['panier']);
      $item_array=array('idproduit'=>$_POST['idprod'],'idqty'=>$_POST['qty'],'idsize'=>$_POST['size']);
      $_SESSION['panier'][$count]=$item_array;
      ?>
      <script type="text/javascript">
      window.location.href = "cart-page.php";
    </script> 
      <?php
    }
  }
  else{
   $item_array=array('idproduit'=>$_POST['idprod'],'idqty'=>$_POST['qty'],'idsize'=>$_POST['size']);
   $_SESSION['panier'][0]=$item_array;
   ?>
   <script type="text/javascript">
   window.location.href = "cart-page.php";
 </script> 
   <?php
 }
 
  
}

?>
<?php include 'header.php';?>
  <!--body-->
  <div class="prod_detail mt-5">
          <div class="product-image">
            <!--<div class="logo"><b>C<span>am</span>el<span>e</span>on</b></div>-->
            
       
            <div class="images">
            <?php echo '<img  src="data:image/jpeg;base64,' . base64_encode($img1) . '" id="imgprin" class="product-pic"/>' ?>
              <div class="img_s"><a onclick="changeimg()"><?php echo '<img  src="data:image/jpeg;base64,' . base64_encode($img1) . '" class="product-pic_2"></a>'?>
              <a onclick="changeimg1()"><?php echo '<img  src="data:image/jpeg;base64,' . base64_encode($img2) . '"  class="product-pic_3"></a></div>'?>
            </div>
            <!--<div class="dots">
              <button id="btn1" class="active" onclick="changeimg()"><i>1</i></button>
              <button onclick="changeimg1()"><i>2</i></button>
            </div>-->
          </div>
         
          <div class="product-details">
          
            <header>
              <h1 class="title"><?php echo $nom ?></h1>
              <span class="colorCat"><?php echo $_SESSION['cat']; ?></span> 
              <div class="price">
                <!--<span class="before">150 DH</span>-->
                <span class="current"><?php echo $prix ?> DH</span>
              </div>
            </header>
            <article>
              <h5>Description</h5>
            <p><?php echo $description; ?></p>
            </article>
            <form method="POST">
            <div class="controls"> 
              <div class="size">
              <h5>taille</h5>
                <select class="sizelist" id="taille" name="size"></select>
              </div>
              <div class="qty">
                <h5>Quantité</h5>
                <select class="quantlist" name="qty">
                  <option selected>1</option>
                  <option>2</option>
                  <option>3</option>
                </select>
              </div>
            </div>
            <div class="footer">
            <button class="botn" type="button">
                <img src="images/icon/cart.png" alt="">
                <span>Ajouter au panier</span>
              </button>                        
               <a href="whatsapp://send?text=This is WhatsApp sharing example using link"   data-action="share/whatsapp/share"  target="_blank"><img src="images/icon/share.png" alt=""></a>
            </div>
          </div>   
        </div>
        <input type="hidden" name="idprod" value="<?php echo  $id2 ?>"/>
<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">

    <div class="modal-content-right">
      <div class="modal-header">
        <p>Article ajouter avec succès ✔</p>
        <span class="close">&times;</span>
      </div>
      <div class="modal-body">
        <input type="submit" class="btn1" value="Continuer Shopping" name="acceuille">
        <input type="submit" class="btn2" value="Finaliser la commande" name="cart">
      </div>
    </div>
  </div>
</div><!-- END the modal -->
</form>
     
<?php include 'footer.php';?>
<script>
function changeimg()
{
  var p=document.getElementById("imgprin");
  p.src=  "data:image/jpeg;base64, <?php echo base64_encode($img1) ;?>";
 
}
function changeimg1()
{
  var p=document.getElementById("imgprin");
  p.src=  "data:image/jpeg;base64, <?php echo base64_encode($img2) ;?>";
 
}
</script>
<script>
// Get the modal
const modal = document.querySelector("#myModal");
// Get the button that opens the modal
const btn = document.querySelectorAll(".botn");
// Get the <span> element that closes the modal
const closeModal = document.getElementsByClassName("close")[0];
for (let i = 0; i < btn.length; i++) {
  btn[i].addEventListener("click", function () {
    modal.style.display = "block";
  });
}
// When the user clicks the button, open the modal
btn.onclick = function () {
  modal.style.display = "block";
};
// When the user clicks on <span> (x), close the modal
closeModal.onclick = function () {
  modal.style.display = "none";
};
// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
var x1 = document.getElementById("taille");
var cate=<?php echo "'".$_SESSION['sous_cat']."'"; ?>;
  if(cate=='Hauts' || cate=='Bas'){
    var option1 = document.createElement("option");
    option1.text = "S";
    var option2 = document.createElement("option");
    option2.text = "M";
    var option3 = document.createElement("option");
    option3.text = "L";
    var option4 = document.createElement("option");
    option4.text = "XL";
    var option5 = document.createElement("option");
    option5.text = "XXL";
    x1.add(option1);
    x1.add(option2);
    x1.add(option3);
    x1.add(option4);
    x1.add(option5);
  }
  else{
    var o1 = document.createElement("option");
    o1.text = "39";
    var o2 = document.createElement("option");
    o2.text = "40";
    var o3 = document.createElement("option");
    o3.text = "41";
    var o4 = document.createElement("option");
    o4.text = "42";

    x1.add(o1);
    x1.add(o2);
    x1.add(o3);
    x1.add(o4);
  }   
</script>
</body>
</html>