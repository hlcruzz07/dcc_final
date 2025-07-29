<div class="shadow-sm p-5 sticky top-0 bg-white dark:bg-gray-900 z-40">
    <div class="flex items-center justify-between mx-6 md:mx-10 lg:mx-30 xl:mx-45">
        <div class="flex gap-2 items-center">
            <img src="./assets/img/chmsu-logo.png" class="w-10 h-10" alt="">
            <div>
                <h1 class="font-extrabold text-base">DCC - CHMSU</h1>
                <p class="text-[10px]">Talisay Campus</p>
            </div>
        </div>
        <div class="hidden items-center gap-10 md:flex">
            <a href="/home"
                class="text-sm font-medium <?php echo $page == "home" ? "text-green-600 dark:text-green-500" : "text-gray-600"; ?> dark:text-gray-200 hover:text-green-500 transition-all ease-in-out duration-300">Home</a>
            <a href="/about"
                class="text-sm font-medium <?php echo $page == "about" ? "text-green-600 dark:text-green-500" : "text-gray-600"; ?> dark:text-gray-200 hover:text-green-500 transition-all ease-in-out duration-300">About</a>
            <a href="/features"
                class="text-sm font-medium <?php echo $page == "features" ? "text-green-600 dark:text-green-500" : "text-gray-600"; ?> dark:text-gray-200 hover:text-green-500 transition-all ease-in-out duration-300">Features</a>
            <a href="/user-location"
                class="text-sm font-medium <?php echo $page == "locations" ? "text-green-600 dark:text-green-500" : "text-gray-600"; ?> dark:text-gray-200 hover:text-green-500 transition-all ease-in-out duration-300">Locations</a>
        </div>
        <a href="/user-location"
            class="hidden md:block text-sm font-medium border border-green-600 text-green-600 bg-white dark:bg-green-600 dark:text-white p-2 px-6 rounded-full transition-all ease-in-out duration-300">
            Get Started</a>

        <div class="block md:hidden group" tabindex="0">
            <i class="fa-solid fa-bars text-xl cursor-pointer"></i>
            <div
                class="hidden fixed right-0 top-15 w-screen group-focus-within:flex flex-col gap-5 bg-gray-900 p-3 py-5">
                <a href="/home"
                    class="text-sm px-6 font-medium text-gray-600 dark:text-gray-200 hover:text-green-500 transition-all ease-in-out duration-300">Home</a>
                <a href="/about"
                    class="text-sm px-6 font-medium text-gray-600 dark:text-gray-200 hover:text-green-500 transition-all ease-in-out duration-300">About</a>
                <a href="/features"
                    class="text-sm px-6 font-medium text-gray-600 dark:text-gray-200 hover:text-green-500 transition-all ease-in-out duration-300">Features</a>
                <a href="/user-location"
                    class="text-sm px-6 font-medium text-gray-600 dark:text-gray-200 hover:text-green-500 transition-all ease-in-out duration-300">Locations</a>
                <a href="/user-location"
                    class="text-sm px-6 font-medium text-gray-600 dark:text-gray-200 hover:text-green-500 transition-all ease-in-out duration-300">Get
                    Started</a>
            </div>
        </div>
    </div>
</div>