<?php  
include('../config/constants.php');
$id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Safely convert to an integer
$stmt = $conn->prepare("DELETE FROM tbl_admin WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

if ($stmt->affected_rows > 0) 
    {
        $_SESSION['message'] = "<p class='success'>Admin Deleted Successfully.</p>";
        // Redirect to manage admin page
        header("location:".SITEURL.'admin/manage-admin.php');
    } else {
        $_SESSION['message'] = "<p class='error'>Failed to Delete Admin.</p>";
        // Redirect to manage admin page
        header("location:".SITEURL.'admin/manage-admin.php');
    }

?>