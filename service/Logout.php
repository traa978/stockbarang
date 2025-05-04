<?php
session_start();
session_unset();
session_destroy();

// Redirect ke halaman login di folder atas
header("Location: ../Login.php");
?>