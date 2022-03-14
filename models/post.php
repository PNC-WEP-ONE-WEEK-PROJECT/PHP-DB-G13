<?php

/**
 * Your code here
 */
require_once('datebase.php');
//create posts 

function createPost($userID,$description, $img)
{
    global $db;
    $statement = $db->prepare("INSERT INTO posts (userID,description, image) VALUES(:descrip,:images,:userID)");
    $statement->execute(
        [':descrip' => $description, ':images' => $img,':userID'=>$userID]
    );
    return $statement->fetch();
};

//Update  post
function updatePost($postID, $description, $img)
{
    global $db;
    $statement = $db->prepare("UPDATE posts SET description =:descrip ,image=:img WHERE userID=:postID");
    $statement->execute(
        [':descrip' => $description, ':img' => $img, ':postID' => $postID]
    );
    return $statement->fetch();
}

//get a post
function getPost($postID){
    global $db;
    $statement=$db->prepare('SELECT * FROM posts WHERE userID=:postID');
    $statement->execute([':postID' => $postID]);
    return $statement->fetch();
}
// getAllPosts
function getAllPosts(){
    global $db;
    $statement = $db->prepare("SELECT * FROM posts order by userID desc");
    $statement->execute();
    return $statement->fetchAll();
}

//vemove post from

function removePost($postID){
    global $db;
    $statement=$db->prepare("DELETE FROM posts WHERE userID=:postID");
    $statement->execute([':postID' => $postID]);
    return $statement->fetch();
}