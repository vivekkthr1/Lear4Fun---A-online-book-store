<?php
    $con = mysqli_connect("localhost","root","","learn4fun");
    $login_status = null;
    session_start();
    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['pass'];

        $email = mysqli_real_escape_string($con,$email);
        $password = mysqli_real_escape_string($con,$password);

        $query = " SELECT * FROM users WHERE user_email = '{$email}' ";
        $user_query = mysqli_query($con,$query);

        if(!$user_query)
        {
            $login_status = "Login failed !";
        }

        while($row = mysqli_fetch_array($user_query))
        {
            $user_id = $row['user_id'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_username = $row['user_username'];
            $user_email = $row['user_email'];

            if($user_email == $email)
            {
            if(password_verify($password,$user_password))
            {
                $_SESSION['username'] = $user_username;
                $_SESSION['email'] = $user_email;
                $_SESSION['firstname'] = $user_firstname;
                $_SESSION['lastname'] = $user_lastname;
                $_SESSION['loggedin'] = true;//for maitaining the session
                $login_status = "Login Success !";
                header("Location: ./index.php");
            }
            $login_status = "Password is incorrect!";
            }
        }

        $login_status = "Please check username and password!";
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
<body  style="background-color:rgb(148, 243, 243)">
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
          <a href="../index.html" class="navbar-brand"><b>Learn4Fun</b></a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#navNavbar"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navNavbar">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="../index.html" class="nav-link">Home</a>
              </li>
              <li class="nav-item">
                <a href="../about.html" class="nav-link">About Us</a>
              </li>
              <li class="nav-item">
                <a href="search.php" class="nav-link">Search</a>
              </li>
              <li class="nav-item">
                <a href="../contact.html" class="nav-link">Contact</a>
              </li>
              <li class="nav-item active">
              <a href="../login.html" class="nav-link">Login</a>
              </li>
            </ul>
          </div>
        </div>
</nav>

<?php
        if($login_status != null)
        echo '<div class="alert alert-danger text-center">
            <strong>'.$login_status.'</strong>
        </div>';
?>

<div class="container" style="padding-top: 100px;">
  <div class="col-lg-4">
    <div class="car bg-primary text-center card-form">
        <div class="card-body">
          <div class="d-flex flex-row">
            <h3>SignUp Today&nbsp;&nbsp;:</h3>&nbsp;&nbsp;&nbsp;
            <input type="button" class="btn btn-outline-dark text-light" onclick="window.location='../signup.html'" value="SignUp">
          </div>
            <p>Please fill out this form to Login</p>
            <form action="login.php" method=post>
                <div class="form-group">
                        <input type="email" class="form-control form-control-lg" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                        <input type="password" class="form-control form-control-lg" placeholder="Password" name="pass">
                </div>
                <input type="submit" class="btn btn-outline-success btn-block text-light" value="Login" name="login">
            </form>
        </div>
    </div>
</div>
</div>

  <footer id="main-footer" class="text-center p-4" style="margin-top: 190px;">
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
               <?php
               if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
               echo " ";
               else
               {
               echo "<script type='text/javascript'>alert('Please Login first!');</script>";
               }
               ?>
</body>
</html>
