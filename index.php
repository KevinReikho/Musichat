<!DOCTYPE html>
<html>
    <head>
	<title>Le tchat en AJAX !</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    </head>

    <body>
        <div id="messages">
            <?php
              include('messages.php');
            ?>
        </div>

	<form method="POST" action="traitement.php">
	    Pseudo : <input type="text" name="auteur" id="auteur" /><br />
	    Message : <textarea name="message" id="message"></textarea><br />
	    <input type="submit" name="submit" value="Envoyez votre message !" id="envoi" />
	</form>


<script src="script.js"></script>
    </body>
</html>
