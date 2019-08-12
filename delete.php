<?php
    session_start(); // starts the session
    if($_SESSION['user']){ //checks if user is logged in
    }
    else {
        header("location: index.php"); // redirects if user is not logged in
    }

    if($_SERVER['REQUEST_METHOD'] == "GET")
    {
        // Create Connection
        $con = mysqli_connect("localhost","polindo","LIktRn4dpIvkfygY","php-polindo");

        // Check connection
        if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $id = $_GET['id'];

        mysqli_query($con, "DELETE FROM list WHERE id='$id'");

        // header("location: home.php"); ****Original Redirection****

        Print '<script>alert("Item Successfully Deleted!");</script>'; // Prompts the user
        Print '<script>window.location.assign("home.php");</script>'; // redirects to home.php
    }

?>