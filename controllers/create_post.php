<?php
require_once "../models/post.php";
// GET USER ID=====================================================
session_start();

// ADD POST ATRIBUTE TO DATABASE ==================================
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $discription= $_POST['discription'];
    $imageName = $_FILES['image']['name'];
    $ImageName=$imageName;
    $target='../images/'.$ImageName;
    move_uploaded_file($_FILES['image']['tmp_name'],$target);
    $_SESSION['discription']=false;
    $_SESSION['image']['name']=false;
    if(!empty($discription) and (!empty($imageName))){
        createPost(1,$discription,$imageName);
        header('location: ../index.php');
    }
    if(empty($_FILES['image']['name'] and isset($_FILES['image']['name']))){
        $_SESSION['image']['name']=true;
        header('location:../views/create_post.php');
    }
    if(empty($_POST['discription'] and isset($_POST['discription']))){
        $_SESSION['discription']=true;
        header('location:../views/create_post.php');
    }
}
