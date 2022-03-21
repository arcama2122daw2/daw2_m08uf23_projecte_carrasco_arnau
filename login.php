<?php
	require 'vendor/autoload.php';
	use Laminas\Ldap\Ldap;
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
	$usuari=$ldap->getEntry('uid=sysdev,ou=desenvolupadors,dc=fjeclot,dc=net');
	echo "<b><u>".$usuari["dn"]."</b></u><br>";
	foreach ($usuari as $atribut => $dada) {
		if ($atribut != "dn") echo $atribut.": ".$dada[0].'<br>';
	}
?>

<html>
	<head>
		<title>
			AUTENTICANT AMB LDAP DE L'USUARI admin
		</title>
	</head>
	<body>
		<form action="http://zend-arcama.fjeclot.net/projecte_ldap/auth.php" method="POST">
			Usuari amb permisos d'administració LDAP: <input type="text" name="adm"><br>
			Contrasenya de l'usuari: <input type="password" name="cts"><br>
			<input type="submit" value="Envia" />
			<input type="reset" value="Neteja" />
		</form>
	</body>
</html>
