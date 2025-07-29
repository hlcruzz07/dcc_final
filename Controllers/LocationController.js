export function addLocation(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/addLocation.php",
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

export function fetchAllLocations() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/fetchAllLocations.php",
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

export function updateLocation(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/updateLocation.php",
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

export function setAccessibility(id, value) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/setAccessibility.php",
      method: "POST",
      data: {
        id: id,
        value: value,
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

export function deleteLocationImg(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/deleteLocationImg.php",
      method: "POST",
      data: {
        id: id,
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

export function deleteLocation(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/deleteLocation.php",
      method: "POST",
      data: {
        id: id,
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
export function deleteTag(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/deleteTag.php",
      method: "POST",
      data: {
        id: id,
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

export function locationsHasScene(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/locationsHasScene.php",
      method: "POST",
      data: {
        id: id,
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

export function addLocationScene(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/addLocationScene.php",
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

export function fetchLocationScene(id) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/fetchLocationScene.php",
      method: "GET",
      data: {
        id: id,
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
export function fetchAllLocationTags() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/fetchAllLocationTags.php",
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

export function fetchLocationSearch(formData) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: "./api/fetchLocationSearch.php",
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
