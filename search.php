<?php 
include "include/header.php"
?>
<?php 
include "include/db.php"
?>

    <!-- Navigation -->
<?php 
include "include/navigation.php"
?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
               <?php
    
      if(isset($_POST['submit'])){
            $search= $_POST['search'];
            $query="SELECT * FROM posts WHERE movie_tags LIKE '%$search%' ";
            $search_query=mysqli_query($connection,$query);
            
            if(!$search_query){
                die("QUERY FAILED".mysqli_error($connection));
            }
          
          
          
           $count=mysqli_num_rows($search_query);
          
          
            if($count==0){
                echo "<h1> NO RESULT FOUND</h1>";
                
            }
        
            else{
                
                while($row = mysqli_fetch_assoc($search_query)){
                    $movie_name=  $row['movie_name'];
                    $movie_actor=  $row['movie_actor'];
                    $date_of_release=  $row['date_of_release'];
                    $image=  $row['image'];
                    $content=  $row['content'];
                   ?>
                   
                  
<div class="search">
                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $movie_name?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $movie_actor ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $date_of_release?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $image;?>" alt="">
                <hr>
                <p><?php echo $content?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
</div>
                <?php }
    
                

                
            }
          
            
      }
    
    ?>
                
                
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>


<?php include "include/footer.php"; ?>