<?php
include '../modules/managesessions.php';
// session_start();

?>
<!doctype html>
<html lang="en">

<head>
  <title>Edit profile</title>
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
  <link rel="stylesheet" href="../pages/styles/hero.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    main {
      /* animation: background 30s ease-in-out infinite alternate; */
      /* background-color: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(25, 25, 25, 0.25)); */
      background-image: url('../assets/images/22.jpg');




      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      object-fit: cover;
      background-attachment: fixed;
      /* z-index: -3; */
      min-height: 91vh;
      padding-bottom: 1rem;
    }

    @keyframes background {
      0% {
        background: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(25, 25, 25, 0.25));
      }

      25% {
        background: linear-gradient(to right, rgba(25, 25, 25, 0.25), rgba(50, 50, 50, 0.5));
      }

      50% {
        background: linear-gradient(to right, rgba(50, 50, 50, 0.5), rgba(75, 75, 75, 0.75));
      }

      75% {
        background: linear-gradient(to right, rgba(75, 75, 75, 0.75), rgba(0, 0, 0, 0));
      }

      100% {
        background: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(25, 25, 25, 0.25));
      }
    }

    ::-webkit-scrollbar {
      width: 5px;
    }

    ::-webkit-scrollbar-track {
      background: transparent;
    }

    ::-webkit-scrollbar-thumb {
      background-color: var(--scrollbar-color);
    }

    h2 {
      background-image: url(../assets/images/27.jpg);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    form {
      /* background-color: rgba(0, 0, 0, 0.5); */
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
    }
  </style>
</head>

<body>
  <header>
    <!-- place navbar here -->
    <?php
    include '../components/header.php';
    // include '..'
    include '../database/connect.php';
    ?>

    <!-- Login to insert the data of the users  -->
    <?php
    if (isset($_POST['submit'])) {
      $userid = $_SESSION['user_id'];
      $phone = $_POST['phone'];
      $gender = $_POST['gender'];
      $dateofbirth = $_POST['dob'];
      $bio = $_POST['bio'];
      $education = $_POST['education']; 
      $college = $_POST['college'];
      $address = $_POST['address'];
      $facebook = $_POST['facebook'];
      $twitter = $_POST['twitter'];
      $instagram = $_POST['instagram'];
      $linkedin = $_POST['linkedin'];

      $sqlToInsertDataOfTheUser = "UPDATE `userotherdata` SET 
        `phone` = '$phone', 
        `gender` = '$gender', 
        `dateofbirth` = '$dateofbirth', 
        `bio` = '$bio', 
        `education` = '$education', 
        `college` = '$college', 
        `address` = '$address', 
        `facebook` = '$facebook', 
        `twitter` = '$twitter', 
        `insta` = '$instagram', 
        `linkedin` = '$linkedin'
        WHERE `userid` = '$userid';";
      $result = mysqli_query($conn, $sqlToInsertDataOfTheUser);
      if ($result) {
        // redirect();
        echo '
        <script>
          alert("Profile Updated Successfully");
          window.location.href = "../pages/useraccount.php";
        </script>
        ';

      }
    }






    ?>
  </header>
  <main>
    
    <div class="container w-50 text-white">
      <h2 class="text-center display-4 fw-bold rounded-bottom-2 p-3">Update Profile</h2>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="was-validated bg-transparent p-5 rounded pb-4">
        <!-- This is commented because it is already
        assign when the user creating their accounts.. -->

        <!-- <div class="mb-3">
          <label for="email" class="form-label fs-5">Email</label>
          <input type="email" class="form-control" id="email" name="email">
        </div> -->

        <!-- add phone number -->
        <div class="mb-2">
          <label for="phone" class="form-label bg-dark-subtle px-2 rounded text-primary fw-bold fs-5">Phone</label>
          <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{3}-?[0-9]{3}-?[0-9]{4}">
          <div id="phoneHelp" class="form-text text-warning">Please enter your phone number here, it is required for verification. Must be in the format XXX-XXX-XXXX</div>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <!-- add gender -->
        <div class="mb-2">
          <label for="gender" class="form-label text-primary bg-dark-subtle px-2 rounded fw-bold fs-5">Gender</label>
          <select class="form-select" id="gender" name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <!-- add date of birth -->
        <div class="mb-2">
          <label for="dob" class="form-label text-primary bg-dark-subtle px-2 rounded fw-bold fs-5">Date of Birth</label>
          <input type="date" class="form-control" id="dob" name="dob">
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <!-- add bio -->
        <div class="mb-2">
          <label for="bio" class="form-label text-primary fw-bold bg-dark-subtle px-2 rounded fs-5">Bio</label>
          <textarea class="form-control" id="bio" rows="3" name="bio"></textarea>
        </div>
        <!-- add education -->
        <div class="mb-2">
          <label for="education" class="form-label text-primary bg-dark-subtle px-2 rounded fw-bold fs-5">Education</label>
          <input type="text" class="form-control" id="education" name="education">
        </div>
        <!-- add college -->
        <div class="mb-2">
          <label for="college" class="form-label text-primary bg-dark-subtle px-2 rounded fw-bold fs-5">College</label>
          <input type="text" class="form-control" id="college" name="college">
        </div>
        <!-- This commented because it will be assign by the server on --run time  -->
        <!-- <div class="mb-3">
          <label for="joined" class="form-label text-primary fw-bold fs-5">Joined Date</label>
          <input type="date" class="form-control" id="joined" name="joined">
        </div> -->

        <!-- add address -->
        <div class="mb-2">
          <label for="address" class="form-label text-primary bg-dark-subtle px-2 rounded fw-bold fs-5">Address</label>
          <textarea class="form-control" id="address" rows="3" name="address"></textarea>
          <div id="addressHelp" class="form-text text-warning">Example: Street Number, City, State, Zip, Country</div>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <!-- add social links -->
        <div class="mb-2">
          <label for="facebook" class="form-label text-primary bg-dark-subtle px-2 rounded fw-bold fs-5">Facebook</label>
          <input type="text" class="form-control" id="facebook" name="facebook">
          <div id="facebookHelp" class="form-text text-white">Example: https://www.facebook.com/yourprofile</div>
        </div>
        <div class="mb-2">
          <label for="twitter" class="form-label bg-dark-subtle px-2 rounded text-primary fw-bold fs-5">Twitter</label>
          <input type="text" class="form-control" id="twitter" name="twitter">
          <div id="twitterHelp" class="form-text text-white">Example: https://twitter.com/yourprofile</div>
        </div>
        <div class="mb-2">
          <label for="instagram" class="form-label bg-dark-subtle px-2 rounded text-primary fw-bold fs-5">Instagram</label>
          <input type="text" class="form-control" id="instagram" name="instagram">
          <div id="instagramHelp" class="form-text text-white">Example: https://www.instagram.com/yourprofile</div>
        </div>
        <div class="mb-2">
          <label for="linkedin" class="form-label bg-dark-subtle px-2 rounded text-primary fw-bold fs-5">LinkedIn</label>
          <input type="text" class="form-control" id="linkedin" name="linkedin">
          <div id="linkedinHelp" class="form-text text-white">Example: https://www.linkedin.com/in/yourprofile</div>
        </div>
        <!-- <div class="mb-3">
          <label for="links" class="form-label fs-5">Links</label>
          <textarea class="form-control" id="links" rows="3" name="links"></textarea>
        </div> -->
        <div class="d-flex gap-2 justify-content-center">

          <button type="submit" name="submit" class="btn btn-primary w-100 fw-bold fs-5">Submit</button>
        </div>
      </form>
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