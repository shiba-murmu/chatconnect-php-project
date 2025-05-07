<?php
include '../modules/managesessions.php';
?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <link rel="icon" type="image/x-icon" href="../assets/icons/group.png" title="group icons">

  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous" />
  <!-- used for text design -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet">
  <!-- This css is used for hero page where the background image is
    set to all the -->
  <link rel="stylesheet" href="../pages/styles/hero.css">
  <style>
    body {
      margin: 0;
    }

    .list-group-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem;
      background-color: #f8f9fa;
      border: 1px solid #ddd;
      margin-bottom: 0.5rem;
      box-shadow: 0 0 10px rgba(0, 0, 0, 1);
    }

    .btn {
      transition: background-color 0.3s;
    }

    /* .btn:hover {
            background-color: #0056b3;
        } */

    .messages_box_background {
      min-height: 91vh;
      /* background-color: aqua; */
      background-image: var(--background-image);
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      object-fit: cover;
      min-width: 90vw;
      /* background-color: #0056b3; */
    }

    .list-group {
      /* overflow: hidden; */
      overflow-x: hidden;
      /* -ms-over-style: none; */
      /* scrollbar-width: 3px; */
    }

    .list-group::-webkit-scrollbar {
      width: 5px;
      /* background-color: #f8f9fa; */
      /* border-radius: 10px; */
    }

    .list-group::-webkit-scrollbar-thumb {
      background-color: var(--scrollbar-color);
      border-radius: 10px;
    }

    h2 {
      font-family: "Playwrite GB S", cursive;
      font-optical-sizing: auto;
      font-weight: 700;
      font-style: normal;
      font-size: normal;
      color: white;
    }

    /* For scrolling */
    /* inbox to scroll */
    /* For applying this scrolling indicator */
    /* first have to fix the height of the container 
        like max-height of the container then it will be applied there */
    .messages-container {
      max-height: 75vh;
      /* Set a maximum height */
      overflow-y: auto;
      /* Enable vertical scrolling */
    }

    .scroll-down-indicator {
      position: fixed;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      background: rgb(255, 255, 255);
      color: black;
      padding: 5px 10px;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
      display: none;
      /* Hidden by default */
    }
  </style>
</head>

<body>
  <header>
    <!-- place navbar here -->
    <?php
    // use here only otherwise header
    // will change some property 
    include '../components/header.php';
    include '../database/connect.php';
    ?>
  </header>
  <main>
    <?php

    ?>
    <div class="container-fluid messages_box_background d-flex flex-column justify-content-center align-items-center ">
      <!-- <h2 class="text-center mb-4 fw-weight-bold">Friend Requests</h2> -->
      <div class="row w-75">
        <div class="col-md-8 offset-md-2 p-0 overflow-hidden">
          <ul class="list-group p-2  messages-container">
            <!-- users Pending messages -->

            <?php
            $i = 1;
            // Sending the query to fetch users pending requests
            $sql = "SELECT * FROM `friendrequest` WHERE `receiverId` = '$_SESSION[user_id]'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $senderId = $row['senderId'];
                $senderName = $row['senderName'];
                $senderUserName = $row['senderUserName'];

                $sql = "SELECT * FROM `images` WHERE `userid` = '$senderId'";
                $imageResult = mysqli_query($conn, $sql);
                $imageRow = mysqli_fetch_assoc($imageResult);
                $image = $imageRow['userimage'];

                echo '
                      <li class="list-group-item d-flex p-1   border-0 justify-content-between align-items-center">
                          <div class="d-flex justify-content-center align-items-center flex-row " style="width: 75%; gap: 0.5rem; height: 3rem">
                              <div>
                                  <img src="' . $image . '" height="40px" width="40px" style="border-radius: 50%; border: 2px solid green;
                                  object-fit: cover" alt="sender profile">
                              </div>
                              <p class="text-black m-0 fw-lighter" style="width: 530px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0;">
                                  <span class="text-primary fs-5 fw-bolder">
                                    @ ' . $senderName . '
                                  </span>  
                                    has sent you a friend request.
                              </p>
                          </div>
                          <div class="d-flex justify-content-center align-items-center gap-2">
                              <a href="../pages/singleuserprofile.php?user=' . $senderUserName . '" class="text-decoration-none text-white btn-primary btn btn-sm fw-lighter">view</a>
                              <a href="../modules/acceptfriendrequest.php?user=' . $senderUserName . '" class="text-decoration-none text-white btn-primary btn btn-sm fw-lighter">accept</a>
                              <a href="../modules/rejectfriendrequest.php?user='.$senderUserName.'" class="btn btn-danger btn-sm fw-lighter">reject</a>
                          </div>
                      </li>';
              }
            } else {
              echo '<li class="list-group-item d-flex p-1 m-3 p-5 text-center border-0 justify-content-between align-items-center bg-transparent" style="border-radius: 10px;">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <h3 class="text-white display-6 m-0 fw-lighter text-center" style="width: 600px;height: 4rem;overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0;">
                                        No pending friend requests
                                    </h3>
                                </div>
                            </li>';
            }
            // query to fetch users pending requests    
            // $sql = "SELECT * FROM `friendrequest` WHERE `receiverId` = '$_SESSION[user_id]'";
            // $result = mysqli_query($conn, $sql);
            // if (mysqli_num_rows($result) > 0) {
            //     while ($row = $result->fetch_assoc()) {
            //         // $row = $result->fetch_assoc();
            //         $senderId = $row['senderId'];
            //         // $receverId = $row['receverId'];
            //         $senderName = $row['senderName'];
            //         $senderUserName = $row['senderUserName'];
            //         // $senderImage = $row['senderImage'];
            //         $sql = "SELECT * FROM `images` WHERE `userid` = '$senderId'";
            //         $result = mysqli_query($conn, $sql);
            //         $row = $result->fetch_assoc();
            //         $image = $row['userimage'];
            //         echo '
            //         <li class="list-group-item d-flex p-1   border-0 justify-content-between align-items-center">
            //             <div class="d-flex justify-content-center align-items-center flex-row " style="width: 75%; gap: 0.5rem; height: 3rem">
            //                 <div>
            //                     <img src="' . $image . '" height="40px" width="40px" style="border-radius: 50%; border: 2px solid green;
            //                     object-fit: cover" alt="sender profile">
            //                 </div>
            //                 <p class="text-black m-0 fw-lighter" style="width: 530px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0;">
            //                     @' . $senderName . ' has sent you a friend request.
            //                 </p>
            //             </div>
            //             <div class="d-flex justify-content-center align-items-center gap-2">
            //                 <a href="../pages/singleuserprofile.php" class="text-decoration-none text-white btn-primary btn btn-sm fw-lighter">view</a>
            //                 <a href="#" class="text-decoration-none text-white btn-primary btn btn-sm fw-lighter">accept</a>
            //                 <a href="#" class="btn btn-danger btn-sm fw-lighter">reject</a>
            //             </div>
            //         </li>
            //     ';

            //     }
            // }






            // query to fetch users pending requests

            // $sql = "SELECT * FROM `friendrequest` WHERE `receverId` = '$_SESSION[user_id]'";
            // $result = mysqli_query($conn, $sql);
            // if(mysqli_num_rows($result) > 0) {
            //     while($row = $result->fetch_assoc()) {
            //         // $row = $result->fetch_assoc();
            //         $senderId = $row['senderId'];
            //         $receverId = $row['receverId'];
            //         $senderName = $row['senderName'];
            //         $senderUserName = $row['senderUserName'];
            //         $sql = "SELECT * FROM `images` WHERE `userid` = '$senderId'";
            //         $result = mysqli_query($conn, $sql);
            //         $row = $result->fetch_assoc();
            //         $image = $row['userimage'];
            //         echo '
            //         <li class="list-group-item d-flex p-1   border-0 justify-content-between align-items-center">
            //             <div class="d-flex justify-content-center align-items-center flex-row " style="width: 75%; gap: 0.5rem; height: 3rem">
            //                 <div>
            //                     <img src="'.$image.'" height="40px" width="40px" style="border-radius: 50%; border: 2px solid green;
            //                     object-fit: cover" alt="sender profile">
            //                 </div>
            //                 <p class="text-black m-0 fw-lighter" style="width: 530px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0;">
            //                     @'.$senderUserName.' has sent you a friend request.
            //                 </p>
            //             </div>
            //             <div class="d-flex justify-content-center align-items-center gap-2">
            //                 <a href="../pages/singleuserprofile.php?user='.$senderUserName.'" class="text-decoration-none text-white btn-primary btn btn-sm fw-lighter">view</a>
            //                 <a href="#" class="text-decoration-none text-white btn btn-primary btn-sm fw-lighter">accept</a>
            //                 <a href="#" class="text-decoration-none text-white btn btn-danger btn-sm fw-lighter">decline</a>
            //             </div>
            //         </li>
            //         ';
            //     }
            // }
            // for ($i = 0; $i < 1; $i++) {
            //         echo '
            //         <li class="list-group-item d-flex p-1   border-0 justify-content-between align-items-center">
            //             <div class="d-flex justify-content-center align-items-center flex-row " style="width: 75%; gap: 0.5rem; height: 3rem">
            //                 <div>
            //                     <img src="'.$image.'" height="40px" width="40px" style="border-radius: 50%; border: 2px solid green;
            //                     object-fit: cover" alt="sender profile">
            //                 </div>
            //                 <p class="text-black m-0 fw-lighter" style="width: 530px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0;">
            //                     @Mohan has sent you a friend request.
            //                 </p>
            //             </div>
            //             <div class="d-flex justify-content-center align-items-center gap-2">
            //                 <a href="../pages/singleuserprofile.php" class="text-decoration-none text-white btn-primary btn btn-sm fw-lighter">view</a>
            //                 <a href="#" class="text-decoration-none text-white btn-primary btn btn-sm fw-lighter">accept</a>
            //                 <a href="#" class="btn btn-danger btn-sm fw-lighter">reject</a>
            //             </div>
            //         </li>
            //     ';
            // }
            ?>
          </ul>
          <!-- For scrolling this is the indicator -->
          <div id="scroll-indicator" class="scroll-down-indicator">
            ⬇ Scroll to see more
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
    <script>
      /** logic behind the scroll indicator to show or hidden */
      const messagesContainer = document.querySelector(".messages-container");
      const scrollIndicator = document.getElementById("scroll-indicator");

      // Show the arrow when the content is not fully scrolled down
      messagesContainer.addEventListener("scroll", function() {
        if (
          messagesContainer.scrollHeight - messagesContainer.scrollTop <=
          messagesContainer.clientHeight
        ) {
          scrollIndicator.style.display = "none"; // Hide arrow when scrolled to bottom
        } else {
          scrollIndicator.style.display = "block"; // Show arrow when not at the bottom
        }
      });

      // Scroll to bottom when arrow is clicked
      scrollIndicator.addEventListener("click", function() {
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
      });
    </script>
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