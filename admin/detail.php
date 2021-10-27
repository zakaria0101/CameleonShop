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
                <h3 class="m-0 font-weight-bold  text-center text-dark">Detail commande</h3>
                <hr>

                <?php 
                if(isset($_POST["detail_btn"]))
                {
                    $idcom = $_POST["detail_id"];

                    $cnx = mysqli_connect('127.0.0.1', 'root', '', 'cameleon');
                    $query = "SELECT detail_commande.num_commande, detail_commande.date_commande ,detail_commande.taille ,detail_commande.qty_produit, detail_commande.id_produit, product.image1, detail_commande.id_client from detail_commande JOIN product where detail_commande.id_produit=product.id_product and detail_commande.num_commande=$idcom";
                    $query_run = mysqli_query($cnx,$query);                
                ?>  
                        <table class="table " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Numero Commande</th>
                                    <th>ID Produit</th>
                                    <th>Image Produit</th>
                                    <th>Date Commande</th>
                                    <th>Taille</th>
                                    <th>Qantité</th>
                                    <th>ID Client</th>
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
                                        <td><?php echo $row ['num_commande'];?></td>
                                        <td><?php echo $row ['id_produit']; ?></td>
                                        <td><img  src="data:image/jpeg;base64,<?php echo base64_encode($row['image1'])?>" style="width: 70px; height: auto;"></td>
                                        <td><?php echo $row ['date_commande']; ?></td>
                                        <td><?php echo $row ['taille']; ?></td>
                                        <td><?php echo $row ['qty_produit']; ?></td>
                                        <td><?php echo $row ['id_client']; ?></td>
                                    </tr>
                <?php
                                    }
                                }
                }        
                ?>
                            </tbody>
                        </table>
                        <form action="code.php" method="POST">
                        <div class="modal-footer">
                            <input type="hidden" name="confirme_id" value="<?php echo $idcom; ?>">
                            <a href="orders.php" class="btn btn-danger outline-none">Cancel</a>
                            <input type="submit" class="add_btn" name="confirme_btn"  value="Confirmer">
                        </div> 
                        </form>
            </div>
     <!-----------------------info client------------------------------>
                    <h3 class="m-0 font-weight-bold  text-center text-dark">Informations Client</h3>
                    <hr>
                    <?php 
                        $id_client_info = $_POST['client_id_info'];
                        $cnx = mysqli_connect('127.0.0.1', 'root', '', 'cameleon');
                        $query = "SELECT *FROM users WHERE id_client = $id_client_info ";
                        $query_run = mysqli_query($cnx,$query);
                        if(mysqli_num_rows($query_run) > 0)
                        {
                        $row = mysqli_fetch_assoc($query_run);
                    ?>
                    <div class="container">
                        <table class="table table-dark ">
                            <tr>
                                <td>Nom Complet:</td>
                                <td><?php echo $row ['username'];?></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?php echo $row ['email'];?></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><?php echo $row ['address'];?></td>
                            </tr>
                            <tr>
                                <td>Ville:</td>
                                <td><?php echo $row ['city'];?></td>
                            </tr>
                            <tr>
                                <td>Numéro Télephone:</td>
                                <td><?php echo $row ['phone'];?></td>
                            </tr>
                        </table> 
                        </div>
                    <?php 
                    }
                    ?> 
                    <!-----------------------end info client-------------------------->   

<?php include('includes/footer.php') ?>  