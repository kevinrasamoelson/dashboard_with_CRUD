<?php
require_once 'Database.php';
require_once 'User.php';

if (isset($_POST['login'])) {
    $db = new Database();
    $user = new User('', '', $_POST['email'], $_POST['password'], '', '', $db);
    if ($user->login()) {
        session_start();
        header('Location: dash.php');
        exit();
    } else {
        echo "Vérifiez bien votre adresse email ou votre mot de passe";
        header('Location: Login.php');
        exit();
    }
}
?>
