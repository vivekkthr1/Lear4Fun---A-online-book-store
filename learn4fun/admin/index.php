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
 <br><br><br>
<div class="card-deck m-2">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h4 class="card-title">Students Online :</h4>
                <h3><b>47</b></h3>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h4 class="card-title">Today's Submissions :</h4>
                <h3><b>247</b></h3>
            </div>
        </div>
        <div class="card text-white bg-dark">
            <div class="card-body">
                <h4 class="card-title">Total Tutorials :</h4>
                <h3><b>10</b></h3>
            </div>
        </div>
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
