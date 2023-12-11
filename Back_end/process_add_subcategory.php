<?php

require("../connect.php");

$subCategory_name = $_POST["new_subCatName"];
$category = $_POST["category_id"];

// $category_query = "SELECT Category_ID FROM tbl_categories WHERE Category_name = '$category_name'";
// $result = mysqli_query($conn,$category_query);
// $category_id = mysqli_fetch_array($result)[0];

$sql = "INSERT INTO tbl_subcategories(SubCategory_name,Category,is_deleted) VALUES('$subCategory_name','$category',0)";

if(mysqli_query($conn,$sql)){
    echo "New record created successfully"."<br>";
} else{
    echo "Error: " .$sql ."<br>" .mysqli_error($conn);
}
?>