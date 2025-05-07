<?php
// $session_start();
session_start();
if (isset($_SESSION['user_id']) == null) {
  session_destroy();
  header('Location: ../index.php');
  exit();
} 
// header('Location: ../pages/useraccount.php');