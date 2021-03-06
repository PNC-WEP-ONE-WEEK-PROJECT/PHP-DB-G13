
<?php
require_once('../templates/header.php');
require_once('../models/post.php');

require_once"../templates/navbar.php";
$userAccount =getUserAccount($_GET['userID']);



?>
    <div class="container bg-light" style="width:60%">

    
    <div class="cover w-100 m-auto" style="border:3px solid black;">
        <img src="../images/24701-nature-natural-beauty.jpg" class="w-100 " alt="">
    </div> 
    <div class="row d-flex justify-content-center">
        <img src="../images/<?=$userAccount['profile']?>" class="img-center rounded-circle" alt="">
        
    </div>
    <h2 class="h3 text-center"><?=$userAccount['firstName'].' '?><?=$userAccount['lastName']?></h2>
        
    
    
    <div class="container w-100">
    <?php
    require_once('../models/post.php');
    $userID=$_GET['userID'];
    $allPost = getbyUser($userID);
    foreach ($allPost as $post) :
        $convertDate = date_create($post['date']);
    ?>
        <div class="card mt-4">
            <div class="card-header">
                <div class="row d-flex">
                    <div class="col col-2 d-flex">
                        <div class="card-profile">
                            <img src="../images/<?=$userAccount['profile']?>" class="image-profile rounded-circle float-start" alt="">
                        </div>

                    </div>
                    <div class="col col-3">
                        <div class="row">            
                            <p class="h5 text-start"> <?=$post['firstName']." "?><?=$post['lastName']?> </p>
                        </div>
                        <p class="h6 text-start"><?= date_format($convertDate, '\ D, j, M,Y'); ?></p>
                    </div>
                    <div class="col col-4"></div>

                    <div class="col col-3">
                        <a href="../views/edit_post.php?id=<?= $post['postID']; ?>">
                            <div class="icon-edit btn btn-primary ms-10"><i class="fa fa-edit"></i></div>
                        </a>

                        <a href="../controllers/delete_post.php?id=<?= $post['postID']; ?>">
                            <div class="btn btn-danger ms-3"><i class="fa fa-trash-o"></i></div>
                        </a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <p class='discription'><?= $post['description'] ?></p>

                </div>
                <div class="row class=" rounded float-start"">
                    <img src="../images/<?= $post['image'] ?>" class="rounded mx-auto d-block" alt="">
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <?php
                    //require_once "models/like.php";
                    $likeList = getAllLike($post['postID']);
                    ?>
                    <div class="col col-2">
                        <div class="btn-group">
                            <a href="../controllers/like_profile.php?id=<?= $post['postID']?>&userID=<?= $post['userID'] ?> " class="btn btn-primary">
                                <i class="fa fa-thumbs-up btn btn-primary"></i>
                            </a>
                            <i class="btn btn-primary"><?= count($likeList); ?></i>

                        </div>
                    </div>
                    <div class="col col-8 p-0">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item p-0">
                                <h2 class="accordion-header p-0" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $post['postID'] ?>">
                                        Comment
                                    </button>
                                </h2>
                                <div id="collapse<?= $post['postID'] ?>" class="collapse">
                                    <form action="../controllers/comment_post.php" method="post">
                                        <input type="hidden" name="userID" value="<?=$userID ?>">
                                        <input type="hidden" name="postID" value="<?= $post['postID'] ?>">
                                        <div class="accordion-body form-floating">
                                            <input type="text" name="comment" id="" class="form-control" placeholder="comment...">

                                        </div>
                                        <div class="accordion-body form-floating">

                                            <button type="submit" class="btn btn-primary">Comment</button>
                                        </div>
                                        <div class="accordion-body form-floating">
                                            <?php
                                            $allComments = getComments($post['postID']);
                                            foreach ($allComments as $comment) {
                                            ?>
                                                <p class="text">
                                                    <?= $comment['comment']; ?>

                                                </p>

                                            <?php
                                            }; ?>
                                        </div>
                                    </form>
                                    <div class="row">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-2">
                    <i class="btn btn-primary"><?=count($allComments); ?></i>
                    </div>
                </div>
            </div>

        </div>
    <?php
    endforeach;
    ?>
</div>
</div>



<?php
require_once('../templates/footer.php');
?>