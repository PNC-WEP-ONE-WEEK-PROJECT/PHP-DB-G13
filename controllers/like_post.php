<?php
echo $_GET['id'];
echo $_GET['userID'];
require_once('../models/post.php');
$listOfLike=getAllLike($_GET['id']);
$isHave=true;
foreach($listOfLike as $like){
    if ($like['userID']==$_GET['userID']){
        $isHave=false;
    }
}
if($isHave){
    pushLike($_GET['userID'], $_GET['id']);
    header('Location:../index.php');
}
else{
    header('Location:../index.php');
}
?>
