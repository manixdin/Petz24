var mode, masterData = [], support_id;
const module = 'support';

$(document).ready(function () {

  refreshDetails();

  //===[ Prevent modal form closing ]===
  $("#popup-modal").modal({
    backdrop: "static",
    keyboard: false,
  });

});

$('#add_support').on('click', function () {
  mode = 'new';
  cleanPoup();

  $('#supportModelTitle').html('Add Support');
  $("#popup-modal").modal("show");
});



$("#btn-submit").on('click', function () {

  $(".error").hide();

  let formObjectNew = [
    {
      value: $("#support_email").val(),
      error: "Please entrer the support email"
    },
     {
      value: $("#support_contact").val(),
      error: "Please entrer the support contact number"
    }
  ]

  let formObjectUpdate = [
   {
      value: $("#support_email").val(),
      error: "Please entrer the support email"
    },
     {
      value: $("#support_contact").val(),
      error: "Please entrer the support contact number"
    }
  ]

  if (mode == "new") {
    if (FORM_VALIDATION(formObjectNew)) {
      insertSupportData();
    }
  }

  if (mode == "edit") {
    if (FORM_VALIDATION(formObjectUpdate)) {
      updateSupportData();
    }
  }

});

//====[ Edit Pet Data ]===
$(document).on("click", ".btnEdit", function () {

  mode = 'edit';
  let index = $(this).attr("id");

  support_id = masterData[index][module + '_id']
  cleanPoup();

  $('#supportModelTitle').html('Edit Support');
  $("#support_email").val(masterData[index].support_email);
  $("#support_contact").val(masterData[index].support_contact);



  $("#popup-modal").modal("show");
});

//===[ Insert Pet Data ]===
function insertSupportData() {

  let data = getFormData();
  POST({ module, data }).then((response) => {
    SWAL_HANDLER(response);
    refreshDetails();
  });

}

//===[ Update Pet Data ]===
function updateSupportData() {


  let data = getFormData();
  data.append("support_id", support_id);

  PUT({ module, data }).then((response) => {
    SWAL_HANDLER(response);

    refreshDetails();
  });
}



//====[ Get All Pet Data ]===
function getsupportDetails() {
  GET({ module }).then((data) => {
    masterData = (data);

    displaySupportDetails(masterData);
  });
}

//===[ Display Pet details]===
function displaySupportDetails(tableData) {


  //===[Destroy Data Table]===
  if ($.fn.DataTable.isDataTable('#datatable')) {
    $('#datatable').DataTable().destroy();
  }

  $('#datatable tbody').empty();


  if (typeof tableData === 'string') {

    $('#datatable').dataTable({
      "oSupport": {
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
          mDataProp: "support_email",
        },

         {
          mDataProp: "support_contact",
        },

        {
          mDataProp: function (data, type, full, meta) {
            return (
              `<a id="${meta.row}" class="btn btnEdit text-info fs-14 lh-1"> <i class="ri-edit-line"></i></a>`
            );
          },
        },
      ],
    });

  }
}



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
  return new FormData($("#support-form")[0]);
}

function cleanPoup() {
  $('#support-form')[0].reset();
}

function refreshDetails() {
  getsupportDetails();
  $("#popup-modal").modal("hide");
}


