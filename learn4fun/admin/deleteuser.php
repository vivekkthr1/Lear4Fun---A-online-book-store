<?php
      $con = mysqli_connect("localhost","root","","learn4fun");
      if(isset($_POST['deleteuser']))
      {   
          $userid = $_POST['deleteuser'];
          $query = "DELETE FROM users WHERE user_id=$userid";
          $user_query = mysqli_query($con,$query);
      }
      header("Location: ./users.php");
?>