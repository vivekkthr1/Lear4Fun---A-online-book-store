<?php
      $con = mysqli_connect("localhost","root","","learn4fun");
    
          $query = " SELECT * FROM bookdata;";
          $user_query = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Learn4Fun</title>
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.css" />
  <link rel="stylesheet" href="../css/style.css">
  <style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="navbar-brand">&#9776; Learn4Fun </span>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navNavbar"><span class="navbar-toggler-icon"></span></button>
      <h1 class="nav-item text-light">Admin Dashboard</h1>
    </div>
  </nav>
<!-- sidebar -->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="upload.php">Upload</a>
  <a href="books.php">Books</a>
  <a href="users.php">users</a>
</div>
 

 <div class="p-3">
     <?php
        $i=0;
        while($row = mysqli_fetch_array($user_query))
        {   
            $i++;
            $bookno = $row['booknumber'];
            $bookname = $row['bookname'];
            $path = $row['path'];
            $author = $row['author'];
            $category = $row['category'];

        echo '<div class="card">
        <div class="card-body d-flex flex-row"><b>'.$i.'.&nbsp;</b><b class="bg-primary text-white p-2"><i>'.$bookname.'</i></b>&nbsp;&nbsp;'.$category.'&nbsp;&nbsp;'.$author.'
        <button class="btn btn-dark btn-sm ml-3" type="button"><a href="'.$path.'" class="text-white" target="_blank">check</a></button>&nbsp;&nbsp;
        <form action="deletebook.php" method=post>
        <button class="btn btn-danger btn-sm ml-3" type="submit" name="deletebook" value="'.$bookno.'">Delete Book</button>&nbsp;&nbsp;
        </form>
      </div> 
    </div>';
        }
     ?>
 </div>

  <footer id="main-footer" class="text-center p-4 fixed-bottom">
    <div class="container">
      <div class="row">
        <div class="col">
            <p>Copyright 2018 &copy; Learn4Fun</p>
        </div>
      </div>
    </div>
  </footer>

  <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    </script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.js"></script>
  <script src="../js/main.js"></script>
</body>
</html>
