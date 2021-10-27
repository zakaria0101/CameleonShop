<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cameleon shop | Connexion</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/icon/icon-site.png">
</head>
<body class="login-body">

    <?php include('header.php') ?>

    <form action="login.php" method="POST">
        <div class="register-form">
            <h2 class="text-center">S'identifier</h2>
            <p class="text-center">Entrez les informations de connexion pour y accéder.</p>

            <?php include('errors.php'); ?>
            
            <label class="tx-bold" for="username">Nom Complet</label>
            <input type="text" placeholder="Nom complet" name="username" required>
            <label class="tx-bold" for="password">Mot de pass</label>
            <input type="password" placeholder="Mot de pass" name="password" required>
            <input type="submit" class="registerbtn" value="Se Connecter" name="login_user"><br>
            <hr>
            <p>Si vous-avez déja un compte? <a href="register.php">Inscrivez-vous</a> ici.</p>
        </div>
    </form>

    <?php include('footer.php') ?>

</body>
</html>