<?php
require_once 'Database.php';

class User
{
    private $nom;
    private $lieu;
    private $email;
    private $password;
    private $confi_psr;
    private $new_password;
    private $db;

    public function __construct($nom, $lieu, $email, $password, $confi_psr, $new_password, $db)
    {
        $this->nom = $nom;
        $this->lieu = $lieu;
        $this->email = $email;
        $this->password = $password;
        $this->confi_psr = $confi_psr;
        $this->new_password = $new_password;
        $this->db = $db;
    }

    public function register()
    {
        $sql = "INSERT INTO pharmacien (nom, lieu, email, password) VALUES ('$this->nom', '$this->lieu', '$this->email', '$this->password')";
        if ($this->db->connection->query($sql) === TRUE) {
            echo "Inscription Réussie";
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->connection->error;
        }
    }

    public function login()
    {
        $sql = "SELECT * FROM pharmacien WHERE email = '$this->email' AND password = '$this->password'";
        $result = $this->db->connection->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function resetPassword($email, $newPassword)
    {
        $sql = "UPDATE pharmacien SET password = '$newPassword' WHERE email = '$email'";
        if ($this->db->connection->query($sql) === TRUE) {
            echo "Le mot de passe a été réinitialisé avec succès.";
        } else {
            echo "Erreur lors de la réinitialisation du mot de passe: " . $this->db->error;
        }
    }
}
?>
