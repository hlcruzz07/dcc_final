<?php
require_once "./user/components/checkUserToken.php";
$page = "about";
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


        <div class="relative">
            <img src="./assets/img/chmsu-tal.jpg" alt="CHMSU Campus"
                class="w-full h-150 object-cover brightness-75 rounded-b-xl" />
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-3xl z-10 sm:text-4xl font-extrabold text-white drop-shadow-lg">
                    About Digital Campus Concierge
                </h1>
            </div>
            <div class="absolute w-full h-full bg-black/50 z-0 top-0"></div>
        </div>


        <div class="mx-6 md:mx-10 lg:mx-30 xl:mx-45 py-20 space-y-16">


            <div>
                <h2 class="text-2xl font-bold mb-3">What is the Digital Campus Concierge?</h2>
                <p class="text-lg leading-relaxed">
                    The <strong>Digital Campus Concierge</strong> is a modern kiosk system built for
                    <strong>Carlos Hilado Memorial State University (CHMSU)</strong>. It helps students, staff, and
                    guests easily
                    locate rooms, buildings, and offices using an interactive and accessible platform.
                </p>
            </div>


            <div>
                <h2 class="text-2xl font-bold mb-3">Why We Built It</h2>
                <p class="text-lg leading-relaxed">
                    Navigating a large university can be confusing — especially for new students and visitors. This
                    kiosk system
                    was created to provide a reliable, centralized way to access campus location data and improve the
                    experience
                    for everyone at CHMSU.
                </p>
            </div>


            <div>
                <h2 class="text-2xl font-bold mb-3">What You Can Expect</h2>
                <p class="text-lg leading-relaxed">
                    Explore the CHMSU campus with confidence using this intuitive system. You can look up buildings,
                    offices, and
                    even scan a QR code to continue on your phone. For full feature details, check out our
                    <a href="/features" class="text-blue-600 hover:underline font-medium">Features</a> page.
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-bold mb-6">Highlights</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md border-l-4 border-blue-500">
                        <h3 class="font-semibold text-lg mb-2">📍 Easy Navigation</h3>
                        <p class="text-sm">Find buildings and rooms in seconds with our searchable directory and visual
                            guidance.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md border-l-4 border-green-500">
                        <h3 class="font-semibold text-lg mb-2">📱 Mobile Friendly</h3>
                        <p class="text-sm">Scan a QR code to send directions to your mobile device — no need to stay at
                            the kiosk.</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md border-l-4 border-purple-500">
                        <h3 class="font-semibold text-lg mb-2">🎓 Built for CHMSU</h3>
                        <p class="text-sm">Custom-designed to serve the unique layout and needs of the CHMSU community.
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-6">Quick Stats</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
                        <h3 class="text-3xl font-bold text-blue-600">14</h3>
                        <p class="mt-1 text-sm">Buildings</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
                        <h3 class="text-3xl font-bold text-green-600">62</h3>
                        <p class="mt-1 text-sm">Rooms</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
                        <h3 class="text-3xl font-bold text-yellow-600">35</h3>
                        <p class="mt-1 text-sm">Offices</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
                        <h3 class="text-3xl font-bold text-purple-600">12</h3>
                        <p class="mt-1 text-sm">Facilities</p>
                    </div>
                </div>
            </div>

            <div class="text-sm text-center text-gray-500 dark:text-gray-400 pt-10">
                Developed as a capstone project by BSIS students of CHMSU.
            </div>
        </div>

    </div>
    <?php include "./user/components/footer.php" ?>
</body>

</html>