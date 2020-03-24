<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Exercice 2</title>
	<link rel="stylesheet" type="text/css" href="stylexo2.css">
</head>
<body>
<!--Definition de notre tableau de mois français et anglais -->
<?php
	$Mois =[
	'1' => ['Janvier','January'],
	'2' =>['Fevrier','February'],
	'3' =>['Mars','Mars'],
	'4' =>['Avril','April'],
	'5' =>['Mai','May'],
	'6' =>['Juin','June'],
	'7' =>['Juillet','July'],
	'8' =>['Aout','August'],
	'9' =>['Septempbre','September'],
	'10' =>['Octobre','October'],
	'11' =>['Novembre','November'],
	'12' =>['Decembre','December']];
?>
<!--Phase d'entrée ou de choix des arguments-->
<div class="cadre">
		<form method="POST" action="exo2.php">
	  		<label class="choix" for="value"><strong> CHOISIR UNE LANGUE:</strong></label><br/>
	  		<select class="selection" id="value" name="valeur" size="1">
	  			<option value=" ">Choix</option>
	    		<option value="français"><strong>Français</strong></option>
	    		<option value="anglais"><strong>Anglais</strong></option>
	  		</select>
	  		<strong><input class="valider" type="submit" value="Executer"></strong>
		</form>
</div>

<div class="background">

	<div class="front">
		<?php
	//If the User choose french as langage
	if ($_POST['valeur']=="français") {
?>
<br/><br/>
	<table>
<?php
		for ($i=1; $i <=10 ; $i+=3)
		{
			echo "<tr>";
			for ($j=$i; $j<= $i+2 ; $j++)
			{ 
?>			
				<td><?php echo $j ?></td>
				<td><?php echo $Mois[$j][0] ?></td>
<?php		}
			echo "</tr>";	
		}
?>
	</table> 
<?php
}
//Elseif just to mean if the user choose english as langage
	elseif ($_POST['valeur']=="anglais")
	{	
?>
		<br/><br/>
		<table>
<?php
		for ($i=1; $i <=10 ; $i+=3)
		{
			echo "<tr>";
			for ($j=$i; $j<= $i+2 ; $j++)
			{ 
?>			
				<td><?php echo $j ?></td>
				<td><?php echo $Mois[$j][1] ?></td>
<?php		}
			echo "</tr>";	
		}
?>
		</table> 
<?php
	}
?>
<br/><br/>

	</div>
	
</div>

</body>
</html>