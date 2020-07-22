<?php

function insert_categories(){
    global $connection;
    // CHECK FOR SUBMIT BUTTON ACTIVITY
    if (isset($_POST['submit'])) {

        // CAPTURE USER INPUT
        $cat_title = $_POST['cat_title'];

        // FORM VALIDATION
        if ($cat_title == "" || empty($cat_title)) {
            echo "Please enter a category title";
        } else {

            // CREATE SQL QUERY
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE ('{$cat_title}');";

            // RUN QUERY (FUNCTION RETURNS BOOLEAN)
            $create_category_query = mysqli_query($connection, $query);

            // DATABASE ERROR HANDLING
            if (!$create_category_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
        }
    }
}

function findAllCategories(){
    global $connection;

    // CREATE SQL QUERY
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    // CREATE CATEGORY TABLE LISTINGS
    while ($row = mysqli_fetch_assoc($select_categories)) {
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

}

function deleteCategory(){
    global $connection;

    if (isset($_GET['delete'])){
        $delete_cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE id={$delete_cat_id}";
        $delete_query = mysqli_query($connection, $query);

        // REFRESH PAGE WITH UPDATED RESULTS
        header("Location: categories.php");
    }    



}


?>