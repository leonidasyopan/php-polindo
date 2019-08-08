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
        
        <form action="add.php" method="POST" id="add-item-form">
            <fieldset>
                <div class="form-item">
                    <label for="details">Add more to list:</label>
                    <input id="details" type="text" name="details">
                </div>
                <div class="form-item">
                    <label for="public">public post? </label>
                    <input type="checkbox" name="public" id="public" value="yes">
                </div>
                <div class="form-example">
                    <input type="submit" value="Add to list">
                </div>                
            </fieldset>
        </form>

        <h2>My list</h2>
        <table border="1px" width="100%">
            <tr>
                <th>Id</th>
                <th>Details</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </table>

    </main>
    <footer>
    </footer>    
</body>
</html>