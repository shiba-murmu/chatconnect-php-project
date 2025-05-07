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
    <!-- this is used for design the text -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet">
    <!-- This css is used for hero page where the background image is
    set to all the pages. -->
    <link rel="stylesheet" href="../pages/styles/hero.css">
    <!-- Custom CSS -->
    <style>
        * {
            /* font-family: 'Playwrite GB S', sans-serif; */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        main {
            background-image: var(--background-image);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            object-fit: cover;
            /* z-index: -3; */
            height: 91vh;
        }

        ::-webkit-scrollbar {
            display: none;
            /* width: 68px; */
            /* z-index: 4383; */
        }


        .online-friend-list {
            display: flex;
            /* flex-wrap: wrap; */
            /* justify-content: center;
            align-items: center; */
        }

        .online-friend-list::-webkit-scrollbar {
            display: block;
            width: 5px;
            /* background-color: ; */
        }

        .online-friend-list::-webkit-scrollbar-thumb {
            background-color: var(--scrollbar-color);
            border-radius: 10px;
        }

        .online-friend-item {
            margin: 10px;
            padding: 10px;
            display: flex;
            align-items: center;
            background-color: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }


        .heading {
            font-family: "Playwrite GB S", cursive;
            font-optical-sizing: auto;
            font-weight: 700;
            font-style: normal;
            font-size: 2rem;
            color: white;
        }


        /* For scrolling */
        /* inbox to scroll */
        /* For applying this scrolling indicator */
        /* first have to fix the height of the container 
        like max-height of the container then it will be applied there */
        .messages-container {
            max-height: 37rem;
            /* Set a maximum height */
            /* border : 3px solid white; */
            /* box-shadow: 2px 2px 2px 2px rgba(19, 17, 17, 0.2); */
            border-radius: 10px;
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
        include '../database/connect.php';
        // use here only otherwise header
        // will change some property 
        include '../components/header.php';

        ?>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container p-0">
            <div class="row p-0">
                <div class="col-12 p-0">
                    <span class="heading">Online Friends:</span>
                    <div class="online-friend-list d-flex  flex-wrap justify-content-center align-items-center p-0 messages-container">
                        <?php
                        // Assuming $onlineFriends is an array of online friends
                        // $onlineFriends = [
                        //     ['name' => $name, 'image' => $image],
                        //     // ['name' => 'Bob', 'image' => '../assets/images/sb.jpg'],
                        //     // Add more friends here
                        // ];
                        // for ($i = 0; $i < 200; $i++) {

                        //     foreach ($onlineFriends as $friend) {
                        //         echo '
                        //         <a href="../pages/singleuserprofile.php" class="online-friend-item d-flex text-black bg-secondary-emphasis  border-0 text-decoration-none justify-content-center align-items-center flex-column" style="width: 10rem; height: 10rem;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        //             <img src="' . $friend['image'] . '" style="width: 6rem; height: 6rem; object-fit: cover; border-radius: 50%; border: 2px solid green;" class="my-1" alt="' . $friend['name'] . '">
                        //             <p style="font-size : 0.2rem;" class="m-0 p-0 ms-2 text-center">' . $friend['name'] . '</p>
                        //             <p style="font-size : 0.2rem;" class="m-0 p-0 text-success ms-2">Online</p>
                        //         </a>
                        //     ';
                        //     }
                        // }
                        ?>
                    </div>
                    <!-- For scrolling this is the indicator -->
                    <div id="scroll-indicator" class="scroll-down-indicator">
                        ⬇ Scroll to see more
                    </div>
                </div>
            </div>
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