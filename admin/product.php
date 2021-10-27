<?php

    session_start();

    if (!isset($_SESSION['username'])) {
        header("location: index.php");
    }
    include('includes/header.php');
    include('includes/navbar.php');
?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand bg-light topbar mb-4 static-top shadow" >

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline small text-dark"><b>Cameleon Admin</b></span>
                                <img class="img-profile rounded-circle"
                                    src="img/profilicon.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="index.php?logout='1'" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2  text-dark"></i>
                                    Déconnexion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div >

                <!-- DataTales Example -->
                <div class="mb-4">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold  text-center text-dark">Produit Cameleon Shop</h3><br>

                        <div class="container">
                            <div class="row">
                                <div class="col order-first">
                                    <form action="" method="POST">
                                        <select class="form-select w-100 input_select bg-transparent"  name="cat-sel" id="cat-sel" aria-label="Default select example" required>
                                            <option value="" selected>    -- Choisissez la catégorie --   </option>
                                            <option value="Hommes">Hommes</option>
                                            <option value="Femmes">Femmes</option>
                                            <option value="Enfants">Enfants</option>
                                        </select>
                                </div>
                                <div class="col">
                                   <input type="submit" class="btn btn-primary mt-1" name="search-cat" value="Rechrcher">
                                </div>
                                </form>                              
                                <div class="col order-last p-1">
                                    <img  src="img/add-pro.png"style="width:30px; height:30px;" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever=""><b> Ajouter un produit</b></img>
                                </div>
                            </div>
                        </div>




                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark text-center font-weight-bold " id="exampleModalLabel">Ajouter un produit</h5>
                                <button type="button" data-bs-dismiss="modal" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

<!-- ************************************************************************************************** -->
             
                 <form action="code.php" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label  class="txt_bold text-dark">Titre de produit</label>
                        <input type="text" name="name_pro" id="name_pro"  required>
                    </div>

                    <div class="mb-3">
                        <label class="txt_bold text-dark">Images principal</label>
                        <input type="file" name="image1" id="image1" required>
                    </div>

                    <div class="mb-3">
                        <label class="txt_bold text-dark">Images Secondaire</label>
                        <input type="file" name="image2" id="image2" required>
                    </div>

                    <div class="mb-3">
                        <label class="txt_bold text-dark">Prix produit</label>
                        <input type="number" name="prix" id="prix" required>
                    </div>

                    <div class="mb-3">
                        <label class="txt_bold text-dark">Description</label>
                        <input type="text" name="desc" id="desc" required>
                    </div>

                    <!-- <div class="mb-3">
                        <label class="txt_bold text-dark">Categorie</label>
                        <select class="form-select w-100 input_select" name="cat" id="cat" aria-label="Default select example" required>
                            <option value="Homme">Les Hommes</option>
                            <option value="Femme">Les Femmes</option>
                            <option value="Enfant">Les Enfants</option>
                        </select>
                    </div> -->

                    <div class="mb-3">
                        <label class="txt_bold text-dark">Categorie</label>
                        <select class="form-select w-100 input_select" name="cat" id="cat" aria-label="Default select example" required>
                        <?php
                           $connect = mysqli_connect("localhost", "root", "", "cameleon");  
                           $query = "SELECT  * FROM categorie";  
                           $query_run = mysqli_query($connect,$query);

                           foreach($query_run as $data)
                           {
                        ?>
                                <option value="<?php echo $data['cat']; ?>"><?php echo $data['cat']; ?></option>
                        <?php
                           }
                        ?>
                        </select>
                    </div>

                    <!-- <div class="mb-3">
                        <label class="txt_bold text-dark">Sous Categorie</label>
                        <select class="form-select w-100 input_select" name="sous_cat" id="sous_cat" aria-label="Default select example">
                            <option value="Hauts">Hauts</option>
                            <option value="Chaussure">Chaussures</option>
                            <option value="Bas">Bas</option>
                        </select>
                    </div> -->

                    
                    <div class="mb-3">
                        <label class="txt_bold text-dark">Sous Categorie</label>
                            <select class="form-select w-100 input_select" name="sous_cat" id="sous_cat" aria-label="Default select example">
                            <?php
                                $connect = mysqli_connect("localhost", "root", "", "cameleon");  
                                $query = "SELECT  * FROM sous_categorie";  
                                $query_run = mysqli_query($connect,$query);

                                foreach($query_run as $data)
                            {
                            ?>
                            <option value="<?php echo $data['sous_cat']; ?>"><?php echo $data['sous_cat']; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                    </div> 

                    <div class="modal-footer">
                        <input type="submit" name="insert" id="insert" class="add_btn" value="Ajouter">
                    </div>

                </form> 
<!--**************************************************************************************************************-->
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">

        <?php 
            $cnx = mysqli_connect('127.0.0.1', 'root', '', 'cameleon');
            $query = "SELECT * FROM product WHERE deleted = 'false'";
            $query_run = mysqli_query($cnx, $query);

            if(isset($_POST['cat-sel'])){

                $cat_sel = $_POST['cat-sel'];

                if($cat_sel === "Hommes"){
                $query = "SELECT * FROM product where cat = 'Hommes' and deleted = 'false' ";
                $query_run = mysqli_query($cnx, $query);}

                if($cat_sel === "Femmes"){
                $query = "SELECT * FROM product where cat = 'Femmes' and deleted = 'false'";
                $query_run = mysqli_query($cnx, $query);}

                if($cat_sel === "Enfants"){
                $query = "SELECT * FROM product where cat = 'Enfants' and deleted = 'false'";
                $query_run = mysqli_query($cnx, $query);}
            }
        ?>

            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Produit</th>
                        <th>Nom Produit</th>
                        <th>Image Principale</th>
                        <th>Image Secondaire</th>
                        <th>Prix</th>
                        <th>Categorie</th>
                        <th>Sous Categorie</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                        ?>
                    <tr>
                        <td><?php echo $row ['id_product'];?></td>
                        <td><?php echo $row ['name_product']; ?></td>
                        <td><img  src="data:image/jpeg;base64,<?php echo base64_encode($row['image1'])?>" style="width: 70px; height: auto;"> </td>
                        <td><img  src="data:image/jpeg;base64,<?php echo base64_encode($row['image2'])?>" style="width: 70px; height: auto;"> </td> 
                        <td><?php echo $row ['prix']; ?> DH</td>
                        <td><?php echo $row ['cat']; ?></td>
                        <td><?php echo $row ['sous_cat']; ?></td>
                        <td>
                              <form action="edit.php" method="POST">
                                  <input type="hidden" name="edit_id" value="<?php echo $row ['id_product']; ?>">
                                  <button type="submit" name="edit_data_btn" class="btn btn-transparent"><img src="img/edit.png" width="24px"></button>
                              </form>
                        </td>
                        <td>
                              <form action="code.php" method="POST">
                                  <input type="hidden" name="delete_id" value="<?php echo $row ['id_product']; ?>">
                                  <button type="submit" name="btn_delete" class="btn btn-transparent"><img src="img/delete.png" width="24px"></button>
                              </form>
                        </td>
                    </tr>

                    <?php
                    }
                    }else
                    {
                        echo "Aucun produit ajouter";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){   
        var extension1 = $('#image1').val().split('.').pop().toLowerCase();  
        var extension2 = $('#image2').val().split('.').pop().toLowerCase();  
        if((jQuery.inArray(extension1, ['png','jpg','jpeg']) == -1) && (jQuery.inArray(extension2, ['png','jpg','jpeg']) == -1))  
        {  
            alert("L'extension de image invalid");  
            $('#image').val('');  
            return false;  
        }    
      });  
 });  
 </script> 

<?php include('includes/footer.php') ?>     