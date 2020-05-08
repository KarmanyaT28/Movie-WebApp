<?php include "include/header.php" ?>
<body>

    <div id="wrapper">
        
        
        
        <?php if($connection) echo "connected";?>
        
        
        

        <!-- Navigation -->
        <?php include "include/nav.php" ?>
        
        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELCOME TO ADMIN
                            
                            <?php echo $_SESSION['username']?>
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
       
        
         
          
           
            
              <!-- /#page-wrapper -->

   <?php include "include/footer.php" ?>