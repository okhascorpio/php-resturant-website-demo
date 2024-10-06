<?php include('partials/menu.php'); ?>

        
        <!-- Main Section starts-->
            
            <div class="main-content">
                <div class="wrapper">
                    <h1>Manage Admin</h1>
                    <br />
                    <?php 
                        if(isset($_SESSION['message']))
                        {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                    ?>

                    <br /><br />
                   
                    <a href="add-admin.php" class="btn-primary">Add Admin</a>
                    <br /><br /><br />
 
                    <table class="tbl-full">
                        <tr>
                            <th>S.N.</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>

                        <?php
                            $sql = "SELECT * FROM tbl_admin";
                            $res = mysqli_query($conn, $sql);
                            if($res == TRUE)
                            {
                                //count all rows in db
                                $count = mysqli_num_rows($res);

                                if($count>0)
                                {
                                    $sn=1; //serial number
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        $id=$rows['id'];
                                        $full_name=$rows['full_name'];
                                        $username=$rows['username'];

                                    // break php to display data in html
                                    ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($sn++); ?>.</td>
                                        <td><?php echo htmlspecialchars($full_name); ?></td>
                                        <td><?php echo htmlspecialchars($username); ?></td>
                                        <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo urlencode($id) ?>" class="btn-primary">Change Password</a><!--urlencode id for safety-->
                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo urlencode($id) ?>" class="btn-secondary">Update Admin</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo urlencode($id) ?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>
                                    
                                    
                                    <?php
                                    }
                                    //restart php after displaying html
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td>No Admin Found.</td>
                                    </tr>
                                    
                                    
                                    <?php
                                }
                            }

                        ?>


                       
                    </table>
  
                </div>
            </div>
        </div>
        <!-- Menu Section ends-->

<?php include('partials/footer.php'); ?>