<?php
session_start();
//session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>E-Learning G2 T3 1 </title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<!--Corps du programme-->
	<?php
	//Inclusion de notre page fonction.php
	include('fonction.php');
	//Vider les champs dans le cas d'un réinitialisation
	if (isset($_POST['reinitialiser'])) {
		$_POST['prenom']=" ";
		$_POST['nom']=" ";
		$_POST['adresse']=" ";
		$_POST['numero']=" ";
		$_POST['confirmation']=" ";
		$_POST['satisfaction']=" ";
		$_POST['genre']=" ";
		$_POST['commentaire']=" ";
	//Dans le cas où le bouton Reinitialiser a pour objectif de vider le tableau
	/*		unset($_SESSION['prenom']);
			unset($_SESSION['nom']);
			unset($_SESSION['adresse']);
			unset($_SESSION['genre']);
			unset($_SESSION['satisfaction']);
			unset($_SESSION['numero']);
			unset($_SESSION['lang']);
	*/	}
	?>
	<!--Affichage du titre du formulaire-->
	<header class="Titre">
			Excellente formulaire
	</header>
	<hr class="barre">
	<!--Debut formulaire : definition des champs à remplir-->
	<form method="POST" action="">
		<!--Partie zone de texte-->
		<div class="ZoneDeTexte">

			<label for="prenom">
				<strong>Prenom:</strong>
			</label>
			<input class="entree1" type="text" id="prenom" name="prenom" value="<?php echo $_POST['prenom']?>"><br>

			<label for="nom">
				<strong>Nom:</strong>
			</label>
			<input class="entree1" type="text" id="nom" name="nom" value="<?php echo $_POST['nom']?>"><br>

			<label for="adresse">
				<strong>Adresse:</strong>
			</label>
			<input class="entree1" type="text" id="adresse" name="adresse" value="<?php echo $_POST['adresse']?>" ><br>

			<label for="numero">
				<strong>Numero:</strong>
			</label>
			<input class="entree1" type="text" id="numero" name="numero" value="<?php echo $_POST['numero']?>" ><br>

			<label for="confirmation">
				<strong>Confirm Numero:</strong>
			</label>
			<input class="entree1" type="text" id="confirmation" name="confirmation" value="<?php echo $_POST['confirmation']?>" ><br>

			<label for="genre">
				<strong>Genre:</strong>
			</label>

			<!--Zone de selection Genre-->
			<select class="entree1" style="height: 1.8vw;" id="genre" name="genre" value="<?php echo $_POST['genre']?>">

				<option value="<?php echo $_POST['genre']?>">
						<strong>Choix:<?php echo $_POST['genre']?></strong>
				</option>

				<option value="Homme">
						<strong>Homme</strong>
				</option>

				<option value="Femme">
						<strong>Femme</strong>
				</option>

			</select>
		</div>
		<hr class="barre">
		<!--Partie zone de choix Satisfaction-->
		<div class="ChampDeChoix">

			<div class="satisfaction">
				<strong>Satisfaction:</strong>
			</div>

			<div class="choix">
				<label style="font-size: 3vw;" for="satisfaction"><strong>OUI</strong></label>
				<input  style="width: 5%;" type="radio" id="satisfaction" name="satisfaction" value="OUI">

				<label style="font-size: 3vw;" for="satisfaction"><strong>NON</strong></label>
				<input style="width: 5%;" type="radio" id="satisfaction" name="satisfaction" value="NON">
			</div>

		</div>
		<hr class="barre"> 
		<!--Partie zone de choix multiples langues-->
		<div class="ChampDeChoix">
			<div class="satisfaction">
				<strong>Langues:</strong>
			</div>
			<div class="choix">

				<label class="etiquette" for="lang"><strong>Français</strong></label>
				<input  class="entree2" type="checkbox" id="lang" name="lang[]" value="F">

				<label  class="etiquette" for="satisfaction"><strong>Anglais</strong></label>
				<input class="entree2" type="checkbox" id="lang" name="lang[]" value="A"><br>

				<label  class="etiquette" for="satisfaction"><strong>Espagnol</strong></label>
				<input  class="entree2" type="checkbox" id="lang" name="lang[]" value="E">

				<label class="etiquette" for="satisfaction"><strong>Portugais</strong></label>
				<input class="entree2" type="checkbox" id="lang" name="lang[]" value="P">
			</div>

		</div>
		<hr class="barre">
		<!--Partie zone de commentaire-->
		<div class="commentitre">
			<label for="comment">
				<strong>Commentaire</strong>
			</label>
		</div>
		<div class="commentaire">
			<input class="entree3" type="textearea" id="comment" name="commentaire" value="<?php echo $_POST['commentaire']?>">
		</div>
		<hr class="barre">
		<!--Partie zone de Validation-->
		<div class="validation">
			<input class="valider" type="submit" name="valider" value="Valider">
			<input class="reinitialiser" type="submit" name="reinitialiser" value="Reinitialiser">
		</div>
	</form>


	<!--Partie zone des resultats et affichages des notification en cas d'erreurs-->
	<hr class="barreGrande">

		<div class="resultat">
			<strong>RESULTATS</strong> 
		</div>

	<hr class="barreGrande">

		<div class="tableau">
			<?php 
			if (isset($_POST['valider'])){
				$valide = true;

				if (!Regle_A($_POST['prenom'])){
					echo "Votre Prenom n'est pas valide !!!<br>";
					$valide = false;
				}
				if (!Regle_A($_POST['nom'])){
					echo "Votre nom n'est pas valide !!!<br>";
					$valide = false;
				}
				if (!Regle_B($_POST['adresse'])){
					echo "Votre adresse n'est pas valide !!!<br>";
					$valide = false;
				}
				if (!Regle_C($_POST['numero'])){
					echo "Votre numero n'est pas valide !!!<br>";
					$valide = false;
				}else{
					if (!Regle_D($_POST['numero'], $_POST['confirmation'])){
						echo "Veuillez donner le même numero !!!<br>";
						$valide = false;
						}
					}
				if (($_POST['genre']!="Homme") AND ($_POST['genre']!="Femme")){
					echo "Veuillez donner votre genre !!!<br>";
					$valide = false;
				}
				if (!isset($_POST['satisfaction'])){
					echo "Veuillez donner votre avis sir la satisfaction !!!<br>";
					$valide = false;
				}
				if (!Regle_H($_POST['lang'])){
					echo "Le nombre minimum de langues requis est de 2 !!!<br>";
					$valide = false;
				}
				if (!Regle_IJ($_POST['commentaire'])) {
					echo "Nous avons besoin au moins de 3 phrases";
					$valide = false;
				}

				if ($valide == true){
					$_SESSION['prenom'][]=$_POST['prenom'];
					$_SESSION['nom'][]=$_POST['nom'];
					$_SESSION['adresse'][]=$_POST['adresse'];
					$_SESSION['genre'][]=$_POST['genre'];
					$_SESSION['satisfaction'][]=$_POST['satisfaction'];
					$_SESSION['numero'][]=$_POST['numero'];
					foreach ($_POST['lang'] as $value) {
						$langue =$langue." ".$value.",";
						}
					$_SESSION['lang'][]=$langue;
					$taille= Taille($_SESSION['prenom']);
			?>
					<table style="width: 90%; margin: 0px auto;">
						<tr>
							<th>Prenom</th>
							<th>Nom</th>
							<th>Adresse</th>
							<th>Numero</th>
							<th>Satisfait(e)</th>
							<th>Genre</th>
							<th>Langues</th>
						</tr>
						<?php
							for ($i=0; $i<$taille ; $i++){ 
						?>							
								<tr>
									<td><?php echo $_SESSION['prenom'][$i]?></td>
									<td><?php echo $_SESSION['nom'][$i]?></td>
									<td><?php echo $_SESSION['adresse'][$i]?></td>
									<td><?php echo $_SESSION['numero'][$i]?></td>
									<td><?php echo $_SESSION['satisfaction'][$i]?></td>
									<td><?php echo $_SESSION['genre'][$i]?></td>
									<td><?php echo $_SESSION['lang'][$i]?> </td>
								</tr>
						<?php
							}
						?>
					</table>
						<?php
					}
				}
				?>
			</div>
			<hr class="barreGrande">
			<footer class="pieddpage">

			</footer>
		</body>
		</html>