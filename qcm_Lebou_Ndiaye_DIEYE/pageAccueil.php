<?php
//L'appel de nouvelle session
session_start();
//Redirection vers la page d'authentification en cas de deconnexion
if (isset($_POST['deconnexion'])){
	header('Location: deconnexion.php');
}
//Redirection vers la page d'authentification au cas d'une non validité des coordonnées
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
				$extensionsValides=["jpg","jpeg","png"];
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
			<div class="entree2hover">
				<button class="entree3">
				Créer Admin </button>
				<div class="entree4">
					<p align="center">
						<img src="asset/img/Icônes/ic-ajout-active.png">
					</p>
				</div>
			</div>
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
	<div class="droite">
	<div class="pp">

		<?php
	//	if (empty($erreur)){
			?>	
							<img name="avatar" class="ppavatar" id="blah" alt="your image"  />
							<!--img style="border:2px solid black; border-radius: 50%; width: 15vw; height: 15vw;"; src="membres/avatar/<?php// echo "profile.".$extensionToUpload;?>" /-->.
			<?php
	//			}
			?>
	</div>
	<div class="creatAdmintitre">
		<strong > S'inscrire</strong> <hr class="CAbarre1">
		<strong class="CAbarre2">Pour proposer des quizz</strong> 
	</div>
	<hr class="CAbarre3">
	<div class="CAdiv">
	<form method="post" action=""> 
		<label class="etiquette" for="prenom">Prénom:</label><br>
		<input class="entree1" type="text" name="prenom" id="prenom" value=""><br>
		<label class="etiquette" for="nom">Nom:</label><br>
		<input class="entree1" type="text" name="nom" id="nom" value=""><br>
		<label class="etiquette" for="login">Login:</label><br>
		<input class="entree1" type="text" name="login" id="login" value=""><br>
		<label class="etiquette" for="password">Password:</label><br>
		<input class="entree1" type="password" name="password" id="password" value=""><br>
		<label class="etiquette" for="confirmer">Confirmer Password:</label><br>
		<input class="entree1" type="password" name="confirmer" id="confirmer" value=""><br>
	</form> 
	</div>
	<form method="post" action="" enctype="multipart/form-data">
			<div class="CAavatar1">
				Avatar 
			</div>

		 <input type="file" class="CAavatar2" name="avatar" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
			<!--input style="font-size: 1.5vw;float: left; margin-top: 2vh;margin-left: 2vw; color: red; background: grey; height: 2vw; border-radius: 5px;" type="file" name="avatar" id="filetoUpload"/-->
			<input class="CAavatar3" type="submit" name="submit" value="Creer Compte">
	</form>
	</div>
	</div>
</body>
</html>