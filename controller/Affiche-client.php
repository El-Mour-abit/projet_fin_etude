<?php

$dbserver = "localhost";
$username = "root";
$password = "";
$db = "projet_fin_etude";
$cnx = mysqli_connect($dbserver, $username, $password, $db);
if (!$cnx) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
$req="select * from client";
$result=mysqli_query($cnx,$req);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1{
            text-align:center;
            color:blue;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        @media only screen and (max-width: 600px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            tr {
                margin: 0 0 1rem 0;
            }
            td {
                border: none;
                position: relative;
                padding-left: 50%;
            }
            td:before {
                position: absolute;
                left: 6px;
                content: attr(data-label);
                font-weight: bold;
            }
        }
    </style>
</head>
<body>
<h1>La Liste De Toutes Les Clients </h1>
    <hr>
   
    <section>
        <table border="2">
            <tr>
                <th>Votre Numéro</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Email</th>
                <th>Mot-de-passe</th>
                <th>Releve d'identite bancaire</th>
            </tr>
            <?php
            while($row=mysqli_fetch_assoc($result)){

                echo "<tr>";
                echo "<td>".$row["Num_Client"]."</td>";
                echo "<td>".$row["nom"]."</td>";
                echo "<td>".$row["prenom"]."</td>";
                echo "<td>".$row["adresse"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "<td>".$row["password"]."</td>";
                echo "<td>".$row["rib"]."</td>";
                echo "</tr>";
            }

            

            mysqli_close($cnx);
            ?>
        </table>
    </section>
    
</body>
</html>