<?php
session_start();
//session_destroy();
?>
<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Exercice  1</title>
	<link rel="stylesheet" type="text/css" href="stylexo1.css">
</head>
<body>

<?php
//Inclusion de la page où toutes les fonctions ont été définies
include('fonctions.php');

if((!isset($_SESSION['Valider'])) OR (!(isset($_SESSION['entier']))) OR ($_SESSION['entier']<=10000)){
	echo "Pas envore";
?>		<div class="cadre">
		<p>
			<form method="post" action="">
			<label for="fname">Veuillez donner un nombre entier superieur à 10 000:</label>

			<input class="entree1" type="text" id="fname" name="entier" value="<?php echo($_POST['entier'])?>"> 
			<input class="entree2" type="submit" name="Valider" value="Valider">
		</p>
			</form>
		</p>
		</div>
<?php
		$_POST['entier']= intval($_POST['entier']);
		$_SESSION['entier'] = $_POST['entier'];
		$_SESSION['Valider']=$_POST['Valider'];
		$page = 1;
}else{
		echo "C'est bien";
	?>		<div class="cadre">
		<p>
			<form method="post" action="">
			<label for="fname">Veuillez donner un nombre entier superieur à 10 000:</label>

			<input class="nombre" type="text" id="fname" name="entier" value="<?php echo($_POST['entier'])?>"> 
			<input class="entree2" type="submit" name="Valider" value="Valider">
			</form>
		</p>
		</div>
<?php   
		if (isset($_POST['Valider'])) {
		$_POST['Valider']=$_SESSION['Valider'];
		//$_POST['entier']=$_POST['entier'];
		$_SESSION['entier'] = $_POST['entier'];
		$page = 1;

		}else{
		$_POST['Valider']=$_SESSION['Valider'];
		$_POST['entier']=$_SESSION['entier'];
		$_SESSION['entier'] = $_POST['entier'];
	}
	}
	//Verification du respect de l'expression à donner
	if ((preg_match('#^[0-9]*$#', $_POST['entier'])) AND $_POST['entier'] <= 10000){
		echo "Avez vous donné un nombre superieur à 10 000 ???";
		exit();
	}
?>
<!-- Phase de transformation  et de création des tableaux -->
<?php
	$valeur = (int)$_POST['entier'];
	$j=0;
	for ($i=2; $i < $valeur ; $i++){ 
		if (NombrePremier($i)){
		$Tableau1[$j]=$i;
		$j++;
	}
	}
//--------------------------------------------------------------------------
	$TabGeneral =[['inferieur' => $tabinferieur],['superieur' => $tabsuperieur]];
	$moyenne = Moyenne($Tableau1);
	$compteur1=0;
	$compteur2=0;
	if (isset($Tableau1)) {
	foreach ($Tableau1 as $valeur) {
		if ($valeur > $moyenne) {
			$tabsuperieur[$compteur1]=$valeur;
			$compteur1++;
		}
		elseif ($valeur < $moyenne) {
			$tabinferieur[$compteur2]=$valeur;
			$compteur2++;
		}
	}
}else{
	echo "votre tableau n'existe pas !!!";
}
?>
<!-- Phase d'affichage du tableau des nombres inferieurs à la moyenne -->

<hr class="barreSeparation">
<div class="TitreTabSup"> Tableau des nombres premières inférieurs à la moyenne </div>
<hr class="barreSeparation">
<?php
if (isset($_GET['page']) AND !empty($_GET['page'])){
	if ($_GET['page'] > (NombreDePages($tabinferieur,100))) {
		$pageCourante = 1;
	}else{
	$_SESSION['page']=$_GET['page'];
	$_GET['page'] = intval($_GET['page']);
	if (isset($page)) {
	 	$pageCourante = $page;
	 	$_SESSION['page'] = $page;
	 }else{
	$pageCourante = $_GET['page'];
}
}
}elseif (isset($page)) {
	$pageCourante = $page;
	$_SESSION['page'] = $page;
}
else{
	$pageCourante =$_SESSION['page'];
}
$depart = ($pageCourante-1)*100;

Pagination($tabinferieur, $depart);

Pagegagines($tabinferieur);
?>

<hr style="width:95%; height: 40px; background-color: #353436;">

<!-- Phase d'affichage du tableau des nombres supérieurs à la moyenne -->
<hr class="barreSeparation">
<div class="TitreTabSup"> Tableau des nombres premières supérieurs à la moyenne </div>
<hr class="barreSeparation">
<?php
if (isset($_GET['pages']) AND !empty($_GET['pages'])){
	if ($_GET['pages'] > (NombreDePages($tabsuperieur,100))) {
		$pageCourante = 1;
	}else{
	$_SESSION['pages']=$_GET['pages'];
	$_GET['pages'] = intval($_GET['pages']);
	if (isset($page)) {
	 	$pageCourante = $page;
	 	$_SESSION['pages'] = $page;
	 }else{
	$pageCourante = $_GET['pages'];
	}
	}
}elseif (isset($page)) {
	$pageCourante = $page;
	$_SESSION['pages'] = $page;
}else{
	$pageCourante = $_SESSION['pages'];
}
$depart = ($pageCourante-1)*100;

Pagination($tabsuperieur, $depart);

Pagegaginess($tabsuperieur);
?>

</body>
</html>