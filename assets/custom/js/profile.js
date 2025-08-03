var userProfile = null

$(document).ready(function(){
    refreshProfileData();

    function updateUserProfileData(data){

        $.ajax({
            type: "POST",
            url: base_url + 'updatespecificuser',
            data,
            success: function (response) {
                let res = JSON.parse(response), userData = res.data


                console.log(res);
                
                userProfile = DECRYPT_DATA(userData)
                localStorage.setItem('user_data', userData)
                refreshProfileData();
    
                TOASTER_HANDLER(res)
            },
            error: function (err) {
                console.log("Error :" + err);
            }
        })
    }
    
    function refreshProfileData(){
    
        if(!localStorage.getItem('user_data')){
            return window.location.reload()
        }
    
        userProfile = DECRYPT_DATA(localStorage.getItem('user_data'))
    
        $('.email_id').val(userProfile.email_id)
        $('.first_name').val(userProfile.first_name)
        $('.last_name').val(userProfile.last_name)
        $('.mobile_number').val(userProfile.mobile_number)
    
        $('span.first_name').html(userProfile.first_name)
        $('span.last_name').html(userProfile.last_name)
    }
    
    function updateUserProfile(element){
        let key = element.attr('name')
        if(userProfile[key] !== element.val()){
            userProfile[key] = element.val()
            updateUserProfileData(userProfile)
        }
    }
    
    $('.profile-input').focusout(function(){
        updateUserProfile($(this))
    })
    
    $('.profile-input').on('keypress',function(e) {
        if(e.which == 13) {
            updateUserProfile($(this))
        }
    })

    $(".change-profile-tap").click(function(){
        let tap = $(this).data("tap");   
        $(".profile-form, .change-profile-tap").removeClass("active");
        $(tap).addClass("active"); 
        $(this).addClass("active"); 
        if(tap == "#manage-address") getAddressList();
        
    });

});

