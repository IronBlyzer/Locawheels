<?php
    require_once("connection.php");
    session_start();

    $user_id = $_SESSION["user_id"];
    $query2 = "SELECT nom ,prenom FROM utilisateur WHERE id = :user_id";
    $stmt = $db->prepare($query2);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
  

if (isset($_POST['type']) && isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['prix_location']) && isset($_FILES['img'])) {
    $type = $_POST["type"];
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $prix_location = $_POST["prix_location"];
    
    // Traitement de l'image
    $image = $_FILES['img']['tmp_name'];
    $img_data = file_get_contents($image);

    $query = $db->prepare("INSERT INTO produit (type, nom, description, prix_location, img ,id_proprietaire) VALUES (:type, :nom, :description, :prix_location, :img ,:propri)");
    $query->execute([
        "type" => $type,
        "nom" => $nom,
        "description" => $description,
        "prix_location" => $prix_location,
        "img" => $img_data,
        "propri" => $user_id
    ]);

    header("Location: ..\index.php");
}
?>