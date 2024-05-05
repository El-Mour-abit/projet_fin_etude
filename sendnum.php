<?php
session_start();
if (isset($_POST['btnvalide'])) {
    $num = $_POST['number'];
    $_SESSION['numéro_s'] = $num;
    header('Location: AdminVérification.php');
    // header('Location: AfficheInfoStagiaireAdmin.php');
    exit(); 
}
?>
