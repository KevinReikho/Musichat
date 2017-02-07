<?php

// on se connecte à notre base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=musicon', 'musicon', 'musicon');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['submit'])){ // si on a envoyé des données avec le formulaire

    if(!empty($_POST['auteur']) AND !empty($_POST['message'])){ // si les variables ne sont pas vides

        $auteur = $_POST['auteur'];
        $message = $_POST['message'];

        // puis on entre les données en base de données :
        $insertion = $bdd->prepare('INSERT INTO message VALUES("", :timestampvalue, :auteur, :message)');
        $insertion->execute(array(
            'timestampvalue' => time(),
            'auteur' => $auteur,
            'message' => $message
        ));
      echo "error code : " ;
      echo $insertion->errorCode();
      echo "<br /> error info : ";
      print_r ($insertion->errorInfo());

    }
    else{
        echo "Vous avez oublié de remplir un des champs !";
    }

}

?>
