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
                <nav class="navbar navbar-expand bg-light topbar mb-4 static-top shadow">

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
<!--**********************************************************************************-->








            <div class="container card-body">
            <h3 class="m-0 font-weight-bold  text-center text-dark">Modifier le produit</h3>
            <hr>
            <?php 
               if(isset($_POST["edit_data_btn"]))
               {
                   $id = $_POST["edit_id"];

                   $cnx = mysqli_connect('127.0.0.1', 'root', '', 'cameleon');
                   $query = "SELECT * FROM product WHERE id_product = '$id'";
                   $query_run = mysqli_query($cnx,$query);

                   foreach($query_run as $row);
                   {            
            ?>            
                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="edit_id" value="<?php echo $row['id_product'] ?>">

                        <div class="mb-3">
                            <label  class="txt_bold text-dark">Titre de produit</label>
                            <input type="text" name="edit_name_pro" id="edit_name_pro" value="<?php echo $row ['name_product'] ?>"  required>
                        </div>

                        <!-- <div class="mb-3">
                            <label class="txt_bold text-dark">Images principal</label>
                            <input type="file" name="edit_image1" id="edit_image1" >
                        </div>

                        <div class="mb-3">
                            <label class="txt_bold text-dark">Images Secondaire</label>
                            <input type="file" name="edit_image2" id="edit_image2">
                        </div> -->

                        <div class="mb-3">
                            <label class="txt_bold text-dark">Prix produit</label>
                            <input type="number" name="edit_prix" id="edit_prix" value="<?php echo $row['prix'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="txt_bold text-dark">Description</label>
                            <textarea class="w-100 outline-none" name="edit_desc" id="edit_desc" cols="30" rows="3" required><?php echo $row['description'] ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="txt_bold text-dark">Categorie</label>
                            <select class="form-select w-100 input_select" name="edit_cat" id="edit_cat" aria-label="Default select example" required>
                                <option selected> <?php echo $row ['cat']; ?></option>
                                <option value="Homme">Hommes</option>
                                <option value="Femme">Femmes</option>
                                <option value="Enfant">Enfants</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="txt_bold text-dark">Sous Categorie</label>
                            <select class="form-select w-100 input_select"  name="edit_sous_cat" id="edit_sous_cat" aria-label="Default select example">
                                <option selected> <?php echo $row ['sous_cat'] ;?></option>
                                <option value="Hauts">Hauts</option>
                                <option value="Chaussure">Chaussures</option>
                                <option value="Bas">Bas</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <a href="product.php" class="btn btn-danger outline-none">Cancel</a>
                            <input type="submit" class="add_btn" name="update-btn" id="update-btn" value="Enregistrer">
                        </div>

                        </form> 
                <?php 
                    }
                }            
                ?>  
            </div>

<?php include('includes/footer.php') ?>  