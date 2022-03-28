<?php
/**
 * Your code here
 */
require_once "../models/post.php";
$id=$_GET['id'];
$userID=$_GET['userID'];
removePost($id);

header("Location:../pages/home.php?userID=$userID");