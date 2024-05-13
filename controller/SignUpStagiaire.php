<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'projet_fin_etude';
$con = mysqli_connect($servername, $username, $password, $dbname) or die('could not connect to database');

// SIGNUP CLIENT
if (isset($_POST['submit'])) {
    $signup_num = $_POST['signup-num'];
    $signup_nom = $_POST['signup-nom'];
    $signup_prenom = $_POST['signup-prenom'];
    $signup_email = $_POST['signup-email'];
    $signup_dateN = $_POST['signup-dateN'];
    $signup_password = $_POST['signup-password'];

    if ($signup_prenom == '' || $signup_nom == '' || $signup_dateN == '' || $signup_email == '') {
        echo "error!!!!";
    } else {
        $sql = "SELECT ID_Stagiaire FROM stagiaire WHERE ID_Stagiaire = '$signup_num'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            header("Location:SignUp-Stagiaire.php");
            $_SESSION['signup_message'] = '
                <script>
                  swal({
                    title: "this numéro déga existe",
                    text: "merci de sisaire un autre numéro",
                    icon: "warning",
                  });
                </script>
              ';
        } else {
            $add = "INSERT INTO stagiaire (ID_Stagiaire,nom, prenom, email, date_naissance, password) VALUES ($signup_num ,'$signup_nom','$signup_prenom','$signup_email','$signup_dateN','$signup_password')";
            $res = mysqli_query($con, $add);

            if ($res) {
                $_SESSION["nom"] = $signup_nom;
                header("Location:demande-stage.php");
            } else {
                echo "Erreur lors de l'inscription.";
            }
        }
    }
}
