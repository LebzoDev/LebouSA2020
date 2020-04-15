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
	<link rel="stylesheet" type="text/css" href="pageDeJeux.css">
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
			<div class="profile">
				<div style="margin-left: 5%; border: none;width: 7vw; height: 7vw; float: left;">
			<?php
			if (!isset($_FILES['avatar'])){
			?>	

							<img style="border:2px solid black; border-radius: 50%; width: 100%; height: 100%;"; src="membres/avatar/<?php  echo $_SESSION['pp'];?>" />.
			<?php
				echo $_SESSION['id'];
				}
			?>
			</div>
			</div>
			<div class="titreDeconnect">
				<p align="center">
			<strong>BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ <br/> JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERALE</strong>
			</p>
			</div>
			<div class="buttonDeconnect">
			<input class="deconnexion" type="submit" name="deconnexion" value="Deconnexion">
			</div>
		</div>
		</form>
	</div>
</body>
</html>
