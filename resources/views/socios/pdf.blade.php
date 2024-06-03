<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<h1>Carnet</h1>
	
	<script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>



	<ul class="contact-list">

	</ul>

	<button class="btn-show-contact-form">+</button>
	<button class="btn-remove-contacts">Supprimer</button>

	<div class="form-contact">
		
		Civilité 
		<select id="title">
			<option>Madame</option>
			<option>Monsieur</option>
		</select>
		<br>

		Nom <input id="lastname"><br>
		Prénom <input id="firstname"><br>
		Téléphone<input id="phone"><br>
		<button class="btn-save-contact">Enregistrer</button>
	</div>


	<div class="contact-details">
		<h2></h2>
		<div class="phone"></div>
	</div>


	<script src="js/AddressBook.js"></script>
	<script src="js/carnet.js"></script>
</body>
</html>