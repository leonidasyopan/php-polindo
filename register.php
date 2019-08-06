<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
</head>
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
    <h2>Register Page</h2>

    <form action="login.php" method="POST" id="register-form">
        <fieldset>
            <div class="form-item">
                <label for="username">Username:</label>
                <input id="username" type="text" name="username">
            </div>
            <div class="form-item">
                <label for="email">email: </label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-example">
                <input type="submit" value="Register">
            </div>                
        </fieldset>
    </form>
    </main>
    <footer>
    </footer>  
</body>
</html>