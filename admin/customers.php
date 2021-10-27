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
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline small text-dark"><b>Cameleon Admin</b></span>
                        <img class="img-profile rounded-circle" src="img/profilicon.png">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
        <div>

            <!-- DataTales Example -->
            <div class="mb-4">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold  text-center text-dark">Clients de Cameleon Shop</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <?php
                        $con = mysqli_connect('localhost', 'root', '', 'cameleon');
                        $query = "SELECT * FROM users";
                        $query_run = mysqli_query($con, $query);
                        ?>

                        <table class="table " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Client</th>
                                    <th>Nom Complet</th>
                                    <th>Email</th>
                                    <th>Ville</th>
                                    <th>Adresse</th>
                                    <th>Télephone</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (mysqli_num_rows($query_run) > 0) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                ?>

                                        <tr>
                                            <td><?php echo $row['id_client']; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['city']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                        </tr>

                                <?php
                                    }
                                } else {
                                    echo "No data found";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        <?php include('includes/footer.php') ?>