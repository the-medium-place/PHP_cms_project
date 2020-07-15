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

                            <?php
                                    // UPDATE CATEGORY
                                if (isset($_GET['update'])){
                                    $update_cat_id = $_GET['update'];

                                    $query = "SELECT * FROM categories WHERE id={$update_cat_id}";
                                    $update_query = mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($update_query)){
                                        ?>
                                        <div style="border: 1px solid lightgray; padding: 2px;">
                                            <!-- <span style="color: red; left: 100%; top: 0; border: 1px solid lightred; background: lightpink;">Close</span> -->
                                        <div class="form-group">
                                            <form action="" method="post">
                                            <label for="cat_title">Edit Category</label>
                                            <?php   
                                                $cat_title = $row['cat_title'];
                                                $cat_id = $row['id'];
                                            ?>
                                            <input type="text" name="cat_title" id="cat_title" class="form-control" value="<?php if(isset($cat_title)){echo $cat_title;} ?>">
                                            </div>
                                            <div class="form-group">
                                                <input class="btn btn-primary" type="submit" name="update_category" id="submit" value="Update Category">
                                            </div>
                                        </div>
                                        </div>
                                    <?php 
                                    }}
                                    ?>

                                    <?php
                                    // UPDATE CATEGORY
                                        if (isset($_POST['update_category'])){
                                            $update_cat_title = $_POST['cat_title'];

                                            $query = "UPDATE categories SET cat_title = '{$update_cat_title}' WHERE id={$update_cat_id}";
                                            $update_query = mysqli_query($connection, $query);

                                            if(!$update_query){
                                                die("QUERY FAILED".mysqli_error($connection));
                                            }
                                            // REFRESH PAGE WITH UPDATED RESULTS
                                            header("Location: categories.php");
                                        }    


                                    ?>
                               
                            </form>
                        </div>

                        <div class="col-xs-6">
 
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>

                               <?php 
                               // POPULATE TABLE OF CATEGORY NAMES

                               // CREATE SQL QUERY
                               $query = "SELECT * FROM categories";
                               $select_categories = mysqli_query($connection, $query);
                  
                               // CREATE CATEGORY TABLE LISTINGS
                                while($row = mysqli_fetch_assoc($select_categories)){
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['id'];

                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    // CREATE DELETE LINK FOR $_GET SUPERGLOBAL
                                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "<td><a href='categories.php?update={$cat_id}'>Edit</a></td>";
                                    echo "</tr>";
                                }

                                // DELETE CATEGORY WITH CLICK
                                if (isset($_GET['delete'])){
                                    $delete_cat_id = $_GET['delete'];

                                    $query = "DELETE FROM categories WHERE id={$delete_cat_id}";
                                    $delete_query = mysqli_query($connection, $query);

                                    // REFRESH PAGE WITH UPDATED RESULTS
                                    header("Location: categories.php");
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
