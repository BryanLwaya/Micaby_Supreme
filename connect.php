<?php

$server_name= "localhost";
$username= "root";
$password= "wanza2014!";
$database="Ecommerce_project_main";

$conn = mysqli_connect($server_name,$username,$password,$database);

if(!$conn){
    die("Could not connect".mysqli_connect_error());
}
?>