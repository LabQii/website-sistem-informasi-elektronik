<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
   $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
   $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
   $pass = isset($_POST['password']) ? md5($_POST['password']) : '';
   $cpass = isset($_POST['cpassword']) ? md5($_POST['cpassword']) : '';
   $user_type = isset($_POST['user_type']) ? $_POST['user_type'] : '';
   // ...


   $select = " SELECT * FROM view_user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:/Dinotronic/index.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:login_form.php');

      }
     
   }else{
      $error[] = 'Email atau Password salah!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>WELCOME!</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Masukkan email">
      <input type="password" name="password" required placeholder="Masukkan password">
      <input type="submit" name="submit" value="login" class="form-btn">
      <p>Ada masalah dalam login? <a href="#">Contact Bos</a></p>
   </form>

</div>

</body>
</html>