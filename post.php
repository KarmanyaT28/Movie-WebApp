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
    
                if(isset($_GET['p_id'])){
                    
                  $the_movie_id = $_GET['p_id'];  
                    
                    
                    
                }
    
                $query="SELECT * FROM posts WHERE movie_id=$the_movie_id";
                $select_all_posts_query = mysqli_query($connection,$query);
                
                while($row = mysqli_fetch_assoc($select_all_posts_query)){
                   
                    $movie_name=  $row['movie_name'];
                    $movie_actor=  $row['movie_actor'];
                    $date_of_release=  $row['date_of_release'];
                    $image=  $row['image'];
                    $content=  $row['content'];
                   ?>
                   
<!--
                    <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                   
-->
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


<!-- Blog Comments -->



                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
<!--                        <img class="media-object" src="http://placehold.it/64x64" alt="">-->
                    </a>
                    <div class="media-body">
<!--
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
-->
<!--                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#"></a>
<!--
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
-->
                    <div class="media-body">
<!--
                        <h4 class="media-heading">Start Watching
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
-->
<!--                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
<!--                                <img class="media-object" src="http://placehold.it/64x64" alt="">-->
                            </a>
                            <div class="media-body">
<!--
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
-->
<!--                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>


    
                

                
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>


<?php include "include/footer.php"; ?>
