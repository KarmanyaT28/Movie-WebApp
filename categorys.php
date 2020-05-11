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
    
    
             if(isset($_GET['categorys'])){
                   $movie_category_id= $_GET['categorys'];
                }
    
                $query="SELECT * FROM posts WHERE movie_category_id=$movie_category_id";
                $select_all_posts_query = mysqli_query($connection,$query);
                
                while($row = mysqli_fetch_assoc($select_all_posts_query)){
                    $movie_id=  $row['movie_id'];
                    $movie_name=  $row['movie_name'];
                    $movie_actor=  $row['movie_actor'];
                    $date_of_release=  $row['date_of_release'];
                    $image=  $row['image'];
                    $content=  substr($row['content'],0,100);
                   ?>
                   
                  <!--  <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>-->

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $movie_id; ?>"><?php echo $movie_name?></a>
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

                <?php }
    
                ?>

                
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>


<?php include "include/footer.php"; ?>
