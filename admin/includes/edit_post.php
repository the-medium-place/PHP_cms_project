<?php

if (isset($_GET['p_id'])) {
    $post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = $post_id";
$select_posts_by_id = mysqli_query($connection, $query);

// CREATE CATEGORY TABLE LISTINGS
while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];
}

// CAPTURE UPDATE VALUES
if (isset($_POST['update_post'])) {

    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    // CHECK FOR VALUE IN IMAGE SPACE
    // BEFORE SENDING UPDATE QUERY
    if(empty($post_image)) {

        $query = "SELECT * FROM posts WHERE post_id = $post_id";
        $select_image = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_image)){
            $post_image = $row['post_image'];
        }
    }

    // BUILD UPDATE QUERY
    $query = "UPDATE posts SET ";
    $query .= "post_title = '" . $post_title . "', ";
    $query .= "post_category_id = '" . $post_category_id . "', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '" . $post_author . "', ";
    $query .= "post_status = '" . $post_status . "', ";
    $query .= "post_tags = '" . $post_tags . "', ";
    $query .= "post_content = '" . $post_content . "', ";
    $query .= "post_image = '" . $post_image . "' ";
    $query .= "WHERE post_id = " . $post_id . ";";

    $update_post = mysqli_query($connection, $query);
    confirm($update_post);

}

?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value="<?php echo $post_title ?>" type="text" name="post_title" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_category">Select Category </label>
        <br>
        <select name ="post_category" id="">
        <?php
$query = "SELECT * FROM categories";
$update_query = mysqli_query($connection, $query);

confirm($update_query);

while ($row = mysqli_fetch_assoc($update_query)) {

    $cat_id = $row['id'];
    $cat_title = $row['cat_title'];
    echo "<option value='" . $cat_id . "'>" . $cat_title . "</option>";

}
?>
          </select>


    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input value="<?php echo $post_author ?>" type="text" name="post_author" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <!-- <input type="text" name="post_status" class="form-control"> -->
        <select name="post_status">
        <option>Published</option>
        <option>Draft</option>
        </select>
    </div>

    <div class="form-group">
    <!-- <label for="post_img">Image </label> -->
    <!-- <br> -->
        <label for="post_image">Post Image</label><br>
        <img src="../images/<?php echo $post_image ?>" width="100" name="post_image"/>
        <input type="file" name="post_image" class="form-control">

    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags ?>" type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" id="" cols="30" rows="10" class="form-control"><?php echo $post_content ?></textarea>
    </div>

    <div class="form-grop">
        <input type="submit" value="Update" class="btn btn-primary" name="update_post">
    </div>
</form>