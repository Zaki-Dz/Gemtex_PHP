<?php

	include_once '../inc/connection.inc.php';

	if (isset($_POST['submit'])) {

		extract($_POST);

		if (!empty($name) && !empty($category)) {

      $image=$_FILES['image'];

      $imageName = $image['name'];
      $imageTmp_name = $image['tmp_name'];
      $imageSize = $image['size'];
      $imageError = $image['error'];

      $forma=explode('.', $imageName);

      $formaImage = strtolower(end($forma));

      $vectForma=array('jpg','jpeg','png','gif');

      $error=array();

      if (!in_array($formaImage,$vectForma)) {
        $error[] = 'choisier une image plise';
      }

      $q = 'select * from produits where libelle = ?';

      $stmt = $pdo->prepare($q);

      $stmt->execute([$name]);

      if ($stmt->rowCount() > 0) {

        $error[] = 'nom deja utiliser';

      }

      if (empty($error)) {

        $newname1=rand(0,100000000);

        $newname=$newname1.$imageName;

        echo $newname;

        if (move_uploaded_file($imageTmp_name,  '../../images/'.$newname)) {

          $q = 'insert into produits(libelle, categorie_id, image) values(?, ?, ?)';

          $stmt = $pdo->prepare($q);

          $stmt->execute([$name, $category, $newname]);

          header('location: ../../admin/produits.php');
        } else {

          echo 'not moved';

        }

      } else {

        for ($i=0; $i < count($error); $i++) { 
          echo $error[$i] . ' / ';
        }
      
      }
    }
  }