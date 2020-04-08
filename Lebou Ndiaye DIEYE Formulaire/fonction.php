<?php
		#Fonction pour calculer la longueur (la taille) d'un tableau !!!
		function Taille($tableau){
			if (isset($tableau))
			{
			$compteur =0;
			foreach ($tableau as $value) {
				$compteur++;
			}
			return $compteur;
		}
		}
		//Fonction qui permet de cacluler la longueur d'une chaine de caractères
		function longueur($chaine){
			if (isset($chaine)){
				$i=0;
				for($j=0; isset($chaine[$i]); $j++) {
					$i++;
				}
			return $i;
			}
		}
		//Fonction pour voir si une chaine est belle et bien alphabetique
			function alphabetique($chaine){
				$reponse = true;
				for ($i=0; (isset($chaine[$i])) ; $i++) { 
					if (($chaine[$i]<"a" OR $chaine[$i]>"z") AND ($chaine[$i]<"A" OR $chaine[$i]>"Z")) {
						$reponse = false;
					}
				}
				return $reponse;
			}
		//Fonction qui permet de verifier si la taille d'un mot est superieur ou égale une taille donnée.
			function VerifLongueur($chaine,$taillle){
				$longueur = longueur($chaine);
				if ($longueur >= $taillle){
					return true;
				}else{
					return false;
				}
			}
		//Fonction pour definir la regle "a"
			function Regle_A($chaine){
				if (isset($chaine[0]) AND VerifLongueur($chaine,2)){
					if ($chaine[0]>="A" AND $chaine[0]<="Z"){
						return true;
					}
				}
				return false;
			}
		//Fonction pour définir la règle "b"
			function Regle_B($chaine){
				if(longueur($chaine) >= 5){
					if (preg_match("#^[A-Za-z0-9]{3}#", $chaine)) {
						return true;
					}
				}
			}
		//function pour définir les régles "c" "e" et "f"
			function Regle_C($chaine){
				if (preg_match("#^[7][0,5-7][-/. ]?([0-9]{3}[-/. ]?)([0-9]{2}[-/. ]?){2}$#", $chaine))
					return true;
				return false;
			}
		//Foncrion pour définir la règle "d"
			function Regle_D($number,$confirm){
				if ($number==$confirm)
					return true;
			}

		//Fonction pour définir la règle "h"
			function Regle_H($lang){
				if (Taille($lang) >= 2)
					return true;
			}
		//Fonction pour définir la règle i et j
			function Regle_IJ($commentaire){
				preg_match_all("#[A-Za-z]{1}([^.!?]|([.][0-9])){1,199}[.!?]#m", $commentaire,$phrase);
				if (Taille($phrase[0]) >= 3)
					return true;
			}

?>