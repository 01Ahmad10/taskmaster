<?php
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title = $_POST['title'];


    if(!empty($title)){
       $stmt =$conn -> prepare("INSERT INTO tasks (title) VALUES (:title)");
       $stmt -> execute(['title' => $title]);
       
       header("location:index.php");
       exit();

       echo "<h2>✅ STOP! Task Saved. Look at the data above.</h2>";
              
    }

};


?>


<!DOCTYPE html>
<html>
<head>
    <title>TaskMaster 3000</title>
</head>
<body>
    <h1>My To-Do List</h1>
    
    <form method="POST" action="index.php">
        <input type="text" name="title" placeholder="What needs to be done?" required>
        <button type="submit">Add Task</button>
    </form>

</body>
</html>