<?php
require_once 'Database.php';
require_once 'User.php';

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'pharmacie';

$db = new Database($hostname, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $newPassword = $_POST["new_password"];
    $user = new User('nom', 'lieu', $email, 'password', 'confi_psr', $newPassword, $db);
    $user->resetPassword($email, $newPassword);
}

?>

<!DOCTYPE html>
<html>

<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="email">Entrez votre adresse e-mail :</label><br>
        <input type="text" id="email" name="email"><br><br>

        <label for="new_password">Nouveau mot de passe :</label><br>
        <input type="password" id="new_password" name="new_password"><br><br>

        <input type="submit" value="Réinitialiser le mot de passe">
    </form>

</body>

</html>