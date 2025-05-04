<?php

require "databaseConnect.php";

$showalert = false;

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cekdatauser = mysqli_query($db, "SELECT * FROM loginform WHERE username = '$username' AND password = '$password'");
    $result = mysqli_num_rows($cekdatauser);
    $user = mysqli_fetch_assoc($cekdatauser);

    if ($result > 0) {
        $_SESSION['log'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
    } else {
        $showalert = true;
    }
}

    if(!isset($_SESSION['log']))
    {

    } else
    {
      header("location: index.php");
    }
