$(document).ready(function() {
    let userAddressMode = "new"; 
    var userAddressJSON = []; 
    let userAddressID; 
    // ===== Get Pet User List Start =====
    window.getAddressList = function() {
        let userInfo = DECRYPT_DATA(localStorage.getItem('user_data'));
        $.ajax({
            type: 'POST',
            url: base_url + 'get-user-address', 
            data : {user_id : userInfo["user_id"]},
            success: function (data) {
                userAddressJSON = data;
                let addressList = '';
                for(i = 0; i < data.length; i++){
                    addressList += `
                        <div class="col-lg-3 my-2">
                            <div class="center-wrapper m-2 p-3"> 
                                <div class="edit-delete text-end p-1 m-1">
                                    <i class="fa fa-pencil mx-2 edit-address_popup" data-index="${i}" aria-hidden="true"></i>
                                    <i class="fa fa-trash delete-address_popup" data-index="${data[i]['address_id']}" aria-hidden="true"></i>
                                </div>
                                <span class="address-raw">${data[i]['address_line']}, ${data[i]['address_line_two']} <br>
                                ${data[i]['city']} - ${data[i]['postal_code']}</span> 
                                    <a data-id="${data[i]['address_id']}" class="btn btn-style1-custom select-address">Select</a> 
                            </div>
                        </div>
                    `;
                }
                addressList += `
                <div class="col-lg-3 mt-3">
                    <div class="add-pet-wrapper add-address-btn c-pointer">
                        <span class="new-pet-text">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Address
                        </span>
                    </div>
                </div>
                `; 
                $('#address-list').html(addressList);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    }
    // ===== Get Pet User List End ===== 

    $("#add-address").click(function(){
        $('.error').hide();
        if( $("#fname").val() == ""){
            $(".fname-error").text("Please enter first name").show();
        }
        else if( $("#lname").val() == ""){
            $(".lname-error").text("Please enter last name").show();
        }
        else if( $("#address-mobile-number").val() == ""){
            $(".address-mobile-number-error").text("Please enter mobile number").show();
        }
        else if( $("#address-line").val() == ""){
            $(".address-line-error").text("Please enter address").show();
        } 
        else if( $("#city").val() == "" ){
            $(".city-error").text("Please enter city").show();
        } 
        else if( $("#state").val() == "" ){
            $(".state-error").text("Please enter state").show();
        }
        else if( $("#postal-code").val() == "" ){
            $(".postal-code-error").text("Please enter postal code").show();
        }
        else{
            if(userAddressMode == "new") addUserAddress();
            else updateUserAddress();
        }
    }); 

    function addUserAddress(){
        let formData  = new FormData($("#user-address-form")[0]);   
        let userInfo = DECRYPT_DATA(localStorage.getItem('user_data')); 
        formData.append("user_id", userInfo["user_id"]);
        $.ajax({
            type: 'POST',
            url: base_url + 'add-user-address', 
            data : formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {   
                if(response["code"] == "200"){
                    $('#add-address_popup').modal('hide');
                    getAddressList();
                }
                TOASTER_HANDLER(response);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    }

    function updateUserAddress(){
        let formData  = new FormData($("#user-address-form")[0]); 
        formData.append("address_id", userAddressID);
        let userInfo = DECRYPT_DATA(localStorage.getItem('user_data')); 
        formData.append("user_id", userInfo["user_id"]);
        $.ajax({
            type: 'POST',
            url: base_url + 'update-user-address', 
            data : formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {   
                if(response["code"] == "200"){
                    $('#add-address_popup').modal('hide');
                    getAddressList();
                }
                TOASTER_HANDLER(response);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    }

    $(document).on('click', '.edit-address_popup', function(){
        userAddressMode = "edit";
        let curIndex = $(this).data("index");
        let address = userAddressJSON[curIndex]; 
        userAddressID = address["address_id"]; 
        $("#fname").val(address["fname"]);
        $("#lname").val(address["lname"]);
        $("#address-mobile-number").val(address["mobile_number"]);
        $("#address-line").val(address["address_line"]);
        $("#address-line-two").val(address["address_line_two"]);
        $("#city").val(address["city"]) ;
        $("#state").val(address["state"]);
        $("#postal-code").val(address["postal_code"]);
        $('#add-address_popup').modal('show');
    });  

    $(document).on('click', '.add-address-btn', function(){ 
        userAddressMode = "new";
        $("#user-address-form").trigger("reset");
        $('#add-address_popup').modal('show');
    }); 

    $(document).on('click', '.delete-address_popup', function(){
        userAddressID = $(this).data("index");
        $.confirm({
            title: 'Confirmation!',
            content: 'are you want to delete this data?',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: 'POST',
                        url: base_url + 'delete-user-address', 
                        data : {userAddressID},
                        success: function (response) { 
                            getAddressList();
                            TOASTER_HANDLER(response);
                        },
                        error: function (xhr, status, error) {
                            console.error('AJAX Error: ' + error);
                        }
                    });
                },
                cancel: function(){}, 
            }
        });
    });
     
});