<?php
  require_once("php\connection.php");
  session_start();

	$query = $db->query("SELECT * FROM produit");
    $articles = $query->fetchAll();


  $user_id = $_SESSION["user_id"];
  $query2 = "SELECT nom ,prenom FROM utilisateur WHERE id = :user_id";
  $stmt = $db->prepare($query2);
  $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css\style_accueil.css" />
    <link rel="icon" href="image\logoB.jpg" type="image/x-icon">
    <title>LOCAWHEELS</title>
  </head>

  <header>
    <div class="component">
        <a href="index.php">
            <div>
                <img class="calque" src="image\logo.png" />
                <img class="LOCAWHEELS" src="image\LOCAWHEELS.png" />
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
                header("Location: php\Loginpage.php");
                exit();
                }
                ?>
                </div>
              </div>
          </div>
        
        <div>
              
        </div>
        <a href="php\logout.php">
            <div class="div">DECONNEXION</div>
        </a>
        <a href="index.php">
            <img class="la-mobilit-facilit" src="..\image\la-mobilit-facilit.png" />
        </a>
        <a href="php\Create.php">
            <div class="group-3">
            <div class="text-wrapper-2">AJOUTER UN ARTICLE</div>
            <img class="vector" src="image\plus.jpg" />
            </div>
        </a>
        <div class="overlap-wrapper">
          <div class="overlap">
                <input class="rectangle" type="text" placeholder="Rechercher">
                <a href="#"><img class="loupe" src="image\loupe.jpg" alt="Icône de recherche"></a>
          </div>
        </div>
      </div>
  </header>

  <body>
    <div class="label"><img class="CHOOSE-YOUR-TEAM" src="image\cyt.png" /></div>
    <div class="box">
        <div class="group">
          <a href="#">
            <div class="overlap">
              <div class="text-wrapper">SKATEBOARD</div>
              <img class="vector" src="image\dessin-skate.jpg" />
            </div>
          </a>
          <a href="#">
            <div class="overlap-group">
              <div class="div">MONOCYCLE</div>
              <img class="img" src="image\dessin-mono.jpg" />
            </div>            
          </a>
          <a href="">
            <div class="overlap-2">
              <div class="text-wrapper-2">ROLLER</div>
              <img class="calque" src="image\dessin-roller.jpg" />
            </div>
          </a>
          <a href="#">
            <div class="overlap-3">
              <div class="text-wrapper-3">TROTINETTE</div>
              <div class="rectangle"></div>
              <img class="group-2" src="image\dessin-trot.jpg" />
            </div>            
          </a>
          <a href="#">
            <div class="overlap-4">
              <div class="text-wrapper-4">POUSSETTE</div>
              <div class="rectangle"></div>
              <img class="vector-2" src="image\dessin-poussette.jpg" />
            </div>            
          </a>
          <a href="#">
            <div class="overlap-group-wrapper">
              <div class="overlap-group-2">
                <img class="vector-5" src="image\dessin-velo.jpg" />
                <div class="text-wrapper-5">VELO</div>
              </div>            
          </a>
          </div>
        </div>
      </div>
      <div class="label"><img class="CHOOSE-YOUR-PLAYER" src="image\cyp.jpg" /></div>
      <div class="cont">
        <div class="box2">
        <?php foreach($articles as $article){ ?> 
          <div class="div">
            <div class="overlap-4">
              <div class="group-9">
                <div class="overlap-group">
                  <p class="p">
                    <span class="text-wrapper"><?php echo $article["nom"]; ?><br /></span> <span class="span">Bordeaux (33)</span>
                  </p>
                  <div class="div-wrapper">
                    <div class="overlap-group-2"><div class="text-wrapper-3"> <?php echo $article["prix_location"]; ?>€/jr</div></div>
                  </div>
                  <a href="php\Read.php?id=<?php echo $article["id"]; ?>"><button class="overlap-group-3"><div class="text-wrapper-4">LOUER CET ARTICLE</div></button></a>
                  <img class="velo-de-ville-elops" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode ($article["img"]); ?>" />
                </div>
              </div>
              <img class="group-10" src="image\Group 11.jpg" />
            </div>
          </div> 
        <?php } ?>      
        </div>
      </div>
  </body>
</html>
