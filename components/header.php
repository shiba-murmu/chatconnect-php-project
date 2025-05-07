<?php
if (!isset($_SESSION['user_id'])) {
  header('Location: ../index.php');
  exit();
}
include '../database/connect.php';

/**
 * checking the notification is seen or not
 */
echo '
<link rel="stylesheet" href="../css/style.css">
';
echo '
<header
      class="bg-black  m-0 position-sticky top-0 z-index-100 d-flex justify-content-between align-items-center"
    >
      <nav class="navbar navbar-expand-lg w-100">
        <div class="container-fluid">
          <a class="navbar-brand position-relative z-index-2" style="border-radius: 50%;" href="#">
            <img src="../assets/icons/chatconnect-high-resolution-logo.jpeg" alt="Profile picture" height="40px" width="40px" alt="Upload profile picture" class="rounded-circle border" />
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active fw-bold text-white" aria-current="page" href="#">HOME</a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link active fw-bold text-white"
                  aria-current="page"
                  href="../pages/mychats.php"

                  >CHATS</a
                >
              </li>
              <li class="nav-item">';
$sqlForFriendList = "SELECT * FROM `userdatastatus` WHERE `userid` = '$_SESSION[user_id]' AND `tracknotificationfor` = 'friends'";
$resultForFriendList = mysqli_query($conn, $sqlForFriendList);
$numForFriendList = $resultForFriendList->num_rows;
if ($numForFriendList > 0) {
  $row = $resultForFriendList->fetch_assoc();
  $receiverId = $row['userid'];
  $notificationId = $row['id'];
  echo '
                <a
                  class="nav-link active fw-bold text-primary" id="friends"
                  aria-current="page"
                  href="../modules/update_notification_status.php?id=' . $notificationId . '"
                  >FRIENDS</a
                >
                ';
} else {

  echo '
                  <a
                    class="nav-link active fw-bold text-white" 
                    aria-current="page"
                    href="../pages/friendlist.php"
                    >FRIENDS</a
                  >
                  ';
}


echo '
              </li>
              <li class="nav-item">
                <a
                  class="nav-link active fw-bold text-white"
                  aria-current="page"
                  href="../pages/onlinefriend.php"
                  >ONLINE</a
                >
              </li>
              <li class="nav-item">';
$sqlForFriendRequest = "SELECT * FROM `userdatastatus` WHERE `userid` = '$_SESSION[user_id]' AND `tracknotificationfor` = 'friendrequest'";
$resultForFriendRequest = mysqli_query($conn, $sqlForFriendRequest);
$numForFriendRequest = $resultForFriendRequest->num_rows;
if ($numForFriendRequest > 0) {
  $row = $resultForFriendRequest->fetch_assoc();
  $receiverId = $row['userid'];
  $notificationId = $row['id'];
  echo '
                <a
                  class="nav-link active fw-bold text-primary" id="request"
                  aria-current="page"
                  href="../modules/update_notification_status.php?id=' . $notificationId . '"
                  >REQUEST</a
                >
              </li>
              <li class="nav-item">';
} else {
  echo '
                <a
                  class="nav-link active fw-bold text-white"
                  aria-current="page"
                  href="../pages/friendrequest.php"
                  >REQUEST</a
                >
              </li>
              <li class="nav-item">';
}




/**
 * @var mixed
 *  tracking notification for notifications.
 */
$sql = "SELECT * FROM `userdatastatus` WHERE `userid` = '$_SESSION[user_id]' AND `tracknotificationfor` = 'notifications'";
$row = mysqli_query($conn, $sql);
$num = $row->num_rows;
if ($num > 0) {
  $row = $row->fetch_assoc();
  $receiverId = $row['userid'];
  $notificationId = $row['id'];

  echo '
                            <a
                              class="nav-link active fw-bold text-primary" id="notification"
                              aria-current="page"
                              href="../modules/update_notification_status.php?id=' . $notificationId . '"
                              >NOTIFICATIONS</a
                            >';
} else {
  echo '
                            <a
                              class="nav-link active fw-bold text-white" 
                              aria-current="page"
                              href="../pages/usernotification.php"
                              >NOTIFICATIONS</a
                            >';
}
echo '

              </li>
              <li class="nav-item">
                <a
                  class="nav-link active fw-bold text-white"
                  aria-current="page"
                  href="../pages/mygroups.php"
                  >GROUPS</a
                >
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li> -->
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle fw-bold text-white"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  ACCOUNT
                </a>
                <ul class="dropdown-menu bg-secondary p-0" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item text-black rounded" href="../pages/useraccount.php">ACCOUNT</a></li>
                  <li>
                    <a
                      class="dropdown-item text-black rounded"
                      target="_self"
                      href="../pages/accountsetting.php"
                      >SETTINGS</a
                    >
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link text-secondary disabled" title="Not working now">PREMIUM</a>
              </li>
            </ul>
            <form class="d-flex" role="search" method="GET" action="../pages/singleuserprofile.php?user=">
              <input
                class="form-control me-2"
                type="search"
                name="user"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-outline-warning" type="submit">
                Search
              </button>
            </form>
          </div>
        </div>
      </nav>
    </header> ';

?>
<!-- ************************************* Logic For Blink Notification`********************************* -->
<!-- 
    step : 1
    write first logic to show the navigation option according to 
    some backend values stored in the data base , you can take help
    above written code to how they works according to condition i.e (Options are
  FRIEND , NOTIFICATION , REQUEST).

  step : 2
    Before the step 2 you have to write the code to to insert the data in the (userdatastatus table)
  step : 3
    After step 1, add path and some values and regirect in another .php 
    file where it will delete the data from the (userdatastatus table).
    This is required because the user have seen their notification..
  last : 
    It should be very important that you have to write the codes for delete data from the 
    (userdatastatus table) after the user have seen their notification.
    then it will stop text blinking according to the logic in the step 1.
-->