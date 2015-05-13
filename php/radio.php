<?php

function ecrire_jingle()
{
	$jingle = array (
	   'title' => 'Jingle',
	   'artist' => 'Radio Zozo',
	   'mp3' => '/mp3/jingle.mp3'
  );
return $jingle;
}
function ecrire_playlist(&$j,&$fichier_ligne)
{
			$id = rand(0,$j);
			$temp= rtrim($fichier_ligne[$id], " \n.");
			$chanson= explode(";",$temp);
			$chanson = array(
				'title' => $chanson[2],
				'artist' => $chanson[1],
				'mp3' => "/mp3/" . $chanson[0]
				);
	return $chanson;
}
$fichier_ligne = file("../liste.csv");
$j = count($fichier_ligne)-1;
$nbre_morceaux = 6; 

srand((double)microtime()*1000000);
for($k=0; $k != 20; $k++)
	{
	for($i=0; $i != 6; $i++)
		{
		$response["track$k$i"] = ecrire_playlist($j,$fichier_ligne);	
		}
	$response["jingle$k"] = ecrire_jingle();	
	}
echo json_encode($response);
?>
