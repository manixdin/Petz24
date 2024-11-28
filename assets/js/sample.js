let base_admin = 'http://localhost/projects/petzadmin/';

let pet = $.ajax({
    type: "GET",
    url: base_admin + 'get' + 'pet',
    dataType: "json",
    success: function (data) {
      displayProductDetails(data);
    },
    error: function (err) {
      console.log("Error :" + err);
    },
});

let product_type = $.ajax({
    type: "GET",
    url: base_admin + 'get' + 'product_type',
    dataType: "json",
    success: function (data) {
      displayProductDetails(data);
    },
    error: function (err) {
      console.log("Error :" + err);
    },
});

let product_category = $.ajax({
    type: "GET",
    url: base_admin + 'get' + 'product_category',
    dataType: "json",
    success: function (data) {
      displayProductDetails(data);
    },
    error: function (err) {
      console.log("Error :" + err);
    },
});