
<?php
    require_once("connection.php");
    session_start();


    $user_id = $_SESSION["user_id"];
    $query2 = "SELECT nom ,prenom FROM utilisateur WHERE id = :user_id";
    $stmt = $db->prepare($query2);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);



?>


<!DOCTYPE html5>
<html>
    <head>
        <meta charset="UTF-8">
        <title>LOCAWHEELS</title>
        <link rel="stylesheet" href="..\css\style_create.css">
        <link rel="icon" href="..\image\logoB.jpg" type="image/x-icon">
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
        <a href="">
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
<main>

    <div class="section">
        <div class="title">
            <img src="..\image\aa.png" alt="">
        </div>

        <div class="mini-section">
            <p class=""> Tous les champs sont oligatoires</p><br>
            <form action="upload.php" method="post" enctype="multipart/form-data"> 
                    <div class="txt-annonce"> 
 
                        <label for="type">Type du véhicule:</label>
                        <div>
                            <select class="List" name="type" id="type" required>
                                <option valeur="velo">Vélo</option>
                                <option valeur="trottinette">Trottinette</option>
                                <option valeur="skateboard">Skateboard</option>
                                <option valeur="monocycle">Monocycle</option>
                                <option valeur="roller">Roller</option>
                                <option valeur="poussette">Poussette</option>
                                <option valeur="autre">Autre</option>
                            </select>                              
                        </div>
                          
                    





                    </div>
                    <div>
                        <label for="nom"> Nom du véhicule: </label>
                        <div class="txt-annonce">
                        <input type="text" name="nom" id="nom" placeholder="Entrez le nom du véhicule" required/><br/><br/>                        
                        </div>                        
                    </div>




                    <label for="description"> Description du véhicule: </label><br>
                    <div>
                        <textarea class="List-txt" type="longtext" name="description" id="description" placeholder="Entrez la descrition"required></textarea><br/><br/>
                    </div>

                    <label for="prix_location"> Prix du véhicule: </label><br>
                    <div>
                        <input class="List-txt" type="text" name="prix_location" id="prix_location" placeholder="Entrez le prix du véhicule" required/><br/><br/>    
                    </div>
                    


    
                    <input type="file" name="img" accept="image/*"required><br><br>
                   <div class="validation">
                    <button class="pub" type="submit" class="bu">PUBLIER</button>                    
                   </div>

            </form>
        </div>        
    </div>
        

    </main>


    </body>
</html>