<?php
echo 'hello';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo '<pre>';
    print_r($_POST);
    print_r($_FILES['image']);
    echo '</pre>';
    $ImageName=time().'_'.$_FILES["image"]['name'];
    $target='../images/'.$ImageName;
    move_uploaded_file($_FILES['image']['tmp_name'],$target);
}