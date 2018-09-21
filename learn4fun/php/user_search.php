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
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <div class="container">
          <a href="index.php" class="navbar-brand"><b>Learn4Fun</b></a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#navNavbar"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navNavbar">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="index.php" class="nav-link">Home</a>
              </li>
              <li class="nav-item">
                <a href="about.php" class="nav-link">About Us</a>
              </li>
              <li class="nav-item active">
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
          <h1>Search</h1>
          <p>E-books and get download link!</p>
        </div>
      </div>
    </div>
  </header>
  <div class="container m-5">
    <form action="user_search.php">
      <div class="form-group">
              <input type="text" id="searchText" name="searchText" class="form-control form-control-lg" placeholder="Search for e-books.....">
      </div>
      <div class="text-center">
      <input type="submit" class="btn btn-outline-success btn-lg" value="&nbsp;&nbsp;&nbsp;&nbsp;Search&nbsp;&nbsp;&nbsp;&nbsp;">
      </div>
    </form>
  </div>
  <?php
  if(array_key_exists('searchText', $_GET))
  echo '<div class="alert alert-success text-center">
          You searched for <b>'.$_GET['searchText'].'</b>
        </div>';
  ?>
<div id="show" class="container ml-5">
        <?php
include("simple_html_dom.php");
if (array_key_exists('searchText', $_GET)) {
        $item = str_replace(' ', '%20', $_GET['searchText']);
        $html=file_get_html("http://ebook-dl.com/Search/".$item);
        $content=$html->find('div.container');
        foreach($content[4]->find('div.mediaholder') as $ans)
                               {
                                 $link = $ans->first_child ();
                                 echo $ans->first_child ();
                                 echo '<br>';
                                 $title = $ans->next_sibling ()->plaintext;
                                 echo '<b style="color:#2f3255;font-size:25px;background-color:#f4f4f4;">'.$title.'</b>';
                                 echo '<br>';
                                 $final=$link->href;
                                 $final = str_replace("/book","http://ebook-dl.com/dlbook",$final);
                                 echo '<button class="btn btn-outline-info" type="button"><a href='.$final.' style="font-size:35px;text-decoration:none;">Download now!</a></button>';
                                 echo '<br><br>';
                               }
    }
    else{
      echo '<div class="alert alert-success">
      <b>Tips : </b><br><ul><li>Use author name for accurate result.<li>Search for related information like (book name,author).</ul>
        </div>';
    }
?>
    </div>

    <footer id="main-footer" class="text-center p-4 mt-5">
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
