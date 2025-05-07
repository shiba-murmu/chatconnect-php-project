<?php
include 'managesessions.php';
include '../database/connect.php';
// Get the notification ID and status from the AJAX request
$notificationId = $_GET['id'];
$sqlForFetchTheNotificationRowData = "SELECT * FROM `userdatastatus` WHERE `id` = '$notificationId'";
$resultForFetchTheNotificationRowData = mysqli_query($conn, $sqlForFetchTheNotificationRowData);
$rowForFetchTheNotificationRowData = $resultForFetchTheNotificationRowData->fetch_assoc();
$notificationFor = $rowForFetchTheNotificationRowData['tracknotificationfor'];
// $status = $_POST['status'];
$status = "seen";


// Update the notification status in the database
$sql = "UPDATE `userdatastatus` SET `datastatus` = '$status' WHERE id = '$notificationId' AND `tracknotificationfor` = '$notificationFor'";
$row = mysqli_query($conn, $sql);
if ($row) {
  switch ($notificationFor) {
      /**
     * if the values are matched then the below code will be executed
     * as switch case..
     */
    case 'notifications':
      $sql = "DELETE  FROM `userdatastatus` WHERE `id` = '$notificationId'";
      $row = mysqli_query($conn, $sql);
      if ($row) {
        header('Location: ../pages/usernotification.php');
      }
      break;
    case 'friendrequest':
      $sql = "DELETE  FROM `userdatastatus` WHERE `id` = '$notificationId'";
      $row = mysqli_query($conn, $sql);
      if ($row) {
        header('Location: ../pages/friendrequest.php');
      }
      break;
    case 'friends':
      $sql = "DELETE  FROM `userdatastatus` WHERE `id` = '$notificationId'";
      $row = mysqli_query($conn, $sql);
      if ($row) {
        header('Location: ../pages/friendlist.php');
      }
      break;
  }
}
// Return a response to the AJAX request
// echo 'Notification status updated successfully';

/**
 * 
 *  Here more one logic is needed for if the user unfriend
 *  the other user just a second after
 * accept the friend request. In that situation 
 * if the notification pop will blinking despite of 
 * the user is already unfriend by other user..
 * 
 */
