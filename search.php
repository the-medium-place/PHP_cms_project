<?php include 'includes/db.php'?>

<!-- Header -->
<?php include 'includes/header.php'?>

<!-- Nav Bar Include -includes/-->
<?php include 'includes/navigation.php'?>



        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php

                    // SIDEBAR SEARCH FUNCTIONALITY
                    if (isset($_POST['search'])) {

                        // capture search input
                        $search = $_POST['search'];

                        // create MySQL query
                        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                        $search_query = mysqli_query($connection, $query);

                        // return error if query does not return results
                        if (!$search_query) {
                            die("Query Failed" . mysqli_error($connection));
                        }

                        // check for number of results
                        $count = mysqli_num_rows($search_query);

                        // output for results
                        if ($count == 0) {
                            echo '<h1>No Results for your search</h1>';
                        } else {
                            // GET POST INFO FROM DATABASE
                            // $query = "SELECT * FROM posts";
                            // $select_all_posts_query = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($search_query)) {
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = $row['post_content'];

                        ?>
                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted <?php echo $post_date ?></p>
                    <hr>
                    <img class="img-responsive" src="<?php echo $post_image ?>" alt="">
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                    <?php
                        }
                    }
                    }
                    ?>



            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"?>




<!-- Footer -->
<?php include "includes/footer.php"?>