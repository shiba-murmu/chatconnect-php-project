<?php
include '../modules/managesessions.php';
include '../database/connect.php';
?>
<!doctype html>
<html lang="en">

<head>
  <title>User profile</title>
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
  <!-- this is used for design the text -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet">

  <!-- This css is used for hero page where the background image is
  set to all the pages. -->
  <link rel="stylesheet" href="../pages/styles/hero.css">

</head>
<style>
  .main_container {
    /* border: 2px solid lime; */
    height: 80vh;
    overflow-y: auto;
  }

  ::-webkit-scrollbar {
    display: none;
  }

  .main_container::-webkit-scrollbar {
    display: block;
    width: 5px;
  }

  .main_container::-webkit-scrollbar-thumb {
    background-color: var(--scrollbar-color);
    border-radius: 10px;
  }

  .section1 {
    height: 52%;
    background-color: rgb(20, 100, 250);
    z-index: -2;
    display: flex;
    gap: 3rem;
    border-top-left-radius: 2rem;
    border-top-right-radius: 2rem;
  }

  h1 {
    font-family: "Playwrite GB S", cursive;
    font-optical-sizing: auto;
    font-weight: 700;
    font-style: normal;
    font-size: 2rem;
    color: white;
  }

  .image {
    height: 200px;
    width: 200px;
    border-radius: 50%;
    border: .3rem solid white;
    margin-top: 4rem;
    /* background-position: center;
        background-size: cover; */
    object-fit: cover;
    margin-left: 4rem;
  }

  .bio_container {
    padding-top: 1.5rem;
    height: 20rem;
    width: 30rem;
    /* border: 3px solid red; */
  }

  .section2 {
    height: 53%;
    background-color: green;
  }

  .bio_section {
    height: 50%;
    /* background-color: blue; */
    overflow-y: auto;
    scrollbar-width: none;

  }

  .sub_container2 {
    margin-top: 2%;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    height: 4rem;
    background-color: #1ABC9C;
  }

  .sub_container2 button a {
    background-color: #FF99CC;
    color: white;
    font-weight: 500;
    width: 8rem;
    box-shadow: 0 0 3px 2px rgba(19, 17, 17, 0.2);
    transition: transform 0.2s ease;
  }

  .sub_container2 button:hover {
    transform: translatey(-2px);
  }

  .sub_container3 {
    height: fit-content;
    border-top: 5px solid gray;
    display: flex;
    gap: 1px;
    flex-wrap: wrap;
    padding-top: .8rem;
  }

  .sub_container3 img {
    height: 27rem;
    width: 19.9rem;
    object-fit: cover;
    /* border-radius: 1rem; */
  }
</style>

<body>
  <header>
    <?php
    // use here only otherwise header
    // will change some property 
    include '../components/header.php';
    if (empty($_GET['user'])) {
      echo '
      <script>
      alert("User not found");
      window.location.href = "../pages/useraccount.php";
      </script>
      ';
    } else {
      $sql = "SELECT * FROM `users` WHERE `username` = '$_GET[user]'";
      $row = mysqli_query($conn, $sql);

      if (mysqli_num_rows($row) > 0) {
        /**
         * @var mixed
         * condition to check if the user is not in the database 
         * 
         */
        $row = $row->fetch_assoc();
        $user_name = $row['username'];
        $user_email = $row['email'];
        $name = $row['fname'];
        $friend_id = $row['id'];
        $name = strtoupper($name);
        // retrieve image
        $sql = "SELECT * FROM `images` WHERE `userid` = '$friend_id'";
        $row = mysqli_query($conn, $sql);
        $row = $row->fetch_assoc();
        $image = $row['userimage'];
      } else {
        echo '
        <script>
        alert("User not found in the database");
        window.location.href = "../pages/useraccount.php";
        </script>
        ';
      }
    }


    ?>
    <!-- place navbar here -->
  </header>
  <main>
    <!-- place main content here -->


    <div class="container mt-5 main_container">
      <!------------------------------------------ name bio image div --------------------------------------->
      <div class="sub-container1" style="height: 20rem;">
        <section class="section1">
          <img src="<?php echo $image; ?>" alt="profile image" class="image">
          <div class="bio_container">
            <section>
              <h1 class="mt-2 mx-4 text-warning fw-2"><?php echo $name; ?></h1>
              <h3 class="mt-2 mx-4" style="color: white; font-size: 2rem;"><?php echo $user_name; ?></h3>
            </section>
            <!-- bio section -->
            <section class="bio_section ps-4 pt-1 text-white">
              || अंत: अस्ति प्रारंभ ||<br>
              I am prakash<br>
              ❤ 𝚁𝙲𝙱 ❤<br>
              🎸 ʟᴏᴠᴇ ᴍᴜꜱɪᴄ 🎸<br>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus praesentium vitae aliquid. Ullam, error.
            </section>
          </div>
        </section>
        <section class="section2">
        </section>
      </div>
      <!---------------------------------------------------- buttons div ----------------------------------------->
      <div class="sub_container2">
        <?php

        /**
         * @var mixed
         * condition to check the request is already sent or not
         */

        $requestSenderUserName = $_GET['user'];
        // echo $requestSenderUserName . " sent a friend request..";
        $sql = "SELECT * FROM `friendlist` WHERE `receiver_user_name` = '$_SESSION[username]' AND `sender_user_name` = '$requestSenderUserName'";
        $row = mysqli_query($conn, $sql);

        if (mysqli_num_rows($row) > 0) {
        echo '
        <a href="../modules/unfriend.php?user=' . $_GET['user'] . '" class="btn btn-primary fw-lighter">Unfriend</a>
        ';
        } else {
          $sql = "SELECT COUNT(*) as count FROM `friendrequest` WHERE `senderUserName` = '$requestSenderUserName' AND `receiverId` = '$_SESSION[user_id]'";
          $row = mysqli_query($conn, $sql);
          $row = $row->fetch_assoc();

          if ($row['count'] > 0) {
            echo '
          <a href="../modules/acceptfriendrequest.php?user=' . $_GET['user'] . '" class="btn btn-primary fw-lighter">Accept</a>
          ';
          } else {
            $sqlToCheckSendeRequest = "SELECT * FROM `friendrequest` WHERE `senderId` = '$_SESSION[user_id]' AND `receiverUserName` = '$_GET[user]'";
            $result = mysqli_query($conn, $sqlToCheckSendeRequest);
            if ($result->num_rows > 0) {
            echo '
            <a href="../modules/onsingleprofilecancelrequest.php?user=' . $_GET['user'] . '" class="btn btn-primary fw-lighter">Cancel request</a>
            ';
            } else {
              if($_GET['user'] == $_SESSION['username']) {
                /** 
                 * if the get user and the session user are same
                 * then hide the add friend button..
                 */
                // echo $_SESSION['username'];
                echo ' 
                <a href="../pages/useraccount.php" class="btn btn-dark fw-lighter">My account</a>
                ';
              } else {
                echo ' 
                <a href="../modules/friendrequestmanage.php?user=' . $_GET['user'] . '" class="btn btn-primary fw-lighter">Add Friend</a>
                ';
              }
            }
          }
        }
        ?>
        <?php
        // Check users are friends or not
        $sqlToCheckFriend = "SELECT * FROM `friendlist` WHERE `receiver_user_name` = '$_GET[user]' AND `sender_user_name` = '$_SESSION[username]'";
        $result = mysqli_query($conn, $sqlToCheckFriend);
        if($result->num_rows > 0){
          echo '
          <a href="../pages/chatbox.php" class="btn btn-primary fw-lighter">Message</a>
          ';
        }
        ?>
        <button class="btn btn-primary fw-lighter">Posts</button>
        <button class="btn btn-primary fw-lighter">videos</button>
      </div>
      <!---------------------------------------------------- Post div --------------------------------------------------->
      <div class="sub_container3 mt-2">
        <?php
        for ($i = 0; $i < 1; $i++) {
          echo '
            <img src="' . $image . '" alt="Image">
          ';
        }
        ?>
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