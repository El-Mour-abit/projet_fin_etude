<?php
session_start();
   $servername = 'localhost';
   $username = 'root';
   $password = '';
   $dbname = 'projet_fin_etude';
   $con = mysqli_connect($servername,$username,$password,$dbname) or die('could not connect to database');

  // SIGNUP CLEINT
  if(isset($_POST['stage_submit'])) {
    $stage_nom= $_POST['stage-nom'];
    $stage_prenom = $_POST['stage-prenom'];
    $stage_demande = $_POST['stage-demande'];
    $stage_num = $_POST['stage-num'];
    $add = "INSERT INTO demande_stage (nom, prenom,Texte,ID_Stagiaire) VALUES ('$stage_nom', '$stage_prenom','$stage_demande','$stage_num')";
    if($stage_nom == '' || $stage_prenom == '' || $stage_demande == ''){
      echo "Vous devez remplir tout les champs";
    } else{
    $res = mysqli_query($con, $add);
    if ($res) {
        $_SESSION['login_success_message'] = '
          <script>
            swal({
              title: "merci pour votre demande",
              text: "Nous le vérifierons dès que possible",
              icon: "success",
            });
          </script>
        ';
    }
  }
}

?>