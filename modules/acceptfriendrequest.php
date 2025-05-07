<?php
include '../modules/managesessions.php';
/** code 
 * to accept friend request from the users.
 * 
 */
include '../database/connect.php';

  if (isset($_GET['user'])) {
    /** First fetching the data of the
     * sender from the database
     * and receiver from the database
     */
    $receiverId = $_SESSION['user_id'];
    $sql = "SELECT * FROM `users` WHERE `id` = '$receiverId'";
    $row = mysqli_query($conn, $sql);
    $row = $row->fetch_assoc();
    $receiverName = $row['fname'];
    $receiverUserName = $row['username'];
  
    /** Now fetching the sender data from the database 
     *  and insert both user data into the friend table 
     */
    $senderUserName = $_GET['user'];
    $sql = "SELECT * FROM `users` WHERE `username` = '$senderUserName'";
    $row = mysqli_query($conn, $sql);
    $row = $row->fetch_assoc();
    $senderName = $row['fname'];
    $senderId = $row['id'];
  
    /** Time to insert it to the database.. */
    /**
     * @var mixed
     * This query is send to the receiver side table 
     * so that it can see the friend request is accepted
     */
    $sql = "INSERT INTO `friendlist` (`sender_id`, `receiver_id`, `sender_name`, `receiver_name`, `sender_user_name`, `receiver_user_name`) VALUES ('$senderId', '$receiverId', '$senderName', '$receiverName', '$senderUserName', '$receiverUserName')";
    $row = mysqli_query($conn, $sql);
  
    /**
     * Inserting the data to the table userdatastatus so that user can
     * knows that someone has added to their friend list
     * 
     */
    $sqlForUserDataStatus = "INSERT INTO `userdatastatus` (`userid`, `datastatus`, `tracknotificationfor`) VALUES ('$senderId', 'notseen', 'friends')";
    $resultForUserDataStatus = mysqli_query($conn, $sqlForUserDataStatus);
  
    if ($row) {
      /**
       * @var mixed
       * this side query is send to the sender side
       * so that user can see the friend request is accepted
       * In this the concept is same as above but only
       * reverse the variable values only one time.. 
       */
      $sql = "INSERT INTO `friendlist` (`sender_id`, `receiver_id`, `sender_name`, `receiver_name`, `sender_user_name`, `receiver_user_name`) VALUES ('$receiverId', '$senderId', '$receiverName', '$senderName', '$receiverUserName', '$senderUserName')";
      $row = mysqli_query($conn, $sql);
  
      /**
       * Inserting the data to the table userdatastatus so that user can 
       * knows that some has added to their friend list
       */
  
      $sqlForUserDataStatus = "INSERT INTO `userdatastatus` (`userid`, `datastatus`, `tracknotificationfor`) VALUES ('$receiverId', 'notseen', 'friends')";
      $resultForUserDataStatus = mysqli_query($conn, $sqlForUserDataStatus);
  
      if ($row) {
        $sql = "DELETE FROM `friendrequest` WHERE `senderUserName` = '$senderUserName' AND `receiverUserName` = '$receiverUserName'";
        $row = mysqli_query($conn, $sql);
  
        if ($row) {
          date_default_timezone_set('Asia/Kolkata');
          $date = date("d-m-Y");
          $time = date("h:i A");
          $sql = "INSERT INTO `userNotifications` (`notificationSenderId`,`notificationSenderName`, `notificationReceiverId`,`notificationReceiverName`, `notificationContent`, `notificationTime`, `notificationDate`) VALUES ('$receiverId','$receiverName', '$senderId', '$senderName', 'Friend request accepted now you can text to each other.', '$date', '$time')";
  
          /**
           * @var 
           *  content can be updated in the future.
           */
          $row = mysqli_query($conn, $sql);
          if ($row) {
            /**
             * @var  
             *  Below query is to track the notification for the user
             *  and assign it to the variable
             */
            $tracknotificationfor = "notifications";
            $sqlForTrackNotifications = "INSERT INTO `userdatastatus` (`userid`, `datastatus`, `tracknotificationfor`) VALUES ('$senderId', 'notseen', '$tracknotificationfor')";
            $row = mysqli_query($conn, $sqlForTrackNotifications);
          }
        }
        header("Location: ../pages/friendlist.php?user=$senderUserName");
        // echo '
        // <script>
        // alert("Friend request accepted successfully");
        // window.location.href = "../pages/useraccount.php";
        // </script>
        // ';
      }
    }
  } else {
    echo '
    <script>
    alert("Friend request not found");
    window.location.href = "../pages/useraccount.php";
    </script>
    ';
  }


