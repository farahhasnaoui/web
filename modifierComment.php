<HTML>
<head>
</head>
<body>
<?PHP
include "../entities/comment.php"; 
include "../core/commentC.php"; 
include "../../config.php"; 
if (isset($_GET['comment_id'])){
	$commentC=new CommentC();
    $result=$commentC->recupererComment($_GET['comment_id']);
	foreach($result as $row){

		  $sender_name= $row['sender_name']; 
      $comment= $row['comment']; 
      $datec= $row['datec']; 
      $image= $row['image']; 
?>
<form method="POST">
<table>
<caption>Modifier Voyage</caption>
<tr>
<td>idVo</td>
<td><input type="number" name="idVo" value="<?PHP echo $idVo ?>"></td>
</tr>
<tr>
<td>airline</td>
<td><input type="text" name="airline" value="<?PHP echo $airline ?>"></td>
</tr>
<tr>
<td>lieu aller</td>
<td><input type="text" name="lieu_aller" value="<?PHP echo $lieu_aller ?>"></td>
</tr>
<tr>
<td>lieu retour</td>
<td><input type="text" name="lieu_retour" value="<?PHP echo $lieu_retour ?>"></td>
</tr>
<tr>
<td>Description</td>
<td> <textarea name="description" ><?PHP echo $description ?></textarea></td>
</tr>
<tr>
<td>event</td>
<td><input type="text" name="event" value="<?PHP echo $event ?>"></td>
</tr>
<tr>
<td>nom hotel</td>
<td><input type="text" name="nom_hotel" value="<?PHP echo $nom_hotel ?>"></td>
</tr>
<tr>
<td>prix</td>
<td><input type="number" name="prix" value="<?PHP echo $prix ?>"></td>
</tr>
<tr>
<td>date aller</td>
<td><input type="date" name="date_aller" value="<?PHP echo $date_aller ?>"></td>
</tr>
<tr>
<td>date retour</td>
<td><input type="date" name="date_retour" value="<?PHP echo $date_retour ?>"></td>
</tr>
<tr>
<td>image</td>
<td><input type="text" name="image" value="<?PHP echo $image ?>"></td>
<img src="<?PHP echo $image ?>">
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="idVo_ini" value="<?PHP echo $_GET['idVo'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$voyage=new voyage($_POST['idVo'],$_POST['airline'],$_POST['lieu_aller'],$_POST['lieu_retour'],$_POST['description'],$_POST['event'],$_POST['nom_hotel'],$_POST['prix'],$_POST['date_aller'],$_POST['date_retour'],$_POST['image']);
	$voyageC->modifierVoyage($voyage,$_POST['idVo_ini']);
	echo $_POST['idVo_ini']; 
	header('Location: afficherVoyage.php'); 
}
?>
</body>
</HTMl>