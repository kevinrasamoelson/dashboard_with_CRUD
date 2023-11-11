<?php
session_start();
include('config.php');

$_SESSION['successMessage'] = '';
$_SESSION['errorMessage'] = '';

// Update voiture
if (isset($_POST['update_voiture'])) {
    // Vérifier si tous les champs obligatoires ont été remplis
    if (empty($_POST['nom']) || empty($_POST['detail']) || empty($_POST['prix']) || empty($_POST['stock'])) {
        $_SESSION['errorMessage'] = 'Veuillez remplir tous les champs obligatoires.';
        header('Location: update_page.php');
        die();
    } else {
        $_SESSION['id'] = $_POST['id'];
        $id = $_SESSION['id'];
        $proprietaire = $_POST['nom'];
        $marque = $_POST['detail'];
        $matricule = $_POST['prix'];
        $stock = $_POST['stock'];

        // Vérifiez si les fichiers ont été correctement téléchargés
        if (isset($_FILES['photo1']['tmp_name'])) {
            $photo1 = file_get_contents($_FILES['photo1']['tmp_name']);
        } else {
            $_SESSION['errorMessage'] = 'Erreur lors du téléchargement des fichiers.';
            header('Location: update_page.php');
            die();
        }

        $stmt = $conn->prepare("UPDATE VOITURE SET NOM = :nom, DETAIL = :detail, PRIX = :prix, STOCK = :stock,  PHOTO1 = :photo1 WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $proprietaire);
        $stmt->bindParam(':detail', $marque);
        $stmt->bindParam(':prix', $matricule);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':photo1', $photo1);
        $stmt->execute();
        $_SESSION['successMessage'] = 'Produits mise à jour avec succès !';
    }         
}
header("Location: index.php");
die();
?>