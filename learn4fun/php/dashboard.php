<?php session_start(); ?>
<?php
  $show = array();
  $i=0;
  $cookie_name = $_SESSION['username'];
  if(isset($_COOKIE[$cookie_name]))
  {
  $search_value = $_COOKIE[$cookie_name];
  $con = mysqli_connect("localhost","root","","learn4fun");
  $query = "SELECT * FROM bookdata WHERE bookname LIKE '%$search_value%'";
  $user_query = mysqli_query($con,$query);
  while($row = mysqli_fetch_array($user_query))
        {
            $show[$i++] = $row['category'];
        }
  }
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
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
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
              <li class="nav-item">
                <a href="user_search.php" class="nav-link">Search</a>
              </li>
              <li class="nav-item active">
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
          <h1>For various categories :</h1>
        </div>
      </div>
      <div class="dropdown text-center">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                      Categories
                  </button>
                  <div class="dropdown-menu">
                      <form action="category.php" method=post>
                      <input type="submit" value="Computer science" name="computer science" class="btn btn-light dropdown-item button">
                      <input type="submit" value="Science" name="science" class="btn btn-light dropdown-item button">
                      <input type="submit" value="Programming" name="programming" class="btn btn-light dropdown-item button">
                      <input type="submit" value="Technology" name="technology" class="btn btn-light dropdown-item button">
                      </form>
                    </div>
      </div>
    </div>
      <form action="recommend.php" class="d-flex flex-row mt-2" method=post>
                  <input type="text" id="searchText" name="searchText" class="form-control" placeholder="Search for e-books.....">
                  <input type="submit" class="btn btn-outline-success" name="searchbook" value="&nbsp;&nbsp;&nbsp;&nbsp;Search&nbsp;&nbsp;&nbsp;&nbsp;">
      </form>  
  </header>

  <div class="m-2 d-flex flex-row">
  <?php
    if(isset($_COOKIE[$cookie_name]))
    {
      for($j=0;$j<$i;$j++)
      {
        echo  $show[$j];
        $query = "SELECT * FROM bookdata WHERE category =".$show[$j];
        $user_query = mysqli_query($con,$query);

        while($row = mysqli_fetch_array($user_query))
        {
          echo '<div class="card m-5" style="width:200px;">
          <img class="card-img-top" src="../data/img/'.$row['bookname'].'.jpg" alt="Card image" style="width:100%" onerror=this.src="../data/img/book.jpg">
          <div class="card-body">
            <h4 class="card-title">'.$row['bookname'].'</h4>
            <p class="card-text">'.$row['category'].'</p>
            <a href="'.$row['path'].'" class="btn btn-success" target="_blank">Download</a>
          </div>
        </div>';
        }

      }
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


  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.js"></script>
  <script src="../js/main.js"></script>
</body>
</html>
