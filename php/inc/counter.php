<?php

	include_once "connection.inc.php";

	if (!isset($_COOKIE['visit'])) {

		setcookie('visit', 'yes', time() + (60 * 60 * 24));
    
		$pdo->query('update counter set total_counter = total_counter + 1');

	}
