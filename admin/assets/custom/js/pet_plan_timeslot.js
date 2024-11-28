var mode, masterData = [], slot_id, petData = [];
const module = 'timeslot';
 
$(document).ready(function () { 

    getTimeSlot();
    function getTimeSlot() {
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
            "sEmptyTable": "Empty Table"
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
                    mDataProp: "from_time_12hr",
                },
                {
                    mDataProp: "to_time_12hr",
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
      $('#petModelTitle').html('Add Time Slot');
      $("#popup-modal").modal("show");
    });

    $("#btn-submit").on('click', function () { 
      $(".error").hide(); 
      let formObjectNew = [
        {
          value: $("#from_time").val(),
          error: "Please select the from time"
        },
        {
          value: $("#to_time").val(),
          error: "Please entrer the to time"
        }
      ] 
      let formObjectUpdate = [
        {
          value: $("#from_time").val(),
          error: "Please select the plan name"
        },
        {
          value: $("#to_time").val(),
          error: "Please entrer the to time"
        }
      ] 
      if (mode == "new") {
        if (FORM_VALIDATION(formObjectNew)) {
          insertTimeSlot();
        }
      } 
      if (mode == "edit") {
        if (FORM_VALIDATION(formObjectUpdate)) {
          updateTimeSlot();
        }
      } 
    });

    //===[ Insert Pet Data ]===
    function insertTimeSlot() { 
      let data = getFormData();
      POST({ module, data }).then((response) => {
        if(response.code == "200") refreshDetails();
        SWAL_HANDLER(response); 
      }); 
    }

    //====[ Edit Pet Data ]===
    $(document).on("click", ".btnEdit", function () {
      mode = 'edit';
      let index = $(this).attr("id");
      slot_id = masterData[index]['slot_id']
      cleanPoup();
      $('#petModelTitle').html('Edit Time Slot');
      $("#from_time").val(masterData[index].from_time);
      $("#to_time").val(masterData[index].to_time);
      $("#popup-modal").modal("show");
    });

    //===[ Update Pet Data ]===
    function updateTimeSlot() { 
      let data = getFormData();
      data.append("slot_id", slot_id); 
      PUT({ module, data }).then((response) => {
        if(response.code == "200") refreshDetails();
        SWAL_HANDLER(response);  
      });
    }

    //===[Delete Data]===
    $(document).on("click", ".BtnDelete", function () { 
      let index = $(this).attr("id");
      mode = "delete";
      slot_id  = masterData[index]['slot_id'];
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
          DELETE({ module, data: { slot_id } }).then((response) => {
            SWAL_HANDLER(response);
            refreshDetails();
          });
        }
      });
    });
    
    
  function refreshDetails() {
    getTimeSlot();
    $("#popup-modal").modal("hide");
  }
}); 








//===[Display image on modal]===
$(document).on("change", "#pet_img", function () {
  DISPLAY_IMAGE(this, "pet_image_url");
});






 

function getFormData() {
  return new FormData($("#pet-form")[0]);
}

function cleanPoup() {
  $('#pet-form')[0].reset();
  $('#pet_image_url').hide();
}
