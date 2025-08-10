<?php
require_once "./user/components/checkVisitorToken.php";
$page = "Visitor Page";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Visit – Digital Campus Concierge</title>
    <script src="./user/js/app.js" type="module"></script>
    <?php include "./global/links.php" ?>
    <?php include "./user/components/switch.php" ?>
    <script src="./user/js/theme.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />

    <style>
        #qrcode img,
        #qrcode canvas {
            width: 100% !important;
            height: auto !important;
            image-rendering: pixelated;
        }
    </style>
</head>

<body>

    <div class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">

        <div class="overflow-hidden">
            <div class="mx-6 md:mx-10 lg:mx-25 h-screen grid grid-cols-12">
                <div class="col-span-8" id="visit-panorama"></div>
                <div class="col-span-4 p-8 overflow-auto">

                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-2">
                        <i class="fa-solid fa-circle-info text-green-500 me-2"></i>
                        <span id="location_name"></span>
                    </h2>

                    <p class="text-gray-600 dark:text-gray-300 mb-4" id="location_desc">
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
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                            <button type="button" class="splide__arrow splide__arrow--next">
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                        </div>

                        <!-- bullets (optional) -->
                        <ul class="splide__pagination"></ul>
                    </div>

                    <!-- Tags with Icons -->
                    <div class="flex flex-wrap gap-2 mt-5" id="tagsCont">

                    </div>
                    <div class="text-center mt-8 px-4">
                        <h2 class="text-3xl font-bold mb-3 text-gray-900 dark:text-white">Continue on Your Mobile</h2>

                        <div class="grid grid-cols-2 gap-5">
                            <!-- QR Code Option -->
                            <div tabindex="0" onclick="generateQRCode()"
                                class="flex flex-col items-center bg-white dark:bg-gray-800 p-4 rounded-xl shadow-md hover:shadow-lg hover:scale-105 focus:scale-105 focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-500 transition-all duration-200 cursor-pointer outline-none">
                                <i class="fa-solid fa-qrcode text-blue-600 dark:text-blue-400 text-4xl mb-4"></i>
                                <p class="text-sm text-gray-800 dark:text-gray-200 font-medium">Scan QR Code</p>
                            </div>

                            <!-- Email Option -->
                            <div tabindex="0" id="sendEmail"
                                class="flex relative flex-col items-center bg-white dark:bg-gray-800 p-4 rounded-xl shadow-md hover:shadow-lg hover:scale-105 focus:scale-105 focus:ring-2 focus:ring-green-400 dark:focus:ring-green-500 transition-all duration-200 cursor-pointer outline-none">
                                <i class="fa-regular fa-envelope text-green-600 dark:text-green-400 text-4xl mb-4"></i>
                                <p class="text-sm text-gray-800 dark:text-gray-200 font-medium">Send to Email</p>
                                <div class="absolute w-full h-full top-0 rounded-xl bg-gray-800 hidden items-center justify-center z-1"
                                    id="intervalCont">
                                    <span class="text-white text-2xl font-bold" id="interval">1:30</span>
                                </div>
                                <div role="status"
                                    class="hidden absolute w-full h-full top-0 items-center justify-center bg-gray-800 z-1 rounded-xl"
                                    id="spinner">
                                    <svg aria-hidden="true"
                                        class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="currentColor" />
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentFill" />
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 italic mt-5">
                            *An active internet connection is required to continue on mobile.
                        </p>
                    </div>
                    <div id="demo"></div>
                    <div id="qrcode" class="flex items-center justify-center my-2 mt-4"></div>
                    <button type="button" id="visitNew"
                        class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">Visit
                        New Location</button>
                </div>


            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
    <script>
        let qrCode;

        function generateQRCode() {
            const qrElement = document.getElementById("qrcode");

            qrElement.innerHTML = "";
            qrCode = new QRCode(qrElement, {
                text: "http://localhost:8080/scanned?scan_token=<?php echo $_COOKIE['visit_token'] ?>", //
            });

            document.getElementById("qrcode").style.padding = "10px"
            document.getElementById("qrcode").style.backgroundColor = "white"
        }
    </script>
</body>

</html>