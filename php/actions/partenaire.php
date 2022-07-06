<?php

	include_once '../inc/connection.inc.php';

	if (isset($_POST['submit'])) {

		extract($_POST);

		if (!empty($nom)) {

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

      $q = 'select * from partenaire where titre = ?';

      $stmt = $pdo->prepare($q);

      $stmt->execute([$nom]);

      if ($stmt->rowCount() > 0) {

        $error[] = 'nom deja utiliser';

      }

      if (empty($error)) {

        $newname1=rand(0,100000000);

        $newname=$newname1.$imageName;

        if (move_uploaded_file($imageTmp_name,  '../../images/'.$newname)) {

          $q = 'insert into partenaire(titre, logo) values(?, ?)';

          $stmt = $pdo->prepare($q);

          $stmt->execute([$nom, $newname]);

          header('location: ../../admin/partenaires.php');
        }

      } else {

        for ($i=0; $i < count($error); $i++) { 
          echo $error[$i] . ' / ';
        }
      
      }
    }
  }