<?php
include '../modules/managesessions.php';

include '../database/connect.php';

// For stop blinking notification bar user user is already seen the notification
// for friend list.
if (!empty($_GET['user'])) {
  $requestingUser = $_GET['user'];
  $sqlForDeleteNotifications = "DELETE FROM `userdatastatus` WHERE `userid` = '$_SESSION[user_id]' AND `tracknotificationfor` = 'friends'";
  $result3 = $conn->query($sqlForDeleteNotifications);
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
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
  <!-- for the use of icons here used remix icons -->
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet" />
</head>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  ::-webkit-scrollbar {
    display: none;
  }

  main {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 91vh;
    background-color: aqua;
    background-image: var(--background-image);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    object-fit: cover;


  }

  .friend-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  .friend-list-item {
    margin: 10px;
    width: 12rem;
    height: 12rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #f5f5f5;
    border-radius: 7px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  }

  .friend-list-item:hover {
    box-shadow: 0 8px 16px 0 rgba(173, 216, 230, 0.2);
    /* background-color: #ddd; */
    /* transform: scale(1.05); */
    transition: all 0.3s ease-in-out;
    animation: pulse 1s infinite alternate;
    animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  }

  @keyframes pulse {
    0% {
      transform: scale(1);
    }

    100% {
      transform: scale(1.05);
    }
  }

  .friend-list-item img {
    width: 5rem;
    height: 5rem;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid blue;
  }

  .friend-list-item h3 {
    font-size: 20px;
    margin-top: 10px;
  }

  .friend-list-item p {
    font-size: 16px;
    margin-top: 10px;
  }

  .friend-list-item a {
    margin-top: 10px;
    text-decoration: none;
    color: #007bff;
  }


  .container {
    height: 40em;
    z-index: 30;
  }

  .container>.row>.col-12>.friend-list {
    max-height: 36.5em;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    width: 100%;



  }

  .friend-list::-webkit-scrollbar {
    display: block;
    width: 5px;
  }

  .friend-list::-webkit-scrollbar-thumb {
    background-color: var(--scrollbar-color);
    border-radius: 10px;
  }

  .container>.row>.col-12>.friend-list>.friend-list-item {
    box-shadow: 0 0 10px rgba(0, 0, 0, 1);
  }

  .heading {

    font-family: "Playwrite GB S", cursive;
    font-optical-sizing: auto;
    font-weight: 700;
    font-style: normal;
    font-size: 2rem;
    color: white;
  }


  /* For scrolling */
  .messages-container {
    overflow-y: auto;
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
  }
</style>

<body>
  <header>
    <?php
    // use here only otherwise header
    // will change some property 
    include '../components/header.php';
    $my_id = $_SESSION['user_id'];

    ?>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container p-0">
      <div class="row p-0">
        <div class="col-12 p-0">
          <span class="heading">Friendlist : </span>
          <div class="messages-container friend-list gap-0">



            <!-- Users friends -->
            <?php
           
            /** 
             * Retrieve the information of the friends
             * from the database
             */
            $sql = "SELECT * FROM `friendlist` WHERE `receiver_id` = '$my_id'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) { // while loop to loop through the data()) {
              $sender_name = $row['sender_name'];
              $sender_id = $row['sender_id'];
              $sender_username = $row['sender_user_name'];
              $sql2 = "SELECT * FROM `images` WHERE `userid` = '$sender_id'";
              $result2 = mysqli_query($conn, $sql2);
              $row2 = $result2->fetch_assoc();
              $sender_image = $row2['userimage'];
              echo '
                            <div class="friend-list-item d-flex  border-0 justify-content-center align-items-center">
                            <img src="' . $sender_image . '" class="mt-1" alt="shiba">
                            
                            <p class="m-0 p-0 ms-2 fw-bolder" style="font-size : 0.2rem;">' . $sender_name . '</p>
                            <p class="m-0 p-0 ms-2 fw-lighter text-success" style="font-size : 0.2rem;">Online</p>
                            <a href="../pages/singleuserprofile.php?user=' . $sender_username . '" class="m-0 p-0 btn btn-success text-white ms-2 w-50 text-decoration-none fs-6 fw-lighter">View</a>
                            <a href="../modules/unfriend.php?user=' . $sender_username . '" class="mt-1 p-0 btn btn-danger text-white ms-2 w-50 text-decoration-none fs-6 fw-lighter">Unfriend</a>
                            </div>
                        ';
            }
            ?>



          </div>
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