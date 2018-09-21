<?php session_start(); ?>
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
    .typewriter h1 {
  overflow: hidden; /* Ensures the content is not revealed until the animation */
  border-right: .15em solid orange; /* The typwriter cursor */
  white-space: nowrap; /* Keeps the content on a single line */
  margin: 0 auto; /* Gives that scrolling effect as the typing happens */
  letter-spacing: .15em; /* Adjust as needed */
  animation: 
    typing 3.5s steps(40, end),
    blink-caret .75s step-end infinite;
}

/* The typing effect */
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: black; }
}
</style>
</head>
<body style="background:azure;">
<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <div class="container">
          <a href="index.php" class="navbar-brand"><b>Learn4Fun</b></a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#navNavbar"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navNavbar">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="index.php" class="nav-link">Home</a>
              </li>
              <li class="nav-item active">
                <a href="about.php" class="nav-link">About Us</a>
              </li>
              <li class="nav-item">
                <a href="user_search.php" class="nav-link">Search</a>
              </li>
              <li class="nav-item">
                <a href="dashboard.php" class="nav-link">Dashboard</a>
              </li>
              <li class="nav-item">
                <a href="contact.php" class="nav-link">Contact</a>
              </li>
              <li class="nav-item">
               <?php
               if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
               echo "<a href='logout.php' class='nav-link'>Logout ".$_SESSION['username']."</a>";
               else
               {
               echo "<a href='login.php' class='nav-link'>Login</a>";
               header("location: login.php");
               }
               ?>
              </li>
            </ul>
          </div>
        </div>
      </nav>


  <header id="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto text-center">
          <h1>About Us</h1>
          <p>We provide e-books for free.</p>
        </div>
      </div>
    </div>
  </header>

  <!-- ABOUT SECTION -->
  <section id="about" class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>What We Do</h1>
          <p>We simply scrap the internet to provide you an e-book.</p>
          <p>We have large collections of all type of books,you can simply search the item and then download by download link.</p>
            <div class="typewriter p-5" style="background:#000;color:green;opacity:0.9;font-family:cursive;">
            <h1>Learn4Fun free<br>ebook downloader<br>created with<span style="color:red;"> ♥ </span>by<br>Vivek kothari !</h1>
            </div>
        </div>
        <div class="col-md-6 d-flex flex-row" style="height:400px;">
          <img src="../data/img/Big Data and Cloud Computing for Development.jpg" alt="" class="about-img img-fluid d-none d-md-block" style="opacity:0.8;">
          <img src="../data/img/about.jpg" alt="" class="about-img img-fluid d-none d-md-block" style="opacity:0.7;">
        </div>
      </div>
    </div>
  </section>

  <footer id="main-footer" class="text-center p-4">
    <div class="container">
      <div class="row">
        <div class="col">
          <p>Copyright 2018 &copy; Learn4Fun</p>
        </div>
      </div>
    </div>
  </footer>


  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.js"></script>
  <script src="../js/main.js"></script>
</body>
</html>
