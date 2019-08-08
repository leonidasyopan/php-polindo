<?php
    session_start();
    if($_SESSION['user']){
    }
    else {
        header("location:index.php");
    }

    if($_SERVER['REQUESTED_METHOD'] = "POST") // Added an if to keep the page secured
    {    
        
        // Create Connection
        $con = mysqli_connect("localhost","polindo","LIktRn4dpIvkfygY","php-polindo");

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        

        $details = mysqli_real_escape_string($con, $_POST['details']);

        // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
        date_default_timezone_set('America/Sao_Paulo');

        $time = strftime("%X"); // time
        $date = strftime("%B %d, %Y"); // date
        $decision = "no";

        foreach($_POST['public'] as $each_check) // gets the data from the checkbox
        {
            if($each_check != null) // checks if the checkbox is checked
            {
                $decision = "yes"; // sets the value
            }
        }

        mysqli_query($con, "INSERT INTO list (details, date_posted, time_posted, public) VALUES ('$details','$date','$time','$decision')"); // SQL query
        // header("location: home.php"); ****this is the original opotion *****

        Print '<script>alert("Item added with Success!");</script>'; // Prompts the user with success message
        Print '<script>window.location.assign("home.php");</script>'; // redirects to home.php
    }
    else {
        header("location: home.php"); // redirects back to home
    }

?>