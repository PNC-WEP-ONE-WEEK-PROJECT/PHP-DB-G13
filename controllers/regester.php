<?php
require_once('../models/post.php');
$users = getUser();
session_start();
// $_SESSION['firstName']=false;
// $_SESSION['lastName']=false;
// $_SESSION['gender']=false;
// $_SESSION['date']=false;
// $_SESSION['email']=false;
// $_SESSION['password']=false;
// if($_SESIONS['firstName'])
$isUserCreated = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {}
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $gender=$_POST['gender'];
    $date=$_POST['date'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(!empty($_FILES['image']['name'])){
        $imageName = $_FILES['image']['name'];

    }else if ($gender=='male'){
        $imageName="male.png";
    }else{
        $imageName="female.png";

    }
    
    $target='../images/'.$imageName;
    if(!(file_exists($target))){
        move_uploaded_file($_FILES['image']['tmp_name'],$target);
    }
    if (!empty($email) && !empty($password)) {
        foreach ($users as $user) {

            if ($user['email'] == $email and $user['password'] == $password) {
                $isUserCreated = true;
            }
        }
    
        if ($isUserCreated==false) {
            createAccount($firstName,$lastName,$date,$gender,$email,$password, $imageName);
            $user_account= getUsers($email,$password);
            $userID= $user_account['userID'];
            echo $userID;
            header("Location:../pages/home.php?userID=$userID");
        }else{
            header('Location:../user_account/create_account.php');
    
    }

}