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
    $add = "INSERT INTO demande_stage (nom, prenom,Texte) VALUES ('$stage_nom', '$stage_prenom','$stage_demande')";
    if($stage_nom == '' || $stage_prenom == '' || $stage_demande == ''){
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