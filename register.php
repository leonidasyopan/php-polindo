<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page | Polishing my PHP</title>

    <!-- This is the main stylesheet for the whole website -->
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>
<body>
    <div id="main-container">
        <header class="header">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/php-polindo/common/header.php'; ?>           
        </header>
        <aside class="sidenav">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/php-polindo/common/nav.php'; ?> 
        </aside>
        <main class="main">
            <h2>Register Page</h2>

            <form action="register.php" method="POST" id="register-form">
                <fieldset>
                    <div class="form-item">
                        <label for="username">Username:</label>
                        <input id="username" type="text" name="username">
                    </div>
                    <div class="form-item">
                        <label for="password">Password: </label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="form-example">
                        <input type="submit" value="Register">
                    </div>                
                </fieldset>
            </form>

            
        </main>
        <footer class="footer">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/php-polindo/common/footer.php'; ?> 
        </footer>
    </div>  
</body>
</html>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Create Connection
        $con = mysqli_connect("localhost","polindo","LIktRn4dpIvkfygY","php-polindo");

        // Check connection
        if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
        // Created the two variables for username and password
        $username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
        $bool = true;
        
        $query = mysqli_query($con, "Select * from users"); // Query the users table
        while($row = mysqli_fetch_array($query)) // Display all rows from query
        {
            $table_users = $row['username']; // the first username row is passed on to $table_users, and so on ultil the query is finished
            if($username == $table_users) //check if there are any matching fields
            {
                $bool = false; // set bool to false
                Print '<script>alert("Username has been taken!");</script>'; // Prompts the user
                Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
            }
        }
        
        if($bool) // check if bool is true
        {
            mysqli_query($con, "INSERT INTO users (username, password) VALUES ('$username', '$password')"); // Inserts the values to table users
            Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
            Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
        }
    }
?>