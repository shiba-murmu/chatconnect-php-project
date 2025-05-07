<!-- In this page not not need to checking the 
 session variables. -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>User-registration</title>
  <link rel="icon" type="image/x-icon" href="../assets/icons/group.png" title="group icons">
  <!-- Required meta tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- For icons -->
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="/pages/styles/hero.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      height: 100vh;
      width: 100vw;
    }

    main {
      height: 88.6vh;
      width: 100vw;
      display: flex;
      /* background-image: ur('../assets/images/telephone-586266.jpg')l; */
      /* background-color: blueviolet; */
      background-image: url(../assets/images/28.jpg);
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      justify-content: center;
      align-items: center;
    }

    header {
      height: 11.4vh;
      width: 100vw;
      margin: 0;
      /* background-color: green; */
      /* background: transparent; */
      background-image: url(../assets/images/28.jpg);
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      /* display: flex; */
      /* z-index: 1; */
    }

    .forSame {
      height: 88.6vh;
    }

    .section1 {
      width: 100vw;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    /* To design the form */
    form {
      box-shadow: 0 0 30px 5px rgba(100, 100, 100, 0.9);
      background-image: url(../assets/images/30.jpg);
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;


    }

    /* design text for login and register accounts */
    .registerAndLogin {
      font-size: 1.4rem;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-weight: 500;
    }

    .registerAndLogin_btn_for_login {
      font-size: 1.4rem;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-weight: 500;
    }

    .registerAndLogin:focus {
      background-color: green;
      color: white;
    }

    /* To design the form
        icons movement in the form sections */
    .iconAnimation {
      animation: translate 2s ease-in alternate;
      animation-iteration-count: 2;
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

    /* animation for the form */
    .card {
      animation: slideInFromLeft 1s ease-in-out;
    }

    @keyframes slideInFromLeft {
      0% {
        transform: translateX(-100%);
      }

      100% {
        transform: translateX(0);
      }
    }
  </style>
</head>

<body>
  <header>
    <!-- place navbar here -->
    <div class="fuid-container text-center">
      <h2 class="display-3 text-white fw-bold">Create Account
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="55" height="55" fill="white">
          <path d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM6.02332 15.4163C7.49083 17.6069 9.69511 19 12.1597 19C14.6243 19 16.8286 17.6069 18.2961 15.4163C16.6885 13.9172 14.5312 13 12.1597 13C9.78821 13 7.63095 13.9172 6.02332 15.4163ZM12 11C13.6569 11 15 9.65685 15 8C15 6.34315 13.6569 5 12 5C10.3431 5 9 6.34315 9 8C9 9.65685 10.3431 11 12 11Z"></path>
        </svg>
      </h2>
    </div>
  </header>
  <?php
  /**
   * Summary of popUp
   * @param mixed $message
   * @return void
   * This function is used to display a pop up message
   * to the user
   * to show the requirement to fill all the fields
   */
  function popUp($message)
  {
    echo '
        <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade text-white" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-white rounded-2 border-0">
                        <div class="modal-header border-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-danger text-center p-0 m-0 border-0">
                            <span class="modal-title fs-5 fw-bold display-5" id="staticBackdropLabel">
                                ' . $message . '
                            </span>
                        </div>
                        <div class="modal-footer border-0 p-0 m-2 mt-0">
                            <button type="button" class="btn btn-warning"
                            data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>';
  }

  include '../database/connect.php';
  if (isset($_POST['submit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $fname = $_POST['fname'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $cPassword = $_POST['cPassword'];
      // regular expression for gmail verification
      $pattern = "/^[a-zA-Z0-9._%+-]+@gmail\.com$/";

      if (!empty($fname) && !empty($username) && !empty($email) && !empty($password) && !empty($cPassword)) {

        /**
         * Function to validate the username
         * length and special characters
         * and numbers
         * returns an array of errors
         */
        $username_errors = validate_username($username);

        /**
         * Calling the function to validate
         * the email
         */

        if (preg_match($pattern, $email) && empty($username_errors)) {
          /**
           * Calling the password validation
           * function.
           * it returns an array of errors
           * if empty then password is valid
           * else password is invalid
           */
          $errors = validate_password($password);
          if (empty($errors)) {
            if ($password == $cPassword) {
              // For username check in the database
              $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
              $user_name = mysqli_query($conn, $sql);
              // For email check in the database 
              $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
              $row = mysqli_query($conn, $sql);
              if (mysqli_num_rows($row) > 0) {
                /* Calling the function to show
                                popUp to the user that email already exist */
                popUp("Email already taken <br> Please try with another email");
              } else if (mysqli_num_rows($user_name) > 0) {
                // Calling the function to show
                // popUp to the user that username already exist
                popUp("Username already taken <br> Please try with another username");
              } else {
                if ($email == $password) {
                  // Calling the function to show
                  // popUp to the user email password should not be the same
                  popUp("Email and password can not be same <br> Please try with another email and password");
                } else {
                  /* If the password matched and valid password then we hash the password */
                  $password = password_hash($password, PASSWORD_DEFAULT);
                  // insert query
                  $sql = "INSERT INTO `users` (`fname`, `username`, `email`, `password`) VALUES ('$fname', '$username', '$email', '$password')";
                  // query execution
                  $row = mysqli_query($conn, $sql);

                  $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `email` = '$email'";
                  $row = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_assoc($row);
                  $userid = $row['id'];
                  $name = $row['fname'];

                  // $default_image = 1;
                  // below code will be executed if the query is executed successfully
                  // also inserting an default images for the user
                  $sql = "INSERT INTO `images` (`userid`,`name`, `userimage`) VALUES ('$userid','$name', '../assets/images/default.png')";
                  $row = mysqli_query($conn, $sql);
                  if ($row) {
                    /**
                     * Inserting some default values to the userotherdata table
                     * 
                     */
                    $phone = "NULL";
                    $gender = "NULL";
                    $dateofbirth = "NULL";
                    $bio = "NULL";
                    $education = "NULL";
                    $college = "NULL";
                    $address = "NULL";
                    $facebook = "NULL";
                    $twitter = "NULL";
                    $instagram = "NULL";
                    $linkedin = "NULL";
                    date_default_timezone_set('Asia/Kolkata');
                    $joineddate = date("d-m-Y");
                    $joinedtime = date("h:i A");
                    $sqlToInsertDataOfTheUser = "INSERT INTO `userotherdata` (`userid`, `phone`, `gender`, `dateofbirth`, `bio`, `education`, `college`, `address`, `facebook`, `twitter`, `insta`, `linkedin`,`joineddate`, `joinedtime`) VALUES ('$userid', '$phone', '$gender', '$dateofbirth', '$bio', '$education', '$college', '$address', '$facebook', '$twitter', '$instagram', '$linkedin', '$joineddate', '$joinedtime');";
                    $result = mysqli_query($conn, $sqlToInsertDataOfTheUser);
                    // Function to delay the execution
                    //  to show the user i.e loading takes time to creating 
                    // your account.
                    sleep(2);

                    // Echo for displaying success message

                    /* This model is shown through the js which is written below
                                         * inside the script tags
                                        */

                    /**
                     * Here the popUp() function is not used 
                     * because here one more thing is added i.e
                     * redirect the page to the other screen
                     */
                    echo '
                                        <!-- Button trigger modal -->
                                            <!-- Modal -->
                                            <div class="modal fade text-white" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content bg-white rounded-2 border-0">
                                                        <div class="modal-header border-0">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-black text-center p-0 m-0 border-0">
                                                        <span class="modal-title fs-5 fw-bold display-5" id="staticBackdropLabel">Account created successfully !!
                                                        <br>
                                                        Redirecting...</span>
                                                        <br>
                                                    <div class="spinner-border text-warning text-center m-0" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-0 p-0 m-2 mt-0">
                                                    <button type="button" class="btn btn-warning"
                                                    data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            </div>
                                            </div>';
                    // pageRedirect();  // Function to redirect the page
                    echo "<script>
                                                function pageRedirect() {
                                                    setTimeout(function(){
                                                        window.location.href = '../index.php';
                                                    } , 3000);
                                                }
                                                pageRedirect();
                                        </script>";
                  } else {
                    // This will be displayed if the query is not executed successfully 
                    // Echo for displaying error if account creation failed
                    // called the function to show popUp
                    // for the account creation failed
                    popUp("Account creation failed !!");
                  }
                }
              }
            } else {
              // echo "Password do not match";
              // called the function to show popUp
              // for the password do not match
              popUp("Password do not match <br> please enter the same password");
            }
          } else {
            // echo "Password is invalid. Errors:";
            foreach ($errors as $error) {
              echo '
                        <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade text-white" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog"> 
                                    <div class="modal-content bg-white rounded-2 border-0">
                                        <div class="modal-header border-0">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-danger text-center p-0 m-0 border-0">
                                            <p class="modal-title fs-5 fw-bold display-6" id="staticBackdropLabel">
                                                Password is invalid...!!<br>' . $error . '
                                            </p>
                                        </div>
                                        <div class="modal-footer border-0 p-0 m-2 mt-0">
                                            <button type="button" class="btn btn-warning"
                                            data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
            }
          }
        } else {
          // If username error found
          if (!empty($username_errors)) {
            foreach ($username_errors as $error) {
              echo '
                            <!-- Button trigger modal -->
                                <!-- Modal -->
                                <div class="modal fade text-white" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog"> 
                                        <div class="modal-content bg-white rounded-2 border-0">
                                            <div class="modal-header border-0">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-danger text-center p-0 m-0 border-0">
                                                <p class="modal-title fs-5 fw-bold display-6" id="staticBackdropLabel">
                                                    Username is invalid...!!<br>' . $error . '
                                                </p>
                                            </div>
                                            <div class="modal-footer border-0 p-0 m-2 mt-0">
                                                <button type="button" class="btn btn-warning"
                                                data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
            }
          }
          //  If the email error found !
          if (!preg_match($pattern, $email)) {
            // Echo for displaying error if the fields are empty
            // called the function to show popUp
            // for to enter the valid email address
            popUp("Please enter valid email address");
          }
        }
      } else {
        // Echo for displaying error if the fields are empty
        // called the function to show popUp
        // for to fill all the fields
        popUp("Please fill all the fields");
      }
    }
  }
  ?>
  <main>
    <!-- For introduction purpose -->
    <!-- This is divided into two parts -->
    <section class="section1 forSame p-5">
      <!-- For register purpose -->
      <form class="card p-4 text-white rounded-4 w-75" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" validation="true">
        <div class="mb-2">
          <label for="name" class="form-label fs-5 fw-bold">
            <svg xmlns="http://www.w3.org/2000/svg" class="iconAnimation" viewBox="0 0 24 24" height="25" width="25" fill="black">
              <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM7 12C7 14.7614 9.23858 17 12 17C14.7614 17 17 14.7614 17 12H15C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12H7Z"></path>
            </svg>
            Full Name</label>
          <input type="text" name="fname" class="form-control" id="name" aria-describedby="nameHelp" />
          <div id="nameHelp" class="form-text">
            Please enter your name here , as it appears on your profile
          </div>
        </div>
        <div class="mb-2">
          <label for="username" class="form-label fs-5 fw-bold">
            <svg xmlns="http://www.w3.org/2000/svg" class="iconAnimation" viewBox="0 0 24 24" width="25" height="25" fill="black">
              <path d="M14 14.252V22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z"></path>
            </svg>
            Username</label>
          <input type="text" class="form-control" name="username" id="username"
            aria-describedby="usernameHelp" />
          <div id="usernameHelp" class="form-text">
            Please enter a unique username for your account , it will be used to identify you
          </div>
        </div>
        <div class="mb-2">
          <label for="email" class="form-label fs-5 fw-bold">
            <svg xmlns="http://www.w3.org/2000/svg" class="iconAnimation" viewBox="0 0 24 24" width="25" height="25" fill="black">
              <path d="M22 13.3414C21.3744 13.1203 20.7013 13 20 13C16.6863 13 14 15.6863 14 19C14 19.7013 14.1203 20.3744 14.3414 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V13.3414ZM12.0606 11.6829L5.64722 6.2377L4.35278 7.7623L12.0731 14.3171L19.6544 7.75616L18.3456 6.24384L12.0606 11.6829ZM21 18H24V20H21V23H19V20H16V18H19V15H21V18Z"></path>
            </svg>
            Email</label>
          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" />
          <div id="emailHelp" class="form-text">
            Please enter a valid email address , ex: 0uqgK@example.com
          </div>
        </div>
        <div class="mb-2">
          <label for="password" class="form-label fs-5 fw-bold">
            <svg xmlns="http://www.w3.org/2000/svg" class="iconAnimation" viewBox="0 0 24 24" width="25" height="25" fill="black">
              <path d="M18 8H20C20.5523 8 21 8.44772 21 9V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V9C3 8.44772 3.44772 8 4 8H6V7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7V8ZM16 8V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V8H16ZM11 14V16H13V14H11ZM7 14V16H9V14H7ZM15 14V16H17V14H15Z"></path>
            </svg>
            Password</label>
          <input type="password" name="password" class="form-control" id="password" />
          <div id="passwordHelp" class="form-text">
            Password must be at least 8 characters , one uppercase and one lowercase , one number and one special character.
          </div>
        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label fs-5 fw-bold">
            <svg xmlns="http://www.w3.org/2000/svg" class="iconAnimation" viewBox="0 0 24 24" width="25" height="25" fill="black">
              <path d="M18 8H20C20.5523 8 21 8.44772 21 9V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V9C3 8.44772 3.44772 8 4 8H6V7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7V8ZM16 8V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V8H16ZM11 14V16H13V14H11ZM7 14V16H9V14H7ZM15 14V16H17V14H15Z"></path>
            </svg>
            Confirm Password</label>
          <input type="password" name="cPassword" class="form-control" id="confirmPassword" />
        </div>
        <div class="justify-content-center d-flex gap-2">
          <button type="submit" name="submit" class="btn registerAndLogin btn-primary w-25 fs-5 fw-bold">
            Register
          </button>
          <a href="../index.php" target="_self"
            class="registerAndLogin_btn_for_login text-decoration-none btn btn-secondary text-white w-25 fs-5 fw-bold justify-content-center align-items-center d-flex">Login</a>
        </div>
      </form>
    </section>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

  <!-- Script to show the modal of bootstrap-->
  <script>
    var modal = document.getElementById('staticBackdrop');
    var modalInstance = new bootstrap.Modal(modal);
    modalInstance.show();
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
</body>

</html>

<?php
// Code for password verifications
function password_strength($password)
{
  // This is a very basic example, you may want to improve it
  $strength = 0;
  if (strlen($password) >= 8) {
    $strength += 10;
  }
  if (preg_match("/[a-z]/", $password)) {
    $strength += 10;
  }
  if (preg_match("/[A-Z]/", $password)) {
    $strength += 10;
  }
  if (preg_match("/[0-9]/", $password)) {
    $strength += 10;
  }
  if (preg_match("/[^a-zA-Z0-9]/", $password)) {
    $strength += 10;
  }
  return $strength;
}
function validate_password($password)
{
  $errors = array();
  if (strlen($password) < 8) {
    $errors[] = "Password must be at least 8 characters long";
  }
  if (strlen($password) > 128) {
    $errors[] = "Password must not exceed 128 characters";
  }
  if (!preg_match("/[a-z]/", $password) || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password) || !preg_match("/[^a-zA-Z0-9]/", $password)) {
    $errors[] = "Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character";
  }
  $password_strength = password_strength($password);
  if ($password_strength < 50) {
    $errors[] = "Password is too weak";
  }
  $blacklist = array("password123", "qwerty", "letmein");
  if (in_array($password, $blacklist)) {
    $errors[] = "Password is too common";
  }
  $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^a-zA-Z0-9]).{8,128}$/";
  if (!preg_match($pattern, $password)) {
    $errors[] = "Password must match the format";
  }
  return $errors;
}


// Function to username validation

function validate_username($username)
{
  $errorsForUserName = [];

  if (strlen($username) < 4 || strlen($username) > 32) {
    $errorsForUserName[] = "Username must be between 4 and 32 characters long";
    /** if number of the letter of the username in the range of 4 to 32 
     * then it is accepted 
     */
  }
  if (!preg_match("/^[a-z0-9_]+$/", $username)) {
    $errorsForUserName[] = "Username can only contain lowercase letters, numbers, and underscore";
    /**
     * if username includes underscore and number then it is accepted also
     * username must be in lowercase
     */
  }

  return $errorsForUserName;
}
// Below code is for fetch the data whenever function is called

// if (empty($errors)) {
//     echo "Password is valid";
// } else {
//     echo "Password is invalid. Errors:";
//     foreach ($errors as $error) {
//         echo $error . "<br>";
//     }
// }
?>



<!-- Below code is for spinner  -->
<!-- May be used in the future -->

<!-- echo ' -->

<!-- Div for showing the loading text -->
<!-- <div class="loadingDiv bg-dark">
    <span class="display-5">Loading
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-primary" role="status">
            </div>
        </div>

    </span>
</div>
'; -->