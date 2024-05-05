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
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header('location: LogIn-client.php');
    exit;
}

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    // Utilisateur connecté, récupérez son ID de client
    $clientId = $_SESSION['clientId'];

    // Requête SQL pour récupérer les informations du client et de la facture correspondante
    $req = "SELECT c.Num_Client, c.nom, c.prenom, c.adresse,c.rib, f.Num_facture, f.Num_contrat, f.Montant, f.statut_paiement
    FROM client c 
    INNER JOIN facture f ON c.Num_Client = f.Num_Client 
    WHERE c.Num_Client = $clientId";
$result=mysqli_query($cnx,$req);

    // Affichage des informations du client et de la facture
    echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Dashboard</title>
    <link rel=\"stylesheet\" href=\"facture.css\">
</head>
<body>
    <h1>Vos Statistiques</h1>
    <hr>
   
    <section>
        <h2>Votre Historique de Factures</h2>
        <table border=\"2\">
            <tr>
                <th>Votre Numéro</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Numéro de Facture</th>
                <th>Numéro du Contrat</th>
                <th>numero du relevé d'identité bancaire</th>
                <th>Montant</th>
                <th>Statut du Payement</th>
                <th> Payer votre facture </th>
            </tr>";

    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row["Num_Client"]."</td>";
        echo "<td>".$row["nom"]."</td>";
        echo "<td>".$row["prenom"]."</td>";
        echo "<td>".$row["adresse"]."</td>";
        echo "<td>".$row["Num_facture"]."</td>";
        echo "<td>".$row["Num_contrat"]."</td>";
        echo "<td>".$row["rib"]."</td>";
        echo "<td>".$row["Montant"]."</td>";
        echo "<td>".$row["statut_paiement"]."</td>"; // Afficher le statut de paiement

        if ($row["statut_paiement"] === "payée") {
            echo "<td>Payée</td>";
        } else {
            echo "<td>
                    <form method=\"post\" action=\"update_payment_status.php\">
                        <input type=\"hidden\" name=\"facture\" value=\"" . $row["Num_facture"] . "\">
                        <button type=\"submit\">Payer votre facture</button>
                    </form>
                  </td>";
        }
    // ...
}

    echo "</table>
    </section>
</body>
</html>";

    mysqli_close($cnx);
} else {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header('location: Login-client.php');
    exit;
}
echo "<script>
document.addEventListener('DOMContentLoaded', function() {
    // Récupérez tous les boutons de paiement
    var payButtons = document.querySelectorAll('.pay-btn');

    // Ajoutez un gestionnaire d'événements pour chaque bouton de paiement
    payButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Affichez un message indiquant que la facture a été payée
            alert('Votre facture a été payée avec succès!');
        });
    });
});
</script>";
?>
