<?php

	include_once '../inc/connection.inc.php';

	if (isset($_GET['id'])) {
		
		extract($_GET);
		
		$q = 'delete from categories where id = ?';

		$stmt = $pdo->prepare($q);

		$stmt->execute([$id]);

		header('location: ../../admin/categories.php');

	} else {

		header('location: ../../admin/categories.php');

	}
