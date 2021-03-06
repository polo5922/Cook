<?php
if($_POST['action'] == "init")
{
  $servername = "localhost";
  $username = "root";
  $password = "";

  // Create connection
  $conn = new mysqli($servername, $username, $password);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Create database
  $sql = "CREATE DATABASE IF NOT EXISTS COOK";
  if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
  } else {
    echo "Error creating database: " . $conn->error;
  }

  $conn->close();

  echo "\n";

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "COOK";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS `Recette` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`Nom` TEXT NOT NULL,
	`duree` INT NOT NULL,
	`difficultee` INT NOT NULL,
	`description` TEXT NOT NULL,
	`quantite` INT NOT NULL,
	`genre` INT NOT NULL,
  `Pays` TEXT NOT NULL,
  `Utilisateur_id` INT NOT NULL,
  primary key (id)
);";
if ($conn->query($sql) === TRUE) {
      echo "\n";
      echo "Table Recette created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

  $sql = "CREATE TABLE IF NOT EXISTS `Ingredient` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ingredient` TEXT NOT NULL,
  `prix` INT unsigned,
  `nutrition` TEXT,
  PRIMARY KEY (`id`)
);";
if ($conn->query($sql) === TRUE) {
      echo "\n";
      echo "Table Recette created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

  $sql = "CREATE TABLE IF NOT EXISTS `Utilisateur` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Nom` TEXT NOT NULL,
  `Prenom` TEXT NOT NULL,
  `Email` TEXT NOT NULL,
  PRIMARY KEY (`id`)
);";
if ($conn->query($sql) === TRUE) {
        echo "\n";
      echo "Table Recette created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

  $sql = "CREATE TABLE IF NOT EXISTS `Note` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `note` FLOAT unsigned,
  `Utilisateur_id` INT,
  PRIMARY KEY (`id`)
);";
if ($conn->query($sql) === TRUE) {
        echo "\n";
      echo "Table Recette created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

  $sql = "CREATE TABLE If NOT EXISTS `Ustensile` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Nom` FLOAT unsigned NOT NULL,
  `prix` INT unsigned,
  PRIMARY KEY (`id`)
);";
if ($conn->query($sql) === TRUE) {
        echo "\n";
      echo "Table Recette created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

  $sql = "CREATE TABLE If NOT EXISTS `Recette-note` (
  `Recette_id` INT,
  `Note_id` INT,
  PRIMARY KEY (`Recette_id`,`Note_id`)
);";
if ($conn->query($sql) === TRUE) {
        echo "\n";
      echo "Table Recette created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

  $sql = "CREATE TABLE If NOT EXISTS `Recette-Ingredient` (
  `Recette_id` INT,
  `Ingredient_id` INT,
  PRIMARY KEY (`Recette_id`,`Ingredient_id`)
);";

  if ($conn->query($sql) === TRUE) {
          echo "\n";
      echo "Table Recette created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

  $sql = "CREATE TABLE If NOT EXISTS `Recette-Ustensile` (
  `Recette_id` INT,
  `Ustensile_id` INT,
  PRIMARY KEY (`Recette_id`,`Ustensile_id`)
);";
  if ($conn->query($sql) === TRUE) {
          echo "\n";
      echo "Table Recette created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

  $sql = "CREATE TABLE If NOT EXISTS `img` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `lien` TEXT,
    `Recette_id` INT,
    PRIMARY KEY (`id`)
  );";
  if ($conn->query($sql) === TRUE) {
          echo "\n";
      echo "Table Recette created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }


  $conn->close();
  die();
}

if($_POST['action'] == "add_recette" and $_POST['action'] != "init"){
  if($_FILES["file"]["name"] != '')
  {
    $test = explode(".",$_FILES["file"]["name"]);
    $extension = end($test);
    $name = rand(1,9999) . '.' . $extension;
    $location = '../assets/img/recette/'.$name;
    $move = './'.$location;
    move_uploaded_file($_FILES["file"]["tmp_name"],'./'.$location);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cook";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO recette (Nom,duree, difficultee,description,quantite,genre,Pays,Utilisateur_id)
    VALUES ('".$_POST["title"]."','1', '".$_POST["diff"]."', '".$_POST["desc"]."','1','1','".$_POST["country"]."','1')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        $last_id = $conn->insert_id;

          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          $sql = "INSERT INTO img (lien, Recette_id)
          VALUES ('".$name."', '".$last_id."')";

          if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
          } else {
            echo "<br>";
              echo "Error: " . $sql . "<br>" . $conn->error;
          }


    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
}
?>
