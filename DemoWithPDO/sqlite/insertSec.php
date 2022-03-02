<?php 

if($_POST){
    $id = $_POST['id'];
    $name = $_POST['name'];
    try{
        
        include('connection.php'); 
        $db = new PDO("sqlite:C:\Users\USP\Desktop\MyDatabase\demo.db"); 

        /* Create a prepared statement */
        $stmt = $db -> prepare("INSERT INTO students (id, name) VALUES (:id, :name)");
        
        /* bind params */
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> bindParam(':name', $name, PDO::PARAM_STR);
        
        /* execute the query */
        if( $stmt -> execute() ){
            echo "Row Inserted - <a href='read-pdo-sqlite.php'>Read Here</a>";
        }
        
        /* close connection */
        $db = null;
    }
    catch (PDOExecption $e){
        echo $e->getMessage();
    }    
}    
?>

<html>
<style>
    label{width: 50px; float:left;}
</style>
<body>
    <form action="" method="post">    
        <label>Id: </label><input type="text" name="id" /><br>
        <label>Name: </label><input type="text" name="name" /><br>
        <input type="submit" />
    </form>
</body>