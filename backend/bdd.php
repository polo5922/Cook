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
	`duree` INT,
	`difficultee` INT,
	`description` TEXT NOT NULL,
	`quantite` INT,
	`genre` INT,
  primary key (id)
);";

  if ($conn->query($sql) === TRUE) {
      echo "Table Recette created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

  $conn->close();
}
?>
