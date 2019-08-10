<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Item | Polishing my PHP</title>
</head>
<?php
    session_start(); // starts the session
    if($_SESSION['user']){ // checks if user is logged in
    }
    else {
        header("location: index.php"); // redirects if user is not logged in
    }
    $user = $_SESSION['user']; // assigns user value
    $id_exists = false;
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
        <h2>Edit Item</h2>
        <p>Hello <?php Print "$user" ?></p> <!-- Displays user's name -->
        <a href="logout.php">Log out</a>
        <a href="home.php">Return to Control Panel</a>

        <h2>Currently Selected</h2>

        <table border="1px" width="100%">
            <tr>
                <th>Id</th>
                <th>Details</th>
                <th>Post Time</th>
                <th>Edit Time</th>
                <th>Public</th>                
            </tr>  
            <?php
                if(!empty($_GET['id']))
                {
                    $id = $_GET['id'];
                    $_SESSION['id'] = $id;
                    $id_exists = true;
                    
                    // Create Connection
                    $con = mysqli_connect("localhost","polindo","LIktRn4dpIvkfygY","php-polindo");

                    // Check connection
                    if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $query = mysqli_query($con, "SELECT * FROM list WHERE id='$id'"); // SQL Query

                    $count = mysqli_num_rows($query);

                    if($count > 0)
                    {
                        while($row = mysqli_fetch_array($query))
                        {
                            Print "<tr>";
                                Print '<td align="center">' . $row['id'] . '</td>';
                                Print '<td align="center">' . $row['details'] . '</td>';
                                Print '<td align="center">' . $row['date_posted'] . ' - ' . $row['time_posted'] . '</td>';
                                Print '<td align="center">' . $row['date_edited'] . ' - ' . $row['time_edited'] . '</td>';
                                Print '<td align="center">' . $row['public'] . '</td>';
                            Print "</tr>";
                        }
                    }
                    else
                    {
                        $id_exists = false;
                    }
                }
            ?>
        </table>
        <br>
        <?php
            if($id_exists)
            {
                Print '
                <form action="edit.php" method="POST" id="update-item-form">
                    <fieldset>
                        <div class="form-item">
                            <label for="details">Enter new detail:</label>
                            <input id="details" type="text" name="details">
                        </div>
                        <div class="form-item">
                            <label for="public">public post? </label>
                            <input type="checkbox" name="public[]" id="public" value="yes">
                        </div>
                        <div class="form-example">
                            <input type="submit" value="Update list">
                        </div>                
                    </fieldset>
                </form>
                ';
            }
            else
            {
                Print '<h2>There is no data to be edited.</h2>';
            }
        ?>
        
    </main>
    <footer>
    </footer>    
</body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // Create Connection
        $con = mysqli_connect("localhost","polindo","LIktRn4dpIvkfygY","php-polindo");

        // Check connection
        if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $details = mysqli_real_escape_string($con, $_POST['details']);
        $public = "no";
        $id = $_SESSION['id'];
        $time_edited = strftime("%X"); // time
        $date_edited = strftime("%B %d, %Y"); // date

        foreach($_POST['public'] as $list)
        {
            if($list != null)
            {
                $public = "yes";
            }
        }
        mysqli_query($con, "UPDATE list SET details='$details', public='$public', date_edited='$date_edited', time_edited='$time_edited' WHERE id='$id'");

        header("location: home.php");
    }
?>