<?php

// print_r ($_POST);
require("../connect.php");

$Category_name = $_POST["new_catName"];

$sql="INSERT INTO tbl_categories(Category_name,is_deleted) VALUES ('$Category_name',0)";

if(mysqli_query($conn,$sql)){
    echo "New record created successfully"."<br>";
} else {
    echo "Error: " .$sql ."<br>" .mysqli_error($conn);
}

?>