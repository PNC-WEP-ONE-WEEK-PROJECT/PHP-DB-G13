<div class="container">
    <!-- Your code here -->
<?php
    require_once('models/post.php');
    $allPost = getAllPosts();
    foreach ($allPost as $post):
        

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
                    <p class="h6"><?= $post['date'] ?></p>
                </div>
                <div class="col col-4"></div>

                <div class="col col-3">
                    <div class="icon-edit btn btn-primary ms-10"><i class="fa fa-edit"></i></div>
                    <div class="btn btn-primary ms-3"><i class="fa fa-trash-o"></i></div>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <p class='discription'><?= $post['description'] ?></p>

            </div>
            <div class="row class="rounded float-start"">
                <img src="images/<?=$post['image']?>" class="rounded mx-auto d-block" alt="">
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <i class="fa fa-thumbs-up btn btn-primary"></i>
                        <i class="btn btn-primary">2.k</i>
                        <i class="fa fa-comment btn btn-primary"></i>
                        <i class="btn btn-primary">2.k</i>
                    </div>
                </div>

                
                
            </div>
        </div>

    </div>
    <?php
    endforeach;
    ?>
</div>
