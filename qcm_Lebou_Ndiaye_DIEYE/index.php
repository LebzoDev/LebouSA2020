<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="imageBackGround">
	<div class="header1">
		<img class="logohead" src="Images/logo-QuizzSA.png">
		<div class="titrehead">
		<strong> Le plaisir de jouer</strong>
		</div>
	</div>
	<div class="espaceConnexion">
		<div class="LoginForm">
			<strong>Login Form</strong>
		</div>
		<form method="POST" action="">
		<div class="espaceLogin_Mdp">
			<input class="login" type="texte" name="login">
			<div class="iconeEspace">
				<p align="center">
			<img src="Images/Icônes/ic-login.png">
			</p>
			</div>
		</div>
		<div class="espaceLogin_Mdp">
			<input class="login" type="password" name="password">
			<div class="iconeEspace">
				<p align="center">
				<img src="Images/Icônes/ic-password.png">
				</p>
			</div>
		</div>
		<div class="inscription">
			
				<strong><input class="connexion" type="submit" name="connexion" value="Connexion"> </strong>
				<strong><input class="inscrire" type="submit" name="sinscrire" value="S'inscire pour jouer ???"> </strong>
		</div>
		</form>
		<br/><br>
		<?php
	// chemin d'accès à votre fichier JSON
$file = 'base.json'; 
// mettre le contenu du fichier dans une variable
$data = file_get_contents($file); 
// décoder le flux JSON
$obj = json_decode($data, false);
// accéder à l'élément approprié

 //$user = $obj->login;
 //$mdp = $obj->password;
 //echo $user."----".$mdp;
 if (isset($_POST['connexion'])){
 	foreach ($obj as $key => $value){
 		if ($_POST['login']==$value->login AND $_POST['password']==$value->password) {
 			$user=$value->login;
 			$mdp=$value->password;
 			$_SESSION['login']=$value->login;
 			$_SESSION['password']=$value->password;
 			$_SESSION['prenom']=$value->prenom;
 			$_SESSION['nom']=$value->nom;
 		if ($value->utilisateur=="administrateur"){
 			header('Location: pageAccueil.php');
 		}
 		elseif ($value->utilisateur=="joueur") {
 			header('Location: pageDeJeux.php');
 		}
 	}
	}
			if (!isset($user) OR (empty($_POST['login'])) OR !isset($mdp) OR (empty($_POST['password']))) {
			?>
			<div style="text-align: center; width: 100%;color: red; height: 10%;">
				<strong>Login OU mot de passe incorrect(s)</strong>
			</div>
			<?php
			}
 }
 echo "<hr>";
?>

		
			<br>
	</div>
</body>
</html>