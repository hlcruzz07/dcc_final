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
}
function FetchEvents() {
  $("#location-search-form").submit(function (e) {
    e.preventDefault();
  });
}

function ModalEvents() {}
function DataTables() {}
function ChartsJs() {}
