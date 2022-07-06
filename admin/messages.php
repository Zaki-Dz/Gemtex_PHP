<?php

	include_once '../php/inc/connection.inc.php';

	session_start();

	if (!isset($_SESSION['admin'])) {
		header('location: ./');
	}

	$isConnected = false;

	if ($_SESSION['admin']) {
		$isConnected = true;
	}

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
		<script src="../js/recherche.js" defer></script>
	</head>

	<body>
		<aside>
			<div class="logo"></div>

			<div class="bottom">
				<nav>
					<ul>
						<a href="dashboard.php">
							<li>
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

						<a href="#">
							<li class="active">
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
				<h2>Messages</h2>
			</div>

			<div class="content">
				<div class="top">
					<div class="input-box">
						<input type="text" required />
						<div class="placeholder">Rechercher...</div>
					</div>
				</div>

				<div class="bottom">
					<div class="tab-content active" data-id="1">
						<table>
							<thead>
								<th>Nom</th>
								<th>Message</th>
								<th>Contact</th>
								<th></th>
							</thead>

							<tbody>
								<?php

									$q = 'select * from messages';

									$stmt = $pdo->query($q);

									while ($row = $stmt->fetch()) {?>
										<tr>
											<td>
												<?php echo ucfirst($row['nom_expediteur']) . ' ' . ucfirst($row['prenom_expediteur'])  ?>
											</td>

											<td>
												<?php echo ucfirst($row['contenu']) ?> .
											</td>

											<td class="contact-info">
												<a href="mailto:<?php echo $row['email_expediteur'] ?>">
													<span><?php echo $row['email_expediteur'] ?></span>
												</a>

												<a href="tel:<?php echo $row['n_tel_expediteur'] ?>">
													<span><?php echo $row['n_tel_expediteur'] ?></span>
												</a>
											</td>

											<td>
												<a href="../php/actions/delete_message.php?id=<?php echo $row['id'] ?>" class="delete">
													<i class="fa-regular fa-trash-can"></i>
												</a>
											</td>
										</tr>
										<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</main>
	</body>
</html>
