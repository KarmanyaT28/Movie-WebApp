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
                                
    $query = "SELECT * FROM posts";
    $select_posts = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_posts)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
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
    echo "<tr>";  ?>  
                               
                               
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
       
        
              <!-- /#page-wrapper -->

   <?php //include "include/footer.php" ?>
   
  
 




if(isset($_POST['create_post']))
       
            $post_title        = $_POST['title'];
            $post_author         = $_POST['author'];
            $post_category_id  = $_POST['post_category_id'];
            $post_status       = $_POST['post_status'];
    
            $post_image        = $_FILES['image']['name'];
            $post_image_temp   = $_FILES['image']['tmp_name'];
    
    
            $post_tag       =       $_POST['post_tags'];
            $post_content      = $_POST['post_content'];
            $post_date         = date('d-m-y');
            $post_comment_count = 4;

             move_uploaded_file($post_image_temp, "../images/$post_image" );
       
      
     
    
   
  
 


















































<?php

    if(isset($_GET['p_id'])){
    $the_post_id= $_GET['p_id'] ;
    }

    $query = "SELECT * FROM posts WHERE post_id=$the_post_id ";
    $select_posts_by_id = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tag = $row['post_tag'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    }

    if(isset($_POST['update_post'])){
            $post_title        = $_POST['title'];
            $post_author       = $_POST['author'];
            $post_category_id  = $_POST['post_category'];
            $post_status       = $_POST['post_status'];
    
            $post_image        = $_FILES['image']['name'];
            $post_image_temp   = $_FILES['image']['tmp_name'];
    
    
            $post_tag       =       $_POST['post_tag'];
            $post_content      = $_POST['post_content'];
        
        move_uploaded_file($post_image_temp, "../images/$post_image"); 
        
        if(empty($post_image)) {
        
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($connection,$query);
            
        while($row = mysqli_fetch_array($select_image)) {
            
           $post_image = $row['post_image'];
        
        }
        
        
}
        
          $query = "UPDATE posts SET ";
          $query .="post_title  = '{$post_title}', ";
          $query .="post_category_id = '{$post_category_id}', ";
          $query .="post_date   =  now(), ";
          $query .="post_author = '{$post_author}', ";
          $query .="post_status = '{$post_status}', ";
          $query .="post_tags   = '{$post_tag}', ";
          $query .="post_content= '{$post_content}', ";
          $query .="post_image  = '{$post_image}' ";
          $query .= "WHERE post_id = {$the_post_id} ";
        
        
        
        $update_post = mysqli_query($connection,$query);
    }





?>
    

    
    
    
    <form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="title">Post Title</label>
          <input value="<?php echo $post_title;?>" type="text" class="form-control" name="title">
      </div>
      
      <div class="form-group">
         <label for="author">Post Author</label>
          <input value="<?php echo $post_author;?>" type="text" class="form-control" name="author">
      </div>
     
     <div class="form-group">
        
        <select name="post_category" id="">
            <?php
                             $query = "SELECT * FROM categories";
                             $select_categories= mysqli_query($connection,$query);  

                             while($row = mysqli_fetch_assoc($select_categories)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                 
                                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                             
                             } 
                             
            
            ?>
            
            
        </select>
      </div>
      
      
      
      <div class="form-group">
         <label for="post_status">Post Status</label>
          <input value="<?php echo $post_status;?>" type="text" class="form-control" name="post_status">
      </div>
      
      <div class="form-group">
        <img width="100" src="../images/<?php $post_image;?>" alt="img">
         <label for="post_image">Post Image</label>
          <input type="file" name="image">
      </div>
      
     <div class="form-group">
         <label for="post_tag">Post Tags</label>
          <input value="<?php echo $post_tag;?>" type="text" class="form-control" name="post_tag">
      </div>
      
     <div class="form-group">
         <label for="post_content">Post Content</label>
          <textarea  class="form-control" name="post_content" id="" cols="30" rows="10">
          <?php echo $post_content;?>
         </textarea>
      </div>
      
     
    <div class="form-group">
       <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>
    
</form>
   