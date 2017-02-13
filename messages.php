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

  $timestamp = (int) $_GET['timestamp'];

  $timestamp = floor(($timestamp/1000)-3600);

      $requete = $bdd->prepare('SELECT * FROM message WHERE date > :timestamp');
      $messages = null;
      $requete->execute(array(
        "timestamp" => $timestamp
      ));





    while ($donnees = $requete->fetch()){
   $messages .= "<p id=\"" . $donnees['id_message'] . "\">" . $donnees['auteur'] . " dit : " . $donnees['message'] . "</p>";


}

      echo $messages;






?>
