<?php
session_start(); // Démarre la session

$dbserver = "localhost";
$username = "root";
$password = "";
$db = "projet_fin_etude";
$cnx = mysqli_connect($dbserver, $username, $password, $db);
if (!$cnx) {
    die("erreur cnx :" . mysqli_connect_error());
}

$nom = $_POST['firstname'];
$prenom = $_POST['lastname'];
$adresse = $_POST['street'];
$email = $_POST['mail'];
$code = $_POST['code'];
$numero1 = $_POST['num1'];
$numero2=$_POST['num2'];
$_SESSION['nom'] = $nom;
$errors = []; // Initialise le tableau pour stocker les messages d'erreur

// Vérification si le mot de passe est déjà utilisé
$req_verif_password = "SELECT COUNT(*) AS count FROM client WHERE password = '$code'";
$result_verif_password = mysqli_query($cnx, $req_verif_password);
$row_verif_password = mysqli_fetch_assoc($result_verif_password);
if ($row_verif_password['count'] > 0) {
    // Stocke un message d'erreur si le mot de passe est déjà utilisé
    $errors['password'] = "Le mot de passe est déjà utilisé";
}

// Vérification si le numéro de facture est déjà utilisé
$req_verif_facture = "SELECT COUNT(*) AS count FROM facture WHERE Num_contrat = '$numero1'";
$result_verif_facture = mysqli_query($cnx, $req_verif_facture);
$row_verif_facture = mysqli_fetch_assoc($result_verif_facture);
if ($row_verif_facture['count'] > 0) {
    // Stocke un message d'erreur si le numéro de facture est déjà utilisé
    $errors['num1'] = "Le numéro de facture est déjà utilisé";
}

// Début de la transaction
mysqli_begin_transaction($cnx);

// Vérification s'il y a des erreurs
if (!empty($errors)) {
    // Affiche les messages d'erreur juste en dessous des champs correspondants
    foreach ($errors as $field => $error) {
        echo "<p style='color: red;'>$error</p>";
    }
    exit(); // Arrête l'exécution du script si des erreurs sont présentes
}

try {
    // Requête SQL pour insérer les données du nouveau client dans la table client
    $req_client = "INSERT INTO client (nom, prenom, adresse, email, password,rib) VALUES ('$nom', '$prenom', '$adresse', '$email', '$code','$numero2')";
    
    // Exécution de la requête pour insérer les données du client
    if (!mysqli_query($cnx, $req_client)) {
        throw new Exception("Erreur lors de l'insertion des données du client : " . mysqli_error($cnx));
    }

    // Récupération de l'ID du client nouvellement inséré
    $client_id = mysqli_insert_id($cnx);

    // Requête SQL pour insérer les données de facture avec l'ID du client
    $req_facture = "INSERT INTO facture (Num_Client, Num_contrat) VALUES ('$client_id', '$numero1')";
    
    // Exécution de la requête pour insérer les données de facture
    if (!mysqli_query($cnx, $req_facture)) {
        throw new Exception("Erreur lors de l'insertion des données de facture : " . mysqli_error($cnx));
    }

    // Validation de la transaction
    mysqli_commit($cnx);

    // Requête SQL pour récupérer les informations du client nouvellement inscrit
    $req_info_client = "SELECT * FROM client WHERE Num_Client = $client_id";
    $result_info_client = mysqli_query($cnx, $req_info_client);
    $info_client = mysqli_fetch_assoc($result_info_client);

    // Stockage des informations du client dans la session
    $_SESSION['loggedin'] = true;
    $_SESSION['clientId'] = $client_id;
    $_SESSION['clientInfo'] = $info_client;

    // Redirection vers le tableau de bord après une inscription réussie
    header("location: facture.php");
    exit();
} catch (Exception $e) {
    // En cas d'erreur, annuler la transaction et afficher un message d'erreur
    mysqli_rollback($cnx);
    echo "Erreur lors de l'inscription : " . $e->getMessage();
}

// Fermeture de la connexion
mysqli_close($cnx);
?>
