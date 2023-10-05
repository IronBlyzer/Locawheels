
<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="UTF-8">
  <title>LOCAWHEELS</title>
  <link rel="stylesheet" href="..\css\loginstyle.css">
  <link rel="icon" href="..\image\logoB.jpg" type="image/x-icon">
</head>
<body>



<div class="wrapper">

  <div class="section">
    <div class="title">
        <a><img src="..\image\Group 714@2x.png"></a>
    </div>
  </div>


  <div class="title-text">
    <div class="title login">CONNEXION</div>
    <div class="title signup">INSCRIPTION</div>
  </div>
  <div class="form-container">
    <div class="slide-controls">
      <input type="radio" name="slide" id="login" checked>
      <input type="radio" name="slide" id="signup">
      <label for="login" class="slide login">CONNEXION</label>
      <label for="signup" class="slide signup">INSCRIPTION</label>
      <div class="slider-tab"></div>
    </div>
    <div class="form-inner">
      <form method="post" action="log.php"class="login">
        <div class="field">
          <input type="email" id="email"  name="email" size="30" placeholder="exem@oui.com" required>
        </div>
        <div class="field">
          <input type="password" name="password" id="password" placeholder="Mot de passe" required>
        </div>
        <div class="pass-link"><a href="#">Mot de passe oublié?</a></div>
        <div class="field btn">
          <div class="btn-layer"></div>
          <input type="submit" value="SE CONNECTER">
        </div>
      </form>
      <form method="post" action="addlog.php" class="signup">
        
        <div class="field">
          <input type="text" id="nom" name="nom" placeholder="Nom" required>
        </div>

        <div class="field">
          <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>
        </div>
        
        <div class="field">
          <input type="text" id="email" name="email" placeholder="Adresse mail" required>
        </div>
        <div class="field">
          <input type="password" id="password" name="password" placeholder="Mot de passe" required>
        </div>
        <div class="field btn">
          <div class="btn-layer"></div>
          <input type="submit" value="S'INSCRIRE">
        </div>
      </form>
    </div>
  </div>
</div>

  <script  src="..\js\loginscript.js"></script>

</body>
</html>
