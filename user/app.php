<?php
include "./assets/library/php-jwt-main/src/JWT.php";
include "./assets/library/php-jwt-main/src/Key.php";
include "./lib/key.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if (isset($_COOKIE['kiosk_auth'])) {
    $decoded = JWT::decode($_COOKIE['kiosk_auth'], new Key($key, 'HS256'));

    if ($decoded->data->isAuthorized) {
        header("Location: /register");
    }
}
?>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiosk Authorization</title>
    <?php include "./global/links.php" ?>
    <script src="./user/js/auth.js" type="module"></script>
    <?php include "./user/components/switch.php" ?>
    <script src="./user/js/theme.js"></script>
</head>

<body>
    <div
        class="bg-white dark:bg-gray-800 sm:bg-sky-200/80 dark:sm:bg-gray-700 h-full flex items-center justify-center overflow-auto {{ 'border-2' }}">
        <div
            class="bg-white dark:bg-gray-800 p-10 w-full max-h-full overflow-auto sm:w-[500px] dark:border-gray-700 rounded-lg sm:shadow-sm dark:shadow-gray-900">
            <div class="flex flex-col justify-center items-center">
                <div class="border-3 w-25 h-25 flex items-center justify-center rounded-full bg-green-600 text-white"><i
                        class="fa-solid fa-user-tie text-5xl"></i></div>
                <h1 class="text-2xl mt-3 text-black dark:text-white">Kiosk Device Authorization
                </h1>
            </div>
            <form class="flex flex-col mt-5" id="kioskForm">
                <div class="text-center text-sm text-red-500 font-medium" id="authAlert"></div>
                <div class="">
                    <label for="username"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <div class="flex items-center relative">
                        <i class="fa-solid fa-user-tie text-2xl p-2 px-3 text-gray-500 dark:text-gray-400 absolute"></i>
                        <input type="text" id="username" name="username"
                            class="ps-11 rounded-lg bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm focus:ring-green-500 focus:border-green-500 block w-full p-3"
                            placeholder="Enter Username" required />
                    </div>
                </div>

                <div class="mt-5">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <div class="flex items-center relative">
                        <i class="fa-solid fa-lock text-2xl p-2 px-3 text-gray-500 dark:text-gray-400 absolute"></i>
                        <input type="password" id="password" name="password"
                            class="ps-11 rounded-lg bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm focus:ring-green-500 focus:border-green-500 block w-full p-3"
                            placeholder="Enter Password" required />
                        <div class="absolute right-3">
                            <i class="fa-solid fa-eye text-lg text-gray-500 dark:text-gray-400 cursor-pointer"
                                id="seePass"></i>
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="text-white mt-5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center cursor-pointer dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Proceed <i class="fa-solid fa-right-to-bracket ms-1"></i>
                </button>
            </form>
        </div>
    </div>


</body>

</html>