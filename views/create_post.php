
<div class="container w-50 d-flex align-center">
    <!-- Your code here -->
    <form action="controllers/create_post.php" enctype="multipart/form-data" method="post"  class="form-group h-50 w-100 mt-5 bg-primary p-5 rounded-3">
        <h1 class="text-center text-light mb-5 h1">Post</h1>
        <input type="file" name="image" class="form-control  ">
        <textarea name="discription" class="form-control mt-2" placeholder="discription.."></textarea>
        <div class="form-group d-grid mt-2">
            <input type="submit" class="btn btn-info" value="POST">
        </div>
    </form>
</div>
<?php
