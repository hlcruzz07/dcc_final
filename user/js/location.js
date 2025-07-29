import {
  fetchLocationSearch,
  fetchAllLocationTags,
} from "../../Controllers/LocationController.js";
import sliceText from "../../Controllers/InputController.js";
import initModal from "../../Controllers/ModalController.js";
$(document).ready(async function () {
  initModal("visitModal", {}, "dynamic");
  try {
    // For Tags
    const tagsResponse = await fetchAllLocationTags();
    if (!tagsResponse.status) {
      alert(tagsResponse.message);
      return;
    }
    tagsResponse.data.forEach((el) => {
      const content = `
        <label class="flex gap-2 items-center hover:bg-gray-100 dark:hover:bg-gray-600 p-3" for="${el.tag_name}">
            <input id="${el.tag_name}" type="checkbox" value="${el.tag_name}" name="tag_name[]" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <span>${el.tag_name}</span>
        </label>
        `;

      $("#tags-container").append(content);
    });
  } catch (error) {
    console.log(error);
  }

  let debounceTimer;
  localStorage.setItem(
    "searchData",
    JSON.stringify({
      location_search: "",
      location_type: "",
      tag_name: [],
      limit: 12,
    })
  );
  $("#location-search, #location_type, input[name='tag_name[]']").on(
    "keyup change",
    function () {
      clearTimeout(debounceTimer);

      const setStorage = () => {
        const searchData = {
          location_search: $("#location-search").val(),
          location_type: $("#location_type").val(),
          tag_name: $("input[name='tag_name[]']:checked")
            .map(function () {
              return $(this).val();
            })
            .get(),
          limit: 12,
        };
        const jsonString = JSON.stringify(searchData);
        localStorage.setItem("searchData", jsonString);
      };

      debounceTimer = setTimeout(
        $(this).val() === ""
          ? localStorage.setItem(
              "searchData",
              JSON.stringify({
                location_search: "",
                location_type: "",
                tag_name: [],
                limit: 12,
              })
            )
          : setStorage,
        1000
      );
    }
  );

  let searchInterval;
  const fetchSearch = async () => {
    try {
      const jsonString = localStorage.getItem("searchData");
      const searchData = JSON.parse(jsonString);
      const formData = new FormData();
      for (const key in searchData) {
        const value = searchData[key];
        if (Array.isArray(value)) {
          value.forEach((val) => {
            formData.append(`${key}[]`, val);
          });
        } else {
          formData.append(key, value);
        }
      }

      //get all the rows
      if (!jsonString) return;

      const response = await fetchLocationSearch(formData);
      if (!response.status) {
        alert(response.message);
        return;
      }

      if (response.data.length === 0) {
        $("#location-container").empty();
        $("#location-container").append(
          `<div
              class="flex col-span-4 items-center justify-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
              role="alert"
            >
              <svg
                class="shrink-0 inline w-4 h-4 me-3"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
              </svg>
              <span class="sr-only">Info</span>
              <div>
                <span class="font-medium">No tags found!</span> Try adjusting your
                search or filters.
              </div>
            </div>`
        );
      }
      console.log(response);
      if (response.data.length > 0) {
        $("#location-container").empty();
        response.data.forEach((el) => {
          const img = el.images.split(",")[0];
          const content = `
        <div class="openVisitModal shadow-md p-8 rounded-xl bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 cursor-pointer"
            data-modal-target="visitModal" data-modal-toggle="visitModal" data-id="${
              el.location_id
            }" data-destination="${el.location_name}">
            <div class="overflow-hidden rounded-2xl">
                <img src="${img}" loading="lazy"
                    class="w-full h-90 object-cover transition-all duration-300"
                    alt="Location Image">
            </div>
            <div class="pt-5">
                <h1 class="font-extrabold text-lg">${el.location_name}</h1>
                <p class="text-sm mb-2">${sliceText(el.location_desc, 180)}</p>
                <button
                    class="transform text-green-600 font-medium transition-all duration-300 ease-in-out">

                    <p>View Location →</p>
                </button>
            </div>
        </div>
        `;

          $("#location-container").append(content);
        });
      }
    } catch (error) {
      console.log(error);
    }
  };
  searchInterval = setInterval(fetchSearch, 1000);
});
