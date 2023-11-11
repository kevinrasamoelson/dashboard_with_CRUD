
<?php
include('config.php');
session_start();

$_SESSION['successMessage'] = '';
$_SESSION['errorMessage'] = '';

if (isset($_POST['submit_voiture'])) {
    // Vérifier si tous les champs obligatoires ont été remplis
    if (empty($_POST['nom']) || empty($_POST['detail']) || empty($_POST['prix']) || empty($_FILES['photo1']['tmp_name'])) {
        $_SESSION['errorMessage'] = 'Veuillez remplir tous les champs obligatoires.';
    } else {
        $proprietaire = $_POST['nom'];
        $marque = $_POST['detail'];
        $matricule = $_POST['prix'];
        $photo1 = file_get_contents($_FILES['photo1']['tmp_name']);

        try {
            $stmt = $conn->prepare("INSERT INTO VOITURE (NOM, DETAIL, PRIX, PHOTO1) VALUES (:nom, :detail, :prix, :photo1)");
            $stmt->bindParam(':nom', $proprietaire);
            $stmt->bindParam(':detail', $marque);
            $stmt->bindParam(':prix', $matricule);
            $stmt->bindParam(':photo1', $photo1, PDO::PARAM_LOB);
            $stmt->execute();
            $_SESSION['successMessage'] = 'Voiture créée avec succès !';
        } catch (PDOException $e) {
            $_SESSION['errorMessage'] = 'Erreur lors de l\'insertion dans la base de données: ' . $e->getMessage();
        }
    }
}

header("Location: index.php");
exit;

?>
