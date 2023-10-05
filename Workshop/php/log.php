<?php

require_once("connection.php");
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];


    $query = "SELECT id, email, password FROM utilisateur WHERE email = :email";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {

        $_SESSION["user_id"] = $user["id"];

        
        header("Location: ..\index.php");
        exit();
    } else {
        echo "Échec de la connexion. Vérifiez vos informations d'identification. Vous allez étre rediriger dans 5 secondes.";
        echo '<script>
            setTimeout(function() {
                window.location.href = "Loginpage.php";
            }, 5000);
        </script>';
    }
}
?>
