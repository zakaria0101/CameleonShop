<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="images/icon/icon-site.png">
    <title>Cameleon shop | Hommes</title>
    <link rel="stylesheet" href="css/hommes.css?v=<?php echo time(); ?>">
    <style>
        ::placeholder {
            color: rgba(255, 255, 255, 0.637);
        }
    </style>
</head>

<body>
    <?php include('header.php') ?>

    <!------------------------------- Categorie Recherche  --------------------->

    <div class="btns">
        <button class="category" id="tops">Hauts</button>
        <button class="category" id="bottoms">bas</button>
        <button class="category" id="acces">chaussures</button>
    </div>
    <div class="wrapper">
        <div class="search_box">
            <div class="search_btn"><i class="fas fa-search"></i></div>
            <input type="text" class="input_search_cat" id="srch" placeholder="Qu'est-ce que vous cherchez? ">
        </div>
    </div>

    <!------------------------------- End Recherche  --------------------->


    <!--------------------------- Categorie Hommes Hauts  --------------------->

    <div class="container" id="cat-1">
        <div class="row">
            <?php
            $Connection = mysqli_connect('127.0.0.1', 'root', '', 'cameleon');

            $query = "SELECT * FROM product WHERE deleted = 'false'";
            $result = mysqli_query($Connection, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($col = mysqli_fetch_assoc($result)) {
                    $ID = $col['id_product'];
                    $Nom = $col['name_product'];
                    $Image1 = $col['image1'];
                    $Image2 = $col['image2'];
                    $prix = $col['prix'];
                    $categorie = $col['cat'];
                    $Sous_categorie = $col['sous_cat'];
                    $del = $col['deleted'];
                    if ($categorie == 'Hommes' && $Sous_categorie == 'Hauts') {
            ?>

                        <div class="col-md-3 col-sm-6 mt-5 cont-prod-1">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="pageproduit.php?produit=<?php echo $ID ?>" class="image">
                                        <img class="pic-1" src="data:image/jpeg;base64,<?php echo base64_encode($Image1) ?>">
                                        <img class="pic-2" src="data:image/jpeg;base64,<?php echo base64_encode($Image2) ?>">
                                    </a>
                                    <ul class="product-links">
                                        <li><a href="pageproduit.php?produit=<?php echo $ID ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="pageproduit.php?produit=<?php echo $ID ?>"><?php echo $Nom ?></a></h3>
                                    <div class="price"><?php echo $prix ?> DH</div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
    <!--------------------------- End Categorie Hommes Hauts  --------------------->


    <!--------------------------- Categorie Hommes Bas ------------------------->

    <div class="container" id="cat-2">
        <div class="row">
            <?php
            $Connection = mysqli_connect('127.0.0.1', 'root', '', 'cameleon');
            $query = "SELECT * from product WHERE deleted = 'false'";
            $result = mysqli_query($Connection, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($col = mysqli_fetch_assoc($result)) {
                    $ID = $col['id_product'];
                    $Nom = $col['name_product'];
                    $Image1 = $col['image1'];
                    $Image2 = $col['image2'];
                    $prix = $col['prix'];
                    $categorie = $col['cat'];
                    $Sous_categorie = $col['sous_cat'];
                    if ($categorie == 'Hommes' && $Sous_categorie == 'Bas') {
            ?>

                        <div class="col-md-3 col-sm-6 mt-5 cont-prod-2">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="pageproduit.php?produit=<?php echo $ID ?>" class="image">
                                        <img class="pic-1" src="data:image/jpeg;base64,<?php echo base64_encode($Image1) ?>">
                                        <img class="pic-2" src="data:image/jpeg;base64,<?php echo base64_encode($Image2) ?>">
                                    </a>
                                    <ul class="product-links">
                                        <li><a href="pageproduit.php?produit=<?php echo $ID ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="pageproduit.php?produit=<?php echo $ID ?>"><?php echo $Nom ?></a></h3>
                                    <div class="price"><?php echo $prix ?> DH</div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
    <!---------------------------End Categorie Hommes Bas  --------------------->

    <div class="container" id="cat-3">
        <div class="row">

            <?php
            $Connection = mysqli_connect('127.0.0.1', 'root', '', 'cameleon');
            $query = "select * from product WHERE deleted = 'false'";
            $result = mysqli_query($Connection, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($col = mysqli_fetch_assoc($result)) {
                    $ID = $col['id_product'];
                    $Nom = $col['name_product'];
                    $Image1 = $col['image1'];
                    $Image2 = $col['image2'];
                    $prix = $col['prix'];
                    $categorie = $col['cat'];
                    $Sous_categorie = $col['sous_cat'];
                    if ($categorie == 'Hommes' && $Sous_categorie == 'Chaussurs') {
            ?>

                        <div class="col-md-3 col-sm-6 mt-5 cont-prod-3">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="pageproduit.php?produit=<?php echo $ID ?>" class="image">
                                        <img class="pic-1" src="data:image/jpeg;base64,<?php echo base64_encode($Image1) ?>">
                                        <img class="pic-2" src="data:image/jpeg;base64,<?php echo base64_encode($Image2) ?>">
                                    </a>
                                    <ul class="product-links">
                                        <li><a href="pageproduit.php?produit=<?php echo $ID ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="pageproduit.php?produit=<?php echo $ID ?>"><?php echo $Nom ?></a></h3>
                                    <div class="price"><?php echo $prix ?> DH</div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
    <!---------------------------------- End Categorie Hommes Chaussurs ---------------------------------->


    <?php include('footer.php') ?>


    <script>
        $(document).ready(function() {
            $('#cat-1').show();
            $('#cat-2').hide();
            $('#cat-3').hide();
            // Recherche
            $("#srch").keyup(function() {
                $('.cont-prod-1').hide();
                var txt = $("#srch").val();
                $('.cont-prod-1').each(function() {
                    if ($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1) {
                        $(this).show();
                    }
                });
            });
            $("#tops").click(function() {
                $("#srch").val("");
                $('#cat-1').fadeIn();
                $('#cat-1').show();
                $('#cat-2').hide();
                $('#cat-3').hide();
                $("#tops").css("color", "black").css("background-color", "white");
                $("#bottoms").css("color", "white").css("background-color", "transparent");
                $("#acces").css("color", "white").css("background-color", "transparent");
                // Recherche
                $("#srch").keyup(function() {
                    $('.cont-prod-1').hide();
                    var txt = $("#srch").val();
                    $('.cont-prod-1').each(function() {
                        if ($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1) {
                            $(this).show();
                        }
                    });
                });
            })
            $("#bottoms").click(function() {
                $("#srch").val("");
                $('#cat-2').fadeIn();
                $('#cat-1').hide();
                $('#cat-2').show();
                $('#cat-3').hide();
                $("#bottoms").css("color", "black").css("background-color", "white");
                $("#tops").css("color", "white").css("background-color", "transparent");
                $("#acces").css("color", "white").css("background-color", "transparent");
                // Recherche
                $("#srch").keyup(function() {
                    $('.cont-prod-2').hide();
                    var txt = $("#srch").val();
                    $('.cont-prod-2').each(function() {
                        if ($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1) {
                            $(this).show();
                        }
                    });
                });
            })
            $("#acces").click(function() {
                $("#srch").val("");
                $('#cat-3').fadeIn();
                $('#cat-1').hide();
                $('#cat-2').hide();
                $('#cat-3').show();
                $("#acces").css("color", "black").css("background-color", "white");
                $("#bottoms").css("color", "white").css("background-color", "transparent");
                $("#tops").css("color", "white").css("background-color", "transparent");
                // Recherche
                $("#srch").keyup(function() {
                    $('.cont-prod-3').hide();
                    var txt = $("#srch").val();
                    $('.cont-prod-3').each(function() {
                        if ($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1) {
                            $(this).show();
                        }
                    });
                });
            })
        });
    </script>

</body>

</html>