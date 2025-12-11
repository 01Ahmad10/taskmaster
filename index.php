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
     $stmt =$conn -> prepare("SELECT * FROM tasks ORDER BY created_at DESC");
 $stmt -> execute();
 $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <h3>Current Tasks</h3>
    <ul>
        <?php foreach($tasks as $task): ?>
            <li>
                <!-- Clean the output to prevent hacking -->
                <?= htmlspecialchars($task['title']) ?> 
                <small>(<?= $task['created_at'] ?>)</small>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>



 

 

