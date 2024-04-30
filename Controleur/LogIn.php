<?php
   $servername = 'localhost';
   $username = 'root';
   $password = '';
   $dbname = 'projet_fin_etude';
   $con = mysqli_connect($servername,$username,$password,$dbname) or die('could not connect to database');
//  LOGIN stagiaire
if(isset($_POST['login_submit'])) {
    $login_nom = $_POST['login-nom'];
    $login_password = $_POST['login-password'];
    $req = "SELECT * FROM stagiaire WHERE nom = '$login_nom' AND password = '$login_password'";
    if($login_nom == '' || $login_password == '' ) {
        echo '<script>alert("Veuillez remplir tous les champs")</script>';
    } else{
        $res = mysqli_query($con, $req);
        $count = mysqli_num_rows($res);
        if ($count !=1){
            $msgerr1 = '<script>alert("Nom ou mot de passe incorrect")</script>';
        }else{
            session_start();
            while($row=mysqli_fetch_assoc($res)){
                $_SESSION["nom"]=$row["nom"];
                header("Location:../Views/EspaceStagiaire.html");
            }
        }
    }
  }
?>