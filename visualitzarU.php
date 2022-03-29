<?php
	require 'vendor/autoload.php';
	use Laminas\Ldap\Ldap;
	
	ini_set('display_errors', 0);
	
	#Visualitzar usuari
	if ($_GET['uid'] && $_GET['unitat_organitzativa']){
	    $domini = 'dc=fjeclot,dc=net';
	    $opcions = [
	        'host' => 'zend-arcama.fjeclot.net',
	        'username' => "cn=admin,$domini",
	        'password' => 'fjeclot',
	        'bindRequiresDn' => true,
	        'accountDomainName' => 'fjeclot.net',
	        'baseDn' => 'dc=fjeclot,dc=net',
	    ];
	    $ldap = new Ldap($opcions);
	    $ldap->bind();
	    $entrada='uid='.$_GET['uid'].',unitat_organitzativa='.$_GET['unitat_organitzativa'].',dc=fjeclot,dc=net';
	    $usuari=$ldap->getEntry($entrada);
	    echo "<b><u>".$usuari["dn"]."</b></u><br>";
	    foreach ($usuari as $atribut => $dada) {
	        if ($atribut != "dn") echo $atribut.": ".$dada[0].'<br>';
	    }
	}
	
?>
<html>
	<head>
		<title>
			QUIN USUARI VOLS VISUALITZAR
		</title>
	</head>
	<body>
	<h1>VISUALITZAR USUARI</h1>
		<form action="http://zend-arcama.fjeclot.net/projecte_ldap/visualitzarU.php" method="GET">
			Identificador(uid): <input type="text" name="uid"><br>
			Unitat organitzativa: <input type="text" name="unitat_organitzativa"><br>
			<input type="submit" value="Envia" />
			<input type="reset" value="Neteja" />
		</form>
		<a href="http://zend-arcama.fjeclot.net/projecte_ldap/menu.php">Torna al menu</a>
	</body>
</html>