<?php
//L'appel de nouvelle session
session_start();

//Redirection vers la page d'authentification en cas de deconnexion
if (isset($_POST['creationCompte'])){
	header('Location: index.php');
}
//Debut du document 
?>
<!DOCTYPE html>
<html>
<!--ENTETE DU DOCUMENT-->
<head>
	<meta charset="utf-8">
	<title>Page d'accueil</title>
	<link rel="stylesheet" type="text/css" href="asset/css/styleFool.css">
</head>
<!--CORPS DU DOCUMENT-->
<body class="imageBackGround">
	<div class="header1">
		<img class="logohead" src="asset/img/logo-QuizzSA.png">
		<div class="titrehead">
			<strong> Le plaisir de jouer</strong>
		</div>
	</div>
	<div>
		<div class="general1">
			<div class="pp1">

				<?php
//				if (empty($erreur)){
					?>	
					<img name="avatar" class="imagepp" id="blah" alt="your image"  />
					<!--img style="border:2px solid black; border-radius: 50%; width: 15vw; height: 15vw;"; src="membres/avatar/<?php// echo "profile.".$extensionToUpload;?>" /-->.
					<?php
//				}
				?>
			</div>
			<div class="titlecomptuser">
				<h3 class="titre3"> S'inscrire</h3>
				<hr class="barre3">
				<h6 class="titre4"> Pour tester votre niveau de Culture Gérérale</h6> 
			</div>
			<hr class="barre4">
			<div class="informations">
				<form method="post" action=""> 
					<label class="etiquettejoueur" for="prenom">Prénom:</label><br>
					<input class="entree1" type="text" name="prenom" id="prenom" value="<?php echo $_POST['prenom']?>"><br>
					<label class="etiquettejoueur" for="nom">Nom:</label><br>
					<input class="entree1" type="text" name="nom" id="nom" value="<?php echo $_POST['nom']?>"><br>
					<label class="etiquettejoueur" for="login">Login:</label><br>
					<input class="entree1" type="text" name="login" id="login" value="<?php echo $_POST['login']?>"><br>
					<label class="etiquettejoueur" for="password">Password:</label><br>
					<input class="entree1" type="password" name="password" id="password" value="<?php echo $_POST['password']?>"><br>
					<label class="etiquettejoueur" for="confirmer">Confirmer Password:</label><br>
					<input class="entree1" type="password" name="confirmer" id="confirmer" value="<?php echo $_POST['confirmer']?>"><br>
				</form> 
			</div>
			<form method="post" action="" enctype="multipart/form-data">

				<div class="avatar1">
					Avatar 
				</div>

				<input class="avatar2" type="file" name="avatar" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
				<!--input style="font-size: 1.5vw;float: left; margin-top: 2vh;margin-left: 2vw; color: red; background: grey; height: 2vw; border-radius: 5px;" type="file" name="avatar" id="filetoUpload"/-->
				<input class="avatar3" type="submit" name="creationCompte" value="Je sert à quitter pour l'instant">
			</form>
		</div>
	</div>
</body>
</html>