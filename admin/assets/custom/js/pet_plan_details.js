var mode, masterData = [], plan_details_id, petData = [];
const module = 'petplandetails';
 
$(document).ready(function () { 
    // refreshDetails(); 
    getpetDetails();
    function getpetDetails() { 
        GET({ module: 'petplan' }).then((data) => { 
            petData = data; 
            $.each(petData, function (key, value) {
                $('#petselect')
                .append($('<option>', { value: value.plan_id })
                    .text(` ${value.plan_name}`));
            });
        }); 
    }

    getpetPlanDetails();
    function getpetPlanDetails() {
        GET({ module }).then((data) => {
        masterData = (data); 
        displayPetDetails(masterData);
        });
    }

    //===[ Display Pet details]===
    function displayPetDetails(tableData) { 
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
                    mDataProp: function (data, type, full, meta) {
                    return (
                        `<p> ${data.plan_name}</p>`
                    );
                    },
                },
                {
                    mDataProp: "service_name",
                },
                {
                    mDataProp: "service_details",
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

    //===[ Prevent modal form closing ]===
    $("#popup-modal").modal({
        backdrop: "static",
        keyboard: false,
    });

    $('#add_pet').on('click', function () {
      mode = 'new';
      cleanPoup();
      $('#petModelTitle').html('Add Pet Plan Details');
      $("#popup-modal").modal("show");
    });

    $("#btn-submit").on('click', function () { 
      $(".error").hide(); 
      let formObjectNew = [
        {
          value: $("#petselect").val(),
          error: "Please select the plan name"
        },
        {
          value: $("#service_name").val(),
          error: "Please entrer the service name"
        },
        {
          value: $("#service_details").val(),
          error: "Please entrer the service details"
        }
      ] 
      let formObjectUpdate = [
        {
          value: $("#petselect").val(),
          error: "Please select the plan name"
        },
        {
          value: $("#service_name").val(),
          error: "Please entrer the service name"
        },
        {
          value: $("#service_details").val(),
          error: "Please entrer the service details"
        }
      ] 
      if (mode == "new") {
        if (FORM_VALIDATION(formObjectNew)) {
          insertPlanData();
        }
      } 
      if (mode == "edit") {
        if (FORM_VALIDATION(formObjectUpdate)) {
          updatePlanData();
        }
      } 
    });

    //===[ Insert Pet Data ]===
    function insertPlanData() { 
      let data = getFormData();
      POST({ module, data }).then((response) => {
        SWAL_HANDLER(response);
        refreshDetails();
      }); 
    }

    //====[ Edit Pet Data ]===
    $(document).on("click", ".btnEdit", function () {
      mode = 'edit';
      let index = $(this).attr("id");
      plan_details_id = masterData[index]['plan_details_id']
      cleanPoup();
      $('#petModelTitle').html('Edit Pet Plan Details');
      $("#petselect").val(masterData[index].plan_id);
      $("#service_name").val(masterData[index].service_name);
      $("#service_details").val(masterData[index].service_details);
      $("#popup-modal").modal("show");
    });

    //===[ Update Pet Data ]===
    function updatePlanData() { 
      let data = getFormData();
      data.append("plan_details_id", plan_details_id); 
      PUT({ module, data }).then((response) => {
        SWAL_HANDLER(response); 
        refreshDetails();
      });
    }

    //===[Delete Data]===
    $(document).on("click", ".BtnDelete", function () { 
      let index = $(this).attr("id");
      mode = "delete";
      plan_details_id  = masterData[index]['plan_details_id'];
      Swal.fire({
        title: "Alert!",
        text: `You want to delete this data?`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) { 
          DELETE({ module, data: { plan_details_id } }).then((response) => {
            SWAL_HANDLER(response);
            refreshDetails();
          });
        }
      });
    });
    
    
  function refreshDetails() {
    getpetPlanDetails();
    $("#popup-modal").modal("hide");
  }
}); 








//===[Display image on modal]===
$(document).on("change", "#pet_img", function () {
  DISPLAY_IMAGE(this, "pet_image_url");
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
  return new FormData($("#pet-form")[0]);
}

function cleanPoup() {
  $('#pet-form')[0].reset();
  $('#pet_image_url').hide();
}
