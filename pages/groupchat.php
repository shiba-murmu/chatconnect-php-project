<?php
include '../modules/managesessions.php';
?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
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
  <!-- to set the background -->
  <link rel="stylesheet" href="../pages/styles/hero.css">
  <style>
    body {
      /* background-color: #1a202c; */
      background-image: var(--background-image);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      object-fit: cover;
    }

    .container {
      padding-top: 2rem;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    ::-webkit-scrollbar {
      width: 5px;
      /* height: 2px; */
    }

    ::-webkit-scrollbar-track {
      background: transparent;
    }

    ::-webkit-scrollbar-thumb {
      background: lightsalmon;
      border-radius: 10px;
    }

    .chat-box {
      width: 80%;
      height: 100%;
      /* background-color: #3a3f44; */
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0px 0px 10px #000;
    }

    .chat-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      border-bottom: 1px solid #fff;
    }

    .chat-header h3 {
      color: #fff;
      font-size: 20px;
      margin: 0;
    }

    .chat-header a {
      color: #fff;
      text-decoration: none;
    }

    .chat-body {
      /* max-height: 450px; */
      /* overflow-y: ; */
      /* background-color: white; */
      background-image: var(--background-image);
      background-size: cover;
      background-position: center;
      /* padding: 10px; */
      background-repeat: no-repeat;
      /* back */
      object-fit: cover;
    }

    .chat-body .msg {
      display: flex;
      margin-bottom: 10px;
    }

    .chat-body .msg img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin-right: 20px;
      object-fit: cover;
      border: 2px solid green;
      /* object-fit: cover; */
    }

    .chat-body .msg .text {
      background-color: #fff;
      padding: 10px;
      border-radius: 10px;
      max-width: 75%;
    }

    .chat-body .msg .text p {
      margin: 0;
    }

    .chat-body .msg .text p:first-child {
      font-weight: bold;
    }

    .chat-body .msg .text p:last-child {
      font-size: 12px;
    }

    .chat-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      border-top: 1px solid #fff;
    }

    .chat-footer input {
      width: 80%;
      padding: 10px;
      border: none;
      border-radius: 10px;
    }

    .chat-footer button {
      width: 20%;
      padding: 10px;
      border: none;
      border-radius: 10px;
      /* background-color: #4CAF50; */
      color: #fff;
    }

    .chat-footer button:hover {
      background-color: #45a049;
    }

    /* For scrolling */
    .messages-container {
      /* max-height: 400px; */
      max-height: 420px;


      /* Set a maximum height */
      overflow-y: auto;
      /* Enable vertical scrolling */
    }

    .scroll-down-indicator {
      position: fixed;
      bottom: 20%;
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
    ?>
  </header>
  <div class="container">
    <div class="chat-box">
      <div class="chat-header">
        <h3 class="text-white">Group chat</h3>
        <div>

          <a href="#" class="btn btn-danger fs-6 fw-lighter">Exit</a>
          <a href="../pages/mygroups.php" class="btn btn-secondary fs-6 fw-lighter">back</a>
        </div>
      </div>
      <div class="chat-body messages-container p-2">
        <?php
        // for ($i = 0; $i < 1000; $i++) {
        //   if ($i % 2 == 0) {
        //     echo '
        //           <a href="../pages/singleuserprofile.php" class="msg text-decoration-none">
        //             <img src="../assets/images/sb.jpg" alt="">
        //             <div class="text text-white bg-primary">
        //               <p>Jane Doe</p>
        //               <p class="fw-lighter">
                  
        //                 Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  
        //               </p>
        //               <p class="fw-lighter">10:10 AM</p>
        //             </div>
        //           </a>
        //     ';
        //   } else {



        //     echo '
        //         <a href="../pages/singleuserprofile.php" class="msg text-decoration-none">
        //           <img src="../assets/images/sv.jpg" alt="">
        //           <div class="text text-white bg-success">
        //             <p>John Doe</p>
        //             <p class="fw-lighter">Hello, how are you?
        //               Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, itaque officiis numquam odio perspiciatis asperiores ducimus porro minima consequatur esse maxime nobis atque est sit pariatur voluptas ea vel quo!
        //             </p>
        //             <p class="fw-lighter">10:10 AM</p>
        //           </div>
        //         </a>
        //   ';
        //   }
        // }
        ?>



      </div>
      <!-- For scrolling indicator -->
      <div id="scroll-indicator" class="scroll-down-indicator">
        ⬇ Scroll to see more
      </div>
      <div class="chat-footer">
        <input type="text" class="input border" placeholder="Type a message...">
        <button class="btn btn-primary fs-6 mx-1 fw-lighter">Send</button>
      </div>
    </div>
  </div>
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