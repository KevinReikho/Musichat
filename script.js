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

        $('#messages').append("<p>" + auteur + " dit : " + message + "</p>");
    }
});

function init() {
  $.ajax({
      url : "messages.php",
      type : 'GET',
      success : function(html){
          $('#messages').prepend(html); // on veut ajouter les nouveaux messages au début du bloc #messages
      }
  });
}

init();

function charger(){

  var firstID = $('#messages p:last').attr('id');

    setTimeout( function(){
        // on lance une requête AJAX
        $.ajax({
            url : "messages.php?id=" + firstID,
            type : 'GET',
            success : function(html){
                $('#messages').prepend(html); // on veut ajouter les nouveaux messages au début du bloc #messages
            }
        });

        charger(); // on relance la fonction

    }, 2000); // on exécute le chargement toutes les 5 secondes

}

charger();
