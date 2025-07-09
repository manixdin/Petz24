var mode, masterData = [], language_id;
const module = 'language';

$(document).ready(function () {

  refreshDetails();

  //===[ Prevent modal form closing ]===
  $("#popup-modal").modal({
    backdrop: "static",
    keyboard: false,
  });

});

$('#add_language').on('click', function () {
  mode = 'new';
  cleanPoup();

  $('#languageModelTitle').html('Add Language');
  $("#popup-modal").modal("show");
});



$("#btn-submit").on('click', function () {

  $(".error").hide();

  let formObjectNew = [
    {
      value: $("#language_name").val(),
      error: "Please entrer the language name"
    }
  ]

  let formObjectUpdate = [
    {
      value: $("#language_name").val(),
      error: "Please entrer the language name"
    }
  ]

  if (mode == "new") {
    if (FORM_VALIDATION(formObjectNew)) {
      insertLanguageData();
    }
  }

  if (mode == "edit") {
    if (FORM_VALIDATION(formObjectUpdate)) {
      updateLanguageData();
    }
  }

});

//====[ Edit Pet Data ]===
$(document).on("click", ".btnEdit", function () {

  mode = 'edit';
  let index = $(this).attr("id");

  language_id = masterData[index][module + '_id']
  cleanPoup();

  $('#languageModelTitle').html('Edit Language');
  $("#language_name").val(masterData[index].language_name);



  $("#popup-modal").modal("show");
});

//===[ Insert Pet Data ]===
function insertLanguageData() {

  let data = getFormData();
  POST({ module, data }).then((response) => {
    SWAL_HANDLER(response);
    refreshDetails();
  });

}

//===[ Update Pet Data ]===
function updateLanguageData() {


  let data = getFormData();
  data.append("language_id", language_id);

  PUT({ module, data }).then((response) => {
    SWAL_HANDLER(response);

    refreshDetails();
  });
}



//====[ Get All Pet Data ]===
function getlanguageDetails() {
  GET({ module }).then((data) => {
    masterData = (data);

    displayLanguageDetails(masterData);
  });
}

//===[ Display Pet details]===
function displayLanguageDetails(tableData) {


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
          mDataProp: "language_name",
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
  language_id = masterData[index][module + '_id'];

  Swal.fire({
    title: "Alert!",
    text: `You want to delete the ${masterData[index].language_name}?`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {

      DELETE({ module, data: { language_id } }).then((response) => {
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
  return new FormData($("#language-form")[0]);
}

function cleanPoup() {
  $('#language-form')[0].reset();
}

function refreshDetails() {
  getlanguageDetails();
  $("#popup-modal").modal("hide");
}


