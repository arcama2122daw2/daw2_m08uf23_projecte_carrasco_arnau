<?php
	require 'vendor/autoload.php';
	use Laminas\Ldap\Attribute;
	use Laminas\Ldap\Ldap;
	
	ini_set('display_errors', 0);
    
	if ($_POST['method'] == "PUT") {
	    if ($_POST['uid'] && $_POST['unitat_organitzativa'] && $_POST['radio'] && $_POST['nouContingut']) {
	        $atribut = $_POST['radioValue'];
	        $nou_contingut = $_POST['nouContingut'];
	        
	        $uid = $_POST['uid'];
	        $unitat_organitzativa = $_POST['unitat_organitzativa'];
	        $dn = 'uid='.$uid.',unitat_organitzativa='.$unitat_organitzativa.',dc=fjeclot,dc=net';
	        
	        $opcions = [
	            'host' => 'zend-arcama.fjeclot.net',
	            'username' => 'cn=admin,dc=fjeclot,dc=net',
	            'password' => 'fjeclot',
	            'bindRequiresDn' => true,
	            'accountDomainName' => 'fjeclot.net',
	            'baseDn' => 'dc=fjeclot,dc=net',
	        ];
	        
	        $ldap = new Ldap($opcions);
	        $ldap->bind();
	        $entrada = $ldap->getEntry($dn);
	        if ($entrada){
	            Attribute::setAttribute($entrada,$atribut,$nou_contingut);
	            $Modificat = true;
	            $ldap->update($dn, $entrada);
	            echo "Atribut modificat";
	        } else echo "<b>Aquesta entrada no existeix</b><br><br>";	
	    }
	}

?>
<html>
	<head>
		<title>
			MODIFICACIO USUARI
		</title>
	</head>
	<body>
	<h1>MODIFICACIO USUARI</h1>
		<form action="http://zend-arcama.fjeclot.net/projecte_ldap/modificarU.php" method="POST">
			<input type="text" name="method" class="amaga" >
			UID: <input type="text" name="uid" required ><br>
			Unitat organitzativa: <input type="text" name="unitat_organitzativa" required ><br>
			UIDnumber: <input type="radio" name="uidNumber"  ><br>
			GIDnumber: <input type="radio" name="gidNumber"  ><br>
			Directori personal: <input type="radio" name="directori_personal"  ><br>
			Shell: <input type="radio" name="shell"  ><br>
			CN: <input type="radio" name="cn"  ><br>
			SN: <input type="radio" name="sn"  ><br>
			Given name: <input type="radio" name="givenName"  ><br>
			Movil: <input type="radio" name="mobile" required ><br>
			Postal adress: <input type="radio" name="postalAdress"  ><br>
			Telefhone number: <input type="radio" name="telephoneNumber"  ><br>
			Title: <input type="radio" name="title"  ><br>
			Description: <input type="radio" name="description"  ><br>
			<input type="text" name="nouContingut" placeholder="Introduce el nuevo contenido" required /><br>
			<input type="submit" value="Modifica Usuari" />
		</form>
		<a href="http://zend-arcama.fjeclot.net/projecte_ldap/menu.php">Torna al menu</a>
	</body>
</html>