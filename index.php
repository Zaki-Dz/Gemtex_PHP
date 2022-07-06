<?php

	session_start();

	include_once 'php/inc/connection.inc.php';
	include_once 'php/inc/counter.php';

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
		<meta
			name="description"
			content="Nous somme une entreprise algerienne, nous vendons des produits se securité comme des vetements, gants, chaussures etc ..."
		/>
		<title><?php echo $isConnected ? 'Admin' : 'GemTex'; ?></title>
		<link rel="stylesheet" type="text/css" href="css/inc/all.min.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script type="text/javascript" src="js/main.js" defer></script>
	</head>

	<body>
		<button class="top-btn" aria-label="Top button">
			<i class="fa-solid fa-arrow-turn-up fa-2x"></i>
		</button>

		<?php
		
			if ($isConnected) {?>
				
				<a href="admin/dashboard.php" class="admin">
					Admin
				</a>

		<?php }?>

		<header>
			<div class="container">
				<div class="logo"></div>

				<i class="fa-solid fa-bars fa-2x nav-btn"></i>

				<nav>
					<ul>
						<li><a href="#presentation">Presentation</a></li>
						<li><a href="#produits">Produits</a></li>
						<?php
						
							$q = 'select * from partenaire';

							$stmt = $pdo->query($q);
			
							if ($stmt->rowCount() > 0) {?>

								<li>
									<a href="#partenaires">Partenaires</a>
								</li>

							<?php }?>
						<li>
							<a href="#contact">Contact</a>
						</li>
					</ul>
				</nav>
			</div>
		</header>

		<div class="landing">
			<div class="slider">
				<img
					src="images/construction-silhouette.jpg"
					alt="construction-silhouette"
				/>
				<img
					src="images/power-plant-construction.jpg"
					alt="power-plant-construction"
				/>
				<img
					src="images/workers-examining-work.jpg"
					alt="workers-examining-work"
				/>
			</div>
		</div>

		<main>
			<section class="presentation" id="presentation">
				<div class="container">
					<div class="section-title">
						<h2>Presentation</h2>
					</div>

					<div class="content">
						<div class="text">
							<h2 class="title">Qui somme nous ?</h2>

							<p>
								Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus
								molestias magni nemo, ipsum velit rem nobis. Doloremque placeat
								saepe suscipit voluptatem voluptates odio sequi! Inventore alias
								facilis obcaecati odit laborum.
							</p>
						</div>

						<div class="illustration">
							<img src="images/products.jpg" alt="products" />
						</div>
					</div>
				</div>
			</section>

			<section class="produits" id="produits">
				<div class="container">
					<div class="section-title">
						<h2>Produits</h2>
					</div>

					<ul class="categories">
						<li class="category active" data-category="all">Tous</li>

						<?php
						
							$q = 'select * from categories';

							$stmt = $pdo->query($q);

							while ($row = $stmt->fetch()) {?>
								
								<li class="category" data-category="<?php echo $row['id'] ?>"><?php echo ucfirst($row['libelle']) ?></li>

							<?php }
						
						?>
					</ul>

					<div class="produits-container">
						<?php
						
							$q = 'select * from produits';

							$stmt = $pdo->query($q);

							if ($stmt->rowCount() > 0) {

								while ($row = $stmt->fetch()) {?>
								
									<div class="produit" data-category="<?php echo $row['categorie_id'] ?>">
										<img src="images/<?php echo $row['image'] ?>" alt="<?php echo $row['libelle'] ?>" />
	
										<div class="name"><?php echo $row['libelle'] ?></div>
									</div>
	
								<?php }

							} else {?>

						</div>

						<div class="empty">
							<img src="images/no-product-found.png" alt="no product available">
						</div>

						<?php }?>
				</div>
			</section>

			<?php
						
				$q = 'select * from partenaire';

				$stmt = $pdo->query($q);

				if ($stmt->rowCount() > 0) {?>
					<section class="partenaires" id="partenaires">
						<div class="container">
							<div class="section-title">
								<h2>Partenaires</h2>
							</div>

							<div class="partenaires-container">
								
							<?php while ($row = $stmt->fetch()) {?>

								<img src="images/<?php echo $row['logo'] ?>" alt="<?php echo $row['titre'] ?>" />

								<?php }?>

							</div>
						</div>
					</section>
				<?php } else {

					echo '<br>';

				}?>

			<section class="contact" id="contact">
				<img
					class="call"
					src="images/front-view-male-builder-uniform-helmet-gray-background_140725-147973.webp.png"
					alt="front-view-male-builder-uniform-helmet-gray-background_140725-147973"
				/>

				<div class="container">
					<div class="section-title">
						<h2>Contact</h2>
					</div>

					<form action="php/actions/message.php" method="post">
						<div class="input-box">
							<input type="text" id="nom" required name="nom" minlength="3" maxlength="50" />
							<label class="placeholder" for="nom">Nom</label>
						</div>

						<div class="input-box">
							<input type="text" id="prenom" required name="prenom" minlength="3" maxlength="50" />
							<label class="placeholder" for="prenom">Prenom</label>
						</div>

						<div class="input-box">
							<input type="email" id="email" required name="email" />
							<label class="placeholder" for="email">Email</label>
						</div>

						<div class="input-box">
							<input type="tel" id="phone" required name="telephone" minlength="8" maxlength="12" pattern="[0-9]+" />
							<label class="placeholder" for="phone">N°-Telephone</label>
						</div>

						<div class="input-box">
							<textarea type="text" id="message" required name="message" minlength="10" maxlength="1024"></textarea>
							<label class="placeholder" for="message">Message</label>
						</div>

						<button type="submit" name="submit">
							Envoyer
							<i class="fa-regular fa-paper-plane"></i>
						</button>
					</form>
				</div>
			</section>

			<footer>
				<!-- <div class="map">
						<iframe
							src="https://maps.google.com/maps?q=36.71066593542828,%202.832889875986137&t=&z=15&ie=UTF8&iwloc=&output=embed"
							scrolling="no"
						></iframe
						><a href="https://2piratebay.org"></a><br /><a
							href="https://www.embedgooglemap.net"
							>html google maps</a
						>
					</div> -->

				<div class="top">
					<div class="container">
						<ul class="links">
							<li>
								<a href="#" aria-label="facebook link">
									<i class="fa-brands fa-facebook-f"></i>
								</a>
							</li>

							<li>
								<a href="#" aria-label="twitter link">
									<i class="fa-brands fa-twitter"></i>
								</a>
							</li>

							<li>
								<a href="#" aria-label="email link">
									<i class="fa-solid fa-at"></i>
								</a>
							</li>

							<li>
								<a href="#" aria-label="instagram link">
									<i class="fa-brands fa-instagram"></i>
								</a>
							</li>
						</ul>

						<nav>
							<ul>
								<li><a href="#presentation">Presentation</a></li>
								<li><a href="#produits">Produits</a></li>
								<li><a href="#partenaires">Partenaires</a></li>
								<li><a href="#contact">Contact</a></li>
							</ul>
						</nav>
					</div>
				</div>

				<div class="bottom">
					<div class="container">
						<div class="text">
							Website made with
							<a href="admin" aria-label="admin page link"
								><i class="fa-solid fa-heart"></i
							></a>
						</div>

						<div class="copyright">
							Copyright &copy; allrights reserved - 2022
						</div>
					</div>
				</div>
			</footer>
		</main>
	</body>
</html>
