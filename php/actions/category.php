<?php

	include_once '../inc/connection.inc.php';

	if (isset($_POST['submit'])) {

		extract($_POST);
		
		if (!empty($name)) {

			$q = 'insert into categories(libelle) values(?)';

			$stmt = $pdo->prepare($q);

			$stmt->execute([$name]);

			header('location: ../../admin/categories.php');

		} else {

			header('location: ../../admin/categories.php');

		}

	}