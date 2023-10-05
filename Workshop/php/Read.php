<?php
require_once("connection.php");
session_start();


    if(!isset($_GET["id"])){
        header("Location: ..\index.php");
    }

    $query = $db->prepare("SELECT * FROM produit WHERE id= :id");
    $query->execute([
        "id" => $_GET["id"]
    ]);

    $article = $query->fetch();

    $query7 = "SELECT utilisateur.nom AS nom_utilisateur, utilisateur.prenom AS prenom_utilisateur
    FROM produit
    INNER JOIN utilisateur ON produit.id_proprietaire = utilisateur.id
    WHERE produit.id = :id;";
    $stmt2 = $db->prepare($query7);
    
    $stmt2->execute([
        "id" => $_GET["id"]
    ]);
    $row = $stmt2->fetch(PDO::FETCH_ASSOC);


    
    $user_id = $_SESSION["user_id"];
    $query2 = "SELECT nom ,prenom FROM utilisateur WHERE id = :user_id";
    $stmt = $db->prepare($query2);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);



      

    if(empty($article)){
        header("Location: ..\index.php");
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\style_read.css" />
    <link rel="icon" href="..\image\logoB.jpg" type="image/x-icon">
    <title>LOCAWHEELS</title>
</head>

<header>
    <div class="component">
        <a href="..\index.php">
            <div>
                <img class="calque" src="..\image\logo.png" />
                <img class="LOCAWHEELS" src="..\image\LOCAWHEELS.png" />
            </div>
        </a>
        <div class="group">
              <div class="overlap-group">
                <div class="text-wrapper">
                <?php
                if ($user) {
                  echo "Bienvenue, " . $user["nom"] ." ". $user["prenom"];
                }
                else {
                // Si l'utilisateur n'est pas connecté, vous pouvez afficher un message ou le rediriger vers la page de connexion
                header("Location: Loginpage.php");
                exit();
                }
                ?>
                </div>
              </div>
          </div>
        
        <div>
              
        </div>
        <a href="logout.php">
            <div class="div">DECONNEXION</div>
        </a>
        <a href="./index.php">
            <img class="la-mobilit-facilit" src="..\image\la-mobilit-facilit.png" />
        </a>
        <a href="Create.php">
            <div class="group-3">
            <div class="text-wrapper-2">AJOUTER UN ARTICLE</div>
            <img class="vector" src="..\image\plus.jpg" />
            </div>
        </a>
        <div class="overlap-wrapper">
          <div class="overlap">
                <input class="rectangle" type="text" placeholder="Rechercher">
                <a href="#"><img class="loupe" src="..\image\loupe.jpg" alt="Icône de recherche"></a>
          </div>
        </div>
      </div>
  </header>

<body>
    <div class="label"><img class="v" src="..\image\v.jpg" /></div>
    <div class="cont">
        <div class="label"><p class="text-wrapper"><?php echo $article["nom"]; ?> </p> </div>
        <div class="label"><p class="text-wrapper-desc"><?php echo $article["description"]; ?> </p></div>
        <div class="box">
            <div class="group">
                <div class="overlap-group">
                <div class="rectangle"></div>
                <div class="text-wrapper"><?php echo $article["prix_location"]; ?>€/jr</div>
        </div>
        <div class="image">
        <img class="velo-de-ville-elops" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode ($article["img"]); ?>" />
        </div>
        <a href="Louer.php"><button class="overlap-group-3"><div class="text-wrapper-4">LOUER CET ARTICLE</div></button></a>
        <div class="box_user">
            <div class="group_user">
                <div class="user-wrapper">
                <p class="user">
                    <span class="text-wrapper_user"><?php  
                        
                        echo $row['nom_utilisateur'] . " ". $row['prenom_utilisateur'] ;
                        
                    
                    ?><br /></span> <span class="span">Bordeaux (33)</span>
                </p>
                </div>
                <div class="overlap-group"><img class="vector" src="..\image\Group 11.jpg" /></div>
            </div>
            </div>
    
</body>
</html>