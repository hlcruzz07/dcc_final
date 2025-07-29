<?php
require_once "./user/components/checkDeviceToken.php";
?>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php include "./global/links.php" ?>
    <script src="./user/js/auth.js" type="module"></script>
    <div
        class="w-max h-max dark:bg-gray-700 rounded-full bg-gray-500 fixed bottom-5 right-5 transition-all duration-300 ease-in-out  shadow-lg z-50">
        <input type="checkbox" id="switch" hidden>
        <label for="switch"><i class="fa-solid fa-moon text-lg p-3 px-3.5 dark:p-3 text-gray-200 cursor-pointer"
                id="iconTheme"></i></label>
    </div>

    <div id="refresh"
        class="w-max h-max dark:bg-gray-700 rounded-full bg-gray-500 fixed bottom-20 right-5 transition-all duration-300 ease-in-out  shadow-lg z-50">
        <i class="fa-solid fa-arrows-rotate text-lg p-3 text-gray-200 cursor-pointer"></i>
    </div>
    <script src="./user/js/theme.js"></script>
</head>

<body>
    <div
        class="bg-white dark:bg-gray-800 sm:bg-sky-200/80 dark:sm:bg-gray-700 h-full flex items-center justify-center overflow-auto {{ 'border-2' }}">
        <div
            class="bg-white dark:bg-gray-800 p-10 w-full max-h-full overflow-auto sm:w-[500px] dark:border-gray-700 rounded-lg sm:shadow-sm dark:shadow-gray-900">
            <div class="flex flex-col justify-center items-center">
                <img loading="lazy" src="./assets/img/chmsu-logo.png" alt="CHMSU Logo"
                    class="w-[50px] h-[50px] object-cover">
                <h1 class="text-2xl mt-3 text-black dark:text-white">Digital Campus Concierge - Talisay</h1>
                <h1 class="text-2xl mt-3 text-black dark:text-white">Registration Form</h1>
            </div>
            <form class="flex flex-col mt-5" id="registerForm" method="post">
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="fname" id="fname"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 dark:border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 dark:focus:border-green-500 peer"
                            placeholder=" " maxlength="50" required />
                        <label for="fname"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 dark:peer-focus:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                            name</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="lname" id="lname"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 dark:border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 dark:focus:border-green-500 peer"
                            placeholder=" " maxlength="50" required />
                        <label for="lname"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 dark:peer-focus:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last
                            name</label>
                    </div>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="email" name="email" id="email"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 dark:border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 dark:focus:border-green-500 peer"
                        placeholder=" " required />
                    <label for="email"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 dark:peer-focus:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                        ( example@gmail.com )</label>
                </div>
                <div class="relative z-0 w-full group">
                    <input type="number" name="phoneNum" id="phoneNum"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 dark:border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 dark:focus:border-green-500 peer"
                        placeholder=" " onkeypress="if(this.value.length == 11) return false;"
                        oninput="if(this.value.slice(0,2) !== '09'){this.setCustomValidity('Phone number should starts with 09')} else if(this.value.length !== 11){this.setCustomValidity('Phone number should be 11 digits')}else {this.setCustomValidity('');}"
                        required />
                    <label for="phoneNum"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 dark:peer-focus:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone
                        number (09xxxxxxxxx)</label>
                </div>
                <div class="mt-5">
                    <select id="province" required name="province"
                        class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="" selected hidden>Select Province</option>
                    </select>
                </div>
                <div class="grid md:grid-cols-2 gap-5 mt-5">
                    <select id="city" required name="city"
                        class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="" selected hidden>Select City/Municipality</option>
                    </select>
                    <select id="brgy" required name="brgy"
                        class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="" selected hidden>Select Barangay</option>
                    </select>
                </div>
                <div class="relative z-0 w-full mt-5 group">
                    <input type="text" name="street" id="street"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 dark:border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 dark:focus:border-green-500 peer"
                        placeholder=" " maxlength="250" required />
                    <label for="street"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 dark:peer-focus:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Street</label>
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