<?php

/**
 * session_start();
 * above function start the session to
 * play with session variable.
 */
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Login-user</title>
  <link rel="icon" type="image/x-icon" href="assets/icons/group.png" title="group icons">
  <!-- Required meta tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <!-- For the use of Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Lilita+One&display=swap" rel="stylesheet">
  <!-- For the use of Google fonts
     in below the big heading -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet">
  <!-- For use of google fonts   
    in below the small heading -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="index.css">
  <style>
    /* Css code */
    body {
      height: 100vh;
      width: 100vw;
    }

    main {
      height: 100vh;
      width: 100vw;
      display: flex;
      background-image: url('assets/images/20.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      z-index: -1;
    }

    /* for the same design */
    .forSame {
      height: 100vh;
      width: 50vw;
    }

    .section1 {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      text-shadow: 0 0 10px rgb(255, 255, 255);
    }

    .section1 div:nth-child(2) {
      height: 100vh;
      width: 50vw;
    }

    @keyframes glow {
      from {
        text-shadow: 0 0 10px rgb(255, 255, 255);
      }

      to {
        text-shadow: 0 0 20px rgb(0, 0, 0);
      }
    }

    .section2 {
      background: transparent;
      /* background-color: rgb(200, 200, 200); */
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    /* For design the form*/
    form {
      /* background-color: rgba(200, 200, 200, 1); */
      /* background-color: blue; */
      background-image: url('assets/images/22.jpg');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover; 
      background-attachment: fixed;
      object-fit: center;
      /* border: 1px solid rgb(200, 200, 200); */
      box-shadow: 0 0 10px rgb(0, 0, 0);

      /* border-radius: 10px; */
      /* border: 1px solid rgb(200, 200, 200); */
      box-shadow: 0 0 10px rgb(0, 0, 0);
    }

    .iconAnimation {
      animation: translate 2s ease-in alternate;
      animation-iteration-count: infinite;
      animation-delay: 2s, 4s, 6s;
    }

    @keyframes translate {
      0% {
        /* transform: translateX(0); */
        transform: rotate(0deg);
      }

      25% {
        /* transform: translateX(10px); */
        transform: rotate(30deg);
      }

      50% {
        /* transform: translateX(20px); */
        transform: rotate(-30deg);
      }

      75% {
        /* transform: translateX(10px); */
        transform: rotate(10deg);
      }

      100% {
        /* transform: translateX(0); */
        transform: rotate(0deg);
      }
    }

    /* This is for text */
    #heading {
      font-size: 36px;
      color: #333;
      display: inline-block;
      height: 11.5em;
      margin-top: 5rem;
      /* Below text is used for style the big heading */
      font-family: "Playwrite GB S", cursive;
      font-optical-sizing: auto;
      font-weight: 400;
      font-style: normal;
    }

    #heading span {
      display: none;
    }

    #heading span.show {
      display: inline-block;
      animation: fadeIn 2s;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    /* Text style below the heading para in the 
        left side of the page.. */
    .dancing-script {
      font-family: "Dancing Script", cursive;
      font-optical-sizing: auto;
      font-weight: 700;
    }

    /* For animation of form */
    /* For animation of form */
    .card {
      animation: slideInFromLeft .5s ease-in-out;
    }

    @keyframes slideInFromLeft {
      0% {
        transform: scale(0.2);
      }

      100% {
        transform: scale(1);
      }
    }
  </style>
</head>

<body>
  <header>
    <!-- place navbar here -->
    <!-- Below button use to trigger the 
          notification to page .. but it will stay hidden 
          all clicking function will be executed from backend -->
    <!-- Also one thing to notice here below button 
         can't store it with the popup div because this can 
         create unexpected errors.. -->
    <button
      type="button"
      class="btn btn-primary btn-sm"
      data-bs-toggle="modal"
      data-bs-target="#modalId"
      id="myBtn"
      style="display: none;">
      Launch
    </button>

    <?php
    include 'database/connect.php';

    $message = null;
    if (isset($_POST['submit'])) {
      // echo 'Hello World!';
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        /**
         * Checking the form is empty or not
         * if empty then popup will show to the user
         * if not then if condition is true
         * after that
         * in the else condition
         * it will check it email is not valid then what it is 
         * is it username or not
         * if not then popup will show to the user
         * if yes then it will check the username is valid or not 
         * by calling the validate_username function
         * if not then popup will show to the user
         * if yes then it called the login function to login the user
         */

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
          if (is_email($_POST['email'])) {

            login($_POST['email']);
          } else if (!is_email($_POST['email'])) {
            $username = validate_username($_POST['email']);
            if ($username) {
              $sql = "SELECT * FROM `users` WHERE `username` = '. $username.'";
              $row = mysqli_query($conn, $sql);
              if ($row) {
                // $row = $result->fetch_assoc();
                login($_POST['email']);
              } else {
                popupForLogin("User not found !!");
              }
            } else {
              popupForLogin("Invalid username !!");
            }
          }
        } else {
          popupForLogin("Please enter both the fields !!");
        }
      }
    }
    function validate_username($username)
    {
      if (strlen($username) < 4 || strlen($username) > 32) {
        return false;
        // $errorsForUserName[] = "Username must be between 4 and 32 characters long";
        /** if number of the letter of the username in the range of 4 to 32 
         * then it is accepted 
         */
      }
      if (!preg_match("/^[a-z0-9_]+$/", $username)) {
        return false;
        // $errorsForUserName[] = "Username can only contain lowercase letters, numbers, and underscore";
        /**
         * if username includes underscore and number then it is accepted also
         * username must be in lowercase
         */
      }
      return true;
    }
    function login($mail)
    {
      /**
       * this is database connection
       * because in the this block there
       * create some variable error not defined 
       * thats why this include mention here again 
       */
      include 'database/connect.php';

      // sending query to check email and username is available or not in the database 
      /**
       * if not then popup will show to the user.
       * if yes then its all row data will be import here 
       * and access it.
       * For to check the password is correct or not
       * if yes then it will be redirect to other page and 
       * and id of the user will be assign it to the 
       * SESSION.
       * @var mixed
       */
      $sql = "SELECT * FROM `users` WHERE `email` = '" . $mail . "' OR `username` = '" . $mail . "'";

      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        $input_password = $_POST['password'];
        $row = $result->fetch_assoc();
        // echo var_dump($row);
        $stored_hashed_password = $row['password'];
        if (password_verify($input_password, $stored_hashed_password)) {
          // Passwords match, log the user in
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['username'] = $row['username'];
          pageRedirect(); // calling the function to redirect the page
        } else {
          popupForLogin("Opps you have entered an <br> Invalid password !!");
        }
      } else {
        popupForLogin("User not found !!");
      }
    }
    ?>
    <?php
    // Creating function for the page redirection in php
    function pageRedirect()
    {
      popupForLogin("Logging in to your account <br>
                            Please wait...");
      // Redirect the user to the user account page
      echo "<script>
                        function pageRedirect() {
                            setTimeout(function(){
                                window.location.href = 'pages/useraccount.php';
                            } , 2000);
                        }
                        pageRedirect();
                </script>";
    }
    // Function for string is email or username
    function is_email($email)
    {
      return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    ?>

    <?php
    /******************************************************** */
    /**
     * Summary of popUp
     * @param mixed $message
     * @return void
     * This function is used to display a pop up message
     * to the user
     * to show the requirement to fill all the fields
     * 
     * 
     * This variable is used to assign the text to the 
     * which argument is passed by the function calling 
     */
    $textToPrint;
    function popupForLogin($message)
    {
      echo '
                <script>
                    const butn = document.getElementById("myBtn");
                    window.onload = function() {
                        butn.click();
                    }
                </script>
            ';
      global $textToPrint;
      $textToPrint = $message;
    }
    ?>

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div
      class="modal fade"
      id="modalId"
      tabindex="-1"
      data-bs-backdrop="static"
      data-bs-keyboard="false"

      role="dialog"
      aria-labelledby="modalTitleId"
      aria-hidden="true">
      <div
        class="modal-dialog modal-dialog-scrollable modal-dialog-centered w-50"
        role="document">
        <div class="modal-content bg-white border-0 p-0">
          <div class="modal-header border-0 p-0 m-3">

            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <?php
            echo
            '<span style="font-size: 50px;" class="text-black fw-bold fs-5"> ' . $textToPrint . '</span>';
            ?>
            <!-- <p class="text-warning"> hello</p> -->

          </div>
          <div class="modal-footer border-0 p-0 m-1">
            <button
              type="button"
              class="btn btn-warning text-black"
              data-bs-dismiss="modal">
              Close
            </button>
            <!-- <button type="button" class="btn btn-primary">Save</button> -->
          </div>
        </div>
      </div>
    </div>
    <!--Above code are in single wrap
            because the above popupForLogin() function will show
            whenever runs the function of the php
            code.
         -->
    <!-- *************************************************************** -->


  </header>
  <main>
    <section class="section1 forSame">
      <!-- For introduction purpose -->
      <div class="content">
        <!-- for heading -->
        <h1>
          ChatConnect
        </h1>
        <h1>
          ChatConnect
        </h1>
      </div>
      <div class="text-white d-flex justify-content-center flex-column align-items-center">
        <p id="heading" class="text-start rounded-4 text-white  w-75 fs-5">
          <!-- Here text is adding from the javascript -->
        </p>
        <span class="text-white display-4 mt-2 dancing-script">Your World, Your Network..!</span>
      </div>
    </section>

    <section class="section2 forSame">
      <!-- For login purpose -->
      <form class="card p-5 text-white  m-5 w-50" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label fs-5 fw-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="iconAnimation" width="27" height="27" fill="lightblue">
              <path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z"></path>
            </svg>
            Email or username</label>
          <input type="text" name="email" class="form-control rounded-2 w-100"
            id="exampleInputEmail1" aria-describedby="emailHelp"  required/>
          <div id="emailHelp" class="form-text text-white">
            We'll never share your email with anyone else.
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label fs-5 fw-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" class="iconAnimation" viewBox="0 0 24 24" width="27" height="27" fill="lightblue">
              <path d="M17 14H12.6586C11.8349 16.3304 9.61244 18 7 18C3.68629 18 1 15.3137 1 12C1 8.68629 3.68629 6 7 6C9.61244 6 11.8349 7.66962 12.6586 10H23V14H21V18H17V14ZM7 14C8.10457 14 9 13.1046 9 12C9 10.8954 8.10457 10 7 10C5.89543 10 5 10.8954 5 12C5 13.1046 5.89543 14 7 14Z"></path>
            </svg>
            Password</label>
          <input type="password" name="password"
            class="form-control rounded-2 w-100"
            id="exampleInputPassword1" required />
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" required />
          <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary rounded-2 fs-5 fw-semibold w-100">
          Login
        </button>

        <hr class="border-2 border-secondary" />
        <div class="text-center mb-2">
          <a href="pages/forgotpassword.php" target="_self" class="text-decoration-none display-6 fs-5 fw-semibold">Forgot Password ?</a>
        </div>
        <div class="text-center">
          <a href="pages/createaccount.php" target="_self"
            class="text-decoration-none btn btn-success rounded-2 m-0 fs-5 fw-semibold w-100">Create Account</a>
        </div>
      </form>
    </section>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- this script is for text -->
  <script>
    // for animation on page load
    /**
     * this animation is for intro of the text below the 
     * heading chatConnect.
     */
    const heading = document.getElementById('heading');
    heading.textContent = "Welcome to ChatConnect, the ultimate platform to connect, share, and engage with people around the world. Whether you're here to build meaningful relationships, follow your favorite creators, or simply share your thoughts, we make it easy to stay connected. With ChatConnect, your privacy is our priority. We use industry-leading encryption to keep your information safe.";
    const text = heading.textContent;
    heading.textContent = ''; // remove original text content
    const words = text.split(' '); // split text into words
    const interval = 50; // adjust the interval to change the speed of the animation

    let i = 0;
    setInterval(() => {
      if (i < words.length) {
        const span = document.createElement('span');
        span.textContent = words[i];
        span.classList.add('show');
        heading.appendChild(span);
        heading.appendChild(document.createTextNode('    ')); // add a space after each word
        i++;
      } else {
        clearInterval();
      }
    }, interval);
  </script>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <!-- Optional: Place to the bottom of scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
</body>

</html>