<?php
$servername = "localhost";
$username = "root";
$password = "mysqlpassword";
$dbname = "demo";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE students (id INT(6) AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL)";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table is created successfully";

} 
catch(PDOException $e) {
    echo "exception " . $e->getMessage();
}
  //close connection
  $conn = null;
?>