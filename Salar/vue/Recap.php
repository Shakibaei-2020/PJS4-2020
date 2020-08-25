<!DOCTYPE html>
<html>
<head>
       <meta charset="utf-8">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../style/stylec.css" media="screen" type="text/css" />
    </head>
  <body>
  <div id="container">
<form action="../page/Accueil.html">
    <h1>Récap</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Nom</th>
      <th scope="col">Quantité</th>
      <th scope="col">Prix</th>
    </tr>
  </thead>
  <tbody>
  <?php session_start()?>
  <?php $total=0 ?>
    <?php foreach ($_SESSION['recap'] as &$value): ?>
    <tr>
      <th scope="row">-</th>
      <td><?php echo ($value["nom"]);?></td>
      <td><?php echo ($value["quantite"]);?></td>
      <td><?php echo ($value["prix"]*$value["quantite"]);?></td>
    </tr>
    <?php $total+= $value["prix"]*$value["quantite"]  ?>
    <?php endforeach; ?>
  </tbody>
</table>
Pour un total de : <?php echo($total) ?>€


     
      <input type="submit" value="Retour au site"/>
      
    </form>
    
</div>
  </body>
</html>
