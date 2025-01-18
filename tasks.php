
<?php

// Database Configurations
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "task_app";

// Database Connection
$conn = new mysqli($serverName, $userName, $password, $dbName);

// echo "<pre>";
// print_r($conn);
// echo "<pre>";

if(!$conn){
    die($conn->connect_error);
}

// Task Validation
function validateTask($title){
    
    // If the task is empty
    if(empty($title)){
        echo "Task cannot be empty <br>";
        return false;
    }

    // If the task already exists
    global $conn;
    $sql = "SELECT COUNT(*) as count FROM tasks WHERE title = '$title'";
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    

    if($row['count'] > 0){
        echo "Task already exists <br>";
        return false;
    }

    return true;
}
