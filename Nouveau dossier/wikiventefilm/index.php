<?php
session_start();
$_SESSION["panier"]=NULL;

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:900|Domine:400,700" rel="stylesheet">
      <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">


			<!-- Ma feuille de style perso-->
	<link href="css/style.css" rel="stylesheet">

			  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	</head>
	<body>
	<?php
		include ("corps.php");
	?>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>
