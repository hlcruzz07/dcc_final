<!-- Main modal -->
<div id="visitModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <form id="visitForm" class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Visit Location Form
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="visitModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <input type="hidden" name="location_id" id="location_id" hidden>
                <div class="mb-6">
                    <label for="destination"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destination</label>
                    <input type="text" id="destination" name="destination"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                        readonly />
                </div>
                <div class="mb-6">
                    <label for="purpose"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Purpose</label>
                    <input type="text" id="purpose" name="purpose" list="purpose-list" placeholder="Enter Visit Purpose"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" />
                    <datalist id="purpose-list">
                        <option value="Inquiry"></option>
                        <option value="Payment"></option>
                        <option value="Application"></option>
                        <option value="Request"></option>
                        <option value="Complaint"></option>
                        <option value="Consultation"></option>
                        <option value="Interview"></option>
                        <option value="Training"></option>
                        <option value="Event"></option>
                        <option value="Delivery"></option>
                    </datalist>
                </div>
                <div class="mb-6">
                    <label for="visit_desc"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="visit_desc" name="visit_desc" rows="8" required
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Write your visit description here..."></textarea>
                </div>
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input required id="agree" type="checkbox" value=""
                            class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </div>
                    <label for="agree" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        I agree with the
                        <button type="button" data-popover-target="terms-popover" data-popover-trigger="click"
                            data-popover-placement="right"
                            class="text-green-600 hover:underline dark:text-green-500 cursor-pointer">
                            terms and conditions
                        </button>.
                    </label>
                </div>

                <!-- Popover -->
                <div data-popover id="terms-popover" role="tooltip"
                    class="absolute z-10 invisible inline-block w-72 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="p-3">
                        <p class="text-sm font-normal">
                            By agreeing, you confirm that your visit is for official purposes only and that all
                            information provided is accurate. Misuse may lead to access restrictions.
                        </p>
                    </div>
                    <div data-popper-arrow></div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Proceed</button>
                <button data-modal-hide="visitModal" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
            </div>
        </form>
    </div>
</div>