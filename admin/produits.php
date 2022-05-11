<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>GemTex</title>
		<link rel="stylesheet" type="text/css" href="../css/inc/all.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/admin.css" />
		<script src="../js/admin.js" defer></script>
		<script src="../js/recherche.js" defer></script>
	</head>

	<body>
		<aside>
			<div class="logo"></div>

			<div class="bottom">
				<nav>
					<ul>
						<a href="dashboard.html">
							<li>
								<i class="fa-solid fa-shapes"></i>
								Dashboard
							</li>
						</a>

						<a href="categories.html">
							<li>
								<i class="fa-solid fa-table-cells-large"></i>
								Categories
							</li>
						</a>

						<a href="#">
							<li class="active">
								<i class="fa-solid fa-list"></i>
								Produits
							</li>
						</a>

						<a href="messages.html">
							<li>
								<i class="fa-regular fa-message"></i>
								Messages
							</li>
						</a>

						<a href="partenaires.html">
							<li>
								<i class="fa-regular fa-handshake"></i>
								Partenaires
							</li>
						</a>
					</ul>
				</nav>

				<div class="logout">
					<form>
						<button type="submit">
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
				<h2>Produits</h2>
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
								<th>#Id</th>
								<th>Désignation</th>
								<th>Image</th>
								<th colspan="2"></th>
							</thead>

							<tbody>
								<tr>
									<td>01</td>
									<td>Chaussures</td>
									<td>
										<img src="../images/ronjers.png" alt="" />
									</td>
									<td>
										<button class="edit">
											<i class="fa-regular fa-pen-to-square"></i>
										</button>
									</td>
									<td>
										<button class="delete">
											<i class="fa-regular fa-trash-can"></i>
										</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="tab-content" data-id="2">
						<form>
							<div class="input-box">
								<input type="text" required />

								<span class="placeholder">Désignation</span>
							</div>

							<div class="input-box">
								<select name="category">
									<option></option>

									<option>Visage</option>

									<option>Chaussures</option>

									<option>Vetements</option>
								</select>

								<span class="placeholder">Choisire une categorie</span>
							</div>

							<div class="input-box">
								<input type="file" required />
							</div>

							<button>Ajouter</button>
						</form>
					</div>
				</div>
			</div>
		</main>
	</body>
</html>
