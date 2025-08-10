<?php
require 'vendor/autoload.php';
include "./lib/key.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if (isset($_GET['scan_token'])) {
    try {
        $decoded = JWT::decode($_GET['scan_token'], new Key($key, 'HS256'));
    } catch (Exception $e) {
        // Clear invalid token
        setcookie("scan_token", "", time() - 3600, "/");
        echo "
            <script>
            alert('Invalid Token');
            window.location.href = '/unauthorize';
            </script>";
        exit();
    }
} else {
    header("Location: /unauthorize");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Scanned – Digital Campus Concierge</title>
    <?php include "./global/links.php" ?>
    <script src="./user/js/theme.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />
    <script type="module" src="./user/js/scanned.js"></script>
    <style>
        @media only screen and (min-width: 0px) and (max-width: 1024px) {
            #visit-panorama {
                height: 500px;
            }
        }
    </style>
</head>

<body>

    <div class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200 overflow-hidden">
        <div class="overflow-hidden">
            <!-- Responsive Grid -->
            <div class="min-h-screen grid grid-cols-1 lg:grid-cols-12">
                <!-- Panorama -->
                <div class="col-span-full lg:col-span-8" id="visit-panorama">
                </div>

                <!-- Right Panel -->
                <div class="col-span-full lg:col-span-4 p-4 lg:p-8 overflow-auto">

                    <!-- Title -->
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-2">
                        <i class="fa-solid fa-circle-info text-green-500 me-2"></i>
                        <span id="location_name"></span>
                    </h2>

                    <!-- Description -->
                    <p class="text-gray-600 dark:text-gray-300 mb-4" id="location_desc"></p>

                    <!-- Carousel -->
                    <div id="visit_splide" class="splide w-full h-[300px] lg:h-96">
                        <div class="splide__track h-full">
                            <ul class="splide__list">
                                <!-- slides injected here -->
                            </ul>
                        </div>
                        <!-- Arrows -->
                        <div class="splide__arrows">
                            <button type="button" class="splide__arrow splide__arrow--prev">
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                            <button type="button" class="splide__arrow splide__arrow--next">
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                        </div>
                        <!-- Pagination -->
                        <ul class="splide__pagination"></ul>
                    </div>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2 mt-5" id="tagsCont"></div>

                    <!-- Feedback Form -->
                    <form class="mt-5" id="feedbackForm">
                        <!-- Hidden Inputs -->
                        <input type="hidden" name="fname" value="<?php echo $decoded->data->user_data->fname ?>">
                        <input type="hidden" name="lname" value="<?php echo $decoded->data->user_data->lname ?>">
                        <input type="hidden" name="email" value="<?php echo $decoded->data->user_data->email ?>">

                        <div
                            class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                            <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                                <label for="message" class="sr-only">Your comment</label>
                                <textarea id="message" rows="4" name="message"
                                    class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                    placeholder="Write a feedback..." required></textarea>
                            </div>
                            <div
                                class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600 border-gray-200">
                                <button type="submit"
                                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                    Submit feedback
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Community Guidelines -->
                    <p class="ms-auto text-xs text-gray-500 dark:text-gray-400">
                        Remember, contributions to this topic should follow our
                        <a href="#" data-popover-target="popover-community" data-popover-placement="top"
                            class="text-blue-600 dark:text-blue-500 hover:underline">Community Guidelines</a>.
                    </p>

                    <!-- Popover -->
                    <div data-popover id="popover-community" role="tooltip"
                        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                        <div class="px-3 py-2">
                            <p>Make sure your feedback is respectful, constructive, and follows our rules on language
                                and relevance.</p>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>