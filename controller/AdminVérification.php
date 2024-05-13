<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 50px;
            margin-left: 450px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            margin: 25px 0;
        }

        .info-label {
            font-weight: bold;
        }

        .p {
            margin-left: 320px;
        }

        #btn {
            margin-left: 650px;
        }

        h2 {
            font-size: 35px;
            font-weight: 600;
            margin: 25px;
            visibility: visible;
        }

        #botton {
            margin-left: 180vh;
        }

        a {
            color: black;
        }

        a:hover {
            text-decoration: none;
            color: black;
        }

        .div {
            margin-left: 480px;
        }
        .div>input {
            border: white;
            border-radius: 10px;
            width: 200px;
            padding: 10px;
            margin: 10px;
        }
        input {
            border: white;
            border-radius: 10px;
            width: 200px;
            padding: 10px;
            margin: 10px;
        }
    </style>
</head>

<body>
    <!-- header start -->

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="http://www.onep.ma/"><img src="images/logoONEP.jpg" alt="ONEEP" width="30px" height="30px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="../views/Home.html">Acceuil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../views/AboutUs.html">Apropos-de-nous</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../views/EspaceClient.html">Espace Client</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../views/EspaceStagiaire.html">Espace Stagiaire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../views/ContactUs.html"">contactez-nous</a>
          </li>
          <li class=" nav-item ">
                            <a class="nav-link " href="LogInAdmin.php"">Administrateur</a>
          </li>
        </ul>
        <form class=" form-inline my-2 my-lg-0">
                                <a href="AboutUs.html" class="no-text-decoration btn btn-outline-dark my-2 my-sm-0">Learn More</a></button>
                                </form>
            </div>
        </nav>
    </header>
    <!-- header end -->
    <h1>Informations Stagiaire et Demande de Stage</h1>
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
$sql = "SELECT s.ID_Stagiaire, s.nom, s.prenom, s.email, s.date_naissance, d.ID_Demande, d.Texte 
        FROM stagiaire s 
        INNER JOIN demande_stage d ON s.ID_Stagiaire = d.ID_Stagiaire 
        WHERE s.ID_Stagiaire = " . $_SESSION['numéro_s'];



$resultat = mysqli_query($connexion, $sql);

if (mysqli_num_rows($resultat) > 0) {
    while ($ligne = mysqli_fetch_assoc($resultat)) {
?>
        <main>
        <h1>Informations de stage</h1>
        <div>
            <p>ID Stagiaire: <?php echo $ligne['ID_Stagiaire']; ?></p>
            <p>Nom: <?php echo $ligne['nom']; ?></p>
            <p>Prénom: <?php echo $ligne['prenom']; ?></p>
            <p class="p">Email: <?php echo $ligne['email']; ?></p>
            <p class="p">Date de naissance: <?php echo $ligne['date_naissance']; ?></p>
            <p><?php echo $ligne['Texte']; ?></p>
        </div>
    </main>
    <?php
    $etate = "ETATE";
    if(isset($_POST['vérifier'])) {
        $etate = $_POST['etate'];
        $_SESSION['etate'] = $etate;
    }
    elseif(isset($_SESSION['etate'])) {
        $etate = $_SESSION['etate'];
    }
?>
<form action="#" method="POST">
    <input type="text" placeholder="Etate" name="etate" value="<?php echo $etate; ?>">
    <button type="submit" name="vérifier" class="btn btn-outline-dark my-2 my-sm-0">Valider</button>
</form>
<h2 class="text-dark" id="h2">État de votre commande : <span class="text-info"><?php echo $etate?></span></h2>

<?php
    }
} else {
    echo "Aucun résultat trouvé.";
}

// Fermer la connexion
mysqli_close($connexion);
?>
