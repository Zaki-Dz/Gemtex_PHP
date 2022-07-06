<?php

	include_once '../inc/connection.inc.php';

	if (isset($_POST['id'])) {
		
		extract($_POST);

		
		$q = 'update categories set libelle = ? where id = ?';

		$stmt = $pdo->prepare($q);

		$stmt->execute([$name, $id]);

		header('location: ../../admin/categories.php');

	} else {

		header('location: ../../admin/categories.php');

	}
