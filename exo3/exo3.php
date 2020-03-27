<?php 
session_start();
?>
<?php 
//Fonction qui permet de cacluler la longueur d'une chaine de caractères
function longueur($chaine){
	if (isset($chaine)){
		$i=0;
		for($j=0; isset($chaine[$i]); $j++) {
			$i++;
		}
	return $i;
	}
}
//Fonction pour voir si une chaine est belle et bien alphabetique
	function alphabetique($chaine){
		$reponse = true;
		for ($i=0; (isset($chaine[$i])) ; $i++) { 
			if (($chaine[$i]<"a" OR $chaine[$i]>"z") AND ($chaine[$i]<"A" OR $chaine[$i]>"Z")) {
				$reponse = false;
			}
		}
		return $reponse;
	}
//Fonction qui permet de verifier si un mot est inferieur ou égale à 20
	function VerifLongueur($chaine){
		$longueur = longueur($chaine);
		if ($longueur <= 20){
			return true;
		}else{
			return false;
		}
	}
//Fontion qui permet de rechercher la lettre m dans un mot
function Trouve_M($mot){
	if (isset($mot)) {
	$j=0;
	for ($i=0; $i < longueur($mot) ; $i++) { 
		if (($mot[$i] == "m") OR ($mot[$i] == "M")){
			$j++;
		}
	}
	if ($j==0){
		return false;
	}
	else{
		return true;
	}
	}
}
//Fonction qui permet de savoir si un caractere est numerique ou pas
	function Numerique($caractere){
		$caractere = (string)$caractere;
		for ($i=0; $i <10 ; $i++){ 
				$TabChiffres[]=$i;
		}
		$result = false;
		foreach ($TabChiffres as $value){
			 	if ($caractere == "$value"){
					$result = true;
				}
		}
		return $result;
	}
//Fonction qui permet de savoir si la donnée entrée est un entier positif
	function EntierPositif($entree){
	$entree = (string)$entree;
	$longueur = longueur($entree);
	$i =0;
	for($j=0; isset($entree[$j]); $j++){
		if (Numerique($entree[$j])){
			$i++;
		}
	}
	if ($entree!="0" AND $i == $longueur) {
		return true;
		}else{
		return false;
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Exercice 3</title>
	<link rel="stylesheet" type="text/css" href="stylexo32.css">
</head>
<body>

<!--Nous allons afficher la partie saisie (l'ensemble des mots dans le zone de texte)-->
<div class="cadre">
<p>
	<form method="post" action="">
		<p>
		<label for="fname1">Veuillez donner le nombre de mots voulus:</label>
		<input class="entree1" type="text" id="fname1" name="nombre" value="<?php 
		if(isset($_POST['nombre'])){
			echo $_POST['nombre'];
		}else {
			echo($_SESSION['nombre']);
		}
			?>"> 
		</p>
		<input class="entree2" type="submit" name="Valider1" value="Terminer">
	</form>
</p>
</div>

<hr class="barreSeparation">
<div class="TitreTabSup"> Veuillez saisir des mots de moints de 20 caractères et valides: </div>
<hr class="barreSeparation">


<?php
if (isset($_POST['Valider1'])) {
	$_SESSION['nombre']=$_POST['nombre'];
	$_SESSION['mot']="";
if (!EntierPositif($_SESSION['nombre'])) {
	exit();
}

}
	$nombre = $_SESSION['nombre'];
	?>
	<div class="cadre">
	<form method="post" action="exo3.php">
		<?php
		$k=$nombre;
	for ($i=0; $i <$nombre; $i++) { 
		?>
		<div>Mot <?php echo ($i+1)." :";
		if (isset($_POST['Valider'])){
		if ((!VerifLongueur($_POST['mot'][$i]) OR (!alphabetique($_POST['mot'][$i]))) OR empty($_POST['mot'][$i])) {
			$k--;
		?>
			<strong style="color: red;">Veuiller verifier !!!</strong>
		<?php
		}
		}
		 ?></div>
		<input class="entree1" type="text" name="mot[]" value="<?php
		if(isset($_POST['mot'][$i])){
			echo $_POST['mot'][$i];
		}
		else{
			echo $_SESSION['mot'][$i];
		}
		/*else
			echo($_SESSION['mot'][$i]);
*/		 ?>">
	<br/>
		<?php
	}
			?>
	<br/><br/>
	<input class="entree2" type="submit" name="Valider" value="Valider">
	</form>
</div>
	<div style="background-color: red; width: 80%;">
	<?php
	$_SESSION['nombre']=$nombre;
	//$_SESSION['Valider']=$_POST['Valider'];
	$_SESSION['mot']=$_POST['mot'];
?>
	</div>


<?php
if ($k==$nombre AND (isset($_POST['Valider']))) {
if (isset($_SESSION['mot'])) {
foreach ($_SESSION['mot'] as $key) {
  		$PO[]=$key;
  	}
}
if (isset($PO)) {
	$nbre =0;
	foreach ($PO as $mots)
	{
		if (Trouve_M($mots))
	 	{
	 		$tableauM[$nbre] = $mots;
	 		$nbre++;
	 	} 
	}
	?>
<div class="pourcentage">
Le nombre de mots contenant "m" est de: <?php echo $nbre ?>
</div>


<hr class="barreSeparation">
<div class="TitreTabSup"> Liste des mots valides contenant le caractere: <strong style="color: red;"> "m ou M"</strong> </div>
<hr class="barreSeparation">


<div class="cadre">
<?php
	}
	echo "<table>";
	echo "<tr>";
	if (longueur($tableauM)>0)
	{
		foreach ($tableauM as $val)
		{
			echo "<td>";
			echo $val;
			echo "</td>";
		}
	}
	else{
		echo "Tableau (Vide) !!!";
	}
	echo "</tr>";
	echo "</table>";
} 
?>
</div>
</body>
</html>