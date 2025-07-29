export function adminLogin(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/adminLogin.php",
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function addArchive(table_id, table_name, page_name) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/addArchive.php",
      method: "POST",
      data: {
        table_id: table_id,
        table_name: table_name,
        page_name: page_name,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function fetchAllArchive() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/fetchAllArchive.php",
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function addActivity(action_desc, action_taken) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/addActivity.php",
      method: "POST",
      data: {
        action_desc: action_desc,
        action_taken: action_taken,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}
export function fetchAllActivity() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/fetchAllActivity.php",
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function fetchAllAccount() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/fetchAllAccount.php",
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}

export function addAdminNotif(message) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/adminLogin.php",
      method: "POST",
      data: {
        message: message,
      },
      success: function (response) {
        resolve(response);
      },
      error: function (response) {
        reject(response);
      },
    });
  });
}
