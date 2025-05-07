<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chatbox</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous" />
  <!-- to set the background -->
  <link rel="stylesheet" href="../pages/styles/hero.css">
  <style>
    body {
      background-image: var(--background-image);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      object-fit: cover;
    }

    main {
      height: 92vh;
    }

    .messege {
      min-height: 84vh;
      background: transparent;
      box-shadow: 0px 0px 10px #000;
    }

    .messege_container {
      height: 28rem;
      border-top: 3px solid white;
      border-bottom: 3px solid white;
      background-image: var(--background-image);
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      overflow-y: auto;
      scrollbar-width: none;
    }

    .messege_container a {
      text-decoration: none;
    }

    .chat {
      height: fit-content;
      text-wrap: wrap;
    }

    .img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid lime;
    }

    .schrool-indicator {
      bottom: 17%;
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

    /* schroolbar */
    ::-webkit-scrollbar {
      width: 5px;
      /* height: 2px; */
    }

    ::-webkit-scrollbar-track {
      background: transparent;
    }

    ::-webkit-scrollbar-thumb {
      background-color: var(--scrollbar-color);
      border-radius: 10px;
    }
  </style>
</head>

<body>
  <!---------------------------------------------------------------- Backend ------------------------------------------------------------------>
  <?php
  include '../database/connect.php';
  // include '../components/header.php';
  include '../modules/managesessions.php';


  $sql = "SELECT * FROM users WHERE id = '$_SESSION[user_id]'";
  $row = mysqli_query($conn, $sql);
  $row = $row->fetch_assoc();
  $username = $row['username'];
  $email = $row['email'];
  $name = $row['fname'];
  $name = strtoupper($name);

  // retrieve image
  $sql = "SELECT * FROM images WHERE userid = '$_SESSION[user_id]'";
  $row = mysqli_query($conn, $sql);
  $row = $row->fetch_assoc();
  $image = $row['userimage'];

  // send messege to database
  $senderID = $_SESSION["user_id"];

  // if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //   if (isset($_POST["messege"])) {

  //     $stmt = $conn->prepare("INSERT INTO messege (id, sender_id, messege) VALUES (NULL, ?, ?)");
  //     $stmt->bind_param("ss", $senderID, $_POST["messege"]);
  //   }

  //   if ($stmt->execute()) {
  //     // echo 'Messege sent';
  //   } else {
  //     // echo 'messege not sent';
  //   }

  //   $stmt->close();
  //   // $conn->close();

  //   // disply messege

  //   $sql = "SELECT * FROM messege";
  //   $sender = mysqli_query($conn, $sql);
  //   $data = $sender->fetch_assoc();

  //   $messegeid = $data["id"];
  //   $messege = $data["messege"];
  // }

  ?>



  <!-- Navbar -->
  <div class="row bg-warning" style="height: 7.7vh;"></div>

  <main>
    <div class="row d-flex justify-content-evenly">
      <div class="col-sm-8 my-4 messege ">
        <div class="row my-3">
          <div class="col-sm-4 ">
            <h2 class="px-3 text-white">Partner name</h2>
          </div>
          <div class="col-sm-4"></div>
          <div class="col-sm-4 d-flex justify-content-evenly">
            <button class="btn btn-warning my-1">Edit</button>
            <button class="btn btn-danger my-1">Delete</button>
            <button class="btn btn-secondary my-1">Back</button>
          </div>
        </div>

        <div class="messege_container row  mx-3">
          <?php
          if ($messegeid == $senderID) {
            echo '
                            <a href="" class="d-flex mt-3">
                                <div class="col-3"></div>
                                    <div class="col-8 bg-success text-black chat rounded rounded-3 mx-2 p-2">
                                        <p class="m-0 fw-bold text-white">' . $name . '</p>
                                        ' . $messege . '
                                </div>
                                <div class="col-1">
                                    <img src=' . $image . ' class="col-12 img" alt="">
                                </div>
                            </a>';
          } else {
            echo '
                            <a href="" class="d-flex mt-3">
                                <div class="col-1">
                                    <img src=' . $image . ' class="col-12 img" alt="">
                                </div>
                                <div class="col-9 bg-success text-black chat rounded rounded-3 mx-2 p-2">
                                    <p class="m-0 fw-bold text-white">' . $name . '</p>
                                    ' . $messege . '
                                </div>
                            </a>';
          }

          ?>

          <!-- scrool bar -->
          <div class="position-absolute  schrool-indicator col-2 text-center" id="schroolindicator">
            ⬇ Scroll to see more
          </div>
        </div>

        <form action="chatbox.php" method="POST">
          <div class="row m-3 d-flex justify-content-between">
            <div class="col-10">
              <input type="text" class="col-12 py-2 rounded rounded-4" placeholder="type a messege" name="messege">
            </div>
            <div class="col-2">
              <input class="btn  btn-primary col-12 py-2 rounded rounded-4" type="submit" value="send">
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>

  <script>
    const messege_container = document.querySelectorAll(".messege_container");
    const schrool_indicator = document.getElementById("schroolindicator");



    // Scroll to bottom when arrow is clicked
    schrool_indicator.addEventListener("click", function() {
      messege_container.scrollTop = messege_container.scrollHeight;
    });
  </script>

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



<!-- <a href="" class="d-flex mt-3">
    <div class="col-1">
        <img src='.$image.' class="col-12 img" alt="">
    </div>
    <div class="col-9 bg-success text-black chat rounded rounded-3 mx-2 p-2">
        <p class="m-0 fw-bold text-white">'.$name.'</p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae non qui quaerat explicabo nostrum odio consequatur repellat alias fuga iure possimus eum, quos, labore enim voluptatibus eius architecto libero ducimus?
    </div>
</a> -->


<!-- my messege -->
<!-- <a href="" class="d-flex mt-3">
    <div class="col-3"></div>
    <div class="col-8 bg-success text-black chat rounded rounded-3 mx-2 p-2">
        <p class="m-0 fw-bold text-white">'.$name.'</p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae non qui quaerat explicabo nostrum odio consequatur repellat alias fuga iure possimus eum, quos, labore enim voluptatibus eius architecto libero ducimus?
    </div>
    <div class="col-1">
        <img src='.$image.' class="col-12 img" alt="">
    </div>
</a> -->