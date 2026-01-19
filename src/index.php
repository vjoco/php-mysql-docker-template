<?php

$host = 'db'; // The service name in docker-compose
$db   = 'my_app_db';
$user = 'admin';
$pass = 'adadad12';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    echo "<h1>Docker PHP Template</h1>";
    echo "✅ Successfully connected to MySQL!";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
    
?>