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
  <link rel="stylesheet" href="../pages/styles/hero.css">
  <style>
    body {
      min-height: 100vh;
    }

    main {
      max-height: 91vh;
      /* background-color : aqua; */

      overflow: auto;
      color: white;

    }

    .hero::-webkit-scrollbar {
      display: block;
      width: 5px;
      /* background: transparent; */
    }

    .hero::-webkit-scrollbar-thumb {
      background-color: var(--scrollbar-color);
      border-radius: 10px;

    }

    .hero::-webkit-scrollbar-track {
      /* display: blue; */
      background-color: blue;
    }
  </style>
</head>

<body class="bg-dark text-white">
  <header>

    <!-- place navbar here -->
    <?php
    include '../components/header.php';
    include '../database/connect.php';
    $sql = "SELECT * FROM `users` WHERE `id` = '$_SESSION[user_id]'";
    $row = mysqli_query($conn, $sql);
    $row = $row->fetch_assoc();
    $name = $row['fname'];
    // $email = $row['email'];
    // $name = strtoupper($name);

    if (isset($_FILES["fileToUpload"])) {
      $target_dir = "../assets/images/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    }
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      if(empty($_FILES["fileToUpload"]["name"])){
        echo "<script>
        alert('Please select an image to upload');
        window.location.href = '../pages/useraccount.php';
        </script>";
      } else {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
          $uploadOk = 1;
          if ($uploadOk == 1) {
            if (file_exists($target_file)) {
              /**
               * check if file is already exits then 
               * override on it.
               */
              move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
              echo
              "<script>
                      setTimeout(function(){
                          window.location.href = '../pages/useraccount.php';
                      } , 500);
                  </script>";
            } else {
              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                /**
                 * @var 
                 * first retrieve the default image path of the user 
                 * from the database and check path of the default user image 
                 * path must not be equal to the path retrieve from the 
                 * databse.
                 * 
                 * 
                 */
                $sql = "SELECT * FROM `images` WHERE `userid` = '$_SESSION[user_id]'";
                $row = mysqli_query($conn, $sql);
                $row = $row->fetch_assoc();
                $userimage = $row['userimage'];
                if ($userimage != '../assets/images/default.png') {
                  unlink($userimage);
                  /** deleting the images from the server 
                   * for not taking unwanted space in the 
                   * server.
                   */
                }
                $sql = "UPDATE `images` SET `userimage` = '$target_file' WHERE `userid` = '$_SESSION[user_id]'";
                $row = mysqli_query($conn, $sql);
                /** updating images table particular field. */
                if ($row) {
                  echo "<script>
                      setTimeout(function(){
                          window.location.href = '../pages/useraccount.php';
                      } , 1);
                  </script>";
                } else {
                  echo 'Something went wrong';
                }
              } else {
                $message = "Sorry, there was an error uploading your file.";
                echo $message;
              }
            }
          }
        } else {
          // echo "File is not an image.";
          $message = "File is not an image.";
          $uploadOk = 0;
        }
      }
      }
    ?>
  </header>
  <main class="hero  bg-dark bg-gradient">
    <!-- place main content here -->
    <!-- #region for profile photo-->
    <div class="fluid-container   p-5">
      <h1 class="fw-lighter text-warning">Upload Your Profile Photo (Working)</h1>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3 fw-lighter">
          <label for="formFile" class="form-label">Select image to upload:</label>
          <input class="form-control fw-lighter" type="file" id="formFile" name="fileToUpload" accept="image/*">
          <div id="filenameHelp" class="form-text text-white">
            Please select an image file to upload, acceptable formats include JPEG, PNG, and GIF
            <span class="text-warning fw-bolder">
              (The filename must not contain any spaces).
            </span>
          </div>
        </div>
        <button type="submit" class="btn btn-success fw-lighter" name="submit">Upload Image</button>
      </form>
    </div>
  </main>
  <footer>
    <!-- For the footer of the page -->
    <footer>
      <!-- place footer here -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ziJUAr5y1LlE4gGk2D+9nQvVx+4CmZu+g4Rq4tXz5nOxqfj+X7wqSxNw4jxYy5lCw"
        crossorigin="anonymous"></script>
    </footer>
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