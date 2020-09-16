<?php
    session_start();

    if (!$_SESSION['userid']) {
        header('location: index.php');
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>You are member</h1>
    <h3>Hi, <?php echo $_SESSION['user']; ?></h3>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>