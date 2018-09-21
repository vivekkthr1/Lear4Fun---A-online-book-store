<?php
      $con = mysqli_connect("localhost","root","","learn4fun");
      if(isset($_POST['deletebook']))
      {   
          $book = $_POST['deletebook'];
          $query = "DELETE FROM bookdata WHERE booknumber=$book";
          $user_query = mysqli_query($con,$query);
      }
      header("Location: ./books.php");
?>