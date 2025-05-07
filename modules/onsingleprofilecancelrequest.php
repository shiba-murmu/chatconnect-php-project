<?php
include '../modules/managesessions.php';
include '../database/connect.php';
if(!empty($_GET['user'])){
  $requestingUser = $_GET['user'];
  $sql = "DELETE FROM `friendrequest` WHERE `senderId` = '$_SESSION[user_id]'
   AND `receiverUserName` = '$requestingUser'";
  $result = $conn->query($sql);

  /**
   * also delete from userdatastatus
   * and delete from usernotifications
   */
  // Fetch the user data
  $sqlForUser = "SELECT * FROM `users` WHERE `username` = '$requestingUser'";
  $result2 = $conn->query($sqlForUser);
  $row = $result2->fetch_assoc();
  $requestingUserId = $row['id'];

  // Delete notifications for that user 

  $sqlForDeleteNotifications = "DELETE FROM `userdatastatus` WHERE `userid` = '$requestingUserId' AND `tracknotificationfor` = 'friendrequest'";
  $result3 = $conn->query($sqlForDeleteNotifications);
  
  header("Location: ../pages/singleuserprofile.php?user=$requestingUser");
}
?>
