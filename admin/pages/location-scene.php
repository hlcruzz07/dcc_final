<?php
require_once "./admin/components/checkToken.php";
$page = "Location Scene";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page ?></title>
    <?php
    include "./global/links.php";
    include "./admin/components/drawer.php";
    include "./admin/components/modal.php";

    ?>
    <script type="module" src="./admin/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />
    <style>
    .custom-hotspot {
        width: 32px;
        height: 32px;
        background: url("https://cdn-icons-png.flaticon.com/512/684/684908.png") center/contain no-repeat;
        cursor: pointer;
    }

    .destination-hotspot {
        width: 32px;
        height: 32px;
        background: url("https://cdn-icons-png.flaticon.com/512/252/252025.png") center/contain no-repeat;
        cursor: pointer;
    }
    </style>
</head>

<body>

    <div
        class="grid grid-cols-12 transition-all ease-in-out duration-500 h-screen max-h-screen overflow-auto bg-green-100">
        <?php
        include "./admin/components/sidebar.php";
        include "./admin/components/switch.php";
        ?>


        <!-- Main Content Area -->
        <div
            class="col-span-12 xl:col-span-10 min-h-screen overflow-auto bg-green-100 dark:bg-emerald-900 shadow-md p-5">
            <?php include "./admin/components/header.php" ?>
            <div class="bg-white dark:bg-gray-800 rounded-lg mt-5 overflow-auto">
                <div
                    class="flex flex-col gap-5 smg:gap-0 sm:flex-row sm:items-center justify-between border-b border-gray-300 dark:border-gray-700 p-5 px-7">
                    <h1 class="font-medium text-md sm:text-xl text-gray-900 dark:text-gray-100">
                        <?php echo $_GET['location_name']  ?> Scene

                    </h1>
                    <button type="button" data-modal-toggle="add-scene-modal"
                        class="focus:outline-none text-xs text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 font-medium rounded-lg px-5 py-2.5 me-2">
                        <i class="fa-solid fa-plus me-1"></i>Add Scene
                    </button>
                </div>
                <div class="" id="display_scene" style="height: 80vh;">

                </div>

            </div>


        </div>
    </div>
</body>

</html>