<?php
include '../modules/managesessions.php';
// session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <link rel="icon" type="image/x-icon" href="../assets/icons/group.png" title="group icons">
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="../pages/styles/hero.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      color: black;
    }

    /* Not displaying the 
    side scrollbar */
    ::-webkit-scrollbar {
      display: none;
    }

    main {
      display: flex;
      gap: 2%;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 91vh;
      background-color: aqua;
      background-image: var(--background-image);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }
  </style>
</head>

<body>
  <header>
    <!-- place navbar here -->
    <?php
    include '../components/header.php';
    include '../database/connect.php';
    ?>
  </header>
  <main>
    <!-- place main content here -->
    <!-- <h1 class="text-center text-white">Sended Requests</h1> -->
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6 offset-md-3">
          <div class="card bg-transparent">
            <div class="card-header bg-white d-flex align-items-center justify-content-center">
              <h5 class="card-title text-center">SENDED REQUESTS</h5>
            </div>
            <div class="card-body bg-transparent">
              <ul class="list-group">
                <?php
                /**
                 * This script works only when the user 
                 * cancel the request....
                 */
                if (!empty($_GET['user'])) {
                  $requestedPerson = $_GET['user'];
                  $sqlToCancelRequest = "DELETE FROM `friendrequest` WHERE `senderId` = '$_SESSION[user_id]' AND `receiverUserName` = '$requestedPerson'";
                  $result = $conn->query($sqlToCancelRequest);

                  // Fetch the user data
                  $sqlForUser = "SELECT * FROM `users` WHERE `username` = '$requestedPerson'";
                  $result2 = $conn->query($sqlForUser);
                  $row = $result2->fetch_assoc();
                  $requestedPersonId = $row['id'];

                  // Delete notifications for that user 

                  $sqlForDeleteNotifications = "DELETE FROM `userdatastatus` WHERE `userid` = '$requestedPersonId' AND `tracknotificationfor` = 'friendrequest'";
                  $result3 = $conn->query($sqlForDeleteNotifications);
                
                } 
                ?>
                <?php
                $sql = "SELECT * FROM `friendrequest` WHERE `senderId` = '$_SESSION[user_id]'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $requestedUserName = $row['receiverUserName'];
                    $requestedName = $row['receiverName'];
                    $requestedId = $row['receiverId'];
                    // echo $requestId . "<br>";

                    $sql2 = "SELECT * FROM `images` WHERE `userid` = '$requestedId'";
                    $resut2 = $conn->query($sql2);
                    if ($resut2->num_rows > 0) {
                      $row = $resut2->fetch_assoc();
                      $userimage = $row['userimage'];
                      echo '

                      <li class="list-group-item d-flex bg-white mb-2 justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                          <img class="rounded-circle" src="' . $userimage . '" alt="profile picture" width="50" height="50" style="object-fit: cover;">
                          <div class="mx-3">
                            <h6 class="mb-0 text-danger fs-5">' . $requestedName . '</h6>
                            <p class="mb-0">Sended request</p>
                          </div>
                        </div>
                        <div>
                          <a href="../pages/singleuserprofile.php?user=' . $requestedUserName . '" class="btn btn-success fw-lighter">View</a>
                          <a href="../pages/sendedrequest.php?user=' . $requestedUserName . '" class="btn btn-primary fw-lighter">Cancel</a>
                        </div>
                        
                      </li>
                      
                    ';
                    } else {
                      echo '

                      <li class="list-group-item d-flex bg-secondary mb-2 justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                          <img class="rounded-circle" src="../assets/icons/user.png" alt="profile picture" width="50" height="50">
                          <div class="mx-3">
                            <h6 class="mb-0 text-danger fs-5">' . $requestedName . '</h6>
                            <p class="mb-0">Sended request</p>
                          </div>
                        </div>
                        <div>
                          <a class="btn btn-success fw-lighter">View</a>
                          <a class="btn btn-primary fw-lighter">Cancel</a>
                        </div>
                        
                      </li>
                      
                    ';
                    }
                  }
                } else {

                  echo '
                    <li class="list-group-item d-flex bg-light mb-2 justify-content-center align-items-center" style="height: 100px;">
                      <div class="text-center">
                        <h5 class="mb-0 text-muted">No sent requests found.</h5>
                      </div>
                    </li>
                
                  
                  ';
                }     
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
</body>

</html>