$(document).ready(function() {
    // ****** Variable Declaration Start ******
    var today = new Date().setHours(0, 0, 0, 0);
    var bookingInfo = {
        user_pet_name : '',
        user_pet_id : 0,
        pet_id : 0,
        plan_id : 0,
        plan_info : {},
        booking_date : '',
        slot_id : 0,
        slot_info : '',
        center_id : 0,
        address_info : '',
    }  
    let userPetPlan = [];
    var level = 0, editMode = false, userClinicJSON = [];   
    const calendar = $('#calendar');
    const monthYearDisplay = $('#month-year');
    let currentDate = new Date(), selectedDayElement = null;
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    
    // ****** Variable Declaration End ****** 

    $('.pricing-area').hide();
    $('.time-slot').hide();
    // $('.existing-pet-wrapper').hide();   
    $('.clinic-area').hide();
    $('.review-area').hide();
    canShowBackBtn();

    $('#next').click(function() {
        showCurrentTab(++level)
        canShowBackBtn();
    });

    $('#back-btn').click(function() {
        if(level != 0){
            $(`.level-${level}`).removeClass('active')
            showCurrentTab(--level)
        }
        canShowBackBtn();
    }); 

    function canShowBackBtn(){
        level > 0 ? $('#back-btn').show() : $('#back-btn').hide();
    }

    function showCurrentTab(level){ 

        switch (level) {
            case 0:
                $('.existing-pet-wrapper').show()
                $('.pricing-area').hide()
                $('.level-0').addClass('active')
                break;
            case 1:
                $('.existing-pet-wrapper').hide()
                $('.pricing-area').show()
                $('.time-slot').hide()
                $('.level-1').addClass('active')
                break;
            case 2:
                $('.pricing-area').hide();
                $('.time-slot').show()
                $('.clinic-area').hide()
                $('.level-2').addClass('active')
                break;
            case 3:
                $('.time-slot').hide();
                $('.clinic-area').show()
                $('.review-area').hide()
                $('.level-3').addClass('active')
                break;
            case 4:
                $('.clinic-area').hide();
                $('.review-area').show();
                $('.level-4').addClass('active')
                break;
            default:
                break;
        }
    }

    $(document).on('click', '.select-user-pet', function() {
        bookingInfo.user_pet_id = $(this).data('user-pet-id');
        bookingInfo.pet_id = $(this).data('pet-id');
        bookingInfo.user_pet_name = $(this).data('pet-name');
        $.ajax({
            type: "POST",
            url: base_url + 'get-user-pet-plan',
            data: bookingInfo,
            success: function(data) {
                // data = [];
                userPetPlan = data;
                let plans = '';
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                        let planDetails = '';
                        let services = data[i]["services"];
                        for (let j = 0; j < services.length; j++) {
                            planDetails += `
                                <p class='carddd__row'>
                                    <span class="service_name"> <i class="ion-checkmark"></i> &nbsp; ${services[j]["service_name"]} : </span> <br>  
                                    <span class="service_details">${services[j]["service_details"]} </span> 
                                </p>`;
                        }
                        plans += `
                            <div class='carddd'>
                                <div class='carddd__info'>
                                    <h5 class='carddd__name'>${data[i]["plan_name"]}</h5> 
                                </div> 
                                <div class='carddd__info_2'> 
                                    <div class='carddd__img'>
                                        <img src="admin/${data[i]["plan_img"]}">
                                    </div> 
                                    <p class='card__price'>
                                        <span class='card__priceSpan'>    <b>₹ ${data[i]["plan_price"]} </b>  </span>
                                        <span class='card__durationSpan'> <b> <i class="fa fa-clock-o"></i> ${data[i]["duration"]} </b> </span>
                                    </p>
                                </div>
                                <div class='carddd__content' >
                                    <div class='carddd__rows'>
                                        ${planDetails}
                                    </div>
                                    <a href='#emptyLink' data-index="${i}" data-plan-id="${data[i]["plan_id"]}" class='carddd__link user-pet-plan' >Select Plan</a>
                                </div>
                            </div>`;
                    }
                }
                $('#pricing-list').empty().append(plans);
            },
            error: function(e) {
                console.error(e);
            },
        });
        showCurrentTab(++level);
        canShowBackBtn();
    });    

    $(document).on('click', '.user-pet-plan', function() {
        bookingInfo.plan_id = $(this).data('plan-id'); 
        bookingInfo.plan_info = userPetPlan[$(this).data('index')]; 
        showCurrentTab(++level);
        canShowBackBtn();  
        renderCalendar(currentDate);
    });  

    // ================= For calander UI start  ================= 
    var selectedDate = today;
    const renderCalendar = (date) => {
        calendar.empty();
        const daysInMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
        const firstDayOfMonth = new Date(date.getFullYear(), date.getMonth(), 1).getDay();
        const lastClickableDate = new Date().setDate(new Date().getDate() + 6);
        monthYearDisplay.text(`${monthNames[date.getMonth()]} ${date.getFullYear()}`);
        dayNames.forEach(day => calendar.append(`<div class="day-name">${day}</div>`));
        for (let i = 0; i < firstDayOfMonth; i++) calendar.append('<div></div>');
        for (let i = 1; i <= daysInMonth; i++) {
            const loopDate = new Date(date.getFullYear(), date.getMonth(), i).setHours(0, 0, 0, 0);
            const dayElement = $('<div class="day"></div>').text(i);
            if (loopDate >= today && loopDate <= lastClickableDate) {
                dayElement.addClass('active');
                if (loopDate === selectedDate) dayElement.addClass('active-date');
                dayElement.on('click', function () {
                    $('.active-date').removeClass('active-date');
                    if (selectedDayElement) selectedDayElement.removeClass('active-date'); 
                    selectedDate = loopDate; 
                    selectedDayElement = $(this).addClass('active-date'); 
                    getTimeSlot();
                });
            } 
            else {
                dayElement.addClass('disabled');
            }
            calendar.append(dayElement);
        }
        getTimeSlot();
    };
    $('#prev-month').click(() => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });
    $('#next-month').click(() => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });
    // ================= For calander UI end  ================= 
    // ================= Get Time Slot start  =================
    function getTimeSlot(){
        const date = new Date(selectedDate);
        bookingInfo["booking_date"] = date; 
        $.ajax({
            type:"POST",
            url:base_url+"get-time-slot",
            data:{date},
            success: function(data){
                let timeslot = ''; 
                for(i=0; i < data.length; i++){
                    timeslot += `
                    <div class="slot ${data[i]['status']} select-slot" data-id="${data[i]['slot_id']}">
                        ${data[i]["from_time_12hr"]} - ${data[i]["to_time_12hr"]}
                    </div>
                    `;
                } 
                $('.timeslot-list').html(timeslot); 
            },
            error: function(e){
                console.log(e);
            },
        })
    } 
    // ================= Get Time Slot end  ================= 
    // ================= Slot selection start  ================= 
    $(document).on('click', '.select-slot', function() {
        let element = $(this); 
        bookingInfo["slot_id"] = element.data('id');
        bookingInfo["slot_info"] = element.text(); 
        getClinicList();
        showCurrentTab(++level);
        canShowBackBtn(); 
    }); 
    // ================= Slot selection end  ================= 
    // ================= Address selection start  ================= 
    $(document).on('click', '.select-clinic', function() {
        let element = $(this);  
        bookingInfo["center_id"] = element.data('id');
        bookingInfo["address_info"] = element.closest(".center-wrapper").find(".address-raw").text();
        renderReview();
        showCurrentTab(++level);
        canShowBackBtn(); 
    }); 
    // ================= Address selection end  ================= 
    // ================= Render Review start  ================= 
    function renderReview(){
        $("#review-plan-image").attr("src", "admin/"+bookingInfo.plan_info.plan_img);
        $("#review-plan-name").text(bookingInfo.plan_info.plan_name);
        $("#review-plan-duration").text(bookingInfo.plan_info.duration);
        $("#review-pet-name").text(bookingInfo.user_pet_name);
        let bookingDate = new Date(bookingInfo.booking_date); 
        let options = { day: '2-digit', month: 'short', year: '2-digit' };
        let formattedDate = bookingDate.toLocaleDateString('en-US', options).replace(',', "'");
        $("#review-plan-date").text(formattedDate);
        $("#review-timeslot").text(bookingInfo.slot_info);
        $("#review-address").text(bookingInfo.address_info);
        $("#review-amount").text(bookingInfo.plan_info.plan_price);
    }
    // ================= Render Review end  ================= 
    // ================= Make Payment start  ================= 
    $('.make-payment').click(function(){  
        let userInfo = DECRYPT_DATA(localStorage.getItem('user_data')); 
        let formData = {...bookingInfo, "user_id" : userInfo["user_id"]};
        $.ajax({
            type: 'POST',
            url: base_url + 'add-booking', 
            data : formData,
            success: function (response) {   
                if(response["code"] == "200"){
                    $('#add-address_popup').modal('hide');
                    getClinicList();
                }
                TOASTER_HANDLER(response);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    });
    // ================= Make Payment end  ================= 

    function getClinicList() { 
        $.ajax({
            type: 'GET',
            url: base_url + 'get-clinic-list',  
            success: function (data) {
                userClinicJSON = data;
                let clinicList = '';
                for(i = 0; i < data.length; i++){
                    clinicList += `
                        <div class="col-lg-3 my-2">
                            <div class="center-wrapper m-2 p-3"> 
                                <div class="edit-delete text-end p-1 m-1">
                                    <i class="fa fa-pencil mx-2 edit-address_popup" data-index="${i}" aria-hidden="true"></i>
                                    <i class="fa fa-trash delete-address_popup" data-index="${data[i]['clinic_id']}" aria-hidden="true"></i>
                                </div>
                                <span class="address-raw">${data[i]['clinic_name']}, ${data[i]['address']},  ${data[i]['city']}, <br>
                                ${data[i]['state']} - ${data[i]['pincode']}</span> 
                                    <a data-id="${data[i]['clinic_id']}" class="btn btn-style1-custom select-clinic">Select</a> 
                            </div>
                        </div>
                    `;
                }
                $('#address-list').html(clinicList);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    }

}); 