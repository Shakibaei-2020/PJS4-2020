<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "PAYEZ");

if(isset($_POST["ajout_panier"]))
{
	if(isset($_SESSION["panier"]))
	{
		$item_array_id = array_column($_SESSION["panier"], "ObjetID");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["panier"]);
			$item_array = array(
				'ObjetID'			=>	$_GET["id"],
				'ObjetNOM'			=>	$_POST["nom"],
				'ObjetPRIX'		=>	$_POST["prix"],
				'ObjetQTE'		=>	$_POST["quantite"]
			);
			$_SESSION["panier"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Objet deja ajouter")</script>';
		}
	}
	else
	{
		$item_array = array(
			'ObjetID'			=>	$_GET["id"],
			'ObjetNOM'			=>	$_POST["nom"],
			'ObjetPRIX'		=>	$_POST["prix"],
			'ObjetQTE'		=>	$_POST["quantite"]
		);
		$_SESSION["panier"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["panier"] as $keys => $values)
		{
			if($values["ObjetID"] == $_GET["id"])
			{
				unset($_SESSION["panier"][$keys]);
				echo '<script>alert("objet supprimer")</script>';
				echo '<script>window.location="Goodies.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html >
	<head >
		<title>Salar</title>
		 <meta charset="utf-8" />
		<link rel="stylesheet" href="../style/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		  <div id="translator_5480">
<noscript>
<a href="http://www.supportduweb.com/generateur-boutons-traduction-translation-google-gratuit-html-code=script-boutons-traduire-page-web.html"></a></noscript></div><script type="text/javascript" src="http://services.supportduweb.com/translator/5480-1-yyyyyyyyy.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="../controler/txtAnimation.js"></script>


	</head>




<body style="  background-color:#474747;">
   <div style="background-color: #202020;">
    <div class="bannière">
        <img src="../image/TITRE.png">
    </div>
</div>

	<ul class="menu">
		<li ><a href="Accueil.html">Accueil</a></li>
		<li><a href="Histoire.html">Histoire</a></li>
		<li><a href="Personnage.html">Personnages</a></li>
		<li><a href="Logiciels.html">Logiciels utilisés</a></li>
		<li><a href="Equipe.html">Equipe</a></li>
		<li><a href="Developpement.html">Développement</a></li>
		<li class="active"><a href="page/Goodies.php">Goodies</a></li>

	</ul>


  <div id="myCarousel" class="carousel slide" data-ride="carousel">
 

    <div class="carousel-inner">
      <div class="item active">
        <img src="../image/car1.jpg" alt="Niveau 1" style="width:100%;  height: 550px;">
      </div>

      <div class="item">
        <img src="../image/car2.jpg" alt="Menu" style="width:100%; height: 550px;">
      </div>
    

    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


		<br />

			<br />
			<br />
			<br />
			
               <h1 align="center">
  <a style="color:white;" class="typewrite" data-period="2000" data-type='[ "Boutique Salar the great adventure","Goodies de tout genre !","Stock limitée !","Boutique Salar the great adventure" ]'>
    <span class="wrap"></span>
  </a>
</h1>
			<br /><br />
			<?php
				$query = "SELECT * FROM produits ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="Goodies.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:white; border-radius:5px; padding:16px;" align="center">
						<img style="height:250px; width:250px;"src="../image/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["nom"]; ?></h4>

						<h4 class="text-danger"> <?php echo $row["prix"]; ?> Euro</h4>

						<input type="text" name="quantite" value="1" class="form-control" />

						<input type="hidden" name="nom" value="<?php echo $row["nom"]; ?>" />

						<input type="hidden" name="prix" value="<?php echo $row["prix"]; ?>" />

						<input type="submit" name="ajout_panier" style="margin-top:5px;" class="btn btn-danger" value="Acheter" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3 style="color:white;" >Detail Commande</h3>
			<div class="table-responsive" >
				<table class="table table-bordered">
					<tr>
						<th style="color:white;"  width="40%">Objet</th>
						<th  style="color:white;"width="10%">quantite</th>
						<th  style="color:white;"width="20%">prix</th>
						<th  style="color:white;"width="15%">Total</th>
						<th style="color:white;" width="5%">Supprimer</th>
					</tr>
					<?php
					if(!empty($_SESSION["panier"]))
					{
						$total = 0;
						foreach($_SESSION["panier"] as $keys => $values)
						{
					?>
					<tr>
						<td style="color:white;"><?php echo $values["ObjetNOM"]; ?></td>
						<td style="color:white;"><?php echo $values["ObjetQTE"]; ?></td>
						<td  style="color:white;">$ <?php echo $values["ObjetPRIX"]; ?></td>
						<td style="color:white;">$ <?php echo number_format($values["ObjetQTE"] * $values["ObjetPRIX"], 2);?></td>
						<td style="color:white;"><a href="Goodies.php?action=delete&id=<?php echo $values["ObjetID"]; ?>"><span class="text-danger">supprimer</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["ObjetQTE"] * $values["ObjetPRIX"]);
						}
					?>
					<tr>
						<td  style="color:white;" colspan="3" align="right">Total</td>
						<td  style="color:white;"  align="right"> <?php echo number_format($total, 2); ?> euro </td>
						<td  style="color:white;" ></td>
					</tr>
					<?php


					}
					?>
						
				</table>
			</div>
		</div>
	</div>
	<br />

</div>
<center>
<form action="http://localhost//Salar/modele/Commande.php" >
	
      <input style="background-color: #CA7900;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 30%%;" class="paybutton" type="submit" name="login" value="Commander" />
</form>
</center>
</div>

<br>
<br>
<br>
<br>

<footer class="page-footer font-small blue-grey lighten-5" style="background-color:#2E2E2E; color:white;">

  <div style="background-color: #131313;">
    <div class="container">
      <div class="row py-4 d-flex align-items-center">

        <div class=" text-center  mb-4 mb-md-0">
          <center><h5 class=>Informations utiles</h5>
        </div>
        <div class="col-md-6 col-lg-7 text-center text-md-right">
 
          <a class="fb-ic">
            <i class="fab fa-facebook-f white-text mr-4"> </i>
          </a>
          <a class="tw-ic">
            <i class="fab fa-twitter white-text mr-4"> </i>
          </a>
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g white-text mr-4"> </i>
          </a>
               <a class="li-ic">
            <i class="fab fa-linkedin-in white-text mr-4"> </i>
          </a>
          <a class="ins-ic">
            <i class="fab fa-instagram white-text"> </i>
          </a>
        </div>
      </div>
    </div>
  </div>


  <div class="container text-center text-md-left mt-5">
    <div class="row mt-3 dark-grey-text">
      <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
        <h6 class="text-uppercase font-weight-bold">Salar the Great Adventure</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Salar the Great adventure est un jeu crée au sein de l'université Paris descartes dans le cadre d'un projet.</p>
      </div>
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
        <h6 class="text-uppercase font-weight-bold">Produits</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a class="dark-grey-text" href="Goodies.php">Mug Salar</a>
        </p>
        <p>
          <a class="dark-grey-text" href="Goodies.php">T-shirt Salar</a>
        </p>
        <p>
          <a class="dark-grey-text" href="Goodies.php">postere Zerod</a>
        </p>
      </div>
      
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
        <h6 class="text-uppercase font-weight-bold">Liens utile</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a class="dark-grey-text" href="">Facebook</a>
        </p>
        <p>
          <a class="dark-grey-text" href="https://www.youtube.com/channel/UC1zrfMH_DYQ6Van06IoJsnQ">Youtube</a>
        </p>
      </div>
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
       
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i> 143 avenue de versailles</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> salar.the.great@outlook.fr</p>
        <p>
          <i class="fas fa-phone mr-3"></i> + 06 23 02 14 74 </p>
        <p>
          <i class="fas fa-print mr-3"></i> + 06 65 07 45 20</p>

      </div>
    </div>
  </div>
  <br>
  <div class="footer-copyright text-center text-black-50 py-3">Site développé par SHAKIBAEI Mohammad-Reza et ATTIGUI Hicham <br> <br> </div>
</footer>



	</body>
</html>

