<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage | Polishing my PHP</title>
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
        <h2>Lists</h2>
        <table width="100%" border="1px">
            <tr>
                <th>Id</th>
                <th>Details</th>
                <th>Post Time</th>
                <th>Edit Time</th>
            </tr>
            <?php
                // Create Connection
                $con = mysqli_connect("localhost","polindo","LIktRn4dpIvkfygY","php-polindo");

                // Check connection
                if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $query = mysqli_query($con, "SELECT * FROM list WHERE public='yes'"); // SQL Query for items with public being set to yes

                while($row = mysqli_fetch_array($query))
                {
                    Print "<tr>";
                        Print '<td align="center">' . $row['id'] . '</td>';
                        Print '<td align="center">' . $row['details'] . '</td>';
                        Print '<td align="center">' . $row['date_posted'] . ' - ' .  $row['time_posted'] . '</td>';
                        Print '<td align="center">' . $row['date_edited'] . ' - ' .  $row['time_edited'] . '</td>';
                    Print "</tr>";
                }
            ?>

        </table>
    </main>
    <footer>
    </footer>    
</body>
</html>