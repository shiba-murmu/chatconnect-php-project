<?php
include '../modules/managesessions.php';
/**
 * this is for logout
 * if the value is set not set null
 * then the session will destroy
 * and the page will redirect to index.php
 */
if (isset($_SESSION['user_id'])) {
  // session_destroy();
  session_unset();
  session_destroy();
  header('Location: ../index.php');
  exit();
}