var mode, masterData, clinic_id;
const module = 'clinic';

$(document).ready(function () {

  refreshDetails();

  //===[ Prevent modal form closing ]===
  $("#popup-modal").modal({
    backdrop: "static",
    keyboard: false,
  });

});

$('#add_clinic').on('click',function () {
  mode = "new";
  $('#clinic-form')[0].reset();
  $('#clinicModelTitle').html('Add Clinic');
  $("#popup-modal").modal("show");
});

$("#btn-submit").on('click', function () {   
  $(".error").hide();
  let formObject = [
    {
      value: $("#clinic_name").val(),
      error: "Please enter the clinic name"
    },{
      value: $("#address").val(),
      error: "Please enter the address"
    },{
      value: $("#city").val(),
      error: "Please enter the city"
    },{
      value: $("#city").val(),
      error: "Please enter the city"
    },{
      value: $("#state").val(),
      error: "Please enter the state"
    },{
      value: $("#pincode").val(),
      error: "Please enter the pincode"
    }
  ]
  

  if (FORM_VALIDATION(formObject)) {
    if (mode == "new") {
      insertClinicData();
      }
    if (mode == "edit") {
      updateClinicData();
    }
  }
});

//====[ Edit Product Data ]===
$(document).on("click", ".btnEdit", function () {
  mode = 'edit';
  let index = $(this).attr("id");
  clinic_id = masterData[index]['clinic_id'];
  $('#clinicModelTitle').html('Edit Clinic');
  $("#clinic_name").val(masterData[index].clinic_name);
  $("#address").val(masterData[index].address);
  $("#city").val(masterData[index].city);
  $("#state").val(masterData[index].state);
  $("#pincode").val(masterData[index].pincode);
  $("#popup-modal").modal("show");
});



function getFormData(){
  return new FormData($("#clinic-form")[0]);
}

function refreshDetails(){
  getClinic();
  $("#popup-modal").modal("hide");
}


//===[ Insert Product Data ]===
function insertClinicData() {

  let data = getFormData();
  POST({ module, data }).then((response) => {
    SWAL_HANDLER(response);
    refreshDetails();
  });
}

//===[ Update Product Data ]===
function updateClinicData() {

  let data = getFormData();
  
  data.append("clinic_id", clinic_id);

  PUT({ module, data }).then((response) => {
    SWAL_HANDLER(response);

    refreshDetails();
  });
}

    
  


    //====[ Get All Pet Data ]===
function getClinic() {
  GET({ module }).then((data) => {
    masterData=(data);

    console.log(data);
    
    displayClinicDetails(masterData);
  });
}



    function displayClinicDetails(tableData) {


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
              mDataProp: "clinic_name",
            },
            {
              mDataProp: "address",
            },
            {
              mDataProp: "city",
            },
            {
              mDataProp: "state",
            },
            {
              mDataProp: "pincode",
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
    
    // *************************** [Delete Data] *************************************************************************
    $(document).on("click", ".BtnDelete", function () {
      mode = "delete";
      var index = $(this).attr("id");
      clinic_id = masterData[index]['clinic_id'];
      
  
      Swal.fire({
        title: "Are you sure?",
        text: "You want to delete it?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
    
          DELETE({ module, data: { clinic_id } }).then((response) => {
            SWAL_HANDLER(response);
    
            refreshDetails();
          });
        }
      });
    });
  
    $(document).on('change','#navbar_title_id',function(){

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

