var mode, masterData, booking_id;
const module = 'booking';

$(document).ready(function () {

  refreshDetails();

  //===[ Prevent modal form closing ]===
  $("#popup-modal").modal({
    backdrop: "static",
    keyboard: false,
  });

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
// $(document).on("click", ".btnEdit", function () {
//   mode = 'edit';
//   let index = $(this).attr("id");
//   clinic_id = masterData[index]['clinic_id'];
//   $('#clinicModelTitle').html('Edit Clinic');
//   $("#clinic_name").val(masterData[index].clinic_name);
//   $("#address").val(masterData[index].address);
//   $("#city").val(masterData[index].city);
//   $("#state").val(masterData[index].state);
//   $("#pincode").val(masterData[index].pincode);
//   $("#popup-modal").modal("show");
// });

$(document).on("click", ".btnView", function () {
  mode = 'edit';
  let index = $(this).attr("id");
  booking_id = masterData[index]['booking_id'];
  console.log(booking_id);
  
  getSpecificBooking(booking_id).then((specificData) => {
    if (specificData && specificData.length > 0) {
      console.log(specificData);
      
      let booking = specificData[0]; // Assuming you need the first item from the response

      // Build HTML for modal content
      let modalContent = `
          <p><strong>Booking Date:</strong> ${new Date(booking.booking_date).toLocaleDateString()}</p>
          <p><strong>Booking Status:</strong> ${booking.booking_status}</p>
          <p><strong>Payment Status:</strong> ${booking.payment_status}</p>
          <p><strong>User:</strong> ${booking.first_name} ${booking.last_name}</p>
          <p><strong>Pet:</strong> ${booking.user_pet_name} (${booking.pet_name})</p>
          <p><strong>Plan:</strong> ${booking.plan_name} - ${booking.plan_info.duration}</p>
          <p><strong>Slot Info:</strong> ${booking.slot_info}</p>
          <p><strong>Address:</strong> ${booking.address_info}</p>
          <strong>Services:</strong>
          <ul>
              ${booking.plan_info.services.map(service => `<li>${service.service_name}: ${service.service_details}</li>`).join('')}
          </ul>
      `;

      // Insert content into modal
      $('#modal-content').html(modalContent);

      // Show the modal
      $('#popup-modal').modal('show');
    } else {
      console.log("No specific data found.");
    }
  })
  .catch((error) => {
    console.error("Error fetching specific data:", error);
  });
});



function getFormData(){
  return new FormData($("#clinic-form")[0]);
}

function refreshDetails(){
  getBooking();
  $("#popup-modal").modal("hide");
}

    //====[ Get All Pet Data ]===
function getBooking() {
  GET({ module }).then((data) => {
    masterData=(data);
    displayClinicDetails(masterData);
  });
}

function getSpecificBooking(module_id) {
  return POST({ module, module_id }) // Assuming POST returns a Promise
    .then((response) => {
      if (response) {
        
        // Flatten the booking_json field for each item in the response
        return response.map(item => {
          const parsedBookingJson = JSON.parse(item.booking_json);
          return {
            ...item,
            ...parsedBookingJson,
            booking_json: undefined // Optional: Remove the original booking_json field
          };
        });
      } else {
        console.log("No data received or an error occurred.");
        return [];
      }
    });
}







    function displayClinicDetails(tableData) {

      console.log(tableData);
      


      //===[Destroy Data Table]===
      if ($.fn.DataTable.isDataTable('#datatable')) {
        $('#datatable').DataTable().destroy();
      }
    
      $('#datatable tbody').empty();
    
    
      if (typeof tableData === 'string') {
    
        $('#datatable').dataTable({
          "oLanguage": {
            "sEmptyTable": "There is no clinic data available"
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
              mDataProp: null, // Set to null if combining multiple fields
              render: function (data, type, row) {
                return `${row.first_name} ${row.last_name}`;
              }
            },
            {
              mDataProp: null, // Set to null if combining multiple fields
              render: function (data, type, row) {
                return `${row.user_pet_name} (${row.pet_name})`;
              }
            },
            {
              mDataProp: "plan_name",
            },
            {
              mDataProp: "booking_status",
            },
            {
              mDataProp: "payment_status",
            },
            {
              mDataProp: "booking_date",
            },
            {
              mDataProp: "booking_type",  // Your data field for booking type
              render: function (data, type, row) {
                // Determine the badge class based on booking_type
                let badgeClass = data ? "badge bg-success" : "badge bg-secondary"; // 'bg-success' for "Home", 'bg-secondary' for "Clinic"
                
                // Return the badge HTML
                return `<span class="${badgeClass}">${data ? "Home" : "Clinic"}</span>`;
              }
            },
            {
              mDataProp: function (data, type, full, meta) {
                return (
                  `<a id="${meta.row}" class="btn btnView text-primary fs-14 lh-1"><i class="ri-eye-line"></i></a>
                  <a id="${meta.row}" class="btn btnEdit text-info fs-14 lh-1"> <i class="ri-edit-line"></i></a>
                   `
                );
              },
            },
          ],
        });
    
      }
    }
    
    // *************************** [Delete Data]
  
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

