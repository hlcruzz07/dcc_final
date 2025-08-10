import { addFeedback } from "../../Controllers/AdminController.js";
import { fetchLocationScene } from "../../Controllers/LocationController.js";

const token = new URLSearchParams(window.location.search).get("scan_token");
function sendTokenToAPI(token) {
  return $.ajax({
    url: "../../api/fetchScanLocation.php",
    method: "GET",
    data: {
      token: token,
    },
  })
    .then(function (response) {
      return response; // success handler
    })
    .catch(function (xhr, status, error) {
      throw new Error("Request failed: " + error);
    });
}
function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(";").shift();
}

$(document).ready(function () {
  sendTokenToAPI(token)
    .then(async (data) => {
      let splide;
      try {
        const responseLocation = data;
        const responseScene = await fetchLocationScene(
          responseLocation.location_id
        );
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
    })
    .catch((error) => {
      console.log(error);
    });

  $("#feedbackForm").submit(async function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    try {
      if (sessionStorage.getItem("submitForm")) {
        alert("You already submitted a feedback");
        return;
      }
      const response = await addFeedback(formData);
      if (!response) {
        alert(response.message);
        return;
      }
      alert("Feedback Submitted");
      location.reload();
      sessionStorage.setItem("submitForm", "true");
    } catch (error) {
      console.log(error);
    }
  });
});
