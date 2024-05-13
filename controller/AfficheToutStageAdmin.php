<?php
    session_start();
    $serveur = "localhost"; 
    $utilisateur = "root"; 
    $motDePasse = ""; 
    $baseDeDonnees = "projet_fin_etude"; 
    $connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
    if (!$connexion) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }
    $sql = "SELECT s.*, d.* 
            FROM stagiaire s 
            INNER JOIN demande_stage d ON s.ID_Stagiaire = d.ID_Stagiaire";

    $resultat = mysqli_query($connexion, $sql);

    if (mysqli_num_rows($resultat) > 0) {
        while ($ligne = mysqli_fetch_assoc($resultat)) {
            ?>
            <h2>Informations Stagiaire :</h2>
            <p><strong>Nom :</strong> <?php echo $ligne['nom']; ?></p>
            <p><strong>Prénom :</strong> <?php echo $ligne['prenom']; ?></p>
            <p><strong>Email :</strong> <?php echo $ligne['email']; ?></p>
            <p><strong>Date de Naissance :</strong> <?php echo $ligne['date_naissance']; ?></p>
            <h2>Demande de Stage :</h2>
            <p><strong>ID Demande :</strong> <?php echo $ligne['ID_Demande']; ?></p>
            <p><strong>Texte :</strong> <?php echo $ligne['Texte']; ?></p>
            <hr> <!-- Séparateur entre les informations de chaque stagiaire -->
            <?php
        }
    }else {
        echo "Aucun résultat trouvé.";
    }

    // Fermer la connexion
    mysqli_close($connexion);
    ?>