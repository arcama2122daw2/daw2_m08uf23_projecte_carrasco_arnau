<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);

if ($_POST['method'] == "DELETE") {
    if ($_POST['uid'] && $_POST['ou']){
        $uid = $_POST['uid'];
        $ou = $_POST['ou'];
        $dn = 'uid='.$uid.',ou='.$ou.',dc=fjeclot,dc=net';
        
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
        $Esborrat = false;
        try{
            if ($ldap->delete($dn)) echo "<b>Esborrat correctament</b><br>";
        } catch (Exception $e){
            echo "<b>Text incorrect</b><br><br>";
        }
    }
}

?>
<html>
	<head>
		<title>
			ESBORRANT USUARI
		</title>
		<style>
            .amaga{
            	display:none;
            }
        </style>
	</head>
	<body>
	<h1>ESBORRANT USUARI</h1>
		<form action="http://zend-arcama.fjeclot.net/projecte_ldap/eliminarU.php" method="POST" autocomplete="off">
			<input type="text" name="method" value="DELETE" class="amaga"><br><br>
			UID: <input type="text" name="uid"><br>
			Unitat organitzativa: <input type="text" name="ou"><br>
			<input type="submit" value="Envia" />
			<input type="reset" value="Neteja" />
		</form>
		<a href="http://zend-arcama.fjeclot.net/projecte_ldap/menu.php">Torna al menu</a>
	</body>
</html>
