<?php 
include('partials/menu.php'); 
$id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Safely convert to an integer
$stmt = $conn->prepare("SELECT * FROM tbl_admin WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
// test success?
if ($res->num_rows === 1) 
    {
        $row = $res->fetch_assoc();
        $full_name = $row['full_name'];
        $username = $row['username'];
        $_SESSION['message'] = "<p class='success'>Change Password For<br \>User: " . htmlspecialchars($username) . "<br \>Full Name: " . htmlspecialchars($full_name) . ".</p>";
        // Redirect to manage admin page
        //header("location:".SITEURL.'admin/update-admin.php');
    } else {
        $_SESSION['message'] = "<p class='error'>Failed to Retrive Admin.</p>";
        // Redirect to manage admin page
        //header("location:".SITEURL.'admin/update-admin.php');
    }

?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Password</h1>
                    <br />
                    <?php 
                        if(isset($_SESSION['message']))
                        {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                    ?>
                    <br /><br />

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>New Password: </td>
                        <td><input type="text" name="username" placeholder="Enter New Password"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Update Password" class="btn-secondary"></input> </td>
                    </tr>
                </table>
            </form>

        </div>
    </div>   
<?php include('partials/footer.php'); ?>

<?php
// Process form data
    if(isset($_POST['submit']))
    {
        //$id = $_POST['id'];    
        $password = md5($_POST['password']);

        // Prepare the SQL statement
        $stmt = $conn->prepare("UPDATE tbl_admin SET password = ? WHERE id = ?");

        // Check if the statement was prepared successfully
        if ($stmt === false) 
        {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        // Bind the parameters
        $stmt->bind_param("ssi", $full_name, $username, $id); // "ssi" indicates that both parameters are strings

        // Execute the statement
        $res = $stmt->execute();  

        if($res == true)
        {
            $_SESSION['message'] = "<p class='success'>Admin Updated Successfully.</p>";
            // Redirect to manage admin page
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['message'] = "<p class='error'>Failed to Update Admin.</p>";
            // Redirect to manage admin page
            header("location:".SITEURL.'admin/manage-admin.php');
        }
    }
?>