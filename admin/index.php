<?php

	session_start();

	if (isset($_SESSION['admin'])) {
		header('location: dashboard.php');
	}

	$isConnected = false;

	if (isset($_SESSION['admin'])) {
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
	</head>

	<body>
		<main>
			<div class="container">
				<div class="left">
					<img src="../images/logo.png" alt="" />
				</div>

				<div class="right">
					<form action="../php/actions/connect.php" method="post">
						<legend>Admin</legend>

						<div class="input-box">
							<input type="text" required name="user" autofocus />
							<span class="placeholder <?php if (isset($_GET['user_err'])) echo 'error' ?>">Nom d'utilisateur</span>
						</div>

						<div class="input-box">
							<input type="password" required name="password" />
							<span class="placeholder <?php if (isset($_GET['mdp_err'])) echo 'error' ?>">Mot de passe</span>
						</div>

						<div class="box">
							<button type="submit" name="submit">Se connecter</button>
							<a href="../">Retour</a>
						</div>
					</form>
				</div>
			</div>
		</main>
	</body>
</html>
