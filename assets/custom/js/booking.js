$(document).ready(function () {
    // ****** Variable Declaration Start ******
    var today = new Date().setHours(0, 0, 0, 0);
    var bookingInfo = {
        user_pet_name: '',
        user_pet_id: 0,
        pet_id: 0,
        plan_id: 0,
        plan_info: {},
        doctor_id: 0,
        doctor_name: '',
        booking_date: '',
        slot_id: 0,
        slot_info: '',
        pet_problem:''
    };

    let userPetPlan = [];
    var level = 0, editMode = false;
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

    $('#next').click(function () {
        showCurrentTab(++level)
        canShowBackBtn();
    });

    $('#back-btn').click(function () {
        if (level != 0) {
            $(`.level-${level}`).removeClass('active')
            showCurrentTab(--level)
        }
        canShowBackBtn();
    });

    function canShowBackBtn() {
        level > 0 ? $('#back-btn').show() : $('#back-btn').hide();
    }

    function showCurrentTab(level) {
        $('.existing-pet-wrapper, .doctor-area, .pricing-area, .time-slot, .clinic-area, .review-area').hide();

        $(`.level-${level}`).addClass('active');

        switch (level) {
            case 0:
                $('.existing-pet-wrapper').show();
                break;
            case 1:
                $('.doctor-area').show();
                break;
            case 2:
                $('.time-slot').show();
                renderCalendar(currentDate);
                break;

            case 3:
                $('.pricing-area').show();
                break;
            case 4:
                $('.review-area').show();
                break;


        }
    }

    $(document).on('click', '.select-user-pet', function () {
        bookingInfo.user_pet_id = $(this).data('user-pet-id');
        bookingInfo.pet_id = $(this).data('pet-id');
        bookingInfo.user_pet_name = $(this).data('pet-name');
        bookingInfo.plan_type = "1";

        $.ajax({
            type: "POST",
            url: base_url + 'get-user-pet-plan',
            data: bookingInfo,
            success: function (data) {
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
            error: function (e) {
                console.error(e);
            },
        });

        showCurrentTab(++level);
        canShowBackBtn();
    });

    $(document).on('click', '.user-pet-plan', function () {
        bookingInfo.plan_id = $(this).data('plan-id');
        bookingInfo.plan_info = userPetPlan[$(this).data('index')];
        renderReview();

        showCurrentTab(++level);
        canShowBackBtn();
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
    function getTimeSlot() {
        const date = new Date(selectedDate);
        bookingInfo["booking_date"] = date;
        $.ajax({
            type: "POST",
            url: base_url + "get-time-slot",
            data: { date },
            success: function (data) {
                let timeslot = '';
                for (i = 0; i < data.length; i++) {
                    timeslot += `
                    <div class="slot ${data[i]['status']} select-slot" data-id="${data[i]['slot_id']}">
                        ${data[i]["from_time_12hr"]} - ${data[i]["to_time_12hr"]}
                    </div>
                    `;
                }
                $('.timeslot-list').html(timeslot);
            },
            error: function (e) {
                console.log(e);
            },
        })
    }
    // ================= Get Time Slot end  ================= 
    // ================= Slot selection start  ================= 

    $(document).on('click', '.select-doctor', function () {
        const pet_problem = $('#pet_problem').val().trim();
        const language_id = $('#language_select').val();

        if (!pet_problem) {
            TOASTER_HANDLER({ code: 500, msg: "Please describe your pet's problem." });

            $('#pet_problem').focus();
            return;
        }

        if (!language_id) {
            TOASTER_HANDLER({ code: 500, msg: "Please select a preferred language." });

            $('#language_select').focus();
            return;
        }

        const doctor_id = $(this).data('id');
        const doctor_name = $(this).data('name');

        if (!doctor_id || !doctor_name) {
            alert("Invalid doctor selected.");
            TOASTER_HANDLER({ code: 500, msg: "Invalid doctor selected." });

            return;
        }

        bookingInfo.doctor_id = doctor_id;
        bookingInfo.doctor_name = doctor_name;
        bookingInfo.pet_problem = pet_problem;

        
        renderCalendar(currentDate);

        showCurrentTab(++level);  // go to next step (Plan)
        canShowBackBtn();
    });



    $(document).on('click', '.slot.yes.select-slot', function () {
        let element = $(this);
        bookingInfo["slot_id"] = element.data('id');
        bookingInfo["slot_info"] = element.text();
        getAddressList();
        showCurrentTab(++level);
        canShowBackBtn();
    });
    // ================= Slot selection end  ================= 
    // ================= Address selection start  ================= 
    // $(document).on('click', '.select-address', function () {
    //     let element = $(this);
    //     bookingInfo["address_id"] = element.data('id');
    //     bookingInfo["address_info"] = element.closest(".center-wrapper").find(".address-raw").text();
    //     renderReview();
    //     showCurrentTab(++level);
    //     canShowBackBtn();
    // });
    // ================= Address selection end  ================= 
    // ================= Render Review start  ================= 
    function renderReview() {


        $("#review-plan-image").attr("src", "admin/" + bookingInfo.plan_info.plan_img);
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
    $('.make-payment').click(function () {
        let userInfo = DECRYPT_DATA(localStorage.getItem('user_data'));
        let formData = { ...bookingInfo, "user_id": userInfo["user_id"] };

        
    
        $.ajax({
            type: 'POST',
            url: base_url + 'add-booking',
            data: formData,
            success: function (response) {
                if (response["code"] == "200") {
                    $('#add-address_popup').modal('hide');
                    getAddressList();
                }
                TOASTER_HANDLER(response);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    });
    // ================= Make Payment end  ================= 
    $.ajax({
        type: "GET",
        url: base_url + "get-doctor-language",
        success: function (response) {
            let options = `<option value="">-- Select Language --</option>`;
            response.forEach(lang => {
                options += `<option value="${lang.language_id}">${lang.language_name}</option>`;
            });
            $('#language_select').html(options);
        },
        error: function (err) {
            console.log("Error loading languages:", err);
        }
    });



    $('#language_select').on('change', function () {
        const language_id = $(this).val();

        if (!language_id) return;

        $.ajax({
            type: "POST",
            url: base_url + "get-doctors",
            data: {
                language_id
            },
            success: function (data) {
                let cards = '';

                // Add heading
                cards += `


        <span class="groom-title">Doctors List:</span>
    `;

                for (let i = 0; i < data.length; i++) {
                    cards += `
        <div class="col-md-3">
            <div class="card doctor-card">
                <img src="admin/${data[i].doctor_img}" class="card-img-top" alt="Doctor">
                <div class="card-body">
                    <h5 class="card-title">${data[i].doctor_name}</h5>
                    <p class="card-text">${data[i].designation}</p>
                    <button type="button" class="btn btn-style1-custom select-doctor"
                        data-id="${data[i].doctor_id}"
                        data-name="${data[i].doctor_name}">
                        Select
                    </button>
                </div>
            </div>
        </div>`;
                }

                $('#doctor-list').html(cards);
            },

            error: function (err) {
                console.log("Doctor fetch failed", err);
            }
        });
    });

}); 