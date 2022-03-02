<?php

$hostname = "localhost:3307";
$username ="Carla";
$password = "password";
$database = "book_db";

//Establish connection with server
$conn = mysqli_connect($hostname,$username,$password);

//You can pass the database name as a parameter to directly connect
//$conn = mysqli_connect($hostname,$username,$password,$database);

//check if connection is successful
if (!$conn) {
    die("Connection Error".mysqli_connect_error());
}
//echo "Connected Successfully";

//select your database
$db_select = mysqli_select_db($conn,$database);

// If the DB is not found, then it either doesn't exist, or we can't see it
if (!$db_select) {
    //Create Query
    $db_create = "CREATE DATABASE IF NOT EXISTS $database";
    $db_selected = mysqli_query($conn,$db_create);

    //if Select query is successful --> DB found
    if ($db_selected) {
        echo "Database $database created successfully\n";
    } else {
        echo 'Error creating database: ' . mysqli_error() . "\n";
    }
}
else{
//    echo "Database $database is connected";
}

?>


