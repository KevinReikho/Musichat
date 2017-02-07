$('#envoi').click(function(e){
    e.preventDefault(); // on empêche le bouton d'envoyer le formulaire

    var auteur = encodeURIComponent( $('#auteur').val() ); // on sécurise les données
    var message = encodeURIComponent( $('#message').val() );

    if(auteur != "" && message != ""){ // on vérifie que les variables ne sont pas vides
        $.ajax({
            url : "traitement.php", // on donne l'URL du fichier de traitement
            type : "POST", // la requête est de type POST
            data : "auteur=" + auteur + "&message=" + message + "&submit=1"// et on envoie nos données
        });
    }
});
