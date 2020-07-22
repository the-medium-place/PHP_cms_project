<?php

if (isset($_POST['create_post'])) {

    $post_title = $_POST['title'];
    $post_author = $_POST['post_author'];
    $post_category = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;

    // SAVE AND MOVE UPLOADED FILE TO IMAGE DIRECTORY
    move_uploaded_file($post_image_temp, "../images/$post_image");

}
?>





<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_category">Post Category</label>
        <input type="text" name="post_category" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" name="post_author" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" name="post_status" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" id="" cols="30" rows="10" class="form-control">
        </textarea>
    </div>

    <div class="form-grop">
        <input type="submit" value="Publish" class="btn btn-primary" name="create_post">
    </div>
</form>
