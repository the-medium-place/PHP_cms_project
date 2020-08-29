<div class="col-md-4">

  <!-- Login Well -->
    <div class="well">
        <h4>Login:</h4>
        <form action="includes/login.php" method="POST" >
            <div class="form-group">
                <label for="username">Username:</label>
                <input name="username" type="text" class="form-control" placeholder="Enter Username">
            </div>  
            <div class="form-group">
                <label for="user_password">Password:</label>
                <input name="user_password" type="password" class="form-control" placeholder="Enter Password">
            </div>
            <span class="input-group-btn">
                <button name = "login" class="btn btn-primary" type="submit">Login</button>
            </span>
        </form>
        <!-- /.input-group -->
</div>



<!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="POST">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name = "submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

        <!-- Blog Categories Well -->
    <div class="well">
        <!-- CREATE QUERY FOR CATEGORY LIST -->
        <?php
            $query = "SELECT * FROM categories";
            $select_categories_sidebar = mysqli_query($connection, $query);
        ?>
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled">
                    <?php           
                        while($row = mysqli_fetch_assoc($select_categories_sidebar)){
                            $cat_title = $row['cat_title'];
                            $cat_id = $row['id'];

                            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                        }
                    ?>
                    </ul>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
            <!-- Side Widget Well -->
            <?php include 'widget.php'; ?>
    </div>
        <!-- /.row -->