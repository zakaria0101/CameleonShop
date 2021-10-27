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
                <!-- Begin Page Content -->
                <div >

                <!-- DataTales Example -->
                <div class="mb-4">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold  text-center text-dark">Produit Cameleon Shop</h3>

                        <div class="container">
                            <div class="row">
                                <div class="col order-first">
                                    <form action="" method="POST">
                                        <select class="form-select w-100 input_select bg-transparent"  name="sta-sel" id="sta-sel" aria-label="Default select example" required>
                                            <option value="" selected>    -- Choisissez le statut --   </option>
                                            <option value="Confirmé">Confirmé</option>
                                            <option value="Non confirmé">Non confirmé</option>
                                        </select>
                                </div>
                                <div class="col">
                                   <input type="submit" class="btn btn-primary mt-1" name="search-sta" value="Afficher">
                                </div>
                                     </form>                              
                                <div class="col">
                                </div>
                                <div class="col order-last p-1">
                                </div>
                                
                            </div>
                        </div>


    <div class="card-body">
        <div class="table-responsive">

        
        <?php 
            $cnx = mysqli_connect('127.0.0.1', 'root', '', 'cameleon');
            $query = "SELECT * FROM commande";
            $query_run = mysqli_query($cnx, $query);

            if(isset($_POST['search-sta'])){

            $sta_sel = $_POST['sta-sel'];
        
            if($sta_sel === "Confirmé"){
                $query = "SELECT * FROM commande WHERE statut = '$sta_sel'";
                $query_run = mysqli_query($cnx, $query);}

            if($sta_sel === "Non confirmé"){
                $query = "SELECT * FROM commande WHERE statut = '$sta_sel'";
                $query_run = mysqli_query($cnx, $query);}
            }

        ?>

            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Numero Commande</th>
                        <th>ID Client</th>
                        <th>Date Commande</th>
                        <th>Prix Total</th>
                        <th>Nombre Produit</th>
                        <th>Detail Commande</th>
                        <th>Statut</th>
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
                        <td><?php echo $row ['id_client']; ?></td>
                        <td><?php echo $row ['date_com']; ?></td>
                        <td><?php echo $row ['prix_total']; ?> DH</td> 
                        <td><?php echo $row ['nbr_produit']; ?> Produit</td>

                        <td>
                            <form action="detail.php" method="POST">
                                  <input type="hidden" name="detail_id" value="<?php echo $row ['num_commande']; ?>">
                                  <input type="hidden" name="client_id_info" value="<?php echo $row ['id_client']; ?>">
                                  <button type="submit" name="detail_btn" class="btn btn-transparent"><img src="img/detail-icon.png" width="24px"></button>
                            </form>
                        </td>
                        <td><?php echo $row ['statut']; ?></td>
                    </tr>
                    <?php
                    }
                    }else
                    {
                        echo "Aucun order";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?php include('includes/footer.php') ?>     