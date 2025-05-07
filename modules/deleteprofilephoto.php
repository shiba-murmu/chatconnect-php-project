<?php
include '../modules/managesessions.php';
include '../database/connect.php';

$sql = "SELECT * FROM `images` WHERE `userid` = '$_SESSION[user_id]'";
$row = mysqli_query($conn, $sql);
$row = $row->fetch_assoc();
$user_image_path = $row['userimage'];
/**
 * retrieve the images data from the specific user database 
 * and the check if the path is not equals to the 
 * default path of the default image then it will be 
 * deleted and after that the row of the 
 * that user in the database will be updated 
 * and then redirect to the useraccount.php page
 */
if ($user_image_path != '../assets/images/default.png') {
  unlink($user_image_path);
  $default_image = '../assets/images/default.png';
  $sql = "UPDATE `images` SET `userimage` = '$default_image' WHERE `userid` = '$_SESSION[user_id]'";
  $row = mysqli_query($conn, $sql);
  redirect();
}
redirect();
function redirect()
{
  echo "<script>
    setTimeout(function(){
        window.location.href = '../pages/useraccount.php';
    }, 10);
</script>";
}
