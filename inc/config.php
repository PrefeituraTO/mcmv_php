<?php
try {
	global $pdo; 
	$pdo = new PDO("mysql:dbname=banco; host=localhost", "root", "");
} catch (Exception $e) {
	echo "Erro".$e->getMessage();
}
?>