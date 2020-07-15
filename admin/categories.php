<!-- HTML HEADER -->
<?php include 'includes/admin_header.php' ?>

<!-- NAVIGATION -->
<?php include 'includes/admin_navigation.php' ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author Name</small>
                        </h1>
                        <div class="col-xs-6">
                        <?php
                        // CHECK FOR SUBMIT BUTTON ACTIVITY
                            if(isset($_POST['submit'])){

                                // CAPTURE USER INPUT
                                $cat_title = $_POST['cat_title'];

                                // FORM VALIDATION
                                if($cat_title == "" || empty($cat_title)){
                                    echo "Please enter a category title";
                                } else {

                                    // CREATE SQL QUERY
                                    $query = "INSERT INTO categories(cat_title)";
                                    $query .= "VALUE ('{$cat_title}');";

                                    // RUN QUERY (FUNCTION RETURNS BOOLEAN)
                                    $create_category_query = mysqli_query($connection, $query);

                                    // DATABASE ERROR HANDLING
                                    if(!$create_category_query) {
                                        die('QUERY FAILED'.mysqli_error($connection));
                                    }
                                }
                                
                            }

                        ?>



                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title" id="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Add Category">
                                </div>
                            </form>
                        </div>

                        <div class="col-xs-6">
                        <?php
                            $query = "SELECT * FROM categories";
                            $select_categories = mysqli_query($connection, $query);
               
                        ?>


                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>

                               <?php                     
                            while($row = mysqli_fetch_assoc($select_categories)){
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['id'];

                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td></tr>";
                                    echo "</tr>";
                                }

                                ?>
 
                            </tbody>
                        </table>
                        
                        
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<!-- HTML FOOTER -->
<?php include 'includes/admin_footer.php' ?>
