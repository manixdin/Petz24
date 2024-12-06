$(document).ready(function() {
    let userPetMode = "new";
    let gender = "male";
    var userPetJSON = []; 
    let userPetID; 
    getPetList();
    getUserPetList(); 
    // ===== Get Pet List Start =====
    function getPetList() {
        $.ajax({
            type: 'GET',
            url: base_url + 'get-pet-list', 
            success: function (data) {
                let petsDropdown = '<option value="">Select pet</option>';
                for(i = 0; i < data.length; i++){
                    petsDropdown += `<option value="${data[i]['pet_id']}">${data[i]['pet_name']}</option>`;
                }
                $('#pet-list').html(petsDropdown);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    }
    // ===== Get Pet List End =====
    // ===== Get Pet User List Start =====
    function getUserPetList() {
        let userInfo = DECRYPT_DATA(localStorage.getItem('user_data'));
        $.ajax({
            type: 'POST',
            url: base_url + 'get-user-pet-list', 
            data : {user_id : userInfo["user_id"]},
            success: function (data) {
                userPetJSON = data;
                let petUserList = '';
                for(i = 0; i < data.length; i++){
                    petUserList += `
                    <div class="col-lg-3 my-2 my-lg-0">
                        <div class="existing-pet p-2">
                            <div class="edit-delete text-end p-1 m-1">
                                <i class="fa fa-pencil mx-2 edit-pet_popup" data-index="${i}" aria-hidden="true"></i>
                                <i class="fa fa-trash delete-pet_popup" data-index="${data[i]['user_pety_id']}" aria-hidden="true"></i>
                            </div>
                            <div class="pets-details-wrapper d-flex justify-content-between align-items-center">
                                <div class="pets-image">
                                    <img  src="${base_url}admin/${data[i]['pet_img']}" alt="" class="img-fluid">
                                </div>
                                <div class="pets-details">
                                    <span class="pet-name d-block">${data[i]['name']}</span>
                                    <span class="pet-breed d-block">${data[i]['breed_name']}</span>
                                    <span class="pet-age d-block">${data[i]['age_year']} Years ${data[i]['age_month']} Months </span>
                                </div> 
                            </div>
                            <button type="button" data-pet-name="${data[i]['name']}"  data-pet-id="${data[i]['pet_id']}" data-user-pet-id="${data[i]['user_pety_id']}" class="btn btn-style1-custom select-user-pet">Select</button> 
                        </div>
                    </div>
                    `;
                }
                petUserList += `
                <div class="col-lg-3 my-2 my-lg-0">
                    <div class="add-pet-wrapper add-pet_popup c-pointer">
                        <span class="new-pet-text">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add New Pet
                        </span>
                    </div>
                </div>
                `; 
                console.log($('#user-pet-list'));
                $('#user-pet-list').html(petUserList);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    }
    // ===== Get Pet User List End ===== 
    $('#pet-list').on('change', function(){
        let petID = $(this).val();
        $.ajax({
            type: 'POST',
            url: base_url + 'get-breed-list', 
            data : {petID},
            success: function (data) { 
                let petsDropdown = '<option value="">Select breed</option>';
                for(i = 0; i < data.length; i++){
                    petsDropdown += `<option value="${data[i]['breed_id']}">${data[i]['breed_name']}</option>`;
                }
                $('#breed-list').html(petsDropdown);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    });

    $("#add-pet").click(function(){
        $('.error').hide();
        if( $("#pet-list").val() == ""){
            $(".pet-list-error").text("Please select pet").show();
        }
        else if( $("#breed-list").val() == ""){
            $(".breed-list-error").text("Please select breed").show();
        }
        else if( $("#dob").val() == ""){
            $(".dob-error").text("Please enter DOB").show();
        }
        else if( ($("#age_year").val() == "") || ($("#age_month").val() == "") ){
            $(".age-error").text("Please enter age").show();
        }
        else if( $("#pet-name").val() == "" ){
            $(".pet-name-error").text("Please enter pet name").show();
        }
        else{
            if(userPetMode == "new") addUserPet();
            else updateUserPet();
        }
    }); 

    function addUserPet(){
        let formData  = new FormData($("#user-pet-form")[0]);  
        formData.append("gender", gender);
        let userInfo = DECRYPT_DATA(localStorage.getItem('user_data')); 
        formData.append("user_id", userInfo["user_id"]);
        $.ajax({
            type: 'POST',
            url: base_url + 'add-user-pet', 
            data : formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {   
                if(response["code"] == "200"){
                    $("#add-pet_popup").modal("hide");
                    getUserPetList();
                }
                TOASTER_HANDLER(response);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    }

    function updateUserPet(){
        let formData  = new FormData($("#user-pet-form")[0]);  
        formData.append("gender", gender);
        formData.append("user_pety_id", userPetID);
        let userInfo = DECRYPT_DATA(localStorage.getItem('user_data')); 
        formData.append("user_id", userInfo["user_id"]);
        $.ajax({
            type: 'POST',
            url: base_url + 'update-user-pet', 
            data : formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {   
                if(response["code"] == "200"){
                    $("#add-pet_popup").modal("hide");
                    getUserPetList();
                }
                TOASTER_HANDLER(response);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    }

    $(document).on('click', '.edit-pet_popup', function(){
        userPetMode = "edit";
        let curIndex = $(this).data("index");
        let pet = userPetJSON[curIndex]; 
        userPetID = pet["user_pety_id"];
        $("#pet-list").val(pet['pet_id']);
        $("#dob").val(pet['date_of_birth']);
        $("#age_year").val(pet['age_year']);
        $("#age_month").val(pet['age_month']);
        $("#pet-name").val(pet['name']);
        gender = pet["gender"];
        $('.gender-toggle').removeClass('active');
        gender == "male" ? $('.maleBtn').addClass('active') : $('.femaleBtn').addClass('active');
        selectBreedInfo(pet['pet_id'], pet['breed_id']); 
        $('#add-pet_popup').modal('show');
    });

    function selectBreedInfo(petID, breedID){
        $.ajax({
            type: 'POST',
            url: base_url + 'get-breed-list', 
            data : {petID},
            success: function (data) { 
                let petsDropdown = '<option value="">Select breed</option>';
                for(i = 0; i < data.length; i++){
                    petsDropdown += `<option value="${data[i]['breed_id']}">${data[i]['breed_name']}</option>`;
                }
                $('#breed-list').html(petsDropdown);
                $('#breed-list').val(breedID);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    }

    $(document).on('click', '.add-pet_popup', function(){
        userPetMode = "new";
        $("#user-pet-form").trigger("reset");
        $('#add-pet_popup').modal('show');
    });

    $('.gender-toggle').click( function(){
        $('.gender-toggle').removeClass('active');
        $(this).addClass('active');
        gender = $(this).attr('gender')
    })

    $(document).on('click', '.delete-pet_popup', function(){
        userPetID = $(this).data("index");
        $.confirm({
            title: 'Confirmation!',
            content: 'are you want to delete this data?',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: 'POST',
                        url: base_url + 'delete-user-pet', 
                        data : {userPetID},
                        success: function (response) { 
                            getUserPetList();
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