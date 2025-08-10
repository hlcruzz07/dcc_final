import {
  fetchLocation,
  fetchLocationScene,
} from "../../Controllers/LocationController.js";
import initModal from "../../Controllers/ModalController.js";
import {
  addVisitor,
  logoutVisitor,
} from "../../Controllers/VisitorController.js";

$(document).ready(function () {
  Cookies();
  ClickEvents();
  FetchEvents();
  ModalEvents();
  DataTables();
  ChartsJs();
});
function Cookies() {}
function ClickEvents() {
  $(document).on("click", "#logout-btn", function () {
    if (!confirm("Are you sure you want to logout?")) {
      return;
    }
    logoutVisitor();
    window.location.href = "/";
  });

  $("#visitForm").submit(async function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    try {
      const response = await addVisitor(formData);

      if (!response.status) {
        alert(response.message);
        return;
      }

      window.location.href = "/visit";
    } catch (error) {
      // console.log("Error updating location: " + error);
      console.log(error);
    }
  });

  $(document).on("click", ".openVisitModal", function () {
    const location_id = $(this).attr("data-id");
    const destination = $(this).attr("data-destination");

    $("#location_id").val(location_id);
    $("#destination").val(destination);
  });
  // Initialize timer
  let timeLeft = parseInt(localStorage.getItem("sendEmail")) || 90; // Default to 90s (1:30)
  const timerElement = document.getElementById("interval");

  // Update display immediately
  updateDisplay();

  // Timer function

  // Display formatting
  function updateDisplay() {
    const minutes = Math.floor(timeLeft / 60);
    let seconds = timeLeft % 60;
    seconds = seconds < 10 ? "0" + seconds : seconds;
    timerElement.textContent = `${minutes}:${seconds}`;
  }

  // Start/reset logic
  let timerInterval;
  function startTimer() {
    clearInterval(timerInterval); // Clear any existing timer
    timeLeft = 90;
    localStorage.setItem("sendEmail", timeLeft);
    localStorage.setItem("timeStarter", "true");
    updateDisplay();
    timerInterval = setInterval(updateTimer, 1000);
    $("#intervalCont").addClass("flex").removeClass("hidden");
    $("#spinner").addClass("hidden").removeClass("flex");
  }
  function updateTimer() {
    timeLeft--;
    localStorage.setItem("sendEmail", timeLeft);
    $("#intervalCont").addClass("flex").removeClass("hidden");
    updateDisplay();
    if (timeLeft <= 0) {
      clearInterval(timerInterval);
      localStorage.removeItem("sendEmail"); // Clean up
      localStorage.removeItem("timeStarter"); // Clean up
      timerElement.textContent = "0:00";
      $("#intervalCont").addClass("hidden").removeClass("flex");
      // Add your completion logic here
    }
  }

  // Event listener
  $(document).on("click", "#sendEmail", function () {
    $("#spinner").addClass("flex").removeClass("hidden");
    setTimeout(() => {
      startTimer();
    }, 3000);

    // Add your email sending logic here
  });

  // Auto-start if timeLeft exists and > 0
  if (timeLeft > 0 && localStorage.getItem("timeStarter")) {
    timerInterval = setInterval(updateTimer, 1000);
  }
}
async function FetchEvents() {
  $("#location-search-form").submit(function (e) {
    e.preventDefault();
  });
  let splide;
  try {
    const responseLocation = await fetchLocation();
    const responseScene = await fetchLocationScene(
      responseLocation.location_id
    );

    if (!responseLocation.status) {
      console.log(responseLocation.message);
      return;
    }
    const location_name = responseLocation.data[0].location_name;
    const location_desc = responseLocation.data[0].location_desc;
    const images = responseLocation.data[0].images.split(",");
    const tagName = responseLocation.data[0].tag_name.split(",");
    $("#location_name").html(location_name);
    $("#location_desc").html(location_desc);

    const list = $("#visit_splide .splide__list");
    list.empty();

    images.forEach((src, i) => {
      list.append(`
          <li class="splide__slide relative">
            <img src="${src.trim()}" loading="lazy"
                 alt="Location image ${i + 1}"
                 class="w-full h-full object-cover">
          </li>
        `);
    });

    if (!splide) {
      splide = new Splide("#visit_splide", {
        type: "loop",
        arrows: true,
        pagination: true,
        perPage: 1,
      }).mount();
    } else {
      splide.refresh();
    }
    const colors = [
      "red",
      "blue",
      "green",
      "yellow",
      "orange",
      "purple",
      "pink",
    ];
    tagName.forEach((tag) => {
      const randomColor = colors[Math.floor(Math.random() * colors.length)];
      const content = `
        <span
            class="bg-${randomColor}-100 text-${randomColor}-800 text-xs font-medium px-3 py-1 rounded-full dark:bg-${randomColor}-900 dark:text-${randomColor}-300">
            ${tag}
        </span>`;

      $("#tagsCont").append(content);
    });
    //SCENES
    const scenes = responseScene.scenes;
    pannellum.viewer("visit-panorama", {
      default: {
        firstScene: Object.keys(scenes)[0],
        sceneFadeDuration: 1000,
        autoLoad: true,
      },
      scenes: scenes,
    });
  } catch (error) {
    // console.log("Error updating location: " + error);
    console.log(error);
  }
}

function ModalEvents() {}
function DataTables() {}
function ChartsJs() {}
