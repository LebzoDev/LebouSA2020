<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Exercice 5</title>
	<link rel="stylesheet" type="text/css" href="stylexo5.css">
</head>
<body>
<?php 
#Fonction pour calculer la longueur (la taille) d'un tableau !!!
function Taille($tableau){
	if (isset($tableau)){
		$compteur =0;
		foreach ($tableau as $value){
			$compteur++;
		}
		return $compteur;
	}
}
?>
<!--Nous allons afficher la partie saisie (l'ensemble des numeros dans le zone de texte)-->
<p>
	<form method="post" action="exo5.php">
		<p>
			<hr class="barreSeparation">
			<div class="message1" ><strong>Veuillez saisir l'ensemble des numeros :</strong></div>
			<hr class="barreSeparation">
		</p>
		<div class="message3">
			<textarea class="marge" name="numeros" cols="100" rows="10" value="">
			<?php echo $_POST['numeros']; ?>
			</textarea>
			<input class="valider"  type="submit" value="Envoyer">
		</div>
	</form>
</p>
<!--Fin de la partie recuperation-->

<hr class="barreSeparation">
<div class="message2" ><strong>RESULTATS !!!</strong></div>
<hr class="barreSeparation">




<?php
//Nous allons essayé de recuperer de tous les numeros valides ou invalides
(preg_match_all("/[0-9]+[(\s)(,)(\-)]/mi", $_POST['numeros'],$numero));
//Nombre total de numéros
$TailleNumTotal = Taille($numero[0]);
//Nous allons essayé de recuperer les numeros de telephones valides  
(preg_match_all("/[7][0,5-8][0-9]{7}[(\s)(,)(\-)]/mi", $_POST['numeros'],$num));
//Nombre total de numéros valides
$TailleNumValides = Taille($num[0]);
if ($TailleNumValides>0 AND $TailleNumTotal>0){
$pourcentage =(int)(($TailleNumValides*100)/$TailleNumTotal);
}else{
	$pourcentage = 0;
}
echo "<br/>";
?>
<div class="pourcentage">
Le pourcentage de numeros valides est de: <?php echo $pourcentage?>%
</div>

<?php
$compteur = 0;
if (Taille($numero[0])>0)
{
	foreach ($numero[0] as $value)
	{
		$TabNumeros[$compteur] = $value;
		$compteur++;
	}
}
//Creation du tableau multidimensionnel associatif contenant les tableaux de chaque opérateur
$Tableaux = [['orange'=>$orange],['free'=>$free],['expresso'=>$expresso],['promobile'=>$promobile]];

$compt1 =0;
$compt2 =0;
$compt3 =0;
$compt4 =0;
if (Taille($TabNumeros)>0)
{
	foreach ($TabNumeros as $key)
	{
	if (preg_match("#^[7][7,8][0-9]{7}[(\s)(,)(\-)]$#", $key))
	{
		$Tableaux['orange'][$compt1]=$key;
		$compt1++;
	}
	elseif(preg_match("#^[7][6][0-9]{7}[(\s)(,)(\-)]$#", $key))
	{
		$Tableaux['free'][$compt2]=$key;
		$compt2++;
		
	}
		elseif(preg_match("#^[7][0][0-9]{7}[(\s)(,)(\-)]$#", $key))
	{
		$Tableaux['expresso'][$compt3]=$key;
		$compt3++;
	}
		elseif(preg_match("#^[7][5][0-9]{7}[(\s)(,)(\-)]$#", $key))
	{
		$Tableaux['promobile']['$compt4']=$key;
		$compt4++;
	}
	else{
		$TabNumInvalides[]=$key;
	}
}
$Total=100/($compt1 + $compt2 +$compt3 +$compt4);
}else{
	$Total =0;
}



?>

<div class="resultats">
	<div class="first">
		<div class="second">
		<strong> Orange</strong>
		</div>
		<div class="third">
					<?php
							if (Taille($Tableaux['orange'])>0)
					{
							echo "<td>";
							echo (int)($compt1*$Total)."%";
							echo "</td>";
					}
					else
					{
						echo "<td>";
							echo "0%";
						echo "</td>";
					}
					?>
		</div>
	</div>
	<div class="first">
		<div class="second">
			<strong>Free</strong>
		</div>
		<div class="third">
			<?php
							if (Taille($Tableaux['free'])>0)
					{
							echo "<td>";
							echo (int)($compt2*$Total)."%";
							echo "</td>";
					}
					else
					{
						echo "<td>";
							echo "0%";
						echo "</td>";
					}
					?> 
		</div>
	</div>
	<div class="first">
		<div class="second">
				<strong>Expresso</strong>
		</div>
		<div class="third">
				<?php
							if (Taille($Tableaux['expresso'])>0)
					{
							echo "<td>";
							echo (int)($compt3*$Total)."%";
							echo "</td>";
					}
					else
					{
						echo "<td>";
							echo "0%";
						echo "</td>";
					}
					?> 
		</div>
	</div>
	<div class="first">
		<div class="second">
				<strong>Promobile</strong>
		</div>
		<div class="third">
				<?php
							if (Taille($Tableaux['promobile'])>0)
					{
							echo "<td>";
							echo (int)($compt4*$Total)."%";
							echo "</td>";
					}
					else
					{
						echo "<td>";
							echo "0%";
						echo "</td>";
					}
					?>
		</div>
	</div>
</div>

<!--Nous allons afficher la partie saisie (l'ensemble des numeros dans le zone de texte)-->
<p>
	<form method="post" action="">
		<p>
			<hr class="barreSeparation">
			<div class="message1" ><strong>L'ensemble des numeros invalides :</strong></div>
			<hr class="barreSeparation">
		</p>
		<div class="message3">
			<textarea class="marge1" name="numerosinvalides" cols="100" rows="5" value="">
			<?php 
			if ($TabNumInvalides>0) {
				foreach ($TabNumInvalides as $value) {
				echo $value;
				}
			}
			 ?>
			</textarea>
		</div>
	</form>
</p>
<!--Fin de la partie recuperation-->


</body>
</html>