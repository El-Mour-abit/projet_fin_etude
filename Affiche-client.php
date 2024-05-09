<?php
$dbserver="localhost";
$username="root";
$password="";
$db="projet_fin_etude";
$cnx=mysqli_connect($dbserver,$username,$password,$db);
if(!$cnx){
    die("erreur cnx :".mysqli_connect_error());
}

if(isset($_POST['submit'])) {
    $num_facture = $_POST['num_facture'];
    $montant = $_POST['montant'];
    
    // Vérifier si le montant est un nombre valide
    if(is_numeric($montant)) {
        // Vérifier si le champ montant est vide pour cette facture
        $check_query = "SELECT Montant FROM facture WHERE Num_facture = $num_facture";
        $check_result = mysqli_query($cnx, $check_query);
        $row = mysqli_fetch_assoc($check_result);
        
        if(empty($row['Montant'])) {
            // Le champ montant est vide, donc on peut insérer le montant
            $update_query = "UPDATE facture SET Montant = $montant WHERE Num_facture = $num_facture";
            mysqli_query($cnx, $update_query);
            echo "Montant inséré avec succès.";
        } else {
            // Le champ montant n'est pas vide, donc l'administrateur ne peut pas insérer de montant
            echo "Le montant pour cette facture est déjà renseigné.";
        }
    } else {
        // Le montant n'est pas un nombre valide
        echo "Le montant doit être un nombre valide.";
    }
}

$req = "SELECT c.Num_Client, c.nom, c.prenom, c.adresse,c.rib, f.Num_facture, f.Num_contrat, f.Montant, f.statut_paiement
    FROM client c 
    INNER JOIN facture f ON c.Num_Client = f.Num_Client";
$result=mysqli_query($cnx,$req);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Affiche-client.css">
</head>
<body>
    <h1>La liste de tous les clients </h1>
    <hr>
   
    <section>
        <table border="2">
            <tr>
                <th>Votre Numéro</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Numéro de Facture</th>
                <th>Numéro du Contrat</th>
                <th>Numéro du relevé d'identité bancaire</th>
                <th>Montant</th>
                <th>Action</th>
            </tr>
            <?php
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
                echo "<td>";
                if(empty($row["Montant"])) {
                    // Afficher le formulaire pour ajouter le montant si le champ est vide
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='num_facture' value='".$row["Num_facture"]."'>";
                    echo "<input type='text' name='montant' placeholder='Entrez le montant'>";
                    echo "<input type='submit' name='submit' value='Ajouter Montant'>";
                    echo "</form>";
                } else {
                    echo "Montant déjà payee";
                }
                echo "</td>";
                echo "</tr>";
            }
            mysqli_close($cnx);
            ?>
        </table>
    </section>
</body>
</html>
