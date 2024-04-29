<?php
session_start();
   $servername = 'localhost';
   $username = 'root';
   $password = '';
   $dbname = 'projet_fin_etude';
   $con = mysqli_connect($servername,$username,$password,$dbname) or die('could not connect to database');

  // SIGNUP CLEINT
  if(isset($_POST['submit'])) {
    $signup_prenom = $_POST['signup-prenom'];
    $signup_nom = $_POST['signup-nom'];
    $signup_adresse = $_POST['signup-adresse'];
    $signup_email = $_POST['signup-email'];
    $signup_password = $_POST['signup-password'];
    $add = "INSERT INTO client (nom, prenom,adresse,email, password) VALUES ('$signup_prenom', '$signup_nom','$signup_adresse','$signup_email','$signup_password')";
    if($signup_prenom == '' || $signup_nom == '' || $signup_adresse == '' || $signup_email == ''){
      echo "Vous devez remplir tout les champs";
    } else{
    $res = mysqli_query($con, $add);
    if ($res) {
        // header('location:EspaceClient.html');
        exit();

    }
  }
}

?>