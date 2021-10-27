<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Cameleon shop | Register</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/icon/icon-site.png">
</head>
<body class="login-body">

    <?php include('header.php') ?>

    <form action="register.php" method="POST">
        <div class="register-form">
            <h2 class="text-center">Inscrivez-vous</h2>
            <p class="text-center">Veuillez remplir ce formulaire pour créer un compte.</p>

            <?php include('errors.php'); ?>

            <label class="tx-bold" for="username">Nom Complet</label>
            <input type="text" placeholder="Entrez votre nom complet" name="username" required>

            <label class="tx-bold" for="email">Adresse Email</label>
            <input type="email" placeholder="Adresse Email" name="email" required>

            <label class="tx-bold" for="city">Ville</label>
            <select class="input_select" name="city">
                <option selected >-- Choisissez votre ville --</option>
                <option value="Marrakech">Marrakech</option>
                <option value="Tanger">Tanger</option>
                <option value="Casablanca">Casablanca</option>
                <option value="Rabat">Rabat</option>
                <option value="Agadir">Agadir</option>
                <option value="Beni Melal">Beni Melal</option>
                <option value="Safi">Safi</option>
                <option value="Eljadida">Eljadida</option>
                <option value="Ouejda">Ouejda</option>
                <option value="Bengrir">Bengrir</option>
            </select>

            <label class="tx-bold" for="address">Adresse</label>
            <input type="text" placeholder="Entrez votre adresse résidentielle" name="address" required>

            <label class="tx-bold" for="telephone">Télephone</label>
            <input type="tel" placeholder="Telephone" name="phone" required>

            <label class="tx-bold" for="password1">Mot de pass</label>
            <input type="password" placeholder="Mot de pass" name="password_1" required>

            <label class="tx-bold" for="password2">Confirmation de mot de pass</label>
            <input type="password" placeholder="Confirmer le mot de pass" name="password_2" required>

            <input type="submit" class="registerbtn"  value="S'inscrire" name="reg_user"><br>
            <hr>
            <p>Déjà membre? <a href="login.php">S'identifier</a> ici.</p>
        </div>
    </form>
    <?php include('footer.php') ?>

</body>
</html>