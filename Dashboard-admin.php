<?php
$dbserver = "localhost";
$username = "root";
$password = "";
$db = "projet_fin_etude";
$cnx = mysqli_connect($dbserver, $username, $password, $db);
if (!$cnx) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
// Récupération du nombre de clients
$reqClients = "SELECT COUNT(*) AS totalClients FROM client";
$resultClients = mysqli_query($cnx, $reqClients);
$rowClients = mysqli_fetch_assoc($resultClients);
$totalClients = $rowClients['totalClients'];

// Récupération du nombre de factures
$reqFactures = "SELECT COUNT(*) AS totalFactures FROM facture";
$resultFactures = mysqli_query($cnx, $reqFactures);
$rowFactures = mysqli_fetch_assoc($resultFactures);
$totalFactures = $rowFactures['totalFactures'];

// Récupération du nombre de stagiaires
$reqStagiaires = "SELECT COUNT(*) AS totalStagiaires FROM demande_stage";
$resultStagiaires = mysqli_query($cnx, $reqStagiaires);
$rowStagiaires = mysqli_fetch_assoc($resultStagiaires);
$totalStagiaires = $rowStagiaires['totalStagiaires'];

mysqli_close($cnx);


?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Dark UI - Bank dashboard concept</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./Dashboard-Admin.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="app">
<h1>Statistiques</h1>
    <div class="statistics">
        <div class="statistic">
            <h2>Nombre de clients</h2>
            <p><?php echo $totalClients; ?></p>
        </div>
        <div class="statistic">
            <h2>Nombre de stagiaires</h2>
            <p><?php echo $totalStagiaires; ?></p>
        </div>
        <div class="statistic">
            <h2>Nombre de factures</h2>
            <p><?php echo $totalFactures; ?></p>
        </div>
      </div>
	<div class="app-body">
		<div class="app-body-navigation">
			<nav class="navigation">
				<a href="#">
					<i class="ph-browsers"></i>
					<span>Dashboard</span>
				</a>
				<a href="Affiche-facture.php">
					<i class="ph-check-square"></i>
					<span name="afficher">Historique des factures</span>
				</a>
				<a href="Ajouter-facture.php">
					<i class="ph-swap"></i>
					<span>Ajouter une facture</span>
				</a>
				<a href="afficheAdmin.php">
					<i class="ph-file-text"></i>
					<span>Voir tous les demandes de stage </span>
				</a>
				<a href="Affiche-client.php">
					<i class="ph-globe"></i>
					<span>Afficher tous les clients</span>
				</a>
				<a href="#">
					 <!-- Bouton de déconnexion -->
    				<form action=LogInAdmin.php method=post>
        			<button type=submit>Déconnexion</button>
    				</form>
				</a>

			</nav>
			
		</div>
	<div class="ligne" style="width: 2px;height: 400px;background-color: black;"></div>
		
	</div>
</div>
<!-- partial -->
  <script src='https://unpkg.com/phosphor-icons'></script><script  src="./script.js"></script>

</body>
</html>
