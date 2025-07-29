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
$("#refresh").on("click", function () {
  location.reload();
});
