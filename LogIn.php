<?php
   $servername = 'localhost';
   $username = 'root';
   $password = '';
   $dbname = 'projet_fin_etude';
   $con = mysqli_connect($servername,$username,$password,$dbname) or die('could not connect to database');
//  LOGIN CLIENT
if(isset($_POST['login_submit'])) {
    $login_email = $_POST['login-email'];
    $login_password = $_POST['login-password'];
    $req = "SELECT * FROM client WHERE email = '$login_email' AND password = '$login_password'";
    $reponse = $con->query($req);
    if($reponse->num_rows > 0) {
        header('location:EspaceClient.html');
    }
  }
?>