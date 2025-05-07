<?php
include 'managesessions.php';

include '../database/connect.php';
// echo "unfriend";
if (empty($_GET['user'])) {
  echo '
      <script>
      alert("User not found");
      window.location.href = "../pages/useraccount.php";
      </script>
      ';
} else {
  $friendUserName = $_GET['user'];
  // Fetching the data of my friend
  $sql = "SELECT * FROM `users` WHERE `username` = '$friendUserName'";
  $row = mysqli_query($conn, $sql);
  $row = $row->fetch_assoc();
  $friendId = $row['id'];

  // my data
  $myUserName = $_SESSION['username'];
  $myId = $_SESSION['user_id'];

  if ($row) {
    $sql = "DELETE FROM `friendlist` WHERE `sender_id` = '$myId' AND `receiver_id` = '$friendId'";
    $result1 = mysqli_query($conn, $sql);
    if ($result1) {

      $sql = "DELETE FROM `friendlist` WHERE `sender_id` = '$friendId' AND `receiver_id` = '$myId'";
      $result2 = mysqli_query($conn, $sql);
      // echo "Deleted from 1";
      if ($result2) {
        $sql = "DELETE FROM `usernotifications` WHERE `notificationSenderId` = '$friendId' AND `notificationReceiverId` = '$myId'";
        $result3 = mysqli_query($conn, $sql);
        $affected_rows = mysqli_affected_rows($conn);
        /* above mysqli_affected_rows() is used to get the number of rows affected
         means deleted in the database..
        */

        /**
         * @var 
         *  below logic is for delete the notifications status if the user
         * unfriend the other user
         */
        $sql = "DELETE FROM `userdatastatus` WHERE `userid` = '$myId' AND `datastatus` = 'notseen'";
        $result5 = mysqli_query($conn, $sql);

        switch ($affected_rows) {
          case 0:

            /**
             * @var 
             *  below logic is for delete the notifications status if the user
             * unfriend the other user
             */
            $sql = "DELETE FROM `usernotifications` WHERE `notificationSenderId` = '$myId' AND `notificationReceiverId` = '$friendId'";
            $result4 = mysqli_query($conn, $sql);
            if ($result4) {

              $sql = "DELETE FROM `userdatastatus` WHERE `userid` = '$friendId' AND `datastatus` = 'notseen' AND `tracknotificationfor` = 'notifications'";
              $result5 = mysqli_query($conn, $sql);
              echo '
              <script>
              alert("Unfriend successfully .. !!");
              window.location.href = "../pages/friendlist.php";
              </script>
              ';
            }
            break;
          default:
            if ($result3) {
              echo '
              <script>
              alert("Unfriend successfully ..!!");
              window.location.href = "../pages/friendlist.php";
              </script>
              ';
            }
            break;
        }
      }
    }
  }
}
