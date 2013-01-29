<?php
session_start();
// Si on récupère les variables du formulaire de la page d'accueil : on créé les cookies correspondants
  if( isset($_POST['region']) && isset($_POST['btTag']) && isset($_POST['btNum']) && isset($_POST['heroID']) ) {
		setcookie('region', htmlspecialchars($_POST['region']), time() + 365*24*3600);
		setcookie('btTag', htmlspecialchars($_POST['btTag']), time() + 365*24*3600);
		setcookie('btNum', htmlspecialchars($_POST['btNum']), time() + 365*24*3600);
		setcookie('heroID', htmlspecialchars($_POST['heroID']), time() + 365*24*3600);
	}
	// include('generateur.php')
    include('json.php')
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <!--script src ="scripts.js" type="text/javascript"></script-->
	<title>D3 Calculator</title>  
</head>

<body> <!-- CORPS DE LA PAGE -->
<div id="error"></div>
<a href="">Actualiser</a><br>
<a href="index.php">Accueil</a>
<h1>Diablo 3 Calculator</h1>
<div id="name"></div>
<div id="class"></div>
<div class="stats"><h2>Stats</h2>
</div>

<div class="stuff"><h2>Equipement</h2>


</div>
<?php 
foreach ($_SESSION as $key => $val){
  echo "<b>".$key."</b>"." : ".$val."<br>";
}

?>
<div id="var_stats">
</div>
</body>
</html>
