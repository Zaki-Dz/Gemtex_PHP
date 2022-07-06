<?php

	include_once '../inc/connection.inc.php';

	if (isset($_POST['submit'])) {

		extract($_POST);
		
		if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($telephone) && !empty($message)) {

			$q = 'insert into messages(contenu, nom_expediteur, prenom_expediteur, n_tel_expediteur, email_expediteur) values(?, ?, ?, ?, ?)';

			$stmt = $pdo->prepare($q);

			$stmt->execute([$message, $nom, $prenom, $telephone, $email]);

			header('location: ../../');

		} else {

			echo 'error';

		}

	}