<?php

	require '../php/inc/connection.inc.php';

	session_start();

	if (!isset($_SESSION['admin'])) {
		header('location: ./');
	}

	$isConnected = false;

	if ($_SESSION['admin']) {
		$isConnected = true;
	}

	function getNumRows($pdo, $tableName) {
		$q = "select * from $tableName";

		$stmt = $pdo->query($q);

		$stmt->fetch();

		$num = $stmt->rowCount();

		echo $num;
	}

	// Number of visitors
	$q = 'select total_counter from counter limit 1';

	$stmt = $pdo->query($q);

	$row = $stmt->fetch();

	$num_visitors = $row['total_counter'];

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php echo $isConnected ? 'Admin' : 'GemTex'; ?></title>
		<link rel="stylesheet" type="text/css" href="../css/inc/all.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/admin.css" />
		<link rel="stylesheet" type="text/css" href="../css/pages/dashboard.css" />
	</head>

	<body>
		<aside>
			<div class="logo"></div>

			<div class="bottom">
				<nav>
					<ul>
						<a href="#">
							<li class="active">
								<i class="fa-solid fa-shapes"></i>
								Dashboard
							</li>
						</a>

						<a href="categories.php">
							<li>
								<i class="fa-solid fa-table-cells-large"></i>
								Categories
							</li>
						</a>

						<a href="produits.php">
							<li>
								<i class="fa-solid fa-list"></i>
								Produits
							</li>
						</a>

						<a href="messages.php">
							<li>
								<i class="fa-regular fa-message"></i>
								Messages
							</li>
						</a>

						<a href="partenaires.php">
							<li>
								<i class="fa-regular fa-handshake"></i>
								Partenaires
							</li>
						</a>

						<a href="../">
							<li>
								<i class="fa-solid fa-arrow-left"></i>
								Retour
							</li>
						</a>
					</ul>
				</nav>

				<div class="logout">
					<form action="../php/actions/logout.php" method="post">
						<button type="submit" name="submit">
							<i class="fa-solid fa-arrow-right-from-bracket"></i>Se deconnecter
						</button>
					</form>
				</div>
			</div>
		</aside>

		<div class="shapes">
			<div class="shape"></div>
			<div class="shape"></div>
		</div>

		<main>
			<div class="page-title">
				<h2>Dashboard</h2>
			</div>

			<div class="content">
				<div class="boxes">
					<a href="categories.php">
						<div class="box">
							<h3>Categories</h3>

							<span><?php getNumRows($pdo, 'categories'); ?></span>
						</div>
					</a>

					<a href="produits.php">
						<div class="box">
							<h3>Produits</h3>

							<span><?php getNumRows($pdo, 'produits'); ?></span>
						</div>
					</a>

					<a href="messages.php">
						<div class="box">
							<h3>Messages</h3>

							<span><?php getNumRows($pdo, 'messages'); ?></span>
						</div>
					</a>

					<a href="partenaires.php">
						<div class="box">
							<h3>Partenaires</h3>

							<span><?php getNumRows($pdo, 'partenaire'); ?></span>
						</div>
					</a>

					<a href="partenaires.php">
						<div class="box">
							<h3>Visiteurs</h3>

							<span><?php echo $num_visitors ?></span>
						</div>
					</a>
				</div>
			</div>
		</main>
	</body>
</html>
