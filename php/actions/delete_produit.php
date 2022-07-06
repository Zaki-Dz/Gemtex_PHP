<?php

	include_once '../inc/connection.inc.php';

	if (isset($_GET['id'])) {
		
		extract($_GET);
		
		$q = 'delete from produits where id = ?';

		$stmt = $pdo->prepare($q);

		$stmt->execute([$id]);

		unlink('../../images/' . $nom);

		header('location: ../../admin/produits.php');

	} else {

		header('location: ../../admin/produits.php');

	}
