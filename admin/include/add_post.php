<?php
   if(isset($_POST['create_post'])){
       
            $movie_name        = $_POST['title'];
            $movie_actor       = $_POST['actor'];
            $movie_category_id  = $_POST['movie_category'];
            $movie_language       = $_POST['movie_language'];
    
            $image        = $_FILES['image']['name'];
            $image_temp   = $_FILES['image']['tmp_name'];
    
    
            $movie_tags       =       $_POST['movie_tags'];
            $content      = $_POST['content'];
            $date_of_release        = date('d-m-y');
            $watched_count = 4;

             move_uploaded_file($image_temp, "../images/$image" );
    
       
       $query = "INSERT INTO posts(movie_category_id, movie_name, movie_actor,date-of-release,image,content,movie_tags,watched_count,movie_language) ";
       
       $query .= "VALUES({$movie_category_id},'{$movie_name}','{$movie_actor}',now(),'{$image}','{$content}','{$movie_tags}','{$watched_count}', '{$movie_language}') "; 
             
       
       $create_post_query = mysqli_query($connection, $query);  
       
       //confirm($create_post_query);
       
   }
    
           ?>
<form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="title">Movie Title</label>
          <input type="text" class="form-control" name="title">
      </div>
      
      <div class="form-group">
         <label for="actor">Actor</label>
          <input type="text" class="form-control" name="actor">
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
          <input type="text" class="form-control" name="movie_language">
      </div>
      
      <div class="form-group">
         <label for="image">Image</label>
          <input type="file" name="image">
      </div>
      
     <div class="form-group">
         <label for="movie_tags">Movie Tags</label>
          <input type="text" class="form-control" name="movie_tags">
      </div>
      
     <div class="form-group">
         <label for="content"> Content</label>
          <textarea class="form-control" name="content" id="" cols="30" rows="10">
         </textarea>
      </div>
      
     
    <div class="form-group">
       <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
    
</form>
   
