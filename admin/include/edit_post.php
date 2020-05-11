<?php

    if(isset($_GET['p_id'])){
   
    $the_movie_id =  $_GET['p_id'];

    }


    $query = "SELECT * FROM posts WHERE movie_id = $the_movie_id  ";
    $select_posts_by_id = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_posts_by_id)) {
        $movie_id            = $row['movie_id'];
        $movie_actor = $row['movie_actor'];
        $movie_name         = $row['movie_name'];
        $movie_category_id   = $row['movie_category_id'];
        $movie_language        = $row['movie_language'];
        $image         = $row['image'];
        $content       = $row['content'];
        $movie_tags          = $row['movie_tags'];
        $watched_count = $row['watched_count'];
        $date_of_release          = $row['date_of_release'];
       
         }


    if(isset($_POST['update_post'])) {
       
       
        $movie_actor           =  $_POST['movie_actor'];
        $movie_name          =  $_POST['movie_name'];
        $movie_category_id    =  $_POST['movie_category'];
        $movie_language         =  $_POST['movie_language'];
        $image          =  $_FILES['image']['name'];
        $image_temp     =  $_FILES['image']['tmp_name'];
        $content        =  $_POST['content'];
        $movie_tags          =  $_POST['movie_tags'];
       
        move_uploaded_file($image_temp, "../images/$image");
       
        if(empty($image)) {
       
        $query = "SELECT * FROM posts WHERE movie_id = $the_movie_id ";
        $select_image = mysqli_query($connection,$query);
           
        while($row = mysqli_fetch_array($select_image)) {
           
           $image = $row['image'];
       
        }
       
       
}
        $movie_name = mysqli_real_escape_string($connection, $movie_name);

       
          $query = "UPDATE posts SET ";
          $query .="movie_name  = '{$movie_name}', ";
          $query .="movie_category_id = '{$movie_category_id}', ";
          $query .="date_of_release   =  now(), ";
          $query .="movie_actor = '{$movie_actor}', ";
          $query .="movie_language = '{$movie_language}', ";
          $query .="movie_tags   = '{$movie_tags}', ";
          $query .="content= '{$content}', ";
          $query .="image  = '{$image}' ";
          $query .= "WHERE movie_id = {$the_movie_id} ";
       
        $update_post = mysqli_query($connection,$query);
       
        //confirmQuery($update_post);
       
        //echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id={$the_movie_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></p>";
       

   
   
    }



?>
   

   
   
   
   
    <form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="title">Movie Title</label>
          <input value="<?php echo htmlspecialchars(stripslashes($movie_name)); ?>"  type="text" class="form-control" name="movie_name">
      </div>

         <div class="form-group">
         <label for="movie_actor"> Actor </label>
          <input value="<?php echo $movie_actor;?>" type="text" class="form-control" name="movie_actor">
      </div>
     
         
         
           <div class="form-group">
       <label for="categories">Categories</label>
       <select name="movie_category" id="">
           
      <?php

        $query = "SELECT * FROM categories ";
        $select_categories = mysqli_query($connection,$query);
       
        //confirmQuery($select_categories);


        while($row = mysqli_fetch_assoc($select_categories )) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];


        if($cat_id == $movie_category_id) {

     
        echo "<option selected value='{$cat_id}'>{$cat_title}</option>";


        } else {

          echo "<option value='{$cat_id}'>{$cat_title}</option>";


        }
     
   
        }

?>
           
       
       </select>

      </div>

       

     
     
      <div class="form-group">
         <label for="movie_language">Movie Language</label>
          <input value="<?php echo $movie_language;?>" type="text" class="form-control" name="movie_language">
      </div>
     
     
    <div class="form-group">

       <img width="100" src="../images/<?php echo $image; ?>" alt="">
       <input  type="file" name="image">
      </div>

      <div class="form-group">
         <label for="movie_tags">Movie TAGS</label>
          <input value="<?php echo $movie_tags; ?>"  type="text" class="form-control" name="movie_tags">
      </div>
     
      <div class="form-group">
         <label for="content">Content</label>
         <textarea  class="form-control "name="content" id="body" cols="30" rows="10"><?php echo $content; ?>
         
       
         </textarea>
      </div>
     
     

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
      </div>


</form>
