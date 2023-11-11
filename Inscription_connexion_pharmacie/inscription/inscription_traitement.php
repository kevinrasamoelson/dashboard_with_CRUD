<?php
require_once 'Database.php';
require_once 'User.php';

if (isset($_POST['register'])) {
    $db = new Database();
    $user = new User($_POST['nom'], $_POST['lieu'], $_POST['email'], $_POST['password'],$_POST['confi_psr'], '', $db); // Ajout d'une chaîne vide pour le nouveau mot de passe
    if($_POST['password'] === $_POST['confi_psr'] ){
        $user->register();
    } else {
        echo 'Erreur, veuillez confirmer correctement votre mot de passe.';
    }
}
?>
