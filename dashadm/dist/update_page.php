<?php
include("config.php");
session_start();
if(isset($_SESSION['successMessage'])){
    echo $_SESSION['successMessage'];
    unset($_SESSION['successMessage']);
}
if(isset($_SESSION['errorMessage'])){
    echo $_SESSION['errorMessage'];
    unset($_SESSION['errorMessage']);
}
if(isset($_POST['id'])){
    $_SESSION['id']=$_POST['id'];
}

if(isset($_SESSION['id'])){
    $id= $_SESSION['id'];
    $stmt = $conn->prepare("SELECT * FROM VOITURE where ID = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $voitures = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="update.css">
    <title>Modification des produits</title>
</head>
<body>
    <div class="container">
    <h1 class="text-center">Modification Produits</h1>
    <?php foreach ($voitures as $voiture): ?>
    <form method="post" action="update.php" enctype="multipart/form-data">
        <input type="hidden" name="id" class="form-controll" value="<?php echo $voiture['ID']; ?>">
        <label for="nom" class="form-label">Nom du produits </label>
        <input type="text" name="nom" class="form-controll" value="<?php echo $voiture['NOM']; ?>" required>
        <label for="detail" class="form-label">Details</label>
        <input type="text" name="detail" class="form-controll" value="<?php echo $voiture['DETAIL']; ?>" required>
        <label for="prix" class="form-label">Prix</label>
        <input type="number" name="prix" class="form-controll" value="<?php echo $voiture['PRIX']; ?>" required>
        <label for="stock" class="form-label">Stock</label>
        <input type="number" name="stock" class="form-controll" value="<?php echo $voiture['STOCK']; ?>" required>
        <label for="photo" class="form-label">Photo du produits</label>
        <input type="file" name="photo1" class="form-controll" required>
        <button type="submit" name="update_voiture" value="Update" class="btn btn-danger">Modifie</button>
    </form>
    <?php endforeach; ?>
    </div>
    
    
</body>
</html>