<!DOCTYPE html>
<html>
<head>
       <meta charset="utf-8">
        <link rel="stylesheet" href="../style/stylec.css" media="screen" type="text/css" />
    </head>
  <body>
  <?php session_start();?>
  <div id="container">
    <form action="../modele/Connect.php" method="post">
      <p>
        Pseudo d'utilisateur :
        <input type="text" name="username"/>
      </p>
      <p>
        mot de passe :
        <input type="password" name="password"/>
      </p>

      
  
      <p>
       Adresse :
        <input type="text" name="adresse"/>
      </p>
      
      <p>
       Email :
        <input type="text" name="email"/>
      </p>
      <p>
       Numéro de téléphone :
        <input type="number" name="numero"/>
      </p>

      <input type="submit" name="inscription" />
      <a href="http://localhost//Salar/vue/Connection.php">Se connecter</a>
    </form>
   

</div>
  </body>
</html>
