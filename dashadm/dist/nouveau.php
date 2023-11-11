<?php
session_start();
include('config.php');
if(isset($_SESSION['successMessage'])){
    echo $_SESSION['successMessage'];
    unset($_SESSION['successMessage']);
}
if(isset($_SESSION['errorMessage'])){
    echo $_SESSION['errorMessage'];
    unset($_SESSION['errorMessage']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="nouveau.css">
    <title>Mise a jours des produits</title>

</head>
<body>
     <div class="container">
     <h1 class="text-center">Mise a jours</h1>
    <h2 class="text-center">Creation de nouveau produit</h2>
    <form method="post" action="create.php" enctype="multipart/form-data">
        <label for="nom">Nom du produits :</label>
        <input type="text" name="nom" class="form-control" required><br><br>
        <label for="detail">Details :</label>
        <input type="text" name="detail" class="form-control" required><br><br>
        <label for="prix">Prix du produis :</label>
        <input type="number" name="prix" class="form-control" required><br><br>
        <label for="stock">Nombre de stock :</label>
        <input type="number" name="stock" class="form-control" required><br><br>
        <label for="photo">Photo du produits :</label>
        <input type="file" name="photo1" class="form-control" required><br><br>
        <button type="submit" name="submit_voiture" value="Create" class="btn btn-danger">Cree le produits</button>
    </form>
    <div><a href="index.php" class="btn btn-success mt-2">voir la liste des produits</a></div>
     </div>
</body>
</html>
