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
		<link rel="stylesheet" type="text/css" href="../css/login.css" />

		<style></style>
	</head>

	<body>
		<div class="shapes">
			<div class="shape"></div>
			<div class="shape"></div>
		</div>

		<main>
			<div class="container">
				<div class="right">
					<form action="../php/actions/mod_category.php" method="post">
						<legend>Modifier</legend>

						<div class="input-box">

							<?php

								if (isset($_GET['id'])) {
									
									$q = 'select * from categories where id = ?';
	
									$stmt = $pdo->prepare($q);
	
									$stmt->execute([$_GET['id']]);

									while ($row = $stmt->fetch()) {
										

									?>
									
									
									<input type="text" required name="name" value="<?php echo $row['libelle'] ?>" />
									
									
									<?php

									
									}
									
								} else {

									?>
									
									<input type="text" required name="name" />

									<?php

								}
							
							
							?>

							<span class="placeholder">Nom de catagory</span>
						</div>

						<div class="box">
							<button type="submit" name="id" value="<?php echo $_GET['id'] ?>">Modifier</button>
							<a href="./categories.php">Retour</a>
						</div>
					</form>
				</div>
			</div>
		</main>
	</body>
</html>
