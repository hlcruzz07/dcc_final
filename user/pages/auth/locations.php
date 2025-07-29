<?php
require_once "./user/components/checkUserToken.php";
$page = "locations";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Locations – Digital Campus Concierge</title>
    <script src="./user/js/app.js" type="module"></script>
    <?php include "./global/links.php" ?>
    <?php include "./user/components/switch.php" ?>
    <?php include "./user/components/modal.php" ?>
    <script src="./user/js/theme.js"></script>
</head>

<body>

    <div class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
        <?php include "./user/components/header.php" ?>


        <div class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
            <!-- Hero -->
            <div class="relative">
                <img src="./assets/img/chmsu-tal.jpg" alt="CHMSU Campus"
                    class="w-full h-150 object-cover brightness-75 rounded-b-xl" />
                <div class="absolute inset-0 flex items-center justify-center">
                    <h1 class="text-3xl z-10 sm:text-4xl font-extrabold text-white drop-shadow-lg">
                        Locations of Digital Campus Concierge
                    </h1>
                </div>
                <div class="absolute w-full h-full bg-black/50 z-0 top-0"></div>
            </div>

            <!-- Content -->
            <div class="mx-6 md:mx-10 lg:mx-30 xl:mx-45 py-20 space-y-16 relative">
                <form id="location-search-form" class="sticky z-10 top-20">
                    <div class="flex">
                        <select id="location_type" name="location_type"
                            class="bg-gray-50 border border-gray-300 font-medium text-gray-900 text-sm rounded-s-lg border-s-gray-100 dark:border-s-gray-700 border-s-2 focus:ring-green-500 focus:border-green-500 block w-max dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                            <option value="" selected>All Categories</option>
                            <option value="Building">Building</option>
                            <option value="Facility">Facility</option>
                            <option value="Room">Room</option>
                            <option value="Office">Office</option>
                        </select>
                        <button id="tags" data-dropdown-toggle="tags-dropdown"
                            class="shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                            type="button">Location Tags<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <div id="tags-dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 max-h-96 overflow-auto">
                            <ul class="text-sm text-gray-700 dark:text-gray-200 grid grid-cols-2" id="tags-container">

                            </ul>
                        </div>
                        <div class="relative w-full">
                            <input type="search" id="location-search" name="location_search"
                                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-green-500"
                                placeholder="Search Buildings , Facilities , Rooms and Offices..." required />
                            <button type="submit"
                                class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-green-700 rounded-e-lg border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>

                    </div>
                </form>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5" id="location-container">

                    <!-- <div
                            class="group shadow-md p-8 rounded-xl bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 ">
                            <div class="overflow-hidden rounded-2xl">
                                <img src="./assets/img/chmsu-tal.jpg"
                                    class="w-full h-90 object-cover group-hover:scale-120 transition-all duration-300"
                                    alt="">
                            </div>
                            <div class=" pt-3">
                                <h1 class="font-extrabold text-lg">Cashier's Office</h1>
                                <p class="text-sm mb-2">For payment of tuition, fees, and other financial transactions.
                                </p>
                                <button
                                    class="transform text-green-600 font-medium transition-all group-hover:translate-x-2 duration-300 ease-in-out hover:underline">

                                    <a href="/facilities/registrar">View Location →</a>
                                </button>
                            </div>
                        </div>
                        <div
                            class="group shadow-md p-8 rounded-xl bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 ">
                            <div class="overflow-hidden rounded-2xl">
                                <img src="./assets/img/chmsu-tal.jpg"
                                    class="w-full h-90 object-cover group-hover:scale-120 transition-all duration-300"
                                    alt="">
                            </div>
                            <div class=" pt-3">
                                <h1 class="font-extrabold text-lg">Guidance Office</h1>
                                <p class="text-sm mb-2">For student counseling, academic concerns, and personal
                                    guidance.
                                </p>
                                <button
                                    class="transform text-green-600 font-medium transition-all group-hover:translate-x-2 duration-300 ease-in-out hover:underline">

                                    <a href="/facilities/registrar">View Location →</a>
                                </button>
                            </div>
                        </div> -->
                </div>
            </div>
        </div>

        <?php include "./user/components/footer.php" ?>
    </div>


    <script type="module" src="./user/js/Location.js"></script>
</body>

</html>