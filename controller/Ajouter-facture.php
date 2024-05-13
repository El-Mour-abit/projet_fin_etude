<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../views/Ajouter-facture.css">
</head>
<body>
    <h1>Ajouter une facture</h1>
    <hr>
    <section>
        <form action="insert-facture.php" method="post">
            <label for="num1">Numero du client:</label>
            <input type="Number" name="num1" required ><br>
            <label for="nom">Nom du client:</label>
            <input type="text" name="nom" required ><br>
            <label for="prenom">Prenom du client:</label>
            <input type="text" name="prenom" required ><br>
            <label for="adresse">Adresse du client:</label>
            <input type="text" name="adresse" required ><br>
            <label for="num2">Numero du contrat:</label>
            <input type="Number" name="num2" required ><br>
            <label for="num3">Numero du releve d'identite bancaire:</label>
            <input type="Number" name="num3" required ><br>
            <label for="num4">Montant du client:</label>
            <input type="text" name="num4" required ><br>
            <button type="submit" name="btn">Ajouter</button>
            
        </form>
    </section>

    
</body>
</html>