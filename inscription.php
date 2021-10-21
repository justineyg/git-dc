<?php //inscription.php

require_once('settings.php');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('partials/head.php'); ?>
    <title>Inscription</title>
</head>
<body>
    <?php include('partials/menu.php'); ?>
    <h1>Page d'inscription Employés</h1>

    <form action="POST">

    <p>
		<label for="nom">Nom</label>
		<input type="text" name="nom" id="nom">
	</p>

	<p>
		<label for="prenom">Prénom</label>
		<input type="text" name="duree" id="prenom">
	</p>

	<p>
		Sexe : 


		<input type="radio" name="sexe" id="m" value="m">
		<label for="m">m</label>


		<input type="radio" name="sexe" id="f" value="f">
		<label for="f">f</label>



	<p>
		<label for="service">Service</label>
		<input name="text" id="service"></input>
	</p>

	<p>
		<label for="date_embauche">Date d'embauche </label>
		<input type="date" name="date_embauche" placeholder="La date d'embauche' au format YYYY-MM-JJ" id="date_embauche">
	</p>

    <p>
		<label for="salaire">Salaire</label>
		<input type="text" name="salaire" id="salaire">
	</p>

    <p>
		<button type="submit">Ajouter</button>
	</p>

    </form>
</body>
</html>