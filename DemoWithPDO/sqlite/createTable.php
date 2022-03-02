<?php

try {
  
  $conn = new PDO("sqlite:C:\Users\USP\Desktop\MyDatabase\demo.db");

  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $sql = "CREATE TABLE students (ID INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL)";



  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Table is created successfully";

} 
catch(PDOException $e) {
  echo "exception " . $e->getMessage();
}

$conn = null;
?>