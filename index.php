
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
                  <div class="Text">
                    <h1 class="page-header">
                    <b style="font-size:200%;">Watch Here</b>
                        <br>
                    <strong style="color:dark-violet;font-size:100%;">Trending Now</strong>
                </h1>
                </div>
                <?php
    
                $query="SELECT * FROM posts";
                $select_all_posts_query = mysqli_query($connection,$query);
                
                while($row = mysqli_fetch_assoc($select_all_posts_query)){
                    $movie_id=  $row['movie_id'];
                    $movie_name=  $row['movie_name'];
                    $movie_actor=  $row['movie_actor'];
                    $date_of_release=  $row['date_of_release'];
                    $image=  $row['image'];
                    $content= substr($row['content'],0,100);
                   ?>
              
                 
                <!-- First Blog Post -->
                <div class="blog-post-1">
                <h2>
                    <a href="posts.php?p_id=<?php echo $movie_id; ?>"><?php echo $movie_name?></a>
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
                
                    
                    
              </div>
                
                
                
                
                
                
                <?php }
    
                ?>
                
            </div>
            
            
            
            
            
            

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>


<?php include "include/footer.php"; ?>
