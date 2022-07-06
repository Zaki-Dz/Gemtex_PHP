<?php

	$host = 'localhost';
	$dbname = 'gem_tex';
	$user = 'root';
	$password = '';
	
	try{
		$pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password);
	} catch (PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
