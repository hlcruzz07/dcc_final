<?php
require_once "./user/components/checkUserToken.php";
require_once "./user/components/checkVisitorToken.php";
$page = "Visitor Page";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About – Digital Campus Concierge</title>
    <script src="./user/js/app.js" type="module"></script>
    <?php include "./global/links.php" ?>
    <?php include "./user/components/switch.php" ?>
    <script src="./user/js/theme.js"></script>
</head>

<body>

    <div class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">

        <div class="overflow-hidden">
            <div class="mx-6 md:mx-10 lg:mx-25 h-screen border grid grid-cols-12">
                <div class="border border-red-500 col-span-8" id="visit-panorama"></div>
                <div class="border border-blue-500 col-span-4 p-4 overflow-auto">
                    <!-- Location Name with Icon -->
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-2">
                        <i class="fa-solid fa-circle-info text-green-500 me-2"></i>
                        Talisay City Plaza
                    </h2>

                    <!-- Description with Icon -->
                    <p class="text-gray-600 dark:text-gray-300 mb-4">

                        A peaceful public park located in the heart of Talisay City. Perfect for afternoon strolls and
                        community events.
                    </p>

                    <!-- Carousel -->
                    <div id="visit_splide" class="splide w-full h-96">
                        <div class="splide__track h-full">
                            <ul class="splide__list">
                                <!-- slides injected here -->
                            </ul>
                        </div>

                        <!-- arrows (optional) -->
                        <div class="splide__arrows">
                            <button type="button" class="splide__arrow splide__arrow--prev">
                                <i class="fa-solid fa-chevron-left"></i>
                            </button>
                            <button type="button" class="splide__arrow splide__arrow--next">
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                        </div>

                        <!-- bullets (optional) -->
                        <ul class="splide__pagination"></ul>
                    </div>

                    <!-- Tags with Icons -->
                    <div class="flex flex-wrap gap-2 mt-4">
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full dark:bg-blue-900 dark:text-blue-300">
                            Public Park
                        </span>
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full dark:bg-green-900 dark:text-green-300">
                            Family-friendly
                        </span>
                        <span
                            class="bg-yellow-100 text-yellow-800 text-xs font-medium px-3 py-1 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                            Open Space
                        </span>
                    </div>
                </div>


            </div>
        </div>

    </div>
</body>

</html>