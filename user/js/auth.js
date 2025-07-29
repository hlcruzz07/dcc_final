import {
  registerVisitor,
  validateKiosk,
} from "/controllers/VisitorController.js";
$(document).on("click", "#seePass", function () {
  const pwordInput = $("#password");
  if ($(this).hasClass("fa-eye")) {
    $(this).removeClass("fa-eye").addClass("fa-eye-slash");
    pwordInput.attr("type", "text");
  } else {
    $(this).removeClass("fa-eye-slash").addClass("fa-eye");
    pwordInput.attr("type", "password");
  }
});
$(document).ready(function () {
  const $provinceSelect = $("#province");
  const $citySelect = $("#city");
  const $brgySelect = $("#brgy");

  let data = {};

  $.getJSON("./assets/datasets/ph-location.json", function (jsonData) {
    data = jsonData;

    // Populate provinces from all regions
    $.each(data, function (regionCode, regionData) {
      const provinces = regionData.province_list;

      $.each(provinces, function (provinceName) {
        $provinceSelect.append(
          $("<option>").val(provinceName).text(provinceName)
        );
      });
    });
  });

  $provinceSelect.on("change", function () {
    $citySelect.html(
      "<option value='' selected hidden>Select City/Municipality</option>"
    );
    $brgySelect.html(
      "<option value='' selected hidden>Select Barangay</option>"
    );

    const selectedProvince = $provinceSelect.val();
    let cities = {};

    // Find the selected province inside any region
    $.each(data, function (regionCode, regionData) {
      if (regionData.province_list[selectedProvince]) {
        cities = regionData.province_list[selectedProvince].municipality_list;
        return false; // stop the loop once found
      }
    });

    $.each(cities, function (cityName) {
      $citySelect.append($("<option>").val(cityName).text(cityName));
    });
  });

  $citySelect.on("change", function () {
    $brgySelect.html(
      "<option value='' selected hidden>Select Barangay</option>"
    );

    const selectedProvince = $provinceSelect.val();
    const selectedCity = $citySelect.val();
    let barangays = [];

    // Find the selected city in the selected province
    $.each(data, function (regionCode, regionData) {
      const province = regionData.province_list[selectedProvince];
      if (province && province.municipality_list[selectedCity]) {
        barangays = province.municipality_list[selectedCity].barangay_list;
        return false; // stop the loop once found
      }
    });

    $.each(barangays, function (i, brgy) {
      $brgySelect.append($("<option>").val(brgy).text(brgy));
    });
  });
});
$(document).ready(function () {
  $("#registerForm").submit(async function (e) {
    e.preventDefault();
    try {
      const formData = new FormData(this);
      const response = await registerVisitor(formData);
      if (!response.status) {
        alert(response.message);
        return;
      }
      window.location.href = "/home";
    } catch (error) {
      console.error("Error User Registration: ", error);
    }
  });

  $("#kioskForm").submit(async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    try {
      const response = await validateKiosk(formData);

      if (!response.status) {
        $("#authAlert").html(response.message);
        return;
      }

      alert("Device Authorized");
      window.location.href = "/register";
    } catch (error) {
      console.error("Error Authorizing Device: ", error);
    }
  });
});
