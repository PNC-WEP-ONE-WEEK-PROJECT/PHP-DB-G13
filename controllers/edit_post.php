<?php
require_once('../models/post.php');
$userID = $_GET['userID'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $postID = $_POST['postID'];
    $description = $_POST['discription'];
    $oldImage=$_POST['oldImage'];
    if(!empty( $_FILES['image']['name'])){
        $imageName= $_FILES['image']['name'];
    }else{
        $imageName=$oldImage;
    }
   
    echo $imageName;
    $target = '../images/'. $imageName;
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    if (!empty($postID) and !empty($description) or !empty($imageName)) {
        updatePost($postID, $description, $imageName);
        header("Location:../pages/home.php?userID=$userID");
    }
    // header('location: ../index.php'); 
}
