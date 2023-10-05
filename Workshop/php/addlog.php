<?php
require_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO utilisateur (prenom, nom, email, password) VALUES (:prenom, :nom, :email, :password_hash)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":prenom", $prenom, PDO::PARAM_STR);
    $stmt->bindParam(":nom", $nom, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":password_hash", $hashed_password, PDO::PARAM_STR);

    if ($stmt->execute()) {
        header("Location: ..\Accueil.php");
        exit();
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>
