<?php

require "service/databaseConnect.php";
require "service/datauser.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/LoginForm.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <form id="login-form" action="Login.php" method="POST">
        <h1>Login</h1>
        <?php if ($showalert): ?>
        <div class="alert success">
        <span class="closebtn">&times;</span>
         <b>Gagal Masuk</b> <i>Cek Username atau Password anda!</i>
       </div>
       <?php endif; ?>
        <div class="input-box">
          <i class="bx bxs-user"></i>
          <input type="text" placeholder="Username" name="username" required />
        </div>
        <div class="input-box">
          <i class="bx bxs-lock"></i>
          <input type="password" placeholder="Password" name="password" required />
        </div>
        <button class="btn" type="submit" name="login">Login</button>
      </form>
    </div>

    <script>

      var close = document.getElementsByClassName("closebtn");
      var i;

      for (i = 0; i < close.length; i++) {
        close[i].onclick = function () {
          var div = this.parentElement;
          div.style.opacity = "0";
          setTimeout(function () {
            div.style.display = "none";
          }, 600);
        };
      }
    </script>
  </body>
  <script src=""></script>
</html>
