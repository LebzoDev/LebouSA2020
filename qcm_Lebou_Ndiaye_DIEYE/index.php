<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
</head>
<body class="imageBackGround">
	<div class="header1">
		<img class="logohead" src="asset/img/logo-QuizzSA.png">
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
			<div class="icone1">
			<img src="asset/img/Icônes/ic-login.png">
			</div>
			</div>
		</div>
		<div class="espaceLogin_Mdp">
			<input class="login" type="password" name="password">
			<div class="iconeEspace">
				<div class="icone1">
				<img src="asset/img/Icônes/ic-password.png">
				</div>
			</div>
		</div>
		<div class="inscription1">
				<strong><input class="connexion" type="submit" name="connexion" value="Connexion"> </strong>
				<strong><input class="inscrire" type="submit" name="sinscrire" value="S'inscire pour jouer ???"> </strong>
		</div>
		</form>
		<br/><br><br>
		<?php
	// chemin d'accès à votre fichier JSON
$file = 'asset/json/base.json'; 
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
 			$_SESSION['pp']=$value->photoprofile;
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
			<div style="text-align:center; width: 100%;color: red; height: 3vw; margin: 2vw auto; font-size: 2vw;">
				<strong>Login OU mot de passe incorrect(s)</strong>
			</div>
			<?php
			}
 }elseif (isset($_POST['sinscrire'])){
 	header('Location: CreaComptUser.php');
 }
 echo "<hr style='background:transparent; height:5px;border:none;'>";
?>

	</div>
</body>
</html>