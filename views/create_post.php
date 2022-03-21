<div class="container mt-3">
    <div class="row rounded sticky-top bg-light p-2">
        <div class="col col-8 d-flex align-items-center justify-content-center">
            <p class='text'> Do you want to add post?</p>
        </div>
        <div class="col col-4 d-flex justify-content-end">
            <button type="button" class="btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#myModal">
                Post
            </button>
        </div>
    </div>
    

</div>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Post</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="controllers/create_post.php" enctype="multipart/form-data" method="post" class="form-group h-50 w-100 mt-5 bg-primary p-5 rounded-3 text-center" >
                    <h1 class="text-center text-light mb-5 h1">Post</h1>
                    <label for="firstimage">
                        <i class="fa fa-image" style="font-size:5rem;color:greenyellow"></i>
                    </label>
                    <input type="file" name="image" class="form-control " id="firstimage" style="display:none;">
                    <?php
                        session_start();
                        if(isset($_SESSION['image']['name']) and $_SESSION['image']['name']){
                            echo "<p class='text-danger' please choose file ?? </p>";
                        }
                    ?>
                    <textarea name="discription" class="form-control mt-2" placeholder="discription.."></textarea>
                      
                    <div class="form-group d-grid mt-2">
                        <input type="submit" class="btn btn-info" value="POST">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>





























