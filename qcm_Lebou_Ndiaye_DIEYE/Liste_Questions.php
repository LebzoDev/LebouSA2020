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
//				echo $_SESSION['id'];
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
			<div class="entree2hover">
				<button class="entree3">
				Liste Questions </button>
				<div class="entree4">
					<p align="center">
					<img src="asset/img/Icônes/ic-liste-active.png">
					</p>
				</div>
			</div>
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
			<a href="Creation_Questions.php">
			<div class="entree2">
				<button class="entree3"s> Créer Questions</button>
				<div class="entree4">
					<p align="center">
					<img src="asset/img/Icônes/ic-ajout.png">
					</p>
				</div>
			</div>
		</a>
		</div>
	</div>
	<div class="droiteLQJ">
	
	<div class="LQbarre1">
		<strong> Nombre de  question par Jeu</strong>
		<!--span style="border-left: 2px solid #000; display: inline-block; height: 100%;margin: 0 2px; background: red;color: yellow">gj</span-->
		<input class="LJbarre2" type="text" name="nombre">
		<button class="LJbarre3">OK</button>
	</div>
	<hr class="LJbarre4">
	
	
	</div>
	</div>
</body>
</html>