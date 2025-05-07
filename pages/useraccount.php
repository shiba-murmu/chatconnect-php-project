<?php
include '../modules/managesessions.php';
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/x-icon" href="../assets/icons/group.png" title="group icons">
  <title>My account</title>
  <!-- Required meta tags -->
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- this is used for design the text -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet">

  <!-- This css is used for hero page where the background image is
    set to all the pages. -->
  <link rel="stylesheet" href="../pages/styles/hero.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      color: black;
    }

    /* Not displaying the 
    side scrollbar */
    ::-webkit-scrollbar {
      display: none;
    }

    .container {
      box-shadow: 0 0 3px 2px rgba(19, 17, 17, 0.2);
    }

    .profileSections {
      height: 5.5rem;
      width: 30%;
      box-shadow: 0 0 3px 2px rgba(19, 17, 17, 0.2);
      border-radius: 0.5rem;
      margin-right: 2rem;
      padding: 0.5rem;
      display: flex;
      justify-content: start;
      align-items: start;
      flex-direction: column;
    }

    .profileSections2 {
      height: 3rem;
      width: 18%;
      box-shadow: 0 0 3px 2px rgba(19, 17, 17, 0.2);
      border-radius: 0.5rem;
      margin-right: 2rem;
      padding: 0.5rem;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: row;
      gap: 1rem;
    }

    .animate {
      background-color: aqua;
    }

    .animate,
    .profileSections2:hover {
      color: white;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
    }

    .animate:hover {
      transform: scale(1.1);
      box-shadow: 0 0 6px 3px rgba(19, 17, 17, 0.2);
    }

    span {
      color: black;
      font-size: 1rem;
      border-radius: 0.5rem;
    }

    h3 {
      font-family: "Playwrite GB S", cursive;
      font-optical-sizing: auto;
      font-weight: 700;
      font-style: normal;
      font-size: 1.5rem;
    }

    .main-container {
      /* border: 2px solid yellow; */
      /* background-color: rgb(100, 250, 200); */
      /* background-image: var(--background-image); */
      background-image: url(../assets/images/3.jpg);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      object-fit: cover;
    }

    h5 {
      color: rgb(0, 165, 198);
    }

    #notes {
      color: rgb(0, 165, 198);
      background-image: url(../assets/images/3.jpg);
      background-position: center;
      background-size:  cover;
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>
</head>

<body>
  <!-- place navbar here -->
  <header>
    <?php
    include '../components/header.php';
    include '../database/connect.php';
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `users` WHERE `id` = $user_id";
    $row = mysqli_query($conn, $sql);
    $row = $row->fetch_assoc();
    $user_name = $row['username'];
    $user_email = $row['email'];
    $name = $row['fname'];
    $name = strtoupper($name);
    // retrieve image
    $sql = "SELECT * FROM `images` WHERE `userid` = $user_id";
    $row = mysqli_query($conn, $sql);
    $row = $row->fetch_assoc();
    $image = $row['userimage'];
    ?>
    <!-- backend -->
  </header>
  <main class="messages-container">
    <div class="container-fluid  p-5 main-container">
      <div class=" d-flex">
        <section style="width: 20rem; height: fit-content;">
          <img
            src="<?php echo $image; ?>"
            alt="Profile picture"
            style="object-fit: cover; border: 5px solid lightblue;"
            height="250px"
            width="250px"
            class="rounded-circle border-4 mx-2" />
        </section>
        <section class="mx-3" style="display: flex;flex-direction: column;justify-content: center; width:fit-content; min-width: 20rem;">
          <h3 class="m-o fw-bold text-white" style="display: inline;"><?php echo $name; ?></h3>
          <span class="text-secondary fs-5 m-0 fw-semibold">@<?php echo $user_name; ?></span>
        </section>
        <section style="width: 100%;border: 2px soli lime; ">
          <!-- update profile button -->
          <button
            class="btn btn-secondary text-white m-2 fw-bold"
            type="button"
            style="float: right;"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample"
            aria-controls="offcanvasExample">
            <i class="fa-solid fa-bars me-2 text-black" style="font-size: 1.2rem;"></i>
            <span style="font-size: 1.2rem;">Update Profile</span>
          </button>
        </section>
        <!-- </div> -->
      </div>
      <div class="d-flex my-3" style="gap: 5rem; justify-content: space-evenly;">
        <a href="../pages/friendlist.php" class="btn btn-info profileSections2 animate">
          <h5 class="text-dark p-0">Friends</h5>
          <?php

          $sqlToCheckFriends = "SELECT * FROM `friendlist` WHERE `sender_id` = $user_id";
          $row = mysqli_query($conn, $sqlToCheckFriends);
          if ($row->num_rows > 0) {
            echo '<span class="pb-1 bg-warning px-2 rounded-1" style="background: none">' . $row->num_rows . '</span>';
          } else {
            echo '<span class="pb-1 bg-warning px-2 rounded-1" style="background: none">0</span>';
          }

          ?>
          <!-- <span class="" style="background: none">0</span> -->
        </a>
        <section class="profileSections2 animate">
          <h5 class="text-dark">Groups</h5>
          <span class="pb-1 bg-warning px-2 rounded-1" style="background: none">0</span>
        </section>
        <section class="profileSections2 animate">
          <h5 class="text-dark">Posts</h5>
          <span class="pb-1 bg-warning px-2 rounded-1" style="background: none">0</span>
        </section>
      </div>


      <div class="row d-flex justify-content-center">
        <section class="profileSections animate">
          <h5 class="text-center w-100 text-dark">Email</h5>
          <span class="text-center w-100"><?php echo $user_email; ?></span>
        </section>
        <section class="profileSections animate">
          <?php
          $sqlForData = "SELECT * FROM `userotherdata` WHERE `userid` = $user_id";
          $row = mysqli_query($conn, $sqlForData);

          // Pending works
          ?>
          <h5 class="text-center w-100 text-dark">Date of birth</h5>
          <span class="text-center w-100">12/02/2016</span>
        </section>
        <section class="profileSections animate">
          <h5 class="text-center w-100 text-dark">Phone</h5>
          <span class="text-center w-100">6204476413</span>
        </section>
      </div>




      <div class="row d-flex">
        <div class="mt-3 mb-4">
          <section>
            <!-- <span>User Name</span> -->
            <h5 class="mb-3">Gender</h5>
            <span style=" font-size: 15px; font-weight: 600">Male</span>
          </section>
        </div>


      </div>

      <div class=" mb-4">
        <section>
          <!-- <span>User Name</span> -->
          <h5 class="mb-3">Education</h5>
          <span style=" font-size: 15px; font-weight: 600">Bachelor</span>
        </section>
      </div>
      <div class="mt-3 mb-4">
        <section>
          <!-- <span>User Name</span> -->
          <h5 class="mb-3">College</h5>
          <span style=" font-size: 15px; font-weight: 600">Maryland Institute Of Technology And Management , Chorinda</span>
        </section>
      </div>

      <div class="mt-3 mb-4">
        <section>
          <!-- <span>User Name</span> -->
          <h5 class="mb-3">Joined :</h5>
          <span style=" font-size: 15px; font-weight: 600">17/10/2024</span>
        </section>
      </div>

      <div class="mt-3 mb-4">
        <section>
          <!-- <span>User Name</span> -->
          <h5 class="mb-3">Address :</h5>
          <span style=" font-size: 15px; font-weight: 600">Tata , Jamshedpur , Gamharia (DBC)
          </span>
        </section>
      </div>
      <div class="mt-3 mb-4">
        <section>
          <!-- <span>User Name</span> -->
          <h5 class="mb-3">Instagram</h5>
          <span style=" font-size: 15px; font-weight: 600">Shibamurmujsr</span>
        </section>
      </div>
      <div class="mt-3 mb-4">
        <section>
          <!-- <span>User Name</span> -->
          <h5 class="mb-3">Facebook</h5>
          <span style=" font-size: 15px; font-weight: 600">Shiba Murmu</span>
        </section>
      </div>

      <div class="mt-3 mb-4">
        <section>
          <!-- <span>User Name</span> -->
          <h5 class="mb-3">Link</h5>
          <a
            href="https://www.google.co.in/>"
            class="text-decoration-none  rounded p-1">www.google.com</a>
        </section>
      </div>

      <div class="mt-3 mb-4">
        <section>
          <!-- <span>User Name</span> -->
          <h5 class="mb-3">Link</h5>
          <a
            href="https://www.google.co.in/>"
            class="text-decoration-none  rounded p-1">www.google.com</a>
        </section>
      </div>

      <div class="mt-3 mb-4">
        <section>
          <!-- <span>User Name</span> -->
          <h5 class="mb-3">Link</h5>
          <a
            href="https://www.google.co.in/>"
            class="text-decoration-none   rounded p-1">www.google.com</a>
        </section>
      </div>

      <div class="mt-3 mb-3 p-5 rounded text-white" id="notes">
        <p class="text-white">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas
          aut minima vero a sunt eum, veritatis voluptatum exercitationem ea
          aliquam vitae accusantium quisquam delectus, aperiam laboriosam.
          Ipsam adipisci facilis nisi? Quo velit at, excepturi sunt saepe
          assumenda suscipit error minima expedita! Iusto, impedit molestiae
          doloremque illum excepturi repellat quidem sed unde illo iste
          voluptates temporibus ipsam consequatur fugit aperiam totam.
          Possimus magnam quaerat adipisci? Officiis voluptatem molestias modi
          est sapiente adipisci ea, eaque accusantium minus sed cumque nobis
          nisi cum unde labore aperiam debitis quas eius qui dignissimos
          placeat. Animi? Id beatae aut eveniet amet blanditiis, recusandae
          commodi quia nam? Cum, quisquam ut assumenda vel minus quo id odio
          consectetur? Beatae similique officia accusantium praesentium
          labore, magni deleniti eveniet? Nesciunt! Recusandae iste, dicta
          adipisci quos laborum dolorum maxime cupiditate dolor quibusdam,
          maiores possimus rerum aut aliquid minima id obcaecati error unde
          inventore. Porro doloribus vel asperiores illo! Quidem, atque
          voluptatibus. Possimus molestias id quod, nam placeat rem natus vero
          eveniet odit corrupti quae in, amet architecto vel odio? Labore
          laudantium ipsa iste laboriosam modi minima et excepturi dolorum.
          Voluptates, iusto? Assumenda vitae quaerat maxime perspiciatis
          excepturi laudantium temporibus magni deserunt, facere impedit
          sapiente quod quibusdam consequuntur ipsam! Provident cumque
          obcaecati, quidem, amet ea quia, expedita aspernatur nulla ratione
          ipsam ducimus! Earum saepe corporis tempore, debitis nesciunt
          officiis nam hic veritatis et itaque commodi minus quisquam impedit
          natus quasi architecto, dolor temporibus fuga. Maiores repellendus
          adipisci harum odit non quam facere. Cumque reiciendis voluptate
          excepturi quam vitae alias aspernatur nesciunt, laborum esse eaque
          magni beatae molestias nostrum earum recusandae a amet. Alias
          aspernatur illo ipsum ducimus officia ab dignissimos laudantium
          blanditiis? Fugiat illum provident alias sed saepe doloremque enim?
          Ad tenetur perferendis excepturi officiis. Expedita quae, voluptas
          similique culpa earum dolor facere consectetur qui enim, nostrum
          omnis saepe, odit amet distinctio.

          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et necessitatibus quos ab, labore recusandae sunt dolores odit quam ipsum sint repellendus dignissimos iure, totam nam tempora officiis fugit. Debitis, ad.
          Perferendis magnam quis quae perspiciatis voluptatum error dolorem. At, aut debitis, temporibus vero cumque, beatae cupiditate necessitatibus delectus vitae asperiores odio officia reprehenderit. Voluptates quia quo expedita enim rerum reprehenderit.
          Impedit odio excepturi magnam, quas aliquid iure atque magni tempora vero beatae perspiciatis deserunt laboriosam officia obcaecati? Corporis distinctio nobis beatae ut autem eius consequatur incidunt obcaecati delectus perferendis. Vel.
          Consequuntur, amet esse sunt doloremque expedita aliquid! Dolor beatae itaque ipsa explicabo harum voluptas deleniti totam. Quaerat repellat esse repudiandae accusantium voluptas accusamus vero nihil voluptatum deleniti iste, maiores adipisci.
          Quas, id perferendis accusamus atque ut illum fuga, maiores nulla beatae culpa aliquid libero. Quis necessitatibus laborum pariatur ipsa quisquam animi molestias tenetur, dignissimos omnis suscipit quae in accusantium amet.
          Eos nam nesciunt officiis quo neque veritatis ut tenetur. Modi ea voluptatibus animi, aut eos non tempore saepe quod doloribus illum quisquam soluta reiciendis nam, maiores aliquid, excepturi dicta enim?
          Repudiandae eligendi consectetur voluptate cumque voluptatibus enim debitis placeat, porro repellat ea numquam deleniti unde? Omnis temporibus rem dolor, aliquam, est ipsum beatae quos similique error veritatis eveniet quas culpa?
          Voluptates ex sunt consequuntur nihil ducimus. Veniam neque quaerat nihil ad, inventore rerum illo deserunt in cum iusto, dicta nostrum suscipit perferendis est culpa voluptatum architecto? Magnam obcaecati qui necessitatibus?
          Ut quae repellat consequuntur veritatis aliquid odit quasi odio placeat, provident hic cupiditate quam alias vel sed praesentium doloremque. Placeat animi pariatur possimus asperiores dolore repudiandae doloribus iusto, consequatur repellendus.
          Soluta aliquam odit ipsum? Aspernatur suscipit qui eveniet, numquam minus velit perferendis eum, magni eius explicabo vitae, quisquam laboriosam ratione accusamus commodi placeat voluptatem tempore. Optio, minima? Incidunt, aut asperiores.
          Distinctio numquam natus dolorum, exercitationem itaque rem error dignissimos repellat magni vel laudantium officia. Sit dolorem maiores rem esse, natus, modi vero iusto ducimus exercitationem amet eius eos hic ut?
          Illum nulla explicabo aspernatur harum soluta adipisci natus eligendi voluptatem sint corrupti qui cumque ducimus voluptate, amet iure at maxime. Eum sit ipsum enim. Quibusdam animi ullam unde earum voluptates.
          Ab, eligendi. Fugiat voluptatibus minus totam laudantium consectetur cumque hic est expedita doloribus sit, deleniti tenetur ipsa minima neque deserunt dolorem molestiae repudiandae error natus itaque libero blanditiis sapiente! Fugit!
          Repudiandae magni atque et odit officiis quia numquam. Rerum tempore fugit fuga aspernatur quas culpa temporibus, hic dolorum, libero officiis cupiditate rem enim dolor aut perspiciatis exercitationem, quis mollitia. Vel.
          Veniam praesentium id suscipit dicta ipsa est dolore repudiandae itaque quibusdam aliquid harum fugiat voluptates possimus impedit, nisi fuga? Reprehenderit sint eum corporis iste ducimus corrupti ipsa quos, maiores tempore?
          Totam autem earum quibusdam cupiditate sunt, ipsum eum, laboriosam, a dignissimos dicta ducimus et similique expedita ratione ut nemo esse mollitia quod. Tempora cumque quia aliquid necessitatibus ut vel et!
          Ut incidunt asperiores dolore hic, mollitia porro, quisquam rerum laborum tempora numquam repellat cupiditate accusantium officiis enim cum nesciunt voluptatem nihil facilis commodi, quam minus deserunt! Magni neque provident cupiditate?
          Magni adipisci totam quo consectetur beatae qui commodi inventore deleniti fuga dolorum officia repudiandae praesentium repellendus vero exercitationem recusandae rem, dicta officiis sed laudantium alias minus necessitatibus dignissimos? Fugiat, atque!
          Earum blanditiis cumque itaque voluptate vero magnam quas asperiores deleniti harum illum assumenda, temporibus, dignissimos facilis perferendis possimus placeat eum a voluptatibus aut magni autem incidunt! Sunt doloribus assumenda neque?
          Quaerat cupiditate facere sapiente, asperiores ut modi soluta consectetur a, quasi amet itaque, exercitationem fuga nisi assumenda eveniet doloribus eius iste excepturi! Officia pariatur voluptates eos nesciunt fugiat tempora similique?
        </p>
      </div>



      <div class="d-flex justify-content-center gap-3 p-4 mt-3">
        <!-- This is another tab for change the settings to the user -->
        <div>
          <!-- <a
              class="btn btn-primary"
              data-bs-toggle="offcanvas"
              href="#offcanvasExample"
              role="button"
              aria-controls="offcanvasExample"
            >
              Link with href
            </a> -->


          <div
            class="offcanvas offcanvas-start background-transparent border-0"
            tabindex="-1"
            id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header bg-dark bg-gradient">
              <h5 class="offcanvas-title text-warning text-center fw-bold fs-3" id="offcanvasExampleLabel">
                UPDATE PROFILE
              </h5>
              <button
                type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-info bg-gradient text-center  d-flex justify-content-center">
              <div class="list-group w-100">
                <a
                  href="../pages/sendedrequest.php"
                  class="list-group-item text-white bg-primary  fs-5 fw-lighter  rounded-3 border-none  list-group-item-action">
                  Requested users
                </a>
                <a
                  href="../pages/otheruserdata.php"
                  class="list-group-item bg-primary text-white  fs-5 fw-lighter mt-4 rounded-3 border-none  list-group-item-action">Edit profile</a>
                <a
                  href="#"
                  class="list-group-item bg-primary text-white mt-4  fs-5 fw-lighter rounded-3 border-none list-group-item-action">A third link item</a>
                <a
                  href="../pages/accountsetting.php"
                  class="list-group-item bg-primary  mt-4 text-white  fs-5 fw-lighter rounded-3 border-none  list-group-item-action">Setting</a>
                <a
                  href="../modules/logout.php"
                  class="list-group-item bg-danger mt-4  fs-5 fw-lighter rounded-3 text-white border-none  list-group-item-action">Logout</a>
                <a
                  class="list-group-item bg-primary text-secondary-emphasis mt-4  fs-5 fw-lighter rounded-3 border-none  list-group-item-action disabled"
                  aria-disabled="true">A disabled link item</a>

                <div class="dropdown">
                  <button
                    class="btn bg-primary  fs-5 fw-lighter text-white border-primary border-0 p-2 mt-4 dropdown-toggle rounded-3 w-100"
                    type="button"
                    data-bs-toggle="dropdown">
                    Update your profile details
                  </button>
                  <ul class="dropdown-menu bg-warning p-0  w-75">
                    <li>
                      <a class="dropdown-item  fs-5 fw-lighter" href="../pages/uploadphoto.php">Upload profile photo</a>
                    </li>
                    <li>
                      <a class="dropdown-item  fs-5 fw-lighter" href="#">Change username</a>
                    </li>
                    <li>
                      <a class="dropdown-item  fs-5 fw-lighter" href="#">Change number</a>
                    </li>
                    <li>
                      <a class="dropdown-item fs-5 fw-lighter" href="../modules/deleteprofilephoto.php">Delete profile picture</a>
                    </li>
                    <li>
                      <a class="dropdown-item  fs-5 fw-lighter" href="../pages/passwordchange.php">Change password</a>
                    </li>
                    <li>
                      <a class="dropdown-item  fs-5 fw-lighter" href="#">Change email</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <a href="../pages/passwordchange.html" class="btn btn-warning">Change password</a> -->
      </div>
    </div>
  </main>
  <!-- <div id="scroll-indicator" class="scroll-down-indicator">
    ⬇ Scroll to see more
  </div> -->
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