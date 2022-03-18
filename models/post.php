<?php

/**
 * Your code here
 */

require_once('database.php');
//create posts 
// $db= new PDO("mysql:host=localhost;dbname=fb_db",'root','');
function createPost($userID, $description, $img)
{
    global $db;
    $statement = $db->prepare("INSERT INTO posts (userID,description, image) VALUES(:userID,:description,:images)");
    $statement->execute(
        [':description' => $description, ':images' => $img, ':userID' => $userID]
    );
    return $statement->fetch();
};

//Update  post
function updatePost($postID, $description, $img)
{
    global $db;
    $statement = $db->prepare("UPDATE posts SET description =:descrip ,image=:img WHERE postID=:postID");
    $statement->execute(
        [':descrip' => $description, ':img' => $img, ':postID' => $postID]
    );
    return $statement->fetch();
}

//get a post
function getPost($postID)
{
    global $db;
    $statement = $db->prepare('SELECT * FROM posts WHERE postID=:postID');
    $statement->execute([':postID' => $postID]);
    return $statement->fetch();
}
// getAllPosts
function getAllPosts()
{
    global $db;
    $statement = $db->prepare("SELECT * FROM posts order by postID desc");
    $statement->execute();
    return $statement->fetchAll();
}

//vemove post from

function removePost($postID)
{
    global $db;
    $statement = $db->prepare("DELETE FROM posts WHERE postID=:postID");
    $statement->execute([':postID' => $postID]);
    return $statement->fetch();
}
function comments($postID, $userID,$content)
{
    
    global $db;
    $statement = $db->prepare("INSERT INTO posts (userID,PostId) VALUES(:userID,:postID)");
    $statement->execute(
        [':postID' => $postID, ':userID' => $userID]
    );
}
// function getAllLikes($postID, $userID)
// {
//     global $db;
//     $statement = $db->prepare(SELECT * FROM likes WHERE postID=:postID");
//     $statement->execute(
//         [':postID' => $postID, ':userID' => $userID]
//     );
// }
