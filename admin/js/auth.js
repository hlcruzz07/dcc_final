import { adminLogin } from "/controllers/AdminController.js";

$(document).ready(function () {
  $(document).on("click", "#seePass", function () {
    const inputPword = $("#password");

    if ($(this).hasClass("fa-eye")) {
      inputPword.prop("type", "text");
      $(this).removeClass("fa-eye").addClass("fa-eye-slash");
    } else {
      inputPword.prop("type", "password");
      $(this).removeClass("fa-eye-slash").addClass("fa-eye");
    }
  });

  $("#adminForm").submit(async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    try {
      const response = await adminLogin(formData);
      if (!response.status) {
        $("#authAlert").html(data.message);
        setTimeout(() => {
          $("#authAlert").html("");
        }, 3000);
        return;
      }
      window.location.href = "/dashboard";
    } catch (error) {
      console.log(error);
    }
  });
});
