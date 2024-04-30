<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'projet_fin_etude';
$con = mysqli_connect($servername, $username, $password, $dbname) or die('could not connect to database');

// SIGNUP CLIENT
if (isset($_POST['submit'])) {
    $signup_nom = $_POST['signup-nom'];
    $signup_prenom = $_POST['signup-prenom'];
    $signup_email = $_POST['signup-email'];
    $signup_dateN = $_POST['signup-dateN'];
    $signup_password = $_POST['signup-password'];

    if ($signup_prenom == '' || $signup_nom == '' || $signup_dateN == '' || $signup_email == '') {
        echo "error!!!!";
    } else {
        try {
            $add = "INSERT INTO stagiaire (nom, prenom, email, date_naissance, password) VALUES ('$signup_nom','$signup_prenom','$signup_email','$signup_dateN','$signup_password')";
            $res = mysqli_query($con, $add);
            
            if ($res) {
                header('location:../Views/EspaceStagiaire.html');
            } else {
                echo "Erreur lors de l'inscription.";
            }
        } catch (Exception $e) {
          $msg = "Erreur : " . $e->getMessage();
        }
    }
}
?>
