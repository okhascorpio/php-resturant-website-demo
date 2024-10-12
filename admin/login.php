<?php include('../config/constants.php'); ?>
 
<!-- Main Section starts-->
<html>            
    <head>
        <title>Login -Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
        <h1 class="text-center">Login</h1>
        <br>
        <h3 class="text-center">
        <?php
         
            if(isset($_SESSION['message']))
            {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            
        ?>
        </h3>
        <br>

        <form action="" method="POST" class="text-center">
        Username:<br>
        <input type="text" name="username" placeholder="Enter Username"><br><br>
        Password:<br>
        <input type="password" name="password" placeholder="Enter Password"><br><br>
        <input type="submit" name="submit" value="Login" class="btn-primary">
        
        </form>
    </body>
</html>

<?php

// Process form data
    if(isset($_POST['submit']))
    {
        // get values from form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare the SQL statement to check user and password exists
        $stmt = $conn->prepare("SELECT * FROM tbl_admin WHERE username = ?");

        // Check if the statement was prepared successfully
        if ($stmt === false) 
        {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        // Bind the parameters
        $stmt->bind_param("s", $username); // "s" indicates that both parameters are strings

        // Execute the statement
        $res = $stmt->execute();  
        $res = $stmt->get_result();
        // test success?
        if ($res->num_rows === 1) 
        {
            $row = $res->fetch_assoc();
            $username = $row['username'];
            $hashpassword = $row['password'];

            //verify password
            if (password_verify($password, $hashpassword))
            {
                //$_SESSION['message'] = "<p class='success'>Login Successful.</p>";
                $_SESSION['user'] =$username; // set the loged in user session until user logs out

                header("location:".SITEURL.'admin/');
                exit();
            } else {
                // Password is incorrect
                $_SESSION['message'] = "<p class='error'>Invalid Password</p>";
                // Redirect to manage admin page
                header("location:".SITEURL.'admin/login.php');
                exit();
            } 
        }else {
            $_SESSION['message'] = "<p class='error'>Admin Not Found.</p>";
            // Redirect to manage admin page
            header("location:".SITEURL.'admin/login.php');
            exit();
        }
    }
?>