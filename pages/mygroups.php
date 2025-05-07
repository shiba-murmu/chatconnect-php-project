<?php
include '../modules/managesessions.php';

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
    <!-- This css is used for hero page where the background image is
    set to all the -->
    <link rel="stylesheet" href="../pages/styles/hero.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        main {
            min-height: 91vh;
            /* background-color: darkslategrey; */
            /* padding-top: rem; */
            /* padding-bottom: 2rem; */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-image: var(--background-image);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            object-fit: cover;
        }

        .mycontainer {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            flex-direction: row;
            gap: 2rem;
            /* overflow: scroll; */
            width: 80%;
            overflow-x: hidden;
            gap: 6rem;
        }

        .mycontainer::-webkit-scrollbar {
            width: 5px;
        }

        .mycontainer::-webkit-scrollbar-thumb {
            background-color: var(--scrollbar-color);
            border-radius: 10px;
        }

        .card {
            box-shadow: 0 0 10px rgba(0, 0, 0, 1);
        }

        /* For scrolling */
        /* inbox to scroll */
        /* For applying this scrolling indicator */
        /* first have to fix the height of the container 
        like max-height of the container then it will be applied there */
        .messages-container {
            /* max-height: 75vh; */
            /* Set a maximum height */
            max-height: 75vh;
            overflow-y: auto;
            /* Enable vertical scrolling */
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
            /* Hidden by default */
        }
    </style>

</head>

<body>
    <header>
        <?php
        // use here only otherwise header
        // will change some property 
        include '../components/header.php';
        ?>
        <!-- place navbar here -->
    </header>
    <main>
        <h1 class="text-white p-0 mb-2">My Groups</h1>
        <div class="mycontainer messages-container">







            <?php
            for ($i = 0; $i < 20; $i++) {
                echo '
              <div class="card h-100 w-25 border-0">
                <div class="card-header text-white fw-bold bg-primary">
                    <h5 class="card-title">Group name</h5>
                </div>
                <div class="card-body">
                ';
                // here p tags needs a logic that words should be limited
                // to 15 words if not then p tag will take large space in
                // the screen
                echo '
                    <p class="card-text fw-lighter">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                    <a href="../pages/groupchat.php" class="btn btn-primary fs-6 fw-lighter">View</a>
                    <a href="#" class="btn btn-danger fs-6 fw-lighter">Delete</a>
                </div>
            </div>
            ';
            }
            ?>










        </div>

        <!-- For scrolling this is the indicator -->
        <div id="scroll-indicator" class="scroll-down-indicator">
            ⬇ Scroll to see more
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