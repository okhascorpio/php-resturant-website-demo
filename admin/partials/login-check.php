<?php
if(!isset($_SESSION['user']))  // if user session is not set
{
    // user is not logged in
    // redirect to login page
    $_SESSION['message'] = "<p class='error'>Please login to access Admin Panel.</p>";
    // Redirect to manage admin page
    header("location:".SITEURL.'admin/login.php');
    exit();
}
?>