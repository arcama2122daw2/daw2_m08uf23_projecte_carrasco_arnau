<?php
    require 'vendor/autoload.php';
    use Laminas\Ldap\Attribute;
    	use Laminas\Ldap\Ldap;
    
    	ini_set('display_errors', 0);
    	
    	#Afegint la nova entrada
    	if (
    	    $_POST['uid'] && $_POST['unitat_organitzativa'] && $_POST['uidNumber'] && $_POST['gidNumber'] && $_POST['directori_personal'] && $_POST['shell']
    	    && $_POST['cn'] && $_POST['sn'] && $_POST['givenName'] && $_POST['postalAdress'] && $_POST['mobile'] && $_POST['telephoneNumber']
    	    && $_POST['title'] && $_POST['description']
    	) {
        	$uid = '' . $_POST['uid'];
        	$unitat_organitzativa = '' . $_POST['unitat_organitzativa'];
        	$uidNumber = $_POST['uidNumber'];
        	$gidNumber = $_POST['gidNumber'];
        	$directori_personal = '' . $_POST['directori_personal'];
            $shell = '' . $_POST['shell'];
        	$cn = '' . $_POST['cn'];
        	$sn = '' . $_POST['sn'];
        	$givenName = '' . $_POST['givenName'];
        	$postalAdress = '' . $_POST['postalAdress'];
        	$mobile = '' . $_POST['mobile'];
        	$telephoneNumber = '' . $_POST['telephoneNumber'];
        	$title = '' . $_POST['title'];
        	$description = '' . $_POST['description'];
        
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
    	$nova_entrada = [];
    	Attribute::setAttribute($nova_entrada, 'uid', $uid);
    	Attribute::setAttribute($nova_entrada, 'unitat_organitzativa', $unitat_organitzativa);
    	Attribute::setAttribute($nova_entrada, 'uidNumber', $uidNumber);
    	Attribute::setAttribute($nova_entrada, 'gidNumber', $gidNumber);
    	Attribute::setAttribute($nova_entrada, 'directori_personal', $directori_personal);
    	Attribute::setAttribute($nova_entrada, 'shell', $shell);
    	Attribute::setAttribute($nova_entrada, 'cn', $cn);
    	Attribute::setAttribute($nova_entrada, 'sn', $sn);
    	Attribute::setAttribute($nova_entrada, 'givenName', $givenName);
    	Attribute::setAttribute($nova_entrada, 'mobile', $mobile);
    	Attribute::setAttribute($nova_entrada, 'postalAdress', $postalAdress);
    	Attribute::setAttribute($nova_entrada, 'telephoneNumber', $telephoneNumber);
    	Attribute::setAttribute($nova_entrada, 'title', $title);
    	Attribute::setAttribute($nova_entrada, 'description', $description);
    	$dn = 'uid='.$uid.',unitat_organitzativa='.$unitat_organitzativa.',dc=fjeclot,dc=net';
	    if($ldap->add($dn, $nova_entrada)) echo "Usuari creat";	
    }
    	
?>
<html>
	<head>
		<title>
			CREACIO USUARIS
		</title>
	</head>
	<body>
	<h1>CREACIO USUARI</h1>
		<form action="http://zend-arcama.fjeclot.net/projecte_ldap/crearU.php" method="POST">
			UID: <input type="text" name="uid" required ><br>
			Unitat organitzativa: <input type="text" name="unitat_organitzativa" required ><br>
			UIDnumber: <input type="text" name="uidNumber" required ><br>
			GIDnumber: <input type="text" name="gidNumber" required ><br>
			Directori personal: <input type="text" name="directori_personal" required ><br>
			Shell: <input type="text" name="shell" required ><br>
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