<?php
require_once "../models/post.php";
// GET USER ID=====================================================
$db= new PDO("mysql:host=localhost;dbname=fb_db",'root','');

// ADD POST ATRIBUTE TO DATABASE ==================================
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $discription= $_POST['discription'];
    $imageName = $_FILES['image']['name'];
    $ImageName=$imageName;
    $target='../images/'.$ImageName;
    move_uploaded_file($_FILES['image']['tmp_name'],$target);
    createPost(1,$discription,$imageName);
    header('location: ../index.php');
}
