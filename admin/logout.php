<?php  
include('../config/constants.php');

//session_start();
if (session_destroy()) 
    {
        //$_SESSION['message'] = "<p class='success'>Logout Successfully.</p>";
        // Redirect to login page
        header("location:".SITEURL.'admin/login.php');
        exit();
    } else {
        //$_SESSION['message'] = "<p class='error'>Failed to Logout.</p>";
        // Redirect to manage admin page
        header("location:".SITEURL.'admin/index.php');
        exit();
    }

?>