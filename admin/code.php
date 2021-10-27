<?php 

$connect = mysqli_connect("localhost", "root", "", "cameleon");  

if(isset($_POST["insert"]))  
{  
     $name = $_POST["name_pro"];
     $file1 = addslashes(file_get_contents($_FILES["image1"]["tmp_name"]));  
     $file2 = addslashes(file_get_contents($_FILES["image2"]["tmp_name"])); 
     $prix = $_POST["prix"];
     $desc = $_POST["desc"];
     $cat = $_POST["cat"];
     $sous_cat = $_POST["sous_cat"];
     $del = "false";

     $query = "INSERT INTO product(name_product,image1,image2,prix,description,cat,sous_cat,deleted) VALUES ('$name','$file1','$file2','$prix','$desc','$cat','$sous_cat','$del')";  
     if(mysqli_query($connect, $query))  
     {  
        header('location: product.php');
     }  
} 

if(isset($_POST["btn_delete"]))  
{  
     $id = $_POST["delete_id"];

     $query = "UPDATE product SET deleted = 'true' WHERE id_product = $id ";  
     if(mysqli_query($connect, $query))  
     {  
        header('location: product.php');
     }  
} 


if(isset($_POST["update-btn"]))  
{ 
   $id = $_POST["edit_id"]; 
   $edit_name = $_POST["edit_name_pro"];
   // $edit_file1 = addslashes(file_get_contents($_FILES["edit_image1"]["tmp_name"]));  
   // $edit_file2 = addslashes(file_get_contents($_FILES["edit_image2"]["tmp_name"])); 
   $edit_prix = $_POST["edit_prix"];
   $edit_desc = $_POST["edit_desc"];
   $edit_cat = $_POST["edit_cat"];
   $edit_sous_cat = $_POST["edit_sous_cat"];

   $query = "UPDATE product SET name_product='$edit_name', prix='$edit_prix', description='$edit_desc' ,cat='$edit_cat',sous_cat='$edit_sous_cat' WHERE id_product = $id"; 
   if(mysqli_query($connect, $query))
   {
      header('location: product.php'); 
   }
} 

if(isset($_POST["confirme_btn"]))  
{  
     $id = $_POST["confirme_id"];
     $statut = "Confirmé" ;

     $query = "UPDATE commande SET statut = '$statut' WHERE num_commande = $id "; 
     if(mysqli_query($connect, $query))  
     {  
        header('location: orders.php');

     }else{

        header('location: errorpage.php');
     }
} 

?>