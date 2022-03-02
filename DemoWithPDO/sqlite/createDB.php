<?php

    try {

      $dbFile = 'C:\Users\USP\Desktop\MyDatabase\demo.db';
      $conn = new PDO("sqlite:$dbFile");

      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      echo "Database created successfully<br>";
    } 

    catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    //close connection
    $conn = null;
?>