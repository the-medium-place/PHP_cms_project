<!-- HTML HEADER -->
<?php include 'includes/admin_header.php'; ?>

<!-- NAVIGATION -->
<?php include 'includes/admin_navigation.php'; ?>



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
                        
                        <!-- ADD CATEGORIES FUNCTIONALITY -->
                        <?php insert_categories(); ?>

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
                            // UPDATE CATEGORIES HANDLING
                                if(isset($_GET['update'])){
                                    $cat_id = $_GET['update'];
                                    include 'includes/update_categories.php';
                                }
                            ?>

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

                                <!-- POPULATE CATEGORIES TABLE -->
                                <?php findAllCategories(); ?>

                                <!-- DELETE FUNCTIONALITY -->
                                <?php deleteCategory(); ?> 

                            </tbody>
                        </table>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- HTML FOOTER -->
<?php include 'includes/admin_footer.php' ?>
