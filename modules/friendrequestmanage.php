<?php
include '../modules/managesessions.php';
include '../database/connect.php';
if (isset($_GET['user'])) {
  $my_id = $_SESSION['user_id'];
  $receiverUserName = $_GET['user'];
  /**
   * @var mixed
   * query to to fetch the sender data from the database
   * and assign it to the variable
   */
  $sql = "SELECT * FROM `users` WHERE `id` = '$my_id'";
  $row = mysqli_query($conn, $sql);
  $row = $row->fetch_assoc();
  /**
   * @var mixed
   * these all data are the information of sender 
   * who sends the friend request
   */
  $senderId = $_SESSION['user_id'];
  $senderName = $row['fname'];
  $senderUserName = $row['username'];
  /**
   * @var mixed
   * query to to fetch the receiver data from the database
   * and assign it to the variable
   */
  $sql = "SELECT * FROM `users` WHERE `username` = '$receiverUserName'";
  $row = mysqli_query($conn, $sql);
  $row = $row->fetch_assoc();
  $receiverId = $row['id'];
  $receiverName = $row['fname'];
  $receiverUserName = $row['username'];
  /**
   * @var mixed
   * query to to insert the data into the database
   * 
   * and assign it to the variable
   * 
   * 
   */
  $requestSenderUserName = $_GET['user'];
  // echo $requestSenderUserName . " sent a friend request..";
  /**
   * @var  mixed
   * query to to check the request is already sent or not
   */
  $sql = "SELECT COUNT(*) as count FROM `friendrequest` WHERE `senderId` = '$_SESSION[user_id]' AND `receiverId` = '$receiverId'";
  $row = mysqli_query($conn, $sql);
  $row = $row->fetch_assoc();

  if ($row['count'] > 0) {
    echo
      '
        <script>
      alert("Friend request already sent");
      window.location.href = "../pages/useraccount.php";
      </script>
      
        ';
  } else {
    /**
     * checking if the sender and receiver are same
     * if same then popup will show the 
     * user can not send friend request to itself
     */
    if ($senderId == $receiverId) {
      echo '
      <script>
      alert("You can not send friend request to yourself");
      window.location.href = "../pages/useraccount.php";
      </script>
      ';
    } else {
      /**
       * query to to insert the data into the database
       * 
       * and assign it to the variable
       * 
       */

      $sql = "INSERT INTO `friendrequest` (`receiverId`, `receiverName`, `receiverUserName`, `senderId`, `senderName`, `senderUserName`) VALUES ('$receiverId', '$receiverName', '$receiverUserName', '$senderId', '$senderName', '$senderUserName')";
      $row = mysqli_query($conn, $sql);

      if ($row) {
        /**
         * Query for sending blink for the request in the navbar
         */
        $sqlForNotification = "INSERT INTO `userdatastatus` (`userid`, `datastatus`, `tracknotificationfor`) VALUES ('$receiverId', 'notseen', 'friendrequest')";
        $result2 = mysqli_query($conn, $sqlForNotification);
        /** 
         * redirect to the same page with same profile.
         */
        header("Location:../pages/singleuserprofile.php?user=$receiverUserName");
      }
    }
  }
}
?>