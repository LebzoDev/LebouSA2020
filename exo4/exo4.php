<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Exercice 4</title>
	<link rel="stylesheet" type="text/css" href="stylexo4.css">
</head>
<body>
<?php
#Fonction pour calculer la longueur (la taille) d'un tableau !!!
function Taille($tableau){
	if (isset($tableau))
	{
	$compteur =0;
	foreach ($tableau as $value) {
		$compteur++;
	}
	return $compteur;
}
}
?>
<!--Nous allons afficher la partie saisie (du nombre de phrases et du texte à analyse)-->
<p>
	<form method="post" action="exo4.php">
		<p>
			<hr class="barreSeparation">
			<div class="message1" ><strong>Veuillez saisir vos phrases:</strong></div>
			<hr class="barreSeparation">
		</p>
		<div class="message3">
		<textarea class="marge" name="message" cols="100" rows="10"><?php echo $_POST['message']; ?></textarea>
		<input class="valider" type="submit" value="Corriger">
		</div>
	</form>
</p>

<hr class="barreSeparation">
<div class="message2" ><strong>Correction de votre texte !!!</strong></div>
<hr class="barreSeparation">
<!--Nous allons afficher la partie correction du texte -->

<?php 
//Nous allons tenter de recuperer l'ensemble des phrases qui respectent les regles.
preg_match_all("#[A-Z]{1}[^(\.)(\!)(\?)]{1,199}[(\.)(\!)(\?)]#m", $_POST['message'],$phrase);

//Recuperation des phrases et l'insertion dans un tableau...
	$i=0;
	foreach ($phrase[0] as $value)
	{
		$value = preg_replace('#\s\s+#'," ", $value);
		$value = preg_replace('#(\')\s+#', "'", $value);
		$value = preg_replace('#\s+(\')#', "'", $value);
		$value = preg_replace('#\s+,#', ",", $value);
		$value = preg_replace('#,\s+#', ", ", $value);
		$value = preg_replace('#\s+(\.)#', ".", $value);
		$Tableau[$i]= $value;
		$i++; 
	}	


?>
	<p>
		<div class="message3">
		<textarea class="marge" style="cursor: context-menu;" name="message" cols="100" rows="10"><?php 
			if (Taille($Tableau)>0)
			{
				foreach($Tableau as $data)
				{
					echo $data." ";
				}
			}
			?> 
		</textarea>
	</div>
	</p>

</body>
</html>