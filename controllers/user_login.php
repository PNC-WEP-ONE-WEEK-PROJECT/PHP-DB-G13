<?php
require_once('../models/post.php');
$users = getUser();
$isUserCreated = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!empty($email) && !empty($password)) {
        foreach ($users as $user) {

            if ($user['email'] == $email and $user['password'] == $password) {
                $isUserCreated = true;
            }
        }
    }
    if ($isUserCreated) {
        header('Location:../include/include.php');
    } else {
        header('Location:../index.php');
    }

endif;
