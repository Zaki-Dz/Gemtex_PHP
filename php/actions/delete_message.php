<?php

	include_once '../inc/connection.inc.php';

	if (isset($_GET['id'])) {
		
		extract($_GET);
		
		$q = 'delete from messages where id = ?';

		$stmt = $pdo->prepare($q);

		$stmt->execute([$id]);

		header('location: ../../admin/messages.php');

	} else {

		header('location: ../../admin/messages.php');

	}
