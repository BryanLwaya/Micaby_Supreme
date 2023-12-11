<?php

// echo "<pre>";
// print_r($_POST);
// echo "<br>";
// print_r($_FILES);

// echo "</pre>";


require("../connect.php");

$product_name = $_POST["new_prodName"];
$product_desc = $_POST["new_prodDescription"];

$product_img = $_FILES["new_prodImg"]['name'];
$product_img_tmp_name = $_FILES['new_prodImg']['tmp_name'];
$product_img_dir = "Product_images/". $product_img;

$product_price = $_POST["unit_price"];
$product_qty = $_POST["add_qty"];
$category_id = $_POST["category_id"];
$subcategory_id = $_POST["subcategory_id"];
$created = $_POST["date_added"];
$updated = $_POST["date_updated"];
$added_by = $_POST["admin_id"];


$sql = "INSERT INTO tbl_products(Product_name,Product_description,Product_image,img_dir,Unit_price,available_quantity,Category_ID,SubCategory_ID,Created_at,Updated_at,added_by,is_deleted) VALUES('$product_name','$product_desc','$product_img','$product_img_dir',$product_price,$product_qty,'$category_id','$subcategory_id','$created','$updated','$added_by',0);";

if(mysqli_query($conn,$sql)){
    move_uploaded_file($product_img_tmp_name,"../".$product_img_dir);
    echo "New product added successfully";
} else{
    echo "Error: " .$sql ."<br>" .mysqli_error($conn);
}


?>