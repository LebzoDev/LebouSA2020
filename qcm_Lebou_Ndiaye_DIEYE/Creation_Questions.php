<?php
session_start();

if (isset($_POST['deconnexion'])){
	header('Location: deconnexion.php');
}
if (!isset($_SESSION['login']) OR !isset($_SESSION['password'])){
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Page d'accueil</title>
	<link rel="stylesheet" type="text/css" href="asset/css/styleFool.css">
</head>
<body class="imageBackGround">
	<div class="header1">
		<img class="logohead" src="asset/img/logo-QuizzSA.png">
		<div class="titrehead">
			<strong> Le plaisir de jouer</strong>
		</div>
	</div>
	<div class="general">
		<form method="post" action="">
		<div class="barreDeconnexion">
			<div class="titreDeconnect">
				<p align="center">
			<strong>CRÉER ET PARAMÉTRER VOTRE QUIZZ</strong>
				</p>
			</div>
			<div class="buttonDeconnect">
			<input class="deconnexion" type="submit" name="deconnexion" value="Deconnexion">
			</div>
		</div>
		</form>
	
		<div class="gauche">
			<div class="avatar">
			<?php
			if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
				$tailleMax = 2097152;
				$extensionsValides=["jpg","jpeg","gif","png"];
				if ($_FILES['avatar']['size'] <= $tailleMax) {
					$extensionToUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
					if (in_array($extensionToUpload, $extensionsValides)){
						$chemin = "asset/img/avatar/"."profile".".".$extensionToUpload;
						$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
						if ($resultat){
							$_SESSION['extension']=$extensionToUpload;
						}else{
							$erreur = "Il y'a une erreur durant l'importation !!!";
						}
					}
					else{
						$erreur = "Votre photo doit être au format jpg, jpeg, gif ou png";
					}
				}else{
					$erreur ="Votre photo ne doit pas dépasser 2Mo";
				}
			}
			?>
			<div class="avatarAccueil">
			<?php
//			if (empty($erreur)){
			?>	
							<!--img style="border:2px solid black; border-radius: 50%; width: 100%; height: 100%;" id="blah" alt="your image"  /-->

							<img class="ppaccueil" src="asset/img/avatar/<?php  echo $_SESSION['pp'];?>" />.
			<?php
//				}
			?>
			</div>
			<div class="prenom">
					<strong> <?php echo $_SESSION['prenom'] ?> </strong> 
			</div>
			<br>
			<div class="nom">
					<strong><?php echo $_SESSION['nom'] ?></strong> 
			</div>
		</div>
		<div>
			<a href="Liste_Questions.php">
			<div class="entree2">
				<button class="entree3">
				Liste Questions </button>
				<div class="entree4">
					<p align="center">
					<img src="asset/img/Icônes/ic-liste.png">
					</p>
				</div>
			</div>
		</a>
			<a href="pageAccueil.php">
			<div class="entree2">
				<button class="entree3">
				Créer Admin </button>
				<div class="entree4">
					<p align="center">
					<img src="asset/img/Icônes/ic-ajout.png">
					</p>
				</div>
			</div>
			</a>
			<a href="Liste_Joueurs.php">
			<div class="entree2">
				<button class="entree3"> Liste Joueurs</button>
				<div class="entree4">
					<p align="center">
					<img src="asset/img/Icônes/ic-liste.png">
					</p>
				</div>
			</div>
			</a>
			<div class="entree2hover">
				<button class="entree3"s> Créer Questions</button>
				<div class="entree4">
					<p align="center">
					<img src="asset/img/Icônes/ic-ajout-active.png">
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="droiteLQJ">
	
	<div class="titreCQ">
		<strong class="titreCQ1">PARAMÉTRER VOTRE QUESTION </strong>
	</div>
	<hr class="barreTitre">
	<div style="width: 90%; height: 35vw; background: none; margin: 1vw auto;padding: 1vw; border: 2px solid #51bfd0; border-radius: 5px;">
		<div style="width: 95%; background: yellow; height: 7vw; margin: auto; overflow: hidden;">
			<div style="width: 20%; height: 7vw;background-color: black; float: left; color: #ffffff;font-size: 1.5vw; text-align: center;padding-top:2.7vw;">
				Question
			</div>
			<div style="width: 80%; height: 100%; background: green; float: right; border:1pw solid grey">
			<input type="text" name="question" style="height: 100%; width: 100%;" >
			</div>
		</div>
		<div style="width: 65%; background: yellow; margin: 1vw auto; height: 4vw;float: left;margin-left: 1.2vw;">
			<section style="width: 40%; float: left; background: grey; text-align: center; position: relative;margin-top:1.2vw; font-size: 1.5vw;">
				Nombre de points
			</section>
			<section style="float: left; width: 60%;height:100%;background: pink;">
				<input style="height: 60%; width: 20%;margin: 2% auto; margin-left: 10%;" type="number" name="nbrpts">
			</section>
		</div>
		<div style="width: 95%; background: yellow; margin: 1vw auto;height: 4vw; clear: left;">
			<div style="width: 30%; background: grey; height: 75%; float: left;font-size: 1.5vw; text-align: center;padding-top: 1vw;">
				Type de réponses
			</div>
			<div style="width: 55%; background: blue; height: 100%; float: left;">
				<select id="choix" name="choix" value="" style="width: 100%; height: 100%; font-size: 1.7vw;">
					<option>Type de reponse</option>
					<option>Choix Multiple</option>
					<option>Choix Unique</option>
					<option>Type commentaire</option>
				</select>
			</div>
			<div style="width: 15%; background: green; float: right; height: 100%; align-text: center;align-self: center;">
				<img style="margin: 0.5vw 1.5vw; width: 40%;" src="asset/img/icônes/ic-ajout-réponse.png">
			</div>
		</div>
		
	</div>
	
	
	</div>
	</div>
</body>
</html>