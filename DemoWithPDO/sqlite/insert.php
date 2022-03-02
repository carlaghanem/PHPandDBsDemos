<?php

try{

    $conn = new PDO("sqlite:C:\Users\USP\Desktop\MyDatabase\demo.db"); 
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    $sql = "INSERT INTO students (id, name) VALUES ('1', 'ahmad')";
    
    $conn->exec($sql);
    echo "data is inserted successfully";
        
    /* close connection */
    $conn = null;
}
catch (PDOExecption $e){
    echo $e->getMessage();
}    
?>