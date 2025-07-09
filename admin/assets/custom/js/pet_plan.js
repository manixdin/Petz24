var mode, masterData = [], plan_id, petData = [];
const module = 'petplan';
 
$(document).ready(function () { 
    // refreshDetails(); 
    getpetDetails();
    function getpetDetails() { 
        GET({ module: 'pet' }).then((data) => { 
            petData = data; 
            $.each(petData, function (key, value) {
                $('#petselect')
                .append($('<option>', { value: value.pet_id })
                    .text(value.pet_name));
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
                mDataProp: "plan_name",
            },
            {
                mDataProp: "plan_price",
            },

             {
    mDataProp: "plan_type",
    render: function (data, type, row) {
        if (data == 1) return "Consultation with Doctor";
        if (data == 2) return "Chat with Doctor";
        return "";
    }
},
           
            {
                mDataProp: function (data, type, full, meta) {
                if (data.plan_img && data.plan_img !== "") {
                    return (`<div class="text-center">
                    <img src='${data.plan_img}' alt='not-image' width='100'>
                    </div>`);
                } else {
                    return "<div class='d-flex align-items-center justify-content-center'>No Image</div>";
                }
                },
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

    //===[ Prevent modal form closing ]===
    $("#popup-modal").modal({
        backdrop: "static",
        keyboard: false,
    });

    $('#add_pet').on('click', function () {
      mode = 'new';
      cleanPoup();
      $('#petModelTitle').html('Add Pet Plan');
      $("#popup-modal").modal("show");
    });

    $("#btn-submit").on('click', function () { 
      $(".error").hide(); 
      let formObjectNew = [
       
        {
          value: $("#plan_name").val(),
          error: "Please entrer the plan name"
        },
        {
          value: $("#plan_price").val(),
          error: "Please entrer the plan price"
        },
     

         {
          value: $("#plan_type").val(),
          error: "Please select the plan type"
        },
        {
          value: $("#plan_img").val(),
          error: "Please upload the plan image"
        }
      ] 
      let formObjectUpdate = [
       
        {
          value: $("#plan_name").val(),
          error: "Please entrer the plan name"
        },
        {
          value: $("#plan_price").val(),
          error: "Please entrer the plan price"
        },{
          value: $("#plan_type").val(),
          error: "Please select the plan type"
        },
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
      plan_id = masterData[index]['plan_id']
      cleanPoup();
      $('#petModelTitle').html('Edit Pet Plan');
      $("#petselect").val(masterData[index].pet_id);
      $("#plan_name").val(masterData[index].plan_name);
      $("#plan_price").val(masterData[index].plan_price);
      $("#duration").val(masterData[index].duration);

      $("#plan_type").val(masterData[index].plan_type);
      if (masterData[index].plan_img) {
        $("#plan_img_url").attr('src', masterData[index].plan_img);
        $("#plan_img_url").show();
      }
      $("#popup-modal").modal("show");
    });

    //===[ Update Pet Data ]===
    function updatePlanData() { 
      let data = getFormData();
      data.append("plan_id", plan_id); 
      PUT({ module, data }).then((response) => {
        SWAL_HANDLER(response); 
        refreshDetails();
      });
    }

    //===[Delete Data]===
    $(document).on("click", ".BtnDelete", function () { 
      let index = $(this).attr("id");
      mode = "delete";
      plan_id = masterData[index]['plan_id'];
      let plan_img = masterData[index]['plan_img']; 
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
          DELETE({ module, data: { plan_id, plan_img } }).then((response) => {
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
