<?php
include '../modules/managesessions.php';
?>
<!doctype html>
<html lang="en">

<head>
  <title>User notifications</title>
  <link rel="icon" type="image/x-icon" href="../assets/icons/group.png" title="group icons">
  <!-- Required meta tags -->
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
  <!-- this is used for design the text -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet">
  <!-- This css is used for hero page where the background image is
    set to all the pages. -->
  <link rel="stylesheet" href="../pages/styles/hero.css">

  <style>
    h2 {
      text-align: center;
      margin-top: 1rem;
      font-size: 2.5rem;
      font-family: "Playwrite GB S", cursive;
      font-optical-sizing: auto;
      font-weight: 700;
      font-style: normal;
    }

    .shadow {
      box-shadow: 0 0 3px 2px rgba(19, 17, 17, 0.2);
      border-radius: 0.5rem;
      overflow-y: auto;
      /* scrollbar-width: none; */
      /* -ms-overflow-style: none; */
      /* overflow: -moz-scrollbars-none; */
      padding: 0.5rem;
      width: 100%;
    }

    .shadow::-webkit-scrollbar {
      display: block;
      width: 5px;
    }

    .shadow::-webkit-scrollbar-thumb {
      background-color: var(--scrollbar-color);
      border-radius: 10px;
      /* border: 3px solid green; */
    }

    .messege {
      width: 100%;
      font-size: 1.2rem;
      /* white-space: nowrap; */
      /* overflow: hidden; */
      /* padding: rem; */
      overflow: hidden;
      /* overflow-y: scroll; */
      text-overflow: ellipsis;

    }

    .notification-redirect {
      text-decoration: none;
      color: black;
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
    <?php
    include '../components/header.php';
    include '../database/connect.php';

    // retrieve image
    // $sql = "SELECT * FROM `images` WHERE `userid` = '$_SESSION[user_id]'";
    // $result = mysqli_query($conn, $sql);
    // $row = $result->fetch_assoc();
    // $image = $row['userimage'];
    ?>
    <!-- place navbar here -->
  </header>
  <main>
    <section class="d-flex flex-column align-items-center w-75">
      <div class="shadow display-transparent p-3 messages-container" style="gap: 0.5rem;">
        <?php
        $sql = "SELECT n.*, u.username, i.userimage 
                              FROM `userNotifications` n
                              JOIN `users` u ON n.notificationSenderId = u.id
                              JOIN `images` i ON n.notificationSenderId = i.userid
                              WHERE n.notificationReceiverId = '$_SESSION[user_id]' 
                              ORDER BY n.id DESC";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $notificationContent = $row['notificationContent'];
            $notificationSenderName = $row['notificationSenderName'];
            $notificationTime = $row['notificationTime'];
            $notificationDate = $row['notificationDate'];
            $notificationSenderUserName = $row['username'];
            $notificationSenderImage = $row['userimage'];

            echo <<<HTML
                      <a href="singleuserprofile.php?user={$notificationSenderUserName}" title="View profile" class="p-0 notification-redirect">
                          <div class="d-flex justify-content-center align-items-center shadow mb-2" style="background-color: #Dbe9f4; gap: 0.5rem;">
                              <div class="d-flex bg-success justify-content-center align-items-center" style="width: 3.4rem; border-radius: 50%; height: 3.4rem;">
                                  <img style="border-radius: 50%; object-fit: cover;" src="{$notificationSenderImage}" alt="User image" height="50" width="50">
                              </div>
                              <div class="messege py-2 d-flex flex-column rounded fs-6 fw-lighter justify-content-start align-items-start" style="width:95%; height: 5.2rem;">
                                  <p class="text-success m-0 fw-bold fs-5" style="width: 95%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0;">
                                      @{$notificationSenderName}
                                  </p>
                                  <p class="text-black m-0 fw-bolder" style="width: 95%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0;">
                                      {$notificationContent}
                                  </p>
                                  <p class="text-primary m-0 fw-bolder" style="width: 95%; font-size: 0.8rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0;">
                                      {$notificationTime} : {$notificationDate}
                                  </p>
                              </div>
                          </div>
                      </a>
                  HTML;
          }
        } else {
          echo '<li class="list-group-item d-flex p-1 m-3 p-3 text-center border-0 justify-content-center align-items-center" style="background:transparent; border-radius: 10px;">
                                      <div class="d-flex flex-column justify-content-center align-items-center">
                                          <h2 class="text-white m-0 fw-semibold text-center" style="width: 100%;height: 3rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0;">
                                              Notifications not found !!
                                          </h2>
                                      </div>
                                  </li>';
        }
        ?>
      </div>
      <!-- For scrolling this is the indicator -->
      <div id="scroll-indicator" class="scroll-down-indicator">
        ⬇ Scroll to see more
      </div>
    </section>
    <div style="pointer-events: none; "></div>

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