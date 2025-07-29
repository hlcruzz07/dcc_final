<?php
require_once "./user/components/checkUserToken.php";
$page = "features";
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
        <?php include "./user/components/header.php" ?>


        <div class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
            <!-- Hero -->
            <div class="relative">
                <img src="./assets/img/chmsu-tal.jpg" alt="CHMSU Campus"
                    class="w-full h-150 object-cover brightness-75 rounded-b-xl" />
                <div class="absolute inset-0 flex items-center justify-center">
                    <h1 class="text-3xl z-10 sm:text-4xl font-extrabold text-white drop-shadow-lg">
                        Features of Digital Campus Concierge
                    </h1>
                </div>
                <div class="absolute w-full h-full bg-black/50 z-0 top-0"></div>
            </div>

            <!-- Content -->
            <div class="mx-6 md:mx-10 lg:mx-30 xl:mx-45 py-20 space-y-16">

                <!-- Introduction -->
                <div>
                    <h2 class="text-2xl font-bold mb-3">What You Can Do</h2>
                    <p class="text-lg leading-relaxed">
                        Explore the powerful features of the <strong>Digital Campus Concierge</strong> — a smart kiosk
                        platform for navigating Carlos Hilado Memorial State University (CHMSU).
                        Use immersive virtual tours, find locations instantly, and even continue your experience on your
                        phone.
                    </p>
                </div>

                <!-- Feature Cards -->
                <div>
                    <h2 class="text-2xl font-bold mb-6">Core Features</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md border-l-4 border-blue-500">
                            <h3 class="font-semibold text-lg mb-2">🧭 360° Campus Navigation</h3>
                            <p class="text-sm">Explore locations virtually through immersive panoramas using the
                                Pannellum viewer.</p>
                        </div>
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md border-l-4 border-green-500">
                            <h3 class="font-semibold text-lg mb-2">🔍 Smart Location Finder</h3>
                            <p class="text-sm">Quickly search for buildings, rooms, and offices by name or category.</p>
                        </div>
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md border-l-4 border-yellow-500">
                            <h3 class="font-semibold text-lg mb-2">📱 Mobile Continuation</h3>
                            <p class="text-sm">Scan a QR code or send a secure link to your email to continue exploring
                                the system on your mobile device.</p>
                        </div>
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md border-l-4 border-purple-500">
                            <h3 class="font-semibold text-lg mb-2">📁 Office & Room Details</h3>
                            <p class="text-sm">View key information such as office functions, services, and floor
                                locations.</p>
                        </div>
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md border-l-4 border-red-500">
                            <h3 class="font-semibold text-lg mb-2">🖥️ Kiosk-Friendly Interface</h3>
                            <p class="text-sm">Optimized for kiosk displays with intuitive layout, dark mode, and smooth
                                navigation.</p>
                        </div>
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md border-l-4 border-cyan-500">
                            <h3 class="font-semibold text-lg mb-2">🗂️ Categorized Listings</h3>
                            <p class="text-sm">Locations are organized into Buildings, Rooms, Offices, and Facilities
                                for easier browsing.</p>
                        </div>
                    </div>
                </div>

                <!-- Highlight Section -->
                <div class="rounded-xl bg-white flex flex-col items-center gap-10 dark:bg-gray-800 shadow-lg p-10">
                    <div class="flex justify-center gap-6 items-center">
                        <div class="bg-blue-100 dark:bg-blue-600/20 p-4 rounded-full">
                            <i class="fa-solid fa-qrcode text-3xl text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <div class="bg-green-100 dark:bg-green-600/20 p-4 rounded-full">
                            <i class="fa-solid fa-envelope text-3xl text-green-600 dark:text-green-400"></i>
                        </div>
                        <div class="bg-purple-100 dark:bg-purple-600/20 p-4 rounded-full">
                            <i
                                class="fa-solid fa-mobile-screen-button text-3xl text-purple-600 dark:text-purple-400"></i>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="text-center space-y-3 w-8/12">
                        <h2 class="text-2xl font-bold">Continue on Your Mobile</h2>
                        <p class="text-base leading-relaxed">
                            Whether you're in a hurry or prefer using your phone, the system gives you flexible
                            options:
                            <span class="font-medium text-blue-600 dark:text-blue-400">scan a QR code</span>
                            displayed on-screen, or
                            <span class="font-medium text-green-600 dark:text-green-400">send a secure link to your
                                email</span>
                            — making it easy to explore CHMSU facilities anywhere.
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            *Internet connection required for mobile continuation.
                        </p>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-sm text-center text-gray-500 dark:text-gray-400 pt-10">
                    Developed as a capstone project by BSIS students of CHMSU.
                </div>
            </div>
        </div>

        <?php include "./user/components/footer.php" ?>
    </div>



</body>

</html>