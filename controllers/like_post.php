

<?php

require_once('../models/post.php');
$listOfLike=getAllLike($_GET['id']);
$isHave=true;
// check if user has been like befor=========================================
foreach($listOfLike as $like){
    if ($like['userID']==$_GET['userID']){
        $isHave=false;
    }
}
$userID= $_GET['userID'];
if($isHave){
    pushLike($_GET['userID'], $_GET['id']);
    header("Location:../pages/home.php?userID=$userID");
}
else{
    removeLike($_GET['userID'], $_GET['id']);

    header("Location:../pages/home.php?userID=$userID");
}
?>
