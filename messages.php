<?php

// ...
// on se connecte à notre base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=musicon', 'musicon', 'musicon');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}


    // on récupère les messages ayant un id plus grand que celui donné
    $requete = $bdd->prepare('SELECT * FROM message');
    $messages = null;
    $requete->execute();

    while ($donnees = $requete->fetch()){
   $messages .= "<p id=\"" . $donnees['id_message'] . "\">" . $donnees['auteur'] . " dit : " . $donnees['message'] . "</p>";


}

      echo $messages;






?>
