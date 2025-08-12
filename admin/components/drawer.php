<!-- Notifications Drawer -->
<div id="notif-drawer"
    class="fixed top-0 right-0 z-100 h-screen overflow-hidden min-w-92 w-auto flex flex-col translate-x-full transition-transform bg-white dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-right-label">
    <!-- translate-x-full -->
    <div class="p-4 flex justify-between items-center">
        <h5 id="drawer-right-label"
            class="inline-flex items-center text-base font-semibold text-gray-700 dark:text-gray-100">
            <i class="fa-solid fa-bell me-2"></i>Notifications
        </h5>
        <div class="flex items-center gap-3">
            <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal"
                class="flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                type="button">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 16 3">
                    <path
                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                </svg>
            </button>
            <button type="button" data-drawer-hide="notif-drawer" aria-controls="notif-drawer"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
        </div>
        <div id="dropdownDotsHorizontal"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-56 dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                aria-labelledby="dropdownMenuIconHorizontalButton">
                <li id="mark-all-read-btn"
                    class="block px-4 py-2 hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer">
                    <i class="fa-solid fa-check me-2"></i> Mark all as read
                </li>
                <li id="clear-notifications-btn"
                    class="block px-4 py-2 hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer">
                    <i class="fa-solid fa-trash me-2"></i> Clear notifications
                </li>
            </ul>
        </div>
    </div>
    <div class="text-gray-600 flex flex-col dark:text-gray-300 h-full overflow-y-auto" id="notif-cont">

        <?php
        for ($i = 0; $i < 10; $i++) {
            echo '
            <div id="loading">
                <div class="flex items-center gap-3 p-3 animate-pulse">
                <div class="relative inline-flex items-center justify-center text-center w-11 h-11 overflow-hidden bg-gray-200 rounded-full dark:bg-gray-600">
                    <span class="font-medium text-gray-600 dark:text-gray-300">?</span>
                </div>
                <div>
                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2"></div>
                    <div class="w-48 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                </div>
                </div>
            </div>';
        }
        ?>
    </div>
    <div class="flex items-center gap-2 p-3">
        <a href="#"
            class="py-2.5 px-5 me-2 mb-2 text-sm text-center w-full font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">See
            all notification</a>
    </div>
</div>

<!-- Sidebar Drawer -->
<div id="sidebar-drawer"
    class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800 w-80 flex flex-col"
    tabindex="-1" aria-labelledby="drawer-left-label">

    <!-- Header -->
    <div class="flex gap-3 items-center">
        <img loading="lazy" src="./assets/img/chmsu-logo.png" class="w-[50px] h-[50px] object-cover" alt="">
        <div>
            <h1 class="font-extrabold text-xl text-gray-800 dark:text-white">CHMSU - DCC</h1>
            <p class="text-xs text-gray-500 dark:text-gray-300">Talisay Campus</p>
        </div>
    </div>

    <!-- Close Button -->
    <button type="button" data-drawer-hide="sidebar-drawer" aria-controls="sidebar-drawer"
        class="text-gray-400 bg-transparent hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center">
        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>

    <!-- Menu Items -->
    <div class="flex flex-col my-5 justify-between overflow-auto grow relative"
        style="scrollbar-gutter: stable; scrollbar-width: thin;">
        <ul class="flex flex-col gap-3">
            <!-- Dashboard -->
            <li
                class="flex rounded-lg transition-all ease-in-out duration-300 <?php echo $page == 'Dashboard' ? 'bg-green-500 text-white' : 'text-gray-600 hover:bg-green-100 dark:text-gray-300 dark:hover:bg-green-800' ?> text-sm">
                <a href="/dashboard" class="w-full p-4 ps-6">
                    <i class="fa-solid fa-house me-2"></i>Dashboard
                </a>
            </li>

            <!-- Visitors -->
            <li
                class="flex rounded-lg transition-all ease-in-out duration-300 
                <?php echo $page == 'Visitors' ? 'bg-green-500 text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-green-100 dark:hover:bg-gray-800' ?> text-sm">
                <a href="/visitors" class="w-full p-4 ps-6">
                    <i class="fa-solid fa-user-group me-2"></i>Visitors
                </a>
            </li>



            <li
                class="flex rounded-lg transition-all ease-in-out duration-300 <?php echo $page == 'Locations' ? 'bg-green-500 text-white' : 'text-gray-600 hover:bg-green-100 dark:text-gray-300 dark:hover:bg-green-800' ?> text-sm">
                <a href="/locations" class="w-full p-4 ps-6">
                    <i class="fa-solid fa-location-dot me-2"></i>Locations
                </a>
            </li>


            <!-- Accounts -->
            <li
                class="flex rounded-lg transition-all ease-in-out duration-300 <?php echo $page == 'Accounts' ? 'bg-green-500 text-white' : 'text-gray-600 hover:bg-green-100 dark:text-gray-300 dark:hover:bg-green-800' ?> text-sm">
                <a href="/accounts" class="w-full p-4 ps-6">
                    <i class="fa-solid fa-users me-2"></i>Accounts
                </a>
            </li>

            <!-- Activity Logs -->
            <li
                class="flex rounded-lg transition-all ease-in-out duration-300 <?php echo $page == 'Activity Logs' ? 'bg-green-500 text-white' : 'text-gray-600 hover:bg-green-100 dark:text-gray-300 dark:hover:bg-green-800' ?> text-sm">
                <a href="/activity-logs" class="w-full p-4 ps-6">
                    <i class="fa-solid fa-arrow-trend-up me-2"></i>Activity Logs
                </a>
            </li>

            <!-- Archive -->
            <li
                class="flex rounded-lg transition-all ease-in-out duration-300 <?php echo $page == 'Archive' ? 'bg-green-500 text-white' : 'text-gray-600 hover:bg-green-100 dark:text-gray-300 dark:hover:bg-green-800' ?> text-sm">
                <a href="/archive" class="w-full p-4 ps-6">
                    <i class="fa-solid fa-box-archive me-2"></i>Archive
                </a>
            </li>
        </ul>

        <!-- Logout -->
        <li
            class="flex rounded-lg transition-all ease-in-out duration-300 text-gray-700 dark:text-gray-300 text-sm hover:bg-green-100 dark:hover:bg-gray-800 sticky bottom-0">
            <a href="/logout" class="w-full p-4 ps-6">
                <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
            </a>
        </li>
    </div>
</div>