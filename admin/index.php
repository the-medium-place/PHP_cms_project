


<!-- HTML HEADER -->
<?php include 'includes/admin_header.php' ?>

<!-- CHECK FOR SESSION VALUE -->
<?php
    // if(!($_SESSION['user_firstname'])){
    //     header("Location: ../index.php");
    // } 

    if(!isset($_SESSION['user_firstname'])){
        header("Location: ../index.php");
    }
?>


<!-- NAVIGATION -->
<?php include 'includes/admin_navigation.php' ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>

                                <?php
                                    echo $_SESSION['user_firstname'];
                                ?>

                            </small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<!-- HTML FOOTER -->
<?php include 'includes/admin_footer.php' ?>
