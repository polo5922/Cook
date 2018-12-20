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
	`img_id` INT NOT NULL,
	`duree` INT NOT NULL,
	`difficultee` INT NOT NULL,
	`description` TEXT NOT NULL,
	`quantite` INT NOT NULL,
	`genre` INT NOT NULL,
  `id.Pays` INT NOT NULL,
  primary key (id)
);";
if ($conn->query($sql) === TRUE) {
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
      echo "Table Recette created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

  $sql = "CREATE TABLE IF NOT EXISTS `Note` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `note` FLOAT unsigned,
  PRIMARY KEY (`id`)
);";
if ($conn->query($sql) === TRUE) {
      echo "Table Recette created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

  $sql = "CREATE TABLE If NOT EXISTS `Pays` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Nom` FLOAT unsigned NOT NULL,
  PRIMARY KEY (`id`)
);";
if ($conn->query($sql) === TRUE) {
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
      echo "Table Recette created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

  $sql = "CREATE TABLE If NOT EXISTS `Recette-note` (
  `id.Recette` INT,
  `id.Note` INT,
  PRIMARY KEY (`id.Recette`,`id.Note`)
);";
if ($conn->query($sql) === TRUE) {
      echo "Table Recette created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

  $sql = "CREATE TABLE If NOT EXISTS `Recette-Ingredient` (
  `id.Recette` INT,
  `id.Ingredient` INT,
  PRIMARY KEY (`id.Recette`,`id.Ingredient`)
);";

  if ($conn->query($sql) === TRUE) {
      echo "Table Recette created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

  $conn->close();
}
?>
