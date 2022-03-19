<?php
require_once('../templates/header.php');
?>

<div class="container mt-5 w-50 bg-light rounded">
    <form action="" method="post" class="form group m-auto shadow-lg p-3" enctype="multipart/form-data">
        <div class="form-control d-flex mt-2">
            <label class="w-25">First Name : </label>
            <input type="text" name="first_name" placeholder="First Name......." class="form-control"/>
        </div>
        <div class="form-control d-flex mt-2">
            <label class="w-25">Last Name : </label>
            <input type="text" name="last_name" placeholder="Last Name......." class="form-control"/>
        </div>
        <div  class="form-control d-flex mt-2">
            <label class="w-25"> Your email address </label>
            <input type="email" name="bio" placeholder=" Your email address..." class="form-control"/>
        </div>
        <div  class="form-control d-flex mt-2">
            <label class="w-25"> Profile image : </label>
            <input type="file" name="image"  class="form-control"/>
        </div>
        <div class="d-grid mt-2">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

<?php
require_once('../templates/footer.php');
?>