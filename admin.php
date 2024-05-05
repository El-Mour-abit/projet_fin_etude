
<?php
    session_start();
       $servername = 'localhost';
       $username = 'root';
       $password = '';
       $dbname = 'projet_fin_etude';
       $con = mysqli_connect($servername,$username,$password,$dbname) or die('could not connect to database');
    
      // SIGNUP CLEINT
      if(isset($_POST['submit'])) {
        $nom= $_POST['nom'];
        $password = $_POST['password'];
        $req = "SELECT * FROM admin WHERE nom = '$nom' AND mot_de_passe = '$password'";
        if($nom == '' || $password == '' ) {
            echo '<script>alert("Veuillez remplir tous les champs")</script>';
        } else{
            $res = mysqli_query($con, $req);
            $count = mysqli_num_rows($res);
            if ($count !=1){
              header('location:LogInAdmin.php');
                $_SESSION['signup_message'] = '
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
                    $_SESSION["nom"]=$nom;
                    header("Location:afficheAdmin.php");
                }
            }
        }
    }
?>