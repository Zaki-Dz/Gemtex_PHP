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
		<link
			rel="stylesheet"
			type="text/css"
			href="../css/pages/partenaires.css"
		/>
		<script src="../js/admin.js" defer></script>
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

						<a href="messages.php">
							<li>
								<i class="fa-regular fa-message"></i>
								Messages
							</li>
						</a>

						<a href="#">
							<li class="active">
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
				<h2>Partenaires</h2>
			</div>

			<div class="content">
				<div class="top">
					<div class="tabs">
						<div class="tab active" data-id="1">List</div>

						<div class="tab" data-id="2">Ajouter</div>
					</div>

					<div class="input-box">
						<input type="text" required />
						<div class="placeholder">Rechercher...</div>
					</div>
				</div>

				<div class="bottom">
					<div class="tab-content active" data-id="1">
						<table>
							<thead>
								<th>Logo</th>

								<th>Partenaire</th>

								<th></th>
							</thead>

							<tbody>
								<?php
								
									$q = 'select * from partenaire';

									$stmt = $pdo->query($q);

									while ($row = $stmt->fetch()) {
										?>
										
										<tr>
											<td>
												<img src="../images/<?php echo $row['logo'] ?>" alt="" />
											</td>

											<td><?php echo ucfirst($row['titre']) ?></td>

											<td>
												<a href="../php/actions/delete_partenaire.php?id=<?php echo $row['id'] ?>&nom=<?php echo $row['logo'] ?>" class="delete">
														<i class="fa-regular fa-trash-can"></i>
												</a>
											</td>
										</tr>
										
										<?php
									}
								?>
							</tbody>
						</table>
					</div>

					<div class="tab-content" data-id="2">
						<form action="../php/actions/partenaire.php" method="post" enctype="multipart/form-data">
						<div class="input-box">
								<input type="text" name="nom" required />
								<span class="placeholder">Partenaire</span>
							</div>

							<div class="input-box">
								<input type="file" name="image" required />
							</div>

							<button type="submit" name="submit">Ajouter</button>
						</form>
					</div>
				</div>
			</div>
		</main>
	</body>
</html>
