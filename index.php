<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
	<title>D3 Calculator</title>
</head>
<body>
<?php 
if ( isset($_COOKIE['region']) && isset($_COOKIE['btTag']) && isset($_COOKIE['btNum']) && isset($_COOKIE['heroID']) ) {
	echo (
		'Votre personnage existe déjà. Accès direct à la 
		<a href="calc.php">Page des stats</a><br>
		Ou vous pouvez en crééer un nouveau en effaçant vos cookies'
		);
	
}else{
?>
<p><pre>http://<b>eu</b>.battle.net/d3/fr/profile/<b>Termiton</b>-<b>2730</b>/hero/<b>10925158</b></pre><br>
Région : eu<br>
Tag bnet : Termiton<br>
Code bnet : 2730<br>
id héro : 10925158
</p>
<form action="calc.php" method="post"> <!--On envoie le formulaire vers la page calc-php.php avec les variables suivantes : -->
	<p><label>Région</label><input type="text" name="region" /></p>			<!-- $_POST['region'] -->
    <p><label>Tag BattleNet</label><input type="text" name="btTag" /></p>	<!-- $_POST['btTag'] -->
    <p><label>Code BattleNet</label><input type="text" name="btNum" /></p>	<!-- $_POST['btNum'] -->
    <p><label>Id du héro</label><input type="text" name="heroID" /></p>		<!-- $_POST['heroID'] -->
    <p><input type="submit" value="OK" /></p>
</form>
<?php 
	}
?>


</body>
</html>
