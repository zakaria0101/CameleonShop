<?php
session_start();
// initializing variables
$username = "";
$email    = "";
$city = "";
$address = "";
$phone = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('127.0.0.1', 'root', '', 'cameleon');
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (strlen($password_1) < 8) {
    array_push($errors, "Le mot de passe il doit être 8 caractères minimum");
    } 
  if ($password_1 != $password_2) {
    array_push($errors, "Les mots de passe ne correspondent pas");
  } 

  if ($city === "-- Choisissez votre ville --") {
    array_push($errors, "Choisissez votre ville");
  } 
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' OR username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
     if ($user['username'] === $username) {
      array_push($errors, "Cet nom d'utilisateur existe déjà.");
    } 
    if ($user['email'] === $email) {
      array_push($errors, "Cet adresse e-mail existe déjà.");
    }
  }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = $password_1;
    
    //encrypt the password before saving in the database
    $query = "INSERT INTO users (username, email, city, address, phone, password) VALUES('$username', '$email', '$city', '$address', '$phone', '$password')";
    mysqli_query($db, $query);
    $_SESSION['email']= $email;
    $_SESSION['pass']= $password;
    $_SESSION['tel']= $phone;
    $_SESSION['ville']= $city;
    $_SESSION['adress']= $address;
    $_SESSION['username']= $username;

    $requet = "select id_client from users where email = '$email'";
    $res = mysqli_query($db, $requet);
    if ($res->num_rows > 0) {
      while ($ligne = $res->fetch_assoc()) {
        $_SESSION["id_client"] = $ligne["id_client"];
      }
    }
    
    if($_SESSION['direction']==true){
      header('location: cart-page.php');
    }else{
      header('location: index.php');
    }
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if($username == "admin" && $password == "admin")
    {
      $_SESSION['username'] = "admin";
      header('location: admin/index.php');
    }else{
      if (count($errors) == 0) {
        $password = $password;
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          if($_SESSION['direction']==true){
            header('location: cart-page.php');
            $_SESSION['direction']==false;
          }else{
            header('location: index.php');
          }
        }else {
            array_push($errors, "Le nom d'utilisateur ou le mot de passe est incorrect");
        }
          $sqly = "SELECT * FROM users where username='$username'";
        $result =  mysqli_query($db, $sqly);
        
        if ($result->num_rows > 0) {
        
          while($row = $result->fetch_assoc()) {
            $_SESSION["id_client"]= $row["id_client"];
            $_SESSION['email']= $row["email"];
            $_SESSION['pass']= $row["password"];
            $_SESSION['tel']= $row["phone"];
            $_SESSION['ville']= $row["city"];
            $_SESSION['adress']= $row["address"];
          }
        }
        }
      }
    }
  ?>