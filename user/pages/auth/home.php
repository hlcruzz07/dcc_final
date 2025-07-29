<?php
require_once "./user/components/checkUserToken.php";
$page = "home";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home – Digital Campus Concierge</title>
    <script src="./user/js/app.js" type="module"></script>
    <?php include "./global/links.php" ?>
    <?php include "./user/components/switch.php" ?>
    <script src="./user/js/theme.js"></script>
</head>

<body>

    <div class="min-h-screen bg-white dark:bg-gray-800 text-black dark:text-white">
        <?php include "./user/components/header.php" ?>

        <div class="mx-6 md:mx-10 lg:mx-30 xl:mx-45 py-20">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="flex items-center justify-center text-center md:text-left">
                    <div class="w-full">
                        <h1 class="mb-5 text-4xl font-extrabold text-gray-800 dark:text-gray-200">Digital Campus
                            Concierge</h1>
                        <p class="mb-8">Easily explore facilities, locate destinations that will assistant you for
                            navigating buildings, rooms, offices, and campus
                            services all in one place. Designed for
                            students, staff, and visitors,
                            this system helps you save time, avoid confusion, and reach your destination with ease.
                        </p>
                        <a href="#about"
                            class="text-sm border-2 border-green-500 bg-white text-green-500 dark:bg-green-500 dark:text-white rounded-full p-2 px-6">Explore
                            More
                            <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <img src="./assets/img/home1.png" class=" h-150 w-150 object-contain" alt="">
                </div>
            </div>
        </div>

        <div class="mx-6 md:mx-10 lg:mx-30 xl:mx-45 py-20" id="about">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <div class="">
                    <img src="./assets/img/chmsu-tal.jpg" class="w-full h-full object-cover rounded-2xl" alt="">
                </div>
                <div class="text-gray-700 dark:text-gray-200">
                    <div class="text-lg">
                        <li class="list-disc text-base">About Us</li>
                        <p class="mt-3">
                            The <strong>Digital Campus Concierge</strong> was created to make navigation around
                            <strong>Carlos Hilado Memorial State University (CHMSU)</strong> more efficient and
                            accessible for everyone. As the university continues to grow, finding your way through
                            buildings, offices, and rooms can be challenging so this system is here to help.
                        </p>
                        <p class="mt-3">
                            Whether you're a first-time visitor, a student rushing to class, or a staff member needing
                            quick access to locations, this kiosk is designed to guide you with ease, accuracy, and
                            speed.
                        </p>
                    </div>
                    <div class="mt-5 text-lg">
                        <li class="list-disc text-base">What it offers</li>
                        <p class="mt-3">
                            The Digital Campus Concierge provides a variety of features to assist you:
                        </p>
                        <ul class="mt-2 flex flex-col gap-2">
                            <li><i class="fa-solid text-green-700 dark:text-green-500 fa-circle-check me-1"></i>
                                Interactive directory of
                                <strong>buildings, rooms, and offices</strong>
                            </li>
                            <li><i class="fa-solid fa-circle-check text-green-700 dark:text-green-500 me-1"></i>
                                Facility details with
                                <strong>navigation and
                                    descriptions</strong>
                            </li>
                            <li><i class="fa-solid fa-circle-check text-green-700 dark:text-green-500 me-1"></i> Easy
                                search for
                                <strong>department
                                    locations</strong>
                            </li>
                            <li><i class="fa-solid fa-circle-check text-green-700 dark:text-green-500 me-1"></i> Simple,
                                <strong>user-friendly</strong>
                                interface built for
                                kiosks
                            </li>
                        </ul>
                        <p class="mt-2">
                            This project is part of CHMSU’s effort to embrace smart technology and improve campus
                            accessibility. It's maintained by student developers and designed to adapt to the
                            university’s needs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 dark:bg-gray-900">
            <div class="mx-6 md:mx-10 lg:mx-30 xl:mx-45 py-20 ">
                <div class="text-center text-gray-700 dark:text-gray-300">
                    <li class="list-disc text-sm font-medium">Quick Access Points</li>
                    <h1 class="text-4xl font-extrabold">Most Visited Offices</h1>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 mt-20 gap-5">
                    <div
                        class="group shadow-md p-8 rounded-xl bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 ">
                        <div class="overflow-hidden rounded-2xl">
                            <img src="./assets/img/chmsu-tal.jpg"
                                class="w-full h-90 object-cover group-hover:scale-120 transition-all duration-300"
                                alt="">
                        </div>
                        <div class=" pt-3">
                            <h1 class="font-extrabold text-lg">Registrar's Office</h1>
                            <p class="text-sm mb-2">Handles student records, enrollment, grades, and academic documents.
                                Visit
                                here for
                                transcript requests and official forms.</p>
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
                            <h1 class="font-extrabold text-lg">Cashier's Office</h1>
                            <p class="text-sm mb-2">For payment of tuition, fees, and other financial transactions.</p>
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
                            <p class="text-sm mb-2">For student counseling, academic concerns, and personal guidance.
                            </p>
                            <button
                                class="transform text-green-600 font-medium transition-all group-hover:translate-x-2 duration-300 ease-in-out hover:underline">

                                <a href="/facilities/registrar">View Location →</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800">
            <div class="mx-6 md:mx-10 lg:mx-30 xl:mx-45 py-20">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-15">
                    <div class="border-white text-gray-800 dark:text-gray-300">
                        <h1 class="text-2xl text-center md:text-left font-extrabold">
                            Frequently Ask Questions
                            <i class="fa-solid fa-circle-question ms-1"></i>
                        </h1>
                        <div class="flex flex-col gap-5 mt-10">
                            <div class="group p-5 px-6 rounded-2xl bg-gray-100 dark:bg-gray-900 shadow-sm cursor-pointer"
                                tabindex="0">
                                <div
                                    class="flex justify-between gap-5 group-focus-within:text-green-600 items-center text-base lg:text-xl dark:group-focus-within:text-green-500">
                                    <h1 class="list-disc font-medium">What is the Digital Campus Concierge?</h1>
                                    <i
                                        class="fa-solid fa-circle-down transform transition duration-300 group-focus-within:rotate-[180deg]"></i>

                                </div>
                                <li
                                    class="transition-all ease-in-out list-disc duration-300 text-base md:text-lg overflow-hidden max-h-0 group-focus-within:max-h-screen">
                                    It’s an interactive kiosk system that helps students, staff, and visitors navigate
                                    CHMSU by providing information about buildings, rooms, and offices.
                                </li>
                            </div>

                            <div class="group p-5 px-6 rounded-2xl bg-gray-100 dark:bg-gray-900 shadow-sm cursor-pointer"
                                tabindex="0">
                                <div
                                    class="flex justify-between gap-5 group-focus-within:text-green-600 items-center text-base lg:text-xl dark:group-focus-within:text-green-500">
                                    <h1 class="list-disc font-medium">How do I find a specific room or office?</h1>
                                    <i
                                        class="fa-solid fa-circle-down transform transition duration-300 group-focus-within:rotate-[180deg]"></i>
                                </div>
                                <li
                                    class="transition-all ease-in-out list-disc duration-300 text-base md:text-lg overflow-hidden max-h-0 group-focus-within:max-h-screen">
                                    Use the search bar or browse the Facilities section to locate a room, office, or
                                    building easily.
                                </li>
                            </div>

                            <div class="group p-5 px-6 rounded-2xl bg-gray-100 dark:bg-gray-900 shadow-sm cursor-pointer"
                                tabindex="0">
                                <div
                                    class="flex justify-between gap-5 group-focus-within:text-green-600 items-center text-base lg:text-xl dark:group-focus-within:text-green-500">
                                    <h1 class="list-disc font-medium">Can I continue using the kiosk on my phone?</h1>
                                    <i
                                        class="fa-solid fa-circle-down transform transition duration-300 group-focus-within:rotate-[180deg]"></i>
                                </div>
                                <li
                                    class="transition-all ease-in-out list-disc duration-300 text-base md:text-lg overflow-hidden max-h-0 group-focus-within:max-h-screen">
                                    Yes! Just scan the QR code on screen or receive a link in your email to
                                    continue browsing on your device.
                                </li>
                            </div>

                            <div class="group p-5 px-6 rounded-2xl bg-gray-100 dark:bg-gray-900 shadow-sm cursor-pointer"
                                tabindex="0">
                                <div
                                    class="flex justify-between gap-5 group-focus-within:text-green-600 items-center text-base lg:text-xl dark:group-focus-within:text-green-500">
                                    <h1 class="list-disc font-medium">What if the location I’m looking for isn’t listed?
                                    </h1>
                                    <i
                                        class="fa-solid fa-circle-down transform transition duration-300 group-focus-within:rotate-[180deg]"></i>
                                </div>
                                <li
                                    class="transition-all ease-in-out list-disc duration-300 text-base md:text-lg overflow-hidden max-h-0 group-focus-within:max-h-screen">
                                    Double-check the spelling or browse by building. If you still can’t find it, ask for
                                    help at the information desk or contact admin staff.
                                </li>
                            </div>

                            <div class="group p-5 px-6 rounded-2xl bg-gray-100 dark:bg-gray-900 shadow-sm cursor-pointer"
                                tabindex="0">
                                <div
                                    class="flex justify-between gap-5 group-focus-within:text-green-600 items-center text-base lg:text-xl dark:group-focus-within:text-green-500">
                                    <h1 class="list-disc font-medium">Does the system show directions?</h1>
                                    <i
                                        class="fa-solid fa-circle-down transform transition duration-300 group-focus-within:rotate-[180deg]"></i>
                                </div>
                                <li
                                    class="transition-all ease-in-out list-disc duration-300 text-base md:text-lg overflow-hidden max-h-0 group-focus-within:max-h-screen">
                                    Yes, the system provides guidance and directions to help you navigate to buildings,
                                    rooms, and offices within the campus.
                                </li>
                            </div>

                            <div class="group p-5 px-6 rounded-2xl bg-gray-100 dark:bg-gray-900 shadow-sm cursor-pointer"
                                tabindex="0">
                                <div
                                    class="flex justify-between gap-5 group-focus-within:text-green-600 items-center text-base lg:text-xl dark:group-focus-within:text-green-500">
                                    <h1 class="list-disc font-medium">Who can use the Digital Campus Concierge?</h1>
                                    <i
                                        class="fa-solid fa-circle-down transform transition duration-300 group-focus-within:rotate-[180deg]"></i>
                                </div>
                                <li
                                    class="transition-all ease-in-out list-disc duration-300 text-base md:text-lg overflow-hidden max-h-0 group-focus-within:max-h-screen">
                                    Anyone! It’s designed for students, faculty, staff, and visitors of CHMSU to easily
                                    access campus information.
                                </li>
                            </div>

                        </div>
                        <div class="flex items-center mt-10 gap-5" data-aos="zoom-in-up">
                            <hr class="text-stone-300 grow" />

                            <button
                                class="w-max p-2 px-8 rounded-full bg-white dark:bg-gray-800 dark:text-gray-100 text-gray-950 font-extrabold cursor-pointer before:content-[''] relative before:absolute z before:left-0 before:top-0 before:w-[0] before:h-full overflow-hidden before:bg-green-600 border-2 border-green-500 before:z-1 hover:before:w-full before:transition-all before:duration-300 hover:text-white">
                                <a href="/" class="z-5 relative">
                                    More Questions
                                    <i class="fa-solid fa-arrow-right ms-1"></i>
                                </a>
                            </button>
                            <hr class="text-stone-300 grow" />
                        </div>
                    </div>
                    <div class="flex items-center justify-center " data-aos="fade-left">
                        <img src="./assets/img/home2.jpg"
                            class="w-full sm:w-160 h-full sm:h-160 object-cover rounded-full" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <?php include "./user/components/footer.php" ?>
    </div>
</body>

</html>