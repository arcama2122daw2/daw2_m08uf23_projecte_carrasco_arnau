<?php
    require 'vendor/autoload.php';
	use Laminas\Ldap\Ldap;

	ini_set('display_errors', 0);
	if ($_POST['uid'] && $_POST['unorg']){
	   $opcions = [
            'host' => 'zend-arcama.fjeclot.net',
		    'username' => "cn=admin,dc=fjeclot,dc=net",
   		    'password' => 'fjeclot',
   		    'bindRequiresDn' => true,
		    'accountDomainName' => 'fjeclot.net',
   		    'baseDn' => 'dc=fjeclot,dc=net',
       ];	
	   $ldap = new Ldap($opcions);
	   $uid='uid='.$_POST['uid'].',dc=fjeclot,dc=net';
	   $cts=$_POST['cts'];
	   try{
	       $ldap->bind($uid,$cts);
	       header("location: eliminarU.php");
	   } catch (Exception $e){
	       echo "<b>Text incorrect</b><br><br>";	       
	   }
	}
?>
<html>
	<head>
		<title>
			AUTENTICANT AMB LDAP DE L'USUARI admin
		</title>
	</head>
	<body>
		<form>
			UID: <input type="text" name="uid"><br>
			Unitat organitzativa: <input type="text" name="unorg"><br>
			<input type="submit" value="Envia" />
			<input type="reset" value="Neteja" />
		</form>
	</body>
</html>
