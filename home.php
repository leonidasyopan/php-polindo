<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel de Controle | Polishing my PHP</title>

    <!-- This is the main stylesheet for the whole website -->
    <link rel="stylesheet" href="css/styles.css" type="text/css">
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
    <div id="main-container">
        <header class="header">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/php-polindo/common/header.php'; ?>           
        </header>
        <aside class="sidenav">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/php-polindo/common/nav.php'; ?> 
        </aside>
        <main class="main">
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
                        <input type="checkbox" name="public[]" id="public" value="yes">
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
                    <th>Post Time</th>
                    <th>Edit Time</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Public Post</th>
                </tr>
                <?php
                    // Create Connection
                    $con = mysqli_connect("localhost","polindo","LIktRn4dpIvkfygY","php-polindo");

                    // Check connection
                    if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $query = mysqli_query($con, "SELECT * FROM list"); // SQL Query

                    while($row = mysqli_fetch_array($query))
                    {
                        Print "<tr>";
                            Print '<td align="center">' . $row['id'] . '</td>';
                            Print '<td align="center">' . $row['details'] . '</td>';
                            Print '<td align="center">' . $row['date_posted'] . ' - ' . $row['time_posted'] . '</td>';
                            Print '<td align="center">' . $row['date_edited'] . ' - ' . $row['time_edited'] . '</td>';
                            Print '<td align="center"><a href="edit.php?id=' . $row['id'] . '">edit</a></td>';
                            Print '<td align="center"><a href="#" onclick="confirmDeletion('. $row['id'] . ')">delete</a></td>';
                            Print '<td align="center">' . $row['public'] . '</td>';
                        Print "</tr>";
                    }
                ?>
            </table>
            
        </main>
        <footer class="footer">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/php-polindo/common/footer.php'; ?> 
        </footer>
    </div>    

    <!-- JavaScript application for confirming whether to delete item or not -->
    <script src="js/confirm-deletion.js"></script>
</body>
</html>