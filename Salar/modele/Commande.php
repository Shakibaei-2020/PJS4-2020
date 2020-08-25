
<?php 
session_start();

require_once __DIR__ . DIRECTORY_SEPARATOR . 'DatabaseConnection.php';

$idc=DatabaseConnection::query('SELECT IFNULL(MAX(idcommande)+1,1) FROM commande')[0][0];

DatabaseConnection::query('INSERT INTO commande(iduser,idcommande,idproduit,quantite) VALUES'.implode(',',array_map(function($p) use($idc){return '('.implode(',',[$_SESSION["id"],$idc,$p['ObjetID'],$p['ObjetQTE']]).')';},$_SESSION["panier"])));

$_SESSION['recap']=DatabaseConnection::query('SELECT nom,quantite,prix FROM (commande  INNER JOIN produits ON idproduit=id) WHERE idcommande= :idc',
array(':idc'=>$idc));

header('Location: ../vue/Recap.php');
?>
