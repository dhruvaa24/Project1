<?php
    session_start();

    if(!isset($_SESSION['username'])) {
        //if session is not set redirect to login page
        header("Location: login.html");
        exit();
    }
    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="welcome.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome, <?php echo ucfirst($username); ?> !</h1>
        </header>
        <section class="content">
            <p>Pakka is a pioneer in regenerative food packaging, 
               offering solutions in food carry, food packaging 
               and food service.</p>
            <a href="https://pakka.com" class="btn">Learn More About Us</a>
            <a href="logout.php" class="btn">Log-out</a>
        </section>
        <footer>
            <p>&copy; 2024 Pakka. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>