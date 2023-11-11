<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Ordonnance</title>
</head>
<body>
    <h1>Fomulaire d'ordonnace pour les clients</h1>

    <form action="generer_pdf.php" method="post">
        <label for="name">Nom du clients :</label>
        <input type="text" name="name" id="name">

        <label for="medicament">Ordonnance de medicaments de :</label>
        <input type="text" name="medicament" id="medicament">

        <label for="pharmacie">Sortie par :</label>
        <input type="text" name="pharmacie" id="pharmacie">

        <label for="Date">Fin de consultation :</label>
        <input type="date" name="date" id="date">

        <input type="submit" value="Generer le Facture">
    </form>
    
</body>
</html>