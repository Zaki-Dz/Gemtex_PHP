<?php

	session_start();

	include_once '../inc/connection.inc.php';

	if (isset($_POST['submit'])) {

		extract($_POST);

		$q = 'select * from admin';
		$stmt = $pdo->query($q);

		while ($row = $stmt->fetch()) {

			if ($user != $row['user']) {
				header('location: ../../admin/?user_err');

			} else if (!password_verify($password, $row['password'])) {
				header('location: ../../admin/?mdp_err');

			} else {
				$_SESSION['admin'] = $user;

				header('location: ../../admin/dashboard.php');
			}
		}
	}