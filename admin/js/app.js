import SimpleDataTable from "../../Controllers/DataTableController.js";
import sliceText from "../../Controllers/InputController.js";
import initModal from "../../Controllers/ModalController.js";
import { fetchAllVisitors } from "../../Controllers/VisitorController.js";
import {
  addLocation,
  fetchAllLocations,
  setAccessibility,
  deleteLocationImg,
  deleteLocation,
  updateLocation,
  deleteTag,
  locationsHasScene,
  addLocationScene,
  fetchLocationScene,
} from "../../Controllers/LocationController.js";
import {
  addArchive,
  fetchAllArchive,
  addActivity,
  fetchAllActivity,
  fetchAllAccount,
} from "../../Controllers/AdminController.js";

$(document).ready(function () {
  Theme();
  ClickEvents();
  FetchEvents();
  ModalInit();
  DataTables();
  ChartsJs();
  DeleteEvents();
  Panorama();
});
const url = new URL(window.location.href);
const location_id = url.searchParams.get("location_id");
const location_name = url.searchParams.get("location_name");
let splide;
function Theme() {
  $("#switch").on("click", function () {
    const icon = $("#iconTheme");
    if ($(this).is(":checked")) {
      icon.removeClass("fa-moon").addClass("fa-sun");
      $("html").removeClass("light").addClass("dark");
      localStorage.setItem("theme", "dark");
    } else {
      icon.removeClass("fa-sun").addClass("fa-moon");
      $("html").removeClass("dark").addClass("light");
      localStorage.setItem("theme", "light");
    }
  });
  $(document).on("click", "#seePass", function () {
    const inputPword = $("#edit_account_password");

    if ($(this).hasClass("fa-eye")) {
      inputPword.prop("type", "text");
      $(this).removeClass("fa-eye").addClass("fa-eye-slash");
    } else {
      inputPword.prop("type", "password");
      $(this).removeClass("fa-eye-slash").addClass("fa-eye");
    }
  });

  $(document).ready(function () {
    const theme = localStorage.getItem("theme");
    if (theme === "dark") {
      $("#switch").prop("checked", true);
      $("#iconTheme").removeClass("fa-moon").addClass("fa-sun");
      $("html").removeClass("light").addClass("dark");
    } else {
      $("#switch").prop("checked", false);
      $("#iconTheme").removeClass("fa-sun").addClass("fa-moon");
      $("html").removeClass("dark").addClass("light");
    }
  });
}

function DataTables() {
  fetchAllLocations().then((response) => {
    if (!response.status) {
      alert(response.message);
      return;
    }
    const tableSelector = "#locations-table";
    const tbody = $(`${tableSelector} tbody`);
    tbody.empty();
    response.data.forEach((element) => {
      let locationType = "";
      switch (element.location_type) {
        case "Building":
          locationType = `<span class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-purple-900 dark:text-purple-300">${element.location_type}</span>`;
          break;
        case "Facility":
          locationType = `<span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-yellow-900 dark:text-yellow-300">${element.location_type}</span>`;
          break;
        case "Room":
          locationType = `<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">${element.location_type}</span>`;
          break;
        case "Office":
          locationType = `<span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">${element.location_type}</span>`;
          break;
      }
      const content = `
      <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
        <td data-label="#"><span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">${
          element.location_id
        }</span></td>
        <td data-label="Name">${element.location_name}</td>
        <td data-label="Description">${sliceText(
          element.location_desc,
          50
        )}</td>
         <td data-label="Type">${locationType}</td>
        <td data-label="Date">${element.date}</td>
        <td data-label="Accessibility">
          <span>
            <label class="inline-flex items-center cursor-pointer relative">
              <input type="checkbox" data-id="${element.location_id}" value="${
        element.isAccessable
      }" class="isAccessable-btn sr-only peer" ${
        element.isAccessable === 1 ? "checked" : ""
      }>
              <div
                class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full
                      peer peer-checked:after:translate-x-4  peer-checked:after:border-white
                      after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300
                      after:border after:rounded-full after:w-4 after:h-4 after:transition-all peer-checked:bg-blue-600
                      dark:bg-gray-700 dark:peer-focus:ring-blue-500 dark:after:bg-gray-800 dark:after:border-gray-600
                      dark:peer-checked:bg-blue-500">
              </div>
            </label>
          </span>
        </td>
        <td data-label="Action">
          <div class="flex flex-wrap gap-2">
              <button
              title="Edit Location"
              data-modal-toggle="edit-location-modal"
              data-location-id = "${element.location_id}"
              data-location-desc = "${element.location_desc}"
              data-location-name = "${element.location_name}"
              data-location-type = "${element.location_type}"
              data-location-img-id = "${element.img_id}"
              data-location-img = "${element.images}"
              data-location-tag-id = "${element.tag_id}"
              data-location-tag-name = "${element.tag_name}"
              class="edit-location-btn
              text-md text-white p-2 rounded-lg bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 active:bg-indigo-700 transition-colors duration-200 cursor-pointer">
                <i class="fa-solid fa-pen"></i>
              </button>
              <a 
              title="Location Scenes"
              href="/location-scene?location_id=${
                element.location_id
              }&location_name=${
        element.location_name
      }" class="text-md text-white p-2 rounded-lg bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2 active:bg-green-700 transition-colors duration-200 cursor-pointer">
                  <i class="fa-solid fa-street-view"></i>
              </a>
              <button
              title="Delete Location"
              data-location-id="${element.location_id}"
              class="delete-location-btn text-md text-white p-2 rounded-lg bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 active:bg-red-700 transition-colors duration-200 cursor-pointer">
                <i class="fa-solid fa-trash"></i>
              </button>
            </div>
        </td>
      </tr>
    `;
      tbody.append(content);
    });
    SimpleDataTable(tableSelector, {
      hiddenColumns: [5, 6],
      filename: "Locations - list",
    });
  });

  fetchAllActivity()
    .then((response) => {
      if (!response.status) {
        alert(response.message);
        return;
      }
      const tableSelector = "#logs-table";
      const tbody = $(`${tableSelector} tbody`);
      tbody.empty();

      response.data.forEach((element) => {
        let action;
        switch (element.action_taken) {
          case "CREATE":
            action = `<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">${element.action_taken}</span>`;
            break;
          case "UPDATE":
            action = `<span class="bg-blue-300 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300">${element.action_taken}</span>`;
            break;
          case "DELETE":
            action = `<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">${element.action_taken}</span>`;
            break;
        }

        const img =
          element.img === "" ? "../../assets/img/default.jpg" : element.img;
        const content = `
          <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
            <td data-label="#">${element.id}</td>
            <td data-label="Admin ID">${element.admin_id}</td>
            <td data-label="Picture"><img src="${img}" class="w-12 h-12 object-cover rounded-full" loading="lazy" alt="Admin Image" /></td>
            <td data-label="Username">${element.username}</td>
            <td data-label="Description">${element.action_desc}</td>
            <td data-label="Action Taken">${action}</td>
            <td data-label="Date">${element.date}</td>
          </tr>
        `;
        tbody.append(content);
      });
      SimpleDataTable(tableSelector, {
        hiddenColumns: [],
        filename: "Activity Logs - list",
      });
    })
    .catch((error) => {
      console.log("Error fetching activity logs data: " + error);
    });

  fetchAllArchive()
    .then((response) => {
      if (!response.status) {
        alert(response.message);
        return;
      }
      const tableSelector = "#archive-table";
      const tbody = $(`${tableSelector} tbody`);
      tbody.empty();

      response.data.forEach((element) => {
        const content = `
          <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
            <td data-label="#">${element.id}</td>
            <td data-label="Table Id">${element.table_id}</td>
            <td data-label="Page Name">${element.page_name}</td>
            <td data-label="Date">${element.date}</td>
            <td data-label="Action">
              <button type="button" title="Restore" data-id="${element.id}" data-table-id="${element.table_id}" data-table-name="${element.table_name}"
                  class="restore-btn cursor-pointer focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 p-3 rounded-full">
                  <i class="fa-solid fa-rotate-right"></i>
              </button>
            </td>
          </tr>
        `;
        tbody.append(content);
      });
      SimpleDataTable(tableSelector, {
        hiddenColumns: [4],
        filename: "Archive - list",
      });
    })
    .catch((error) => {
      console.log("Error fetching archive data: " + error);
    });

  fetchAllAccount()
    .then((response) => {
      if (!response.status) {
        alert(response.message);
        return;
      }
      const tableSelector = "#accounts-table";
      const tbody = $(`${tableSelector} tbody`);
      tbody.empty();
      response.data.forEach((element) => {
        const img =
          element.img === "" ? "../../assets/img/default.jpg" : element.img;
        const content = `
          <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
            <td data-label="#">${element.id}</td>
            <td data-label="Image"><img src="${img}" class="w-12 h-12 object-cover rounded-full" loading="lazy" alt="Admin Image" /></td>
            <td data-label="Username">${element.username}</td>
            <td data-label="Date Created">${element.created_at}</td>
            <td data-label="Date Updated">${element.updated_at ?? ""}</td>
            <td data-label="Action">
              <div class="flex flex-wrap gap-2">
                  <button
                  title="Edit Account"
                  data-modal-toggle="edit-account-modal"
                  data-id="${element.id}"
                  data-username="${element.username}"
                  data-img = "${element.img}"
                  class="edit-account-btn
                  text-md text-white p-2 rounded-lg bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 active:bg-indigo-700 transition-colors duration-200 cursor-pointer">
                    <i class="fa-solid fa-pen"></i>
                  </button>
                  <button
                  title="Delete Account"
                  data-id="${element.id}"
                  class="delete-account-btn text-md text-white p-2 rounded-lg bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 active:bg-red-700 transition-colors duration-200 cursor-pointer">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </div>
            </td>
          </tr>
        `;
        tbody.append(content);
      });
      SimpleDataTable(tableSelector, {
        hiddenColumns: [4],
        filename: "Accounts - list",
      });
    })
    .catch((error) => {
      console.log("Error fetching account data: " + error);
    });
}
function FetchEvents() {
  let splide;
  $(document).on("click", ".edit-location-btn", function (e) {
    e.preventDefault();

    const locationId = $(this).data("location-id");
    const locationDesc = $(this).data("location-desc");
    const locationName = $(this).data("location-name");
    const locationType = $(this).data("location-type");
    const locationImgId = $(this).data("location-img-id");
    const locationImg = $(this).data("location-img").split(",");
    const locationTagId = $(this).data("location-tag-id").split(",");
    const locationTagName = $(this).data("location-tag-name").split(",");
    $("#edit_location_id").val(locationId);
    $("#edit_location_desc").val(locationDesc);
    $("#edit_location_name").val(locationName);
    $("#edit_location_type").val(locationType);

    const list = $("#locationSplide .splide__list");
    list.empty();

    if (locationImg.length > 1) {
      locationImg.forEach((src, i) => {
        const img_id = locationImgId.split(",")[i];

        list.append(`
          <li class="splide__slide relative">
          ${
            locationImg.length !== 1
              ? `<i class="delete-location-img cursor-pointer fa-solid fa-trash absolute bottom-3 right-3 text-md p-2 px-2.5 rounded-full text-red-500 dark:text-red-700 bg-white dark:bg-gray-800" data-img-id="${img_id}" title="${img_id}"></i>`
              : ""
          }
            <img src="${src.trim()}" loading="lazy"
                 alt="Location image ${i + 1}"
                 class="w-full h-full object-cover rounded-md">
          </li>
        `);
      });
    } else {
      list.append(`
        <li class="splide__slide relative">
        ${
          locationImg.length !== 1
            ? `<i class="delete-location-img cursor-pointer fa-solid fa-trash absolute bottom-3 right-3 text-md p-2 px-2.5 rounded-full text-red-500 dark:text-red-700 bg-white dark:bg-gray-800" data-img-id="${locationImgId}" title="${locationImgId}"></i>`
            : ""
        }
          <img src="${locationImg}" loading="lazy"
               alt="Location image"
               class="w-full h-full object-cover rounded-md">
        </li>
      `);
    }
    $("#editTagContainer").empty();
    locationTagId.forEach((el, i) => {
      const tag_id = el;
      const tag_name = locationTagName[i];

      const deletBtn =
        locationTagId.length <= 3
          ? ""
          : `<i class="delete_location_tag fa-solid fa-circle-xmark ms-1 hover:text-white cursor-pointer transition-all ease-in-out duration-300" data-id="${tag_id}"></i>`;
      $("#editTagContainer").append(`
        <span class="tag bg-green-100 text-green-800 font-medium text-sm px-3 py-1 rounded-sm dark:bg-green-900 dark:text-green-300">${tag_name}
          ${deletBtn}
      </span>
        `);
    });

    if (!splide) {
      splide = new Splide("#locationSplide", {
        type: "slide",
        arrows: true,
        pagination: true,
        perPage: 1,
      }).mount();
    } else {
      splide.refresh();
    }
  });

  $(document).on("click", ".edit-account-btn", function (e) {
    e.preventDefault();

    const id = $(this).attr("data-id");
    const username = $(this).attr("data-username");
    const img = $(this).attr("data-img");

    console.log(img);
    $("#edit_account_id").val(id);
    $("#edit_account_username").val(username);
    $("#account_img_prev").prop(
      "src",
      img === "" ? "./assets/img/default.jpg" : img
    );
  });
}
function ClickEvents() {
  // ADDING LOCATION TAGS
  $("#addTagBtn").on("click", function () {
    const inputTag = $("#tag_name");

    if (inputTag.val() === null || inputTag.val() === "") {
      inputTag.get(0).setCustomValidity("Please input Tag name");
      inputTag.get(0).reportValidity();
      return;
    } else {
      inputTag.get(0).setCustomValidity("");
    }

    let tagValue = inputTag.val().trim().toLowerCase();
    let isDuplicate = false;

    $(".input_tag").each(function () {
      if (
        $(this).val().trim().toLowerCase() === tagValue &&
        this !== inputTag.get(0)
      ) {
        isDuplicate = true;
        return false;
      }
    });

    if (isDuplicate) {
      inputTag.get(0).setCustomValidity("Tag name already exists");
      inputTag.get(0).reportValidity();
      return;
    } else {
      inputTag.get(0).setCustomValidity("");
    }

    const content = `
      <span class="tag bg-green-100 text-green-800 font-medium text-sm px-3 py-1 rounded-sm dark:bg-green-900 dark:text-green-300">${inputTag.val()}
          <i class="location_tag fa-solid fa-circle-xmark ms-1 hover:text-white cursor-pointer transition-all ease-in-out duration-300"></i>
          <input type="hidden" value="${inputTag.val()}" name="location_tag[]" class="input_tag">
      </span>`;
    $("#tagContainer").append(content);
    inputTag.val("");
  });
  $("#tag_name").on("keypress", function () {
    $(this).get(0).setCustomValidity("");
  });

  $(document).on("click", ".location_tag", function () {
    const index = $(this).index(".location_tag");

    $(".tag").eq(index).remove();
  });

  // ADDING LOCATION
  $(document).on("submit", "#add-location-form", async function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    $("#tag_name").get(0).setCustomValidity("");
    console.log($(".tag").length);
    if ($(".tag").length < 3) {
      $("#tag_name").get(0).setCustomValidity("Minimum Tags is 3");
      $("#tag_name").get(0).reportValidity();
      return;
    }

    try {
      const response = await addLocation(formData);

      if (!response.status) {
        alert(response.message);
        return;
      }
      addActivity("Added New Location", "CREATE");
      alert("Location Added");
    } catch (error) {
      console.log("Error adding location: " + error);
    }
  });

  // ADDING LOCATION TAGS
  $("#editAddTagBtn").on("click", function () {
    const inputTag = $("#edit_tag_name");

    if (inputTag.val() === null || inputTag.val() === "") {
      inputTag.get(0).setCustomValidity("Please input Tag name");
      inputTag.get(0).reportValidity();
      return;
    } else {
      inputTag.get(0).setCustomValidity("");
    }

    let tagValue = inputTag.val().trim().toLowerCase();
    let isDuplicate = false;

    $(".input_tag").each(function () {
      if (
        $(this).val().trim().toLowerCase() === tagValue &&
        this !== inputTag.get(0)
      ) {
        isDuplicate = true;
        return false;
      }
    });

    if (isDuplicate) {
      inputTag.get(0).setCustomValidity("Tag name already exists");
      inputTag.get(0).reportValidity();
      return;
    } else {
      inputTag.get(0).setCustomValidity("");
    }

    const content = `
      <span class="edit_tag bg-indigo-100 text-indigo-800 font-medium text-sm px-3 py-1 rounded-sm dark:bg-indigo-900 dark:text-indigo-300">${inputTag.val()}
          <i class="edit_location_tag fa-solid fa-circle-xmark ms-1 hover:text-white cursor-pointer transition-all ease-in-out duration-300"></i>
          <input type="hidden" value="${inputTag.val()}" name="edit_location_tag[]" class="input_tag">
      </span>`;
    $("#editTagContainer").append(content);
    inputTag.val("");
  });
  $("#edit_tag_name").on("keypress", function () {
    $(this).get(0).setCustomValidity("");
  });
  $(document).on("click", ".edit_location_tag", function () {
    const index = $(this).index(".edit_location_tag");

    $(".edit_tag").eq(index).remove();
  });

  $(document).on("submit", "#edit-location-form", async function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    try {
      const response = await updateLocation(formData);

      if (!response.status) {
        alert(response.message);
        return;
      }

      addActivity("Updated Location", "UPDATE");
      alert("Location Updated");
      location.reload();
    } catch (error) {
      console.log("Error updating location: " + error);
    }
  });

  $(document).on("click", ".isAccessable-btn", async function () {
    const isChecked = $(this).is(":checked");
    const id = $(this).attr("data-id");
    const value = isChecked ? 1 : 0;

    try {
      const response = await setAccessibility(id, value);
      if (!response.status) {
        alert(response.message);
        return;
      }
      addActivity("Set Location Accessibility", "UPDATE");
    } catch (error) {
      console.log(`Error setting location access: ${error}`);
    }
  });

  $(document).on("click", ".restore-btn", function () {
    const id = $(this).attr("data-id");
    const table_id = $(this).attr("data-table-id");
    const table_name = $(this).attr("data-table-name");
  });

  $(document).on("submit", "#add-scene-form", async function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    try {
      const response = await addLocationScene(formData);

      if (!response.status) {
        alert(response.message);
        return;
      }
      addActivity("Added New Location Scene", "CREATE");
      alert("Location Scene Added");
      console.log(response);
    } catch (error) {
      console.log(error);
    }
  });
}

function DeleteEvents() {
  $(document).on("click", ".delete-location-img", async function (e) {
    e.preventDefault();
    const imgId = $(this).data("img-id");

    const confirmDel = confirm("Are you sure you want to delete this?");
    if (!confirmDel) return;
    try {
      const response = await deleteLocationImg(imgId);
      if (!response.status) {
        alert(response.message);
        return;
      }
      addArchive(imgId, "locaitons_img", "Locations");
      addActivity("Deleted Location Image", "DELETE");
      alert("Image Deleted");
      location.reload();
    } catch (error) {
      console.log(`Error deleting location image: ${error}`);
    }
  });

  $(document).on("click", ".delete-location-btn", async function (e) {
    e.preventDefault();
    const id = $(this).attr("data-location-id");

    const confirmDel = confirm("Are you sure you want to delete this?");
    if (!confirmDel) return;
    try {
      const response = await deleteLocation(id);
      if (!response.status) {
        alert(response.message);
        return;
      }
      addArchive(id, "locations", "Locations");
      addActivity("Deleted Location", "DELETE");
      alert("Location Deleted");
      location.reload();
    } catch (error) {
      console.log(`Error deleting location: ${error}`);
    }
  });

  $(document).on("click", ".delete_location_tag", async function () {
    const id = $(this).attr("data-id");

    const confirmDel = confirm("Are you sure you want to delete this?");
    if (!confirmDel) return;
    console.log(id);
    try {
      const response = await deleteTag(id);
      if (!response.status) {
        alert(response.message);
        return;
      }
      addArchive(id, "locations_tag", "Location Tags");
      addActivity("Deleted Location Tag", "DELETE");
      alert("Location Tag Deleted");
      location.reload();
    } catch (error) {
      console.log(`Error deleting location tag: ${error}`);
    }
  });
}
function ChartsJs() {}
function ModalInit() {
  initModal("add-location-modal", {}, "dynamic");
  initModal("edit-location-modal", {}, "dynamic");
  initModal("edit-account-modal", {}, "dynamic");
  initModal(
    "add-scene-modal",
    {
      options: {
        onShow: function () {
          console.log("Modal is shown");
        },
        onHide: function () {
          location.reload();
        },
      },
    },
    "static"
  );
}
function Panorama() {
  if (location_id && location_name) {
    locationsHasScene(location_id).then((response) => {
      const hasScene = response.data[0].scene_row >= 1;

      const textInputs = document.getElementById("textInputs");
      const imageInput = document.getElementById("scene_img");
      const backBtn = document.getElementById("backBtn");
      const nextBtn = document.getElementById("nextBtn");
      const destBtn = document.getElementById("destBtn");

      if (!hasScene) {
        backBtn.remove();
      }
      let viewer;
      let hotspots = [];
      let placing = ""; // "back", "next", or "destination"

      function setPlacing(type) {
        placing = type;
        [backBtn, nextBtn, destBtn].forEach((btn) => {
          btn.classList.remove(
            "bg-green-600",
            "text-white",
            "border-green-600"
          );
          btn.classList.add("bg-gray-50", "text-gray-900", "border-gray-200");
        });
        if (type) {
          const activeBtn = document.getElementById(`${type}Btn`);
          activeBtn.classList.remove(
            "bg-gray-50",
            "text-gray-900",
            "border-gray-200"
          );
          activeBtn.classList.add(
            "bg-green-600",
            "text-white",
            "border-green-600"
          );
        }
      }

      backBtn.onclick = () => setPlacing("back");
      nextBtn.onclick = () => setPlacing("next");
      destBtn.onclick = () => setPlacing("destination");

      imageInput.onchange = (e) => {
        const file = e.target.files[0];
        if (!file) return;

        const url = URL.createObjectURL(file);
        if (viewer) viewer.destroy();

        hotspots = [];
        placing = "";
        textInputs.innerHTML = "";
        setPlacing("");

        viewer = pannellum.viewer("panorama", {
          type: "equirectangular",
          panorama: url,
          autoLoad: true,
          showControls: true,
        });
        document.getElementById("panorama").style.height = "800px";

        viewer.on("mousedown", (ev) => {
          if (!placing) return;

          // Check if we already have 2 hotspots
          if (hotspots.length >= 2) {
            alert(
              "Maximum of 2 hotspots allowed (Back + Next or Back + Destination)"
            );
            return;
          }

          // Prevent adding Next if Destination exists
          if (
            placing === "next" &&
            hotspots.find((h) => h.role === "destination")
          ) {
            alert("Cannot add Next hotspot when Destination exists");
            return;
          }

          // Prevent adding Destination if Next exists
          if (
            placing === "destination" &&
            hotspots.find((h) => h.role === "next")
          ) {
            alert("Cannot add Destination hotspot when Next exists");
            return;
          }

          const existing = hotspots.find((h) => h.role === placing);
          if (existing) return;

          const [pitch, yaw] = viewer
            .mouseEventToCoords(ev)
            .map((v) => +v.toFixed(2));
          const markerId = placing + "-marker";

          const data = {
            id: markerId,
            pitch,
            yaw,
            type: placing === "destination" ? "destination" : "scene",
            text: "",
            textPlaceholder:
              placing === "back"
                ? "Back to Scene Name"
                : placing === "next"
                ? "Go to Scene Name"
                : "Enter Destination Name",
            sceneId: "",
            role: placing,
          };
          hotspots.push(data);

          // Link Back and Next if both exist
          if (hotspots.length === 2) {
            const b = hotspots.find((h) => h.role === "back");
            const n = hotspots.find((h) => h.role === "next");
            if (b && n) {
              b.sceneId = n.id;
              n.sceneId = b.id;
            }
          }

          viewer.addHotSpot({
            ...data,
            cssClass:
              placing === "destination"
                ? "destination-hotspot"
                : "custom-hotspot",
            createTooltipFunc(div) {
              div.classList.add(
                placing === "destination"
                  ? "destination-hotspot"
                  : "custom-hotspot"
              );
              div.addEventListener("contextmenu", (e) => {
                e.preventDefault();
                viewer.removeHotSpot(markerId);
                const idx = hotspots.findIndex((h) => h.id === markerId);
                if (idx > -1) {
                  hotspots.splice(idx, 1);
                  textInputs.children[idx].remove();
                  // Update links if we had Back+Next
                  const b = hotspots.find((h) => h.role === "back");
                  const n = hotspots.find((h) => h.role === "next");
                  if (b && n) {
                    b.sceneId = n.id;
                    n.sceneId = b.id;
                  } else if (b || n) {
                    (b || n).sceneId = "";
                  }
                }
              });
            },
          });

          const row = document.createElement("div");
          row.className = "flex items-center gap-2";

          const txt = document.createElement("input");
          txt.value = data.text;
          txt.placeholder = data.textPlaceholder;
          txt.required = true;
          txt.className =
            "bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5";
          txt.oninput = () => {
            data.text = txt.value;
          };

          const pitchHid = document.createElement("input");
          pitchHid.type = "hidden";
          pitchHid.value = pitch;

          const yawHid = document.createElement("input");
          yawHid.type = "hidden";
          yawHid.value = yaw;

          const namePrefix =
            placing === "back"
              ? "back"
              : placing === "next"
              ? "next"
              : "destination";

          txt.name = `${namePrefix}_text`;
          pitchHid.name = `${namePrefix}_pitch`;
          yawHid.name = `${namePrefix}_yaw`;

          const pitchVis = document.createElement("input");
          pitchVis.value = pitch;
          pitchVis.disabled = true;
          pitchVis.className =
            "w-20 p-2.5 text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 dark:bg-gray-500 dark:border-gray-600 dark:text-black";

          const yawVis = document.createElement("input");
          yawVis.value = yaw;
          yawVis.disabled = true;
          yawVis.className =
            "w-20 p-2.5 text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 dark:bg-gray-500 dark:border-gray-600 dark:text-black";

          row.append(txt, pitchVis, yawVis, pitchHid, yawHid);
          textInputs.appendChild(row);

          setPlacing("");
        });
      };
    });
  }

  if (location_id) {
    fetchLocationScene(location_id)
      .then((response) => {
        if (response.status) {
          const scenes = response.scenes;

          pannellum.viewer("display_scene", {
            default: {
              firstScene: Object.keys(scenes)[0],
              sceneFadeDuration: 1000,
              autoLoad: true,
            },
            scenes: scenes,
          });
        } else {
          console.error("Failed to load scenes.");
        }
      })
      .catch((error) => {
        console.log(error);
      });
  }
}
