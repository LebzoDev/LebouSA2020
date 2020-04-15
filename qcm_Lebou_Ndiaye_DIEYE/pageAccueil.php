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
	<link rel="stylesheet" type="text/css" href="pageAcceil.css">
</head>
<body class="imageBackGround">
	<div class="header1">
		<img class="logohead" src="Images/logo-QuizzSA.png">
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
						$chemin = "membres/avatar/"."profile".".".$extensionToUpload;
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
			<div style="margin-left: 5%; border: 2px solid black;width: 8.5vw; height: 8.5vw; float: left;">
			<?php
			if (empty($erreur)){
			?>	
							<!--img style="border:2px solid black; border-radius: 50%; width: 100%; height: 100%;" id="blah" alt="your image"  /-->

							<img style="border:2px solid black; border-radius: 50%; width: 100%; height: 100%;"; src="membres/avatar/<?php  echo $_SESSION['pp'];?>" />.
			<?php
				echo $_SESSION['id'];
				}
			?>
			</div>
			<div style="width: 20%;border: 1px solid white; float: left; margin-top: 10%; font-size: 2vw; margin-left: 2vw;">
					<strong> <?php echo $_SESSION['prenom'] ?> </strong> 
			</div>
			<br>
			<div style="width: 20%;border: 1px solid white; float: left; margin-top: 12%; font-size: 2vw; margin-left: -2vw;">
					<strong><?php echo $_SESSION['nom'] ?></strong> 
			</div>
		</div>
		<div>
			<div class="entree2">
				<button class="entree3">
				Liste Questions </button>
				<div class="entree4">
					<p align="center">
					<img src="Images/Icônes/ic-liste.png">
					</p>
				</div>
			</div>
			<div class="entree2hover">
				<button class="entree3">
				Créer Admin </button>
				<div class="entree4">
					<p align="center">
					<img src="Images/Icônes/ic-ajout-active.png">
					</p>
				</div>
			</div>
			<div class="entree2">
				<button class="entree3"> Liste Joueurs</button>
				<div class="entree4">
					<p align="center">
					<img src="Images/Icônes/ic-liste.png">
					</p>
				</div>
			</div>
			<div class="entree2">
				<button class="entree3"s> Créer Questions</button>
				<div class="entree4">
					<p align="center">
					<img src="Images/Icônes/ic-ajout.png">
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="droite">
	<div class="pp" style="float: right;background-color: yellow;width: 30%;height: 15vw;border: 2px solid black;border-radius: 5px;margin-right: 1vw;margin-top: 10vh;text-align: center;">

		<?php
		if (empty($erreur)){
			?>	
							<img name="avatar" style="border:2px solid black; border-radius: 50%; width: 15vw; height: 15vw;" id="blah" alt="your image"  />
							<!--img style="border:2px solid black; border-radius: 50%; width: 15vw; height: 15vw;"; src="membres/avatar/<?php// echo "profile.".$extensionToUpload;?>" /-->.
			<?php
				echo $_SESSION['id'];
				}
			?>
	</div>
	<div style="width:40%; background-color:blue; font-size: 2vw; text-align: center; font-family: OPEN SANS;margin-left: 3vw;">
		<strong> S'inscrire</strong> <hr style="margin-top:0px;margin-bottom: -1vh; height:0px;">
		<strong style="font-size: 1vw">Pour proposer des quizz</strong> 
	</div>
	<hr style="width: 50%; height: 2px; background: white; margin-left: 0px;">
	<div class="informations" style="width: 65%; margin-left: 1.2vw; background: green;">
	<form method="post" action=""> 
		<label class="etiquette" for="prenom">Prénom:</label><br>
		<input class="entree1" type="text" name="prenom" id="prenom" value="<?php echo $_POST['prenom']?>"><br>
		<label class="etiquette" for="nom">Nom:</label><br>
		<input class="entree1" type="text" name="nom" id="nom" value="<?php echo $_POST['nom']?>"><br>
		<label class="etiquette" for="login">Login:</label><br>
		<input class="entree1" type="text" name="login" id="login" value="<?php echo $_POST['login']?>"><br>
		<label class="etiquette" for="password">Password:</label><br>
		<input class="entree1" type="password" name="password" id="password" value="<?php echo $_POST['password']?>"><br>
		<label class="etiquette" for="confirmer">Confirmer Password:</label><br>
		<input class="entree1" type="password" name="confirmer" id="confirmer" value="<?php echo $_POST['confirmer']?>"><br>
	</form> 
	</div>
	<form method="post" action="" enctype="multipart/form-data">
			<div style="font-size: 2.5vw; margin-left: 3vw; width: 30%; background: blue; float: left;">
				Avatar 
			</div>

		 <input type="file" style="font-size: 1.5vw;float: left; margin-top: 2vh;margin-left: 2vw; color: red; background: grey; height: 2vw; border-radius: 5px;" name="avatar" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
			<!--input style="font-size: 1.5vw;float: left; margin-top: 2vh;margin-left: 2vw; color: red; background: grey; height: 2vw; border-radius: 5px;" type="file" name="avatar" id="filetoUpload"/-->
			<input style="float: left; width: 40%; background: yellow; height: 4vw; margin-top: 4vh; margin-left: 30%; border-radius: 5px; font-size: 2vw; cursor: pointer;" type="submit" name="submit" value="Creer Compte">
	</form>
	</div>
	</div>

<?php 
echo $_SESSION['prenom'];
?>
</body>
</html>
