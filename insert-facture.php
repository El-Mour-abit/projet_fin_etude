<?php
session_start(); // Démarre la session

$dbserver="localhost";
$username="root";
$password="";
$db="projet_fin_etude";
$cnx=mysqli_connect($dbserver,$username,$password,$db);
if(!$cnx){
    die("erreur cnx :".mysqli_connect_error());
}

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    // Vérifiez si le formulaire a été soumis
    if(isset($_POST['btn'])) {
        // Récupérez les données soumises par le formulaire
        $num_client = $_POST['num1'];
        $nom_client = $_POST['nom'];
        $prenom_client = $_POST['prenom'];
        $adresse_client = $_POST['adresse'];
        $num_contrat = $_POST['num2'];
        $rib = $_POST['num3'];
        $montant = $_POST['num4'];

        // Requête SQL pour insérer les données dans la table des factures
        $insert_query = "INSERT INTO facture (Num_Client, Num_contrat, Montant) VALUES ('$num_client', '$num_contrat', '$montant')";
        
        // Exécutez la requête
        $insert_result = mysqli_query($cnx, $insert_query);

        // Vérifiez si l'insertion a réussi
        if($insert_result) {
            // Redirigez vers la page facture.php pour afficher les informations mises à jour
            header('location: Affiche-client.php');
            exit;
        } else {
            echo "Erreur lors de l'insertion de la facture.";
        }
    }
} else {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header('location: Login-client.php');
    exit;
}

mysqli_close($cnx);
?>
