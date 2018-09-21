<?php
$con = mysqli_connect("localhost","root","","learn4fun");
$status = null;
$email_status = null;
$username_status = null;
if(mysqli_connect_error())
echo "there is an error to connecting database";

if(isset($_POST['user_submit']))
{
    if( $_POST['pass'] == $_POST['con_pass'] )
    {   
        $email_query = "SELECT user_id from users WHERE user_email='".mysqli_real_escape_string($con,$_POST['email'])."'";
        $email_check = mysqli_query($con,$email_query);
        $username_query = "SELECT user_id from users WHERE user_username='".mysqli_real_escape_string($con,$_POST['username'])."'";
        $username_check = mysqli_query($con,$username_query);
        if(mysqli_num_rows($email_check)>0)
        {
            $email_status="This email address has already been taken.";
        }
        else if(mysqli_num_rows($username_check)>0)
        {
            $username_status="This username has already been taken.";
        }
        else{
        $password = password_hash($_POST['pass'],PASSWORD_BCRYPT,array('cost'=>12));
        $in_query = "INSERT INTO users(user_firstname,user_lastname,user_email,user_password,user_username) VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[email]','$password','$_POST[username]')";
        $run_sql = mysqli_query($con,$in_query);
        $status = "you are registered successfully!!";
        }
    }
    else{
        #password not matched
        $status = "Confirm password did not matched!!";
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
<body style="background-color: rgb(148, 243, 243)">
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
          <a href="../index.htmlphp" class="navbar-brand"><b>Learn4Fun</b></a>
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
        if($status != null)
        echo '<div class="alert alert-danger text-center">
            <strong>'.$status.'</strong>
        </div>';
        else if($email_status != null)
        echo '<div class="alert alert-danger text-center">
            <strong>'.$email_status.'</strong>
        </div>';
        else if($username_status != null)
        echo '<div class="alert alert-danger text-center">
            <strong>'.$username_status.'</strong>
        </div>';
?>

  <div class="col-lg-4" style="padding-top: 50px;">
    <div class="car bg-primary text-center card-form">
        <div class="card-body">
          <div class="d-flex flex-row">
            <h3>Already Registered :</h3>&nbsp;&nbsp;&nbsp;
            <input type="button" class="btn btn-outline-dark text-light" onclick="window.location='../login.html'" value="Login">
          </div>
            <p>Please fill out this form to Register.</p>
            <form action="signup.php" method=post>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Username" name="username">                
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" placeholder="Firstname" name="firstname">                
                </div>
                <div class="form-group">                 
                  <input type="text" class="form-control form-control-lg" placeholder="Lastname" name="lastname">
                </div>
                <div class="form-group">
                        <input type="email" class="form-control form-control-lg" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                        <input type="password" class="form-control form-control-lg" placeholder="Password" name="pass" id="pass" onchange="check();">
                </div>
                <div class="form-group">
                        <input type="password" class="form-control form-control-lg" placeholder="Confirm Password" name="con_pass" id="con_pass" onchange="check();">
                        <div class="" id="password_status"></div>
                </div>
            
                <input type="submit" class="btn btn-outline-light btn-block" value="Register Now" name="user_submit" id="user_submit" disabled>
            </form>
        </div>
    </div>
</div>
<br>

  <footer id="main-footer" class="text-center p-4" style="margin-top: 20px;">
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
  <script>
    function validateForm()
    {
        var a=document.forms["f1"]["username"].value;
        var b=document.forms["f1"]["firstname"].value;
        var c=document.forms["f1"]["lastname"].value;
        var d=document.forms["f1"]["email"].value;
        var e=document.forms["f1"]["pass"].value;
        var f=document.forms["f1"]["con_pass"].value;
        if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d=="",e==null || e=="",f==null || f=="")
        {
            alert("Please Fill All Required Field");
            return false;
        }
    }
    function check() {
    if (document.getElementById('pass').value ==
            document.getElementById('con_pass').value) {
        document.getElementById('user_submit').disabled = false;
        document.getElementById('password_status').innerText = "Password matched!";
    } else {
        document.getElementById('user_submit').disabled = true;
        document.getElementById('password_status').innerText = "Password did't match!";
        document.getElementById('password_status').className = "alert alert-danger";
    }
}
  </script>
</body>
</html>
