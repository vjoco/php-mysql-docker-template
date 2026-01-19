<?php
$servername = "db";
$username = "webuser";
$password = "webpassword";
$dbname = "webapp";

try {
    $pdo = new PDO("mysql:host=$servername;port=3307;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db_status = "Connected successfully";
    $db_class = "success";
} catch(PDOException $e) {
    $db_status = "Connection failed: " . $e->getMessage();
    $db_class = "error";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAMP Stack - Docker</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f4f4; }
        .container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .success { color: #28a745; }
        .error { color: #dc3545; }
        .info-box { background: #e9ecef; padding: 15px; border-radius: 5px; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🐳 Docker LAMP Stack</h1>
        <p>Welcome to your Apache2 + PHP + MariaDB environment!</p>
        
        <div class="info-box">
            <h3>Server Information</h3>
            <p><strong>PHP Version:</strong> <?php echo phpversion(); ?></p>
            <p><strong>Server Software:</strong> <?php echo $_SERVER['SERVER_SOFTWARE']; ?></p>
            <p><strong>Document Root:</strong> <?php echo $_SERVER['DOCUMENT_ROOT']; ?></p>
        </div>

        <div class="info-box">
            <h3>Database Connection</h3>
            <p class="<?php echo $db_class; ?>"><strong>Status:</strong> <?php echo $db_status; ?></p>
        </div>

        <div class="info-box">
            <h3>Memory Usage</h3>
            <p><strong>PHP Memory Usage:</strong> <?php echo round(memory_get_usage(true)/1024/1024, 2); ?> MB</p>
            <p><strong>PHP Memory Limit:</strong> <?php echo ini_get('memory_limit'); ?></p>
        </div>
    </div>
</body>
</html>