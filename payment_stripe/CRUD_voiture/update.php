<?php
session_start();
include('config.php');

$_SESSION['successMessage'] = '';
$_SESSION['errorMessage'] = '';

// Update voiture
if (isset($_POST['update_voiture'])) {
    // Vérifier si tous les champs obligatoires ont été remplis
    if (empty($_POST['proprietaire']) || empty($_POST['marque']) || empty($_POST['matricule']) || empty($_POST['place'])) {
        $_SESSION['errorMessage'] = 'Veuillez remplir tous les champs obligatoires.';
        header('Location: update_page.php');
        die();
    } else {
        $_SESSION['id'] = $_POST['id'];
        $id = $_SESSION['id'];
        $proprietaire = $_POST['proprietaire'];
        $marque = $_POST['marque'];
        $matricule = $_POST['matricule'];
        $papier = $_POST['papier'];
        $place = $_POST['place'];

        // Vérifiez si les fichiers ont été correctement téléchargés
        if (isset($_FILES['photo1']['tmp_name']) && isset($_FILES['photo2']['tmp_name']) && isset($_FILES['photo3']['tmp_name'])) {
            $photo1 = file_get_contents($_FILES['photo1']['tmp_name']);
            $photo2 = file_get_contents($_FILES['photo2']['tmp_name']);
            $photo3 = file_get_contents($_FILES['photo3']['tmp_name']);
        } else {
            $_SESSION['errorMessage'] = 'Erreur lors du téléchargement des fichiers.';
            header('Location: update_page.php');
            die();
        }

        $stmt = $conn->prepare("UPDATE VOITURE SET PROPRIETAIRE = :proprietaire, MARQUE = :marque, MATRICULE = :matricule, PAPIER = :papier, PHOTO1 = :photo1, PHOTO2 = :photo2, PHOTO3 = :photo3, PLACE = :place WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':proprietaire', $proprietaire);
        $stmt->bindParam(':marque', $marque);
        $stmt->bindParam(':matricule', $matricule);
        $stmt->bindParam(':papier', $papier);
        $stmt->bindParam(':photo1', $photo1);
        $stmt->bindParam(':photo2', $photo2);
        $stmt->bindParam(':photo3', $photo3);
        $stmt->bindParam(':place', $place);
        $stmt->execute();
        $_SESSION['successMessage'] = 'Voiture mise à jour avec succès !';
    }         
}
header("Location: index.php");
die();
?>