var mode, masterData, languageData = [], doctor_id;
const module = 'doctor';

$(document).ready(function () {

  refreshDetails();

  //===[ Prevent modal form closing ]===
  $("#popup-modal").modal({
    backdrop: "static",
    keyboard: false,
  });

});



$('#add_doctor').on('click', function () {
  mode = 'new';
  cleanPoup();
  $('#languageselect').children().remove();
  $('#languageselect').append('<option value="">Select a Language</option>');
  $.each(languageData, function (key, value) {
    $('#languageselect')

      .append($('<option>', { value: value.language_id })
        .text(value.language_name));

  });
  $('#doctorModelTitle').html('Add Doctor');
  $("#popup-modal").modal("show");
});



$("#btn-submit").on('click', function () {

  $(".error").hide();

  let formObjectNew = [
    {
      value: $("#doctor_name").val(),
      error: "Please entrer the doctor name"
    },
    {
      value: $("#languageselect").val(),
      error: "Please select language"
    },
    {
      value: $("#designation").val(),
      error: "Please entrer the designation"
    },
    {
      value: $("#registration_no").val(),
      error: "Please entrer the registration_no"
    },
    {
      value: $("#doctor_img").val(),
      error: "Please upload the doctor image"
    }
  ]

  let formObjectUpdate = [
    {
      value: $("#doctor_name").val(),
      error: "Please entrer the doctor name"
    },
    {
      value: $("#languageselect").val(),
      error: "Please select language"
    },
    {
      value: $("#designation").val(),
      error: "Please entrer the designation"
    },
    {
      value: $("#registration_no").val(),
      error: "Please entrer the registration_no"
    },
  ]

  if (mode == "new") {
    if (FORM_VALIDATION(formObjectNew)) {
      insertDoctorData();
    }
  }

  if (mode == "edit") {
    if (FORM_VALIDATION(formObjectUpdate)) {
      updateDoctorData();
    }
  }

});

//====[ Edit Pet Data ]===
$(document).on("click", ".btnEdit", function () {

  mode = 'edit';
  let index = $(this).attr("id");

  doctor_id = masterData[index][module + '_id']
  cleanPoup();


  $('#languageselect').children().remove();
  $('#languageselect').append($('<option>', { value: masterData[index].language_id }).text(masterData[index].language_name));
  $.each(languageData, function (key, value) {
    $('#languageselect')
      .append($('<option>', { value: value.language_id }).text(value.language_name));
  });

  $('#doctorModelTitle').html('Edit Doctor');
  $("#doctor_name").val(masterData[index].doctor_name);
  $("#designation").val(masterData[index].designation);
  $("#registration_no").val(masterData[index].registration_no);

  if (masterData[index].doctor_img) {
    $("#doctor_image_url").attr('src', masterData[index].doctor_img);
    $("#doctor_image_url").show();
  }

  $("#popup-modal").modal("show");
});

//===[ Insert Pet Data ]===
function insertDoctorData() {

  let data = getFormData();
  POST({ module, data }).then((response) => {
    SWAL_HANDLER(response);
    refreshDetails();
  });

}

//===[ Update Pet Data ]===
function updateDoctorData() {


  let data = getFormData();
  data.append("doctor_id", doctor_id);

  PUT({ module, data }).then((response) => {
    SWAL_HANDLER(response);

    refreshDetails();
  });
}

//===[Display image on modal]===
$(document).on("change", "#doctor_img", function () {
  DISPLAY_IMAGE(this, "doctor_image_url");
});

//====[ Get All Pet Data ]===
function getDoctorDetails() {
  GET({ module }).then((data) => {
    masterData = (data);

    displayDoctorDetails(masterData);
  });
}

function getLanguageDetails() {
  GET({ module: 'language' }).then((data) => {


    languageData = data;
  });
}


//===[ Display Pet details]===
function displayDoctorDetails(tableData) {


  //===[Destroy Data Table]===
  if ($.fn.DataTable.isDataTable('#datatable')) {
    $('#datatable').DataTable().destroy();
  }

  $('#datatable tbody').empty();


  if (typeof tableData === 'string') {

    $('#datatable').dataTable({
      "oLanguage": {
        "sEmptyTable": "My Custom Message On Empty Table"
      }
    });

  }
  else {

    $("#datatable").DataTable({
      destroy: true,
      aaSorting: [],
      aaData: tableData,
      aoColumns: [
        {
          mDataProp: null,
          render: function (data, type, row, meta) {
            return meta.row + 1;
          },
        },
        {
          mDataProp: "doctor_name",
        },
        {
          mDataProp: "language_name",
        },
        {
          mDataProp: "designation",
        },
         {
          mDataProp: "registration_no",
        },
        {
          mDataProp: function (data, type, full, meta) {
            if (data.doctor_img && data.doctor_img !== "") {
              return (`<div class="text-center">
                <img src='${data.doctor_img}' alt='not-image' width='100'>
              </div>`);
            } else {
              return "<div class='d-flex align-items-center justify-content-center'>No Image</div>";
            }
          },
        },
        {
          mDataProp: function (data, type, full, meta) {
            return (
              `<a id="${meta.row}" class="btn btnEdit text-info fs-14 lh-1"> <i class="ri-edit-line"></i></a>
            <a id="${meta.row}" class="btn BtnDelete text-danger fs-14 lh-1"> <i class="ri-delete-bin-5-line"></i></a>`
            );
          },
        },
      ],
    });

  }
}

//===[Delete Data]===
$(document).on("click", ".BtnDelete", function () {

  let index = $(this).attr("id");
  mode = "delete";
  doctor_id = masterData[index][module + '_id'];
  doctor_img = masterData[index][module + '_img'];

  Swal.fire({
    title: "Alert!",
    text: `You want to delete the ${masterData[index].doctor_name}?`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {

      DELETE({ module, data: { doctor_id, doctor_img } }).then((response) => {
        SWAL_HANDLER(response);
        refreshDetails();
      });
    }
  });
});

$(document).on('change', '#navbar_title_id', function () {

  let id = $(this).val();

  $.ajax({
    type: "POST",
    url: base_url + "getsubmenu",
    data: {
      id: id
    },
    dataType: "json",
    success: function (data) {
      $('#navbar_page_id').html('<option value="">Select</option>' + data);
    },
    error: function () {
      console.log("Error");
    },
  });
})

function getFormData() {
  return new FormData($("#doctor-form")[0]);
}

function cleanPoup() {
  $('#doctor-form')[0].reset();
  $('#doctor_image_url').hide();
}

function refreshDetails() {
  getLanguageDetails();

  getDoctorDetails();
  $("#popup-modal").modal("hide");
}