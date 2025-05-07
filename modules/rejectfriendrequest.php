<?php
include 'managesessions.php';
include '../database/connect.php';
if(empty($_GET['user'])){
  echo '
  <script>
  alert("User not found");
  window.location.href = "../pages/useraccount.php";
  </script>
  ';
}else{
  $requestSender = $_GET['user'];
  $sql = "DELETE FROM `friendrequest` WHERE `senderUserName` = '$requestSender' AND `receiverId` = '$_SESSION[user_id]'";
  $result = $conn->query($sql);
  header('Location: ../pages/friendrequest.php');
  // echo '
  // <script>
  // alert("Request Rejected");
  // window.location.href = "../pages/friendrequest.php";
  // </script>
  // ';
}
?>