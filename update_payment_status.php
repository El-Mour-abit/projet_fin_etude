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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer le numéro de facture envoyé depuis le formulaire
    $factureNum = $_POST['facture'];

    // Assurez-vous de filtrer et valider les données entrantes

    // Mettre à jour le statut de paiement dans la base de données
    $updateQuery = "UPDATE facture SET statut_paiement = 'payée' WHERE Num_facture = ?";
    $stmt = mysqli_prepare($cnx, $updateQuery);
    mysqli_stmt_bind_param($stmt, "s", $factureNum);
    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        // La mise à jour a réussi
        echo "Le paiement de la facture a été effectué avec succès.";
        
    } else {
        // La mise à jour a échoué
        echo "Une erreur s'est produite lors du paiement de la facture.";
    }

    // Fermer la connexion à la base de données
    mysqli_close($cnx);
} else {
    // Si la page est accédée directement sans méthode POST, rediriger ou afficher un message d'erreur
    echo "Accès non autorisé.";
}
if ($success) {
    // La mise à jour a réussi
    echo "<button onclick=\"window.location.href='facture.php';\">Retour au tableau de bord</button>";
} else {
    // La mise à jour a échoué
    echo "Une erreur s'est produite lors du paiement de la facture.";
}
?>
