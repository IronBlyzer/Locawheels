<?php
require_once("connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hachez le mot de passe avec BCRYPT
    $mdpcrypter = password_hash($password, PASSWORD_BCRYPT);

    // Utilisez une déclaration préparée pour insérer les données
    $sql = "INSERT INTO utilisateur (prenom, nom, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $prenom, $nom, $email, $mdpcrypter);

    if ($stmt->execute()) {
        echo "Inscription réussie.";
        header('Location: ..\index.php');
    } else {
        echo "Erreur lors de l'inscription : " . $stmt->error;
    }

    // Fermez la déclaration et la connexion
    $stmt->close();
    $conn->close();
}
?>

