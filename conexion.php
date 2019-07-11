<?php

try {
	$conexion = new PDO ('mysql:host=localhost;dbname=puntodigital','root','');
	echo "Conexion ok";
} catch (PDOException $e) {
	echo " Error: " . $e->getMessage();
	
}

?>