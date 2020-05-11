




<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>actor</th>
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
    $movie_id = $row['movie_id'];
    $movie_actor = $row['movie_actor'];
    $movie_name = $row['movie_name'];
    $movie_category_id = $row['movie_category_id'];
    $movie_language = $row['movie_language'];
    $image = $row['image'];
    $movie_tags = $row['movie_tags'];
    $watched_count = $row['watched_count'];
    $date_of_release = $row['date_of_release'];
    echo "<tr>";
    echo "<td>$movie_id</td>";
    echo "<td>$movie_actor</td>";
    echo "<td>$movie_name</td>";
        
        
        
        
         
    $query = "SELECT * FROM categories WHERE cat_id = {$movie_category_id} ";
        $select_categories_id = mysqli_query($connection,$query);  

        while($row = mysqli_fetch_assoc($select_categories_id)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        
        echo "<td>$cat_title</td>";
            
        }

        
        
        
        
    echo "<td>$movie_language</td>";
    echo "<td><image width='100' src='../images/$image' alt='image' ></td>";
    echo "<td>$movie_tags</td>";
    echo "<td>$watched_count</td>";
    echo "<td>$date_of_release</td>";
        
    echo "<td><a href='posts.php?source=edit_post&p_id={$movie_id}'>Edit</a></td>";
    echo "<td><a href='posts.php?delete={$movie_id}'>Delete</a></td>";
    echo "<tr>";  
                               
   
    }
        
                                             ?>  
            
                               
                                
                            
                        </tbody>
                        </table>
                       
                        
<?php

if(isset($_GET['delete'])){
    $the_movie_id = $_GET['delete'];
    $query="DELETE FROM posts WHERE movie_id = ($the_movie_id)";
    $delete_query = mysqli_query($connection,$query);
    
 } 









?>
               
