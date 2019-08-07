<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Polishing my PHP</title>
</head>
<?php
    session_start(); // starts the session
    if($_SESSION['user']){ // checks if user is logged in
    }
    else {
        header("location: index.php"); // redirects if user is not logged in
    }
    $user = $_SESSION['user']; // assigns user value
?>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Home Page</h2>
        <p>Hello <?php Print "$user"?>!</p> <!-- Displays user's name -->
        <a href="logout.php">Click here to logout</a><br>
        
    </main>
    <footer>
    </footer>    
</body>
</html>