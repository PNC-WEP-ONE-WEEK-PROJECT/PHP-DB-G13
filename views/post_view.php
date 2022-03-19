<div class="container">
    <!----test---->

    <!-- Your code here -->

    <?php
    require_once('models/post.php');
    $allPost = getAllPosts();
    foreach ($allPost as $post) :
        $convertDate = date_create($post['date']);
    ?>
        <div class="card mt-4">
            <div class="card-header">
                <div class="row d-flex">
                    <div class="col col-1 d-flex">
                        <div class="card-profile">
                            <img src="images/user_profile.png" class="rounded-circle float-start" alt="">
                        </div>

                    </div>
                    <div class="col col-3">
                        <p class="h4">Smey Cham</p>
                        <p class="h6"><?= date_format($convertDate, '\ D, j, M,Y'); ?></p>
                    </div>
                    <div class="col col-4"></div>

                    <div class="col col-3">
                        <a href="views/edit_post.php?id=<?= $post['postID']; ?>">
                            <div class="icon-edit btn btn-primary ms-10"><i class="fa fa-edit"></i></div>
                        </a>
                        <a href="controllers/delete_post.php?id=<?= $post['postID']; ?>">
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
                    <img src="images/<?= $post['image'] ?>" class="rounded mx-auto d-block" alt="">
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
                            <a href="controllers/like_post.php?id=<?= $post['postID'] ?> & userID=<?= $post['userID'] ?> " class="btn btn-primary">
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
                                    <form action="controllers/comment_post.php" method="post">
                                        <input type="hidden" name="userID" value="<?= $post['userID'] ?>">
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
                    <i class="btn btn-primary">2.k</i>
                    </div>
                </div>
            </div>

        </div>
    <?php
    endforeach;
    ?>
</div>