<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Attribute;
    use Laminas\Ldap\Ldap;
        
    	ini_set('display_errors', 0);
    	
    	#Afegint la nova entrada
    	if (
    	    $_POST['uid'] && $_POST['ou'] && $_POST['uidNumber'] && $_POST['gidNumber'] && $_POST['homeDirectory'] && $_POST['loginShell']
    	    && $_POST['cn'] && $_POST['sn'] && $_POST['givenName'] && $_POST['postalAdress'] && $_POST['mobile'] && $_POST['telephoneNumber']
    	    && $_POST['title'] && $_POST['description']
    	) {
        	$uid = '' . $_POST['uid'];
        	$ou = '' . $_POST['ou'];
        	$uidNumber = $_POST['uidNumber'];
        	$gidNumber = $_POST['gidNumber'];
        	$homeDirectory = '' . $_POST['homeDirectory'];
            $shell = '' . $_POST['loginShell'];
        	$cn = '' . $_POST['cn'];
        	$sn = '' . $_POST['sn'];
        	$givenName = '' . $_POST['givenName'];
        	$postalAdress = '' . $_POST['postalAdress'];
        	$mobile = '' . $_POST['mobile'];
        	$telephoneNumber = '' . $_POST['telephoneNumber'];
        	$title = '' . $_POST['title'];
        	$description = '' . $_POST['description'];
        	$objcl = array('inetOrgPerson', 'organizationalPerson', 'person', 'posixAccount', 'shadowAccount', 'top');
        
    	$domini = 'dc=fjeclot,dc=net';
    	$opcions = [
            'host' => 'zend-arcama.fjeclot.net',
    	    'username' => "cn=admin,dc=fjeclot,dc=net",
       		'password' => 'fjeclot',
       		'bindRequiresDn' => true,
    		'accountDomainName' => 'fjeclot.net',
       		'baseDn' => 'dc=fjeclot,dc=net',
        ];	
    	$ldap = new Ldap($opcions);
    	$ldap->bind();
    	$nova_entrada = [];
    	Attribute::setAttribute($nova_entrada, 'objectClass', $objcl);
    	Attribute::setAttribute($nova_entrada, 'uid', $uid);
    	Attribute::setAttribute($nova_entrada, 'ou', $ou);
    	Attribute::setAttribute($nova_entrada, 'uidNumber', $uidNumber);
    	Attribute::setAttribute($nova_entrada, 'gidNumber', $gidNumber);
        Attribute::setAttribute($nova_entrada, 'homeDirectory', $homeDirectory);
    	Attribute::setAttribute($nova_entrada, 'loginShell', $shell);
    	Attribute::setAttribute($nova_entrada, 'cn', $cn);
    	Attribute::setAttribute($nova_entrada, 'sn', $sn);
    	Attribute::setAttribute($nova_entrada, 'givenName', $givenName);
    	Attribute::setAttribute($nova_entrada, 'mobile', $mobile);
    	Attribute::setAttribute($nova_entrada, 'postalAddress', $postalAdress);
    	Attribute::setAttribute($nova_entrada, 'telephoneNumber', $telephoneNumber);
    	Attribute::setAttribute($nova_entrada, 'title', $title);
    	Attribute::setAttribute($nova_entrada, 'description', $description);
    	$dn = 'uid=' . $uid . ',ou=' . $ou . ',dc=fjeclot,dc=net';
	    if($ldap->add($dn, $nova_entrada)) {
	        echo "Usuari creat";
	    }
    }
    
?>
<html>
	<head>
		<title>
			CREACIO USUARI
		</title>
	</head>
	<body>
	<h1>CREACIO USUARI</h1>
		<form action="http://zend-arcama.fjeclot.net/projecte_ldap/crearU.php" method="POST" autocomplete="off">
			UID: <input type="text" name="uid" required ><br>
			Unitat organitzativa: <input type="text" name="ou" required ><br>
			UIDnumber: <input type="text" name="uidNumber" required ><br>
			GIDnumber: <input type="text" name="gidNumber" required ><br>
			Directori personal: <input type="text" name="homeDirectory" required ><br>
			Shell: <input type="text" name="loginShell" required ><br>
			CN: <input type="text" name="cn" required ><br>
			SN: <input type="text" name="sn" required ><br>
			Given name: <input type="text" name="givenName" required ><br>
			Movil: <input type="text" name="mobile" required ><br>
			Postal adress: <input type="text" name="postalAdress" required ><br>
			Telefhone number: <input type="text" name="telephoneNumber" required ><br>
			Title: <input type="text" name="title" required ><br>
			Description: <input type="text" name="description" required ><br>
			<input type="submit" value="Envia" />
			<input type="reset" value="Neteja" />
		</form>
		<a href="http://zend-arcama.fjeclot.net/projecte_ldap/menu.php">Torna al menu</a>
	</body>
</html>