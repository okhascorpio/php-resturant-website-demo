<?php include('partials/menu.php'); ?>
        
        <!-- Main Section starts-->
            
            <div class="main-content">
                <div class="wrapper">
                <?php 
                        if(isset($_SESSION['user']))
                        {
                            echo "<p class='success'>You are logged in as ". htmlspecialchars($_SESSION['user']) . "</p>";
                        }
                    ?>
                    <h1>DASHBOARD</h1>
                    <div class="col-4 text-center">
                        <h1>5</h1>
                        <br />
                        Categories

                    </div>
                    <div class="col-4 text-center">
                        <h1>5</h1>
                        <br />
                        Categories

                    </div>
                    <div class="col-4 text-center">
                        <h1>5</h1>
                        <br />
                        Categories

                    </div>
                    <div class="col-4 text-center">
                        <h1>5</h1>
                        <br />
                        Categories

                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Menu Section ends-->

<?php include('partials/footer.php'); ?>        
       