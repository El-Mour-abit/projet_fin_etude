<?php
    session_start();
   $servername = 'localhost';
   $username = 'root';
   $password = '';
   $dbname = 'projet_fin_etude';
   $con = mysqli_connect($servername,$username,$password,$dbname) or die('could not connect to database');
//  LOGIN stagiaire

if(isset($_POST['submit'])) {
    $num = $_POST['num'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $req = "SELECT * FROM stagiaire WHERE ID_Stagiaire = '$num' AND nom = '$nom' AND password = '$password'";
    if($num == '' || $nom == '' || $password == '' ) {
        echo '<script>alert("Veuillez remplir tous les champs")</script>';
    } else{
        $res = mysqli_query($con, $req);
        $count = mysqli_num_rows($res);
        if ($count !=1){
            header('location:LogIn-Stagiaire.php');
            $_SESSION['login_message'] = '
            <script>
              swal({
                title: "LogIn Or Password Inccorect",
                text: "Please Try Agian",
                icon: "warning",
              });
            </script>
          ';
        }else{
            while($row=mysqli_fetch_assoc($res)){
                session_start();
                $_SESSION['num'] = $num;
                $_SESSION["nom"]=$nom;
                header("Location:AfficheInfoStagiaire.php");
            }
        }
    }
  }
?>