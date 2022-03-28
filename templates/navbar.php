<nav class="fixed-top navbar navbar-light shadow bg-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../icons/icon_fb.png" alt="" width="40" height="42" class="d-inline-block align-text-top">
      <span class="h3 text-primary text-bold">Facebook</span>
    </a>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
    <?php
      //echo $_GET['id'];
    ?>
    <div class="menu w-25">
      <a href="home.php?userID=<?=$_GET['userID']?>">
        <img src="../icons/home.png" width="50" class="ms-3" alt="" />

      </a>
      <a href="friend.php?userID=<?=$_GET['userID']?>">
        <img src="../icons/friends.png" width="40" class="ms-5"  alt="">

      </a>
      <a href="user_account.php?userID=<?=$_GET['userID']?>">
        <img src="../icons/user.png" width="40" class="ms-5"  alt="">

      </a>
    </div>
  </div>
</nav>