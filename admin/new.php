<?php include "include/header.php" ?>
<!--<body>-->

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
                            <small>Subheading</small>
                        </h1>
                         <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                
                                echo "hi";
                                 $query = "SELECT * FROM posts";
    $select_posts = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_posts)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tag = $row['post_tag'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    echo "<tr>";
    echo "<td>$post_id</td>";
    echo "<td>$post_author</td>";
    echo "<td>$post_title</td>";
    echo "<td>$post_category_id</td>";
    echo "<td>$post_status</td>";
    echo "<td>$post_image</td>";
    echo "<td>$post_tags</td>";
    echo "<td>$post_comment_count</td>";
    echo "<td>$post_date</td>";
    echo "<tr>";  
                               
                               
    
    
    }
                                
                                ?>
                               
                            
                            
                                <td>10</td>
                                <td>Dhyani</td>
                                <td>bootframe</td>
                                <td>bootstrap</td>
                                <td>status</td>
                                <td>image</td>
                                <td>tags</td>
                                <td>comments</td>
                                <td>date</td>
                            
                        </tbody>
                        </table>
                        
                        
                 
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
       
      
 <?php //DELe TE QUERY 
        deleteCategories();
            
            ?>
            
              <!-- /#page-wrapper -->

   <?php include "include/footer.php" ?>