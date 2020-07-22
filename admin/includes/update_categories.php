<?php
// UPDATE CATEGORY
if (isset($_GET['update'])) {
    $update_cat_id = $_GET['update'];

    $query = "SELECT * FROM categories WHERE id={$update_cat_id}";
    $update_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($update_query)) {
        ?>
                                        <div style="border: 1px solid lightgray; ">
                                            <!-- <span style="color: red; left: 100%; top: 0; border: 1px solid lightred; background: lightpink;">Close</span> -->
                                            <form action="" method="post">
                                                <div class="form-group" style="margin: 5px;">
                                                    <label for="cat_title">Edit Category</label>
                                                    <?php
$cat_title = $row['cat_title'];
        $cat_id = $row['id'];
        ?>
                                                    <input type="text" name="cat_title" id="cat_title" class="form-control" value="<?php if (isset($cat_title)) {echo $cat_title;}?>">
                                                </div>
                                                <div class="form-group" style="margin: 5px;">
                                                    <input class="btn btn-primary" type="submit" name="update_category" id="submit" value="Update Category">
                                                </div>
                                            </form>
                                        </div>
                                    <?php
}} // END OF WHILE LOOP

// UPDATE CATEGORY
if (isset($_POST['update_category'])) {
    $update_cat_title = $_POST['cat_title'];

    $query = "UPDATE categories SET cat_title = '{$update_cat_title}' WHERE id={$update_cat_id}";
    $update_query = mysqli_query($connection, $query);

    if (!$update_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
    // REFRESH PAGE WITH UPDATED RESULTS
    header("Location: categories.php");
}
?>