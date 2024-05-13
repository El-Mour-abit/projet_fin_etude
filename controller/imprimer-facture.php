<?php
session_start(); // Démarre la session

// Connexion à la base de données
$dbserver = "localhost";
$username = "root";
$password = "";
$db = "projet_fin_etude";
$cnx = mysqli_connect($dbserver, $username, $password, $db);
if (!$cnx) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Vérifier si l'identifiant du client est défini dans la session
if(isset($_SESSION['clientId'])) {
    $clientId = $_SESSION['clientId'];

    // Récupérer la facture pour le client connecté
    $req_facture = "SELECT c.Num_Client, c.nom, c.prenom, c.adresse, f.Num_facture, f.Num_Contrat, f.Montant
                    FROM client c
                    INNER JOIN facture f ON c.Num_Client = f.Num_Client
                    WHERE c.Num_Client = ?";
    $stmt = $cnx->prepare($req_facture);
    $stmt->bind_param("i", $clientId);
    $stmt->execute();
    $result = $stmt->get_result();
    $facture = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            text-align: center;
            font-size: 18px;
        }

        h1, h2 {
            margin-top: 0;
        }

        p {
            margin-bottom: 10px;
        }

        .button-container {
            margin-top: 20px;
        }

        .button-container button {
            padding: 15px 30px;
            font-size: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .button-container button:hover {
            background-color: green;
        }

        /* Style pour cacher le bouton lors de l'impression */
        @media print {
            .hide-on-print {
                display: none;
            }
        }

        /* Style pour rendre la page responsive */
        @media only screen and (max-width: 600px) {
            .button-container button {
                padding: 12px 24px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

    <?php if (isset($facture)): ?>
        <h1>Facture</h1>
        <p>Nom: <?php echo $facture['nom']; ?></p>
        <p>Prénom: <?php echo $facture['prenom']; ?></p>
        <p>Adresse: <?php echo $facture['adresse']; ?></p>
        <p>Numéro de Facture: <?php echo $facture['Num_facture']; ?></p>
        <p>Numéro du Contrat: <?php echo $facture['Num_Contrat']; ?></p>
        <p>Montant: <?php echo $facture['Montant']; ?></p>

        <button class="hide-on-print" onclick="window.print()">Imprimer la facture</button>
    <?php else: ?>
        <p>Aucune facture trouvée pour ce client.</p>
    <?php endif; ?>
</body>
</html>
