<?php
include '../modules/managesessions.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>My account</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <style>
      * {
        margin : 0;
        padding: 0;
        box-sizing: 0;
      }
      main {
        min-height : 91vh;
        background-color : aqua;
      }

    </style>
  </head>

  <body>
    <header>
      <!-- place navbar here -->
      <?php
      include '../components/header.php';
      ?>
    </header>
    <main>
      <!-- place main content here -->
      <div class="container-fluid">
        <div class="row d-flex justify-content-center mt-5">
          <div class="col-md-6">
            <div class="card shadow-lg">
              <div class="card-header bg-primary text-white">
                <h3 class="card-title">User Profile</h3>
              </div>
              <div class="card-body">
                <form>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-3">
                    <label for="profilepic" class="form-label">Profile picture</label>
                    <input type="file" class="form-control" id="profilepic">
                  </div>
                  <div class="mb-3">
                    <label for="coverpic" class="form-label">Cover picture</label>
                    <input type="file" class="form-control" id="coverpic">
                  </div>
                  <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="firstname">
                  </div>
                  <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname">
                  </div>
                  <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea class="form-control" id="bio" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <style>
        .card {
          animation: slideInFromLeft 0.5s ease-in-out;
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
    </main>
    <footer>
      <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
