<html>
	<head>
		<title>
			CREACIO USUARIS
		</title>
	</head>
	<body>
		<form action="http://zend-arcama.fjeclot.net/projecte_ldap/Crear.php" method="POST">
			UID: <input type="text" name="uid"><br>
			Unitat organitzativa: <input type="password" name="unorg"><br>
			UIDnumber: <input type="text" name="num_id"><br>
			GIDnumber: <input type="text" name="grup"><br>
			Directori personal: <input type="text" name="dir_pers"><br>
			Shell: <input type="text" name="sh"><br>
			CN: <input type="text" name="cn"><br>
			SN: <input type="text" name="sn"><br>
			Given name: <input type="text" name="nom"><br>
			Movil: <input type="text" name="movil"><br>
			Postal adress: <input type="text" name="adressa"><br>
			Telefhone number: <input type="text" name="telefon"><br>
			Title: <input type="text" name="titol"><br>
			Description: <input type="text" name="descripcio"><br>
			<input type="submit" value="Envia" />
			<input type="reset" value="Neteja" />
		</form>
		<a href="http://zend-arcama.fjeclot.net/projecte_ldap/menu.php">Torna al menu</a>
	</body>
</html>