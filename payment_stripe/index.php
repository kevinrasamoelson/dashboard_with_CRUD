<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de commande</title>
    <style>
        form{
            max-width: 300px;
        }
    </style>
</head>
<body>
    

     <form action="charge.php" method="POST" id="payement-form">
        <div>
            <label for="first-name">First name :</label>
            <input type="text" name="first-name" id="first-name" required>
        </div>

        <div>
            <label for="last-name">Last name :</label>
            <input type="text" name="last-name" id="last-name" required>
        </div>
        <input type="hidden" name ="amount" value="10">
        <div id="card-element">

        </div>
        <div id="card-errors" role="alert">

        </div>
       <button type="submit">Payer</button>
     </form>
     <script src="https://js.stripe.com/v3/"></script>
     <script src="app.js"></script>
</body>
</html>