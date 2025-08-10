<!-- Default Modal -->
<div id="add-location-modal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full hidden">
    <div class="relative w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Add Location
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="add-location-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="add-location-form" class="p-4 md:p-5 grid gap-4 mb-4 grid-cols-2">

                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload
                        Images</label>
                    <input
                        class="block w-full text-sm text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700"
                        aria-describedby="file_input_help" id="location_img" name="location_img[]" type="file" multiple
                        accept=".jpg, .png, .jpeg" required>
                    <p class="mt-1 text-[10px] text-gray-500 dark:text-gray-400">PNG, JPG, JPEG (MAX PER FILE :
                        5MB).</p>
                </div>
                <div class="col-span-2">
                    <label for="tag_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location
                        Tags</label>

                    <div class="flex">
                        <input type="text" name="tag_name" id="tag_name"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                            placeholder="Enter Location Tag Name" maxlength="50">
                        <button type="button" id="addTagBtn"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 cursor-pointer"><i
                                class="fa-solid fa-plus"></i></button>
                    </div>
                    <p class="mt-1 text-[10px] text-gray-500 dark:text-gray-400 uppercase">Minimum of 3 tags required
                    </p>
                    <div class="flex flex-wrap gap-3 mt-2" id="tagContainer">

                    </div>
                </div>
                <div class="col-span-2">
                    <label for="location_type"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location Type</label>
                    <select id="location_type" name="location_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                        required>
                        <option value="" selected hidden>Choose a type</option>
                        <option value="Building">Building</option>
                        <option value="Facility">Facility</option>
                        <option value="Room">Room</option>
                        <option value="Office">Office</option>
                    </select>
                </div>
                <div class="col-span-2">
                    <label for="location_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location Name</label>
                    <input type="text" name="location_name" id="location_name"
                        class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                        placeholder="Enter Location Name" maxlength="50" required>
                </div>
                <div class="col-span-2">
                    <label for="desc"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="desc" rows="8" name="desc" required
                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Write your thoughts here..."></textarea>
                </div>
                <div class="col-span-2">
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
                        <button data-modal-hide="add-location-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-500 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Default Modal -->
<div id="edit-location-modal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Edit Location
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="edit-location-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="edit-location-form" class="p-4 md:p-5 grid gap-4 mb-4 grid-cols-2">
                <input type="hidden" name="edit_location_id" id="edit_location_id">
                <div class="col-span-2">
                    <div id="locationSplide" class="splide w-full h-96">
                        <div class="splide__track h-full">
                            <ul class="splide__list">
                                <!-- slides injected here -->
                            </ul>
                        </div>

                        <!-- arrows (optional) -->
                        <div class="splide__arrows">
                            <button type="button" class="splide__arrow splide__arrow--prev"><i
                                    class="fa-solid fa-chevron-right"></i></button>
                            <button type="button" class="splide__arrow splide__arrow--next"><i
                                    class="fa-solid fa-chevron-right"></i></button>
                        </div>

                        <!-- bullets (optional) -->
                        <ul class="splide__pagination"></ul>
                    </div>
                </div>
                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload
                        Images</label>
                    <input
                        class="block w-full text-sm text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700"
                        aria-describedby="file_input_help" id="edit_location_img" name="edit_location_img[]" type="file"
                        multiple accept=".jpg, .png, .jpeg">
                    <p class="mt-1 text-[10px] text-gray-500 dark:text-gray-400">PNG, JPG, JPEG (MAX PER FILE :
                        5MB).</p>
                </div>
                <div class="col-span-2">
                    <label for="edit_tag_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location
                        Tags</label>

                    <div class="flex">
                        <input type="text" name="edit_tag_name" id="edit_tag_name"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                            placeholder="Enter Location Tag Name" maxlength="50">
                        <button type="button" id="editAddTagBtn"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 cursor-pointer"><i
                                class="fa-solid fa-plus"></i></button>
                    </div>
                    <div class="flex flex-wrap gap-3 mt-2" id="editTagContainer">


                    </div>
                </div>

                <div class="col-span-2">
                    <label for="edit_location_type"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location Type</label>
                    <select id="edit_location_type" name="edit_location_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                        required>
                        <option value="" selected hidden>Choose a type</option>
                        <option value="Building">Building</option>
                        <option value="Facility">Facility</option>
                        <option value="Room">Room</option>
                        <option value="Office">Office</option>
                    </select>
                </div>
                <div class="col-span-2">
                    <label for="edit_location_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location Name</label>
                    <input type="text" name="edit_location_name" id="edit_location_name"
                        class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                        placeholder="Enter Location Name" maxlength="50" required>
                </div>

                <div class="col-span-2">
                    <label for="edit_location_desc"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="edit_location_desc" rows="8" name="edit_location_desc" required
                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Write your thoughts here..."></textarea>
                </div>
                <div class="col-span-2">
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Update</button>
                        <button data-modal-hide="edit-location-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-500 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<div id="edit-account-modal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Edit Account
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="edit-account-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="edit-account-form" class="p-4 md:p-5 grid gap-4 mb-4 grid-cols-2">
                <input type="hidden" name="edit_account_id" id="edit_account_id">
                <div class="col-span-2">
                    <img src="" class="w-full object-cover" id="account_img_prev" alt="Account Image Preview"
                        style="height: 400px;">
                </div>
                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update
                        Image</label>
                    <input
                        class="block w-full text-sm text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700"
                        aria-describedby="file_input_help" id="edit_account_img" name="edit_account_img" type="file"
                        accept=".jpg, .png, .jpeg">
                    <p class="mt-1 text-[10px] text-gray-500 dark:text-gray-400">PNG, JPG, JPEG (MAX SIZE:
                        5MB).</p>
                </div>
                <div class="col-span-2">
                    <label for="edit_account_username"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <input type="text" name="edit_account_username" id="edit_account_username"
                        class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                        placeholder="Enter Username" maxlength="50" required>
                </div>

                <div class="col-span-2">
                    <label for="edit_account_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                    <div class="relative">
                        <input type="password" id="edit_account_password" name="edit_account_password"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 pe-11"
                            placeholder="Enter Password" required />
                        <div class="absolute right-3 top-1/2 -translate-y-1/2">
                            <i class="fa-solid fa-eye text-lg text-gray-500 cursor-pointer" id="seePass"></i>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Update</button>
                        <button data-modal-hide="edit-location-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-500 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Extra Large Modal -->
<div id="add-scene-modal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 w-full hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Add Scene Modal
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="add-scene-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="add-scene-form" class="p-4 md:p-5 grid gap-4 mb-4 grid-cols-2">
                <input type="hidden" value="<?php echo $_GET['location_id'] ?? null ?>" name="location_id"
                    id="location_id">
                <div class="col-span-2">
                    <div class="flex flex-wrap gap-2">
                        <button type="button" id="backBtn"
                            class="px-4 py-2 text-sm font-medium text-gray-900 bg-gray-50 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-500 focus:z-10 focus:ring-2 focus:ring-green-600 focus:text-green-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-green-600 ">
                            Add Back Marker
                        </button>
                        <button type="button" id="nextBtn"
                            class="px-4 py-2 text-sm font-medium text-gray-900 bg-gray-50 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-500 focus:z-10 focus:ring-2 focus:ring-green-600 focus:text-green-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-green-600 ">
                            Add Next Marker
                        </button>
                        <button type="button" id="destBtn"
                            class="px-4 py-2 text-sm font-medium text-gray-900 bg-gray-50 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-500 focus:z-10 focus:ring-2 focus:ring-green-600 focus:text-green-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-green-600 ">
                            Add Destination Marker
                        </button>
                    </div>
                </div>
                <div class="col-span-2" id="panorama">
                </div>
                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload 360 Image</label>
                    <input
                        class="block w-full text-sm text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700"
                        aria-describedby="file_input_help" id="scene_img" name="scene_img" type="file"
                        accept=".jpg, .jpeg" required>
                    <p class="mt-1 text-[10px] text-gray-500 dark:text-gray-400">JPG, JPEG (MAX SIZE:
                        15MB).</p>
                </div>
                <div class="col-span-2">
                    <label for="scene_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scene
                        Title</label>
                    <input type="text" name="scene_title" id="scene_title"
                        class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                        placeholder="Enter Scene Title" maxlength="50" required>
                </div>

                <div class="col-span-2">

                    <div id="textInputs"></div>
                </div>
                <div class="col-span-2">
                    <!-- Modal footer -->
                    <div class="flex items-center py-4 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
                        <button data-modal-hide="add-scene-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-500 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>