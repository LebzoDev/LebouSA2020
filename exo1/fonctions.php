<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
set_time_limit(0);
#Fonction pour calculer la longueur (la taille) d'un tableau !!!
function Taille($tableau){
	if (isset($tableau))
	{
	$compteur =0;
	foreach ($tableau as $value) {
		$compteur++;
	}
	return $compteur;
}else{
		echo "Veuillez verifier ";
}
}
//Fonction pour verifier si un nombre est premier ou pas !!!
function NombrePremier($valeur){
 	$somme =0;
 	for ($i=1; $i <= $valeur ; $i++){ 
 		if ($valeur % $i == 0){
 			$somme = $somme + 1;
 		}
 	}
 	if ($somme ==2){
 		return true;
 	}
 	else
 		return false;
}
//Fonction qui permet de calculer la moyenne des valeurs d'un tableau !!!
function Moyenne($tableau){
	if (isset($tableau))
	{
 	$somme =0;
 	for ($i=1; $i <= Taille($tableau) ; $i++) { 
 		$somme = $somme + $tableau[$i];
 	}
 	$moyenne = $somme/Taille($tableau);
 	return $moyenne;
 	}else{
		echo "Veuillez verifier ";
	}
 }
 //Fontion qui calcule le nombre de pages
 function NombreDePages($tableau, $NbreValeursParPages){
 	if (isset($tableau)) {
 	$taille = Taille($tableau);
 	$NbrePages = ceil($taille/$NbreValeursParPages);
 	return $NbrePages;
 }
 }
 //Fonction affichage Tableau paginé
 function Pagination($tab, $debut){
 	if (isset($tab)) {
?>
 	<div style="width: 100%;">
<table>
<?php
	for ($i=$debut; $i < $debut+100 ; $i+=20) {
		echo "<tr>";
		for ($j=$i; $j<= $i+19 ; $j++){ 
?>			
			<td><strong><?php echo $tab[$j] ?></strong></td>
<?php		}
		echo "</tr>";		
	}
?>
</table>
</div>
<?php
 }
 }
?>


<?php 
//Fonction affichage Pages paginées
 function Pagegagines($tab){
 	if (isset($tab)) {
 ?>
 	<div class="pages">
 <?php
 	for ($i=1; $i <=NombreDePages($tab, 100) ; $i++) {
 ?>
	<button class="clic">
		<a href="exo1.php?page=<?php echo $i ?>" class="click"><strong><?php echo $i ?></strong> </a>
	</button>
	
<?php
}
?>
	</div>
	<?php
}
}//Fin Fontion Pagegagine 
//Fonction affichage Pages paginées
 function Pagegaginess($tab){
 	if (isset($tab)) {
 ?>
 	<div class="pages">
 <?php
 	for ($i=1; $i <=NombreDePages($tab, 100) ; $i++) {
 ?>
	<button class="clic">
		<a href="exo1.php?pages=<?php echo $i ?>" class="click"><strong><?php echo $i ?></strong> </a>
	</button>
	
<?php
}
?>
	</div>
<?php
}
}
?>