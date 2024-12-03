$(document).ready(function(){
    userProfile = DECRYPT_DATA(localStorage.getItem('user_data'));
    console.log(userProfile);
    $('.first_name').text(userProfile.first_name);
    $('.last_name').text(userProfile.last_name);
    getMyBooking();  
    function getMyBooking() {
        let userInfo = DECRYPT_DATA(localStorage.getItem('user_data'));
        $.ajax({
            type: 'POST',
            url: base_url + 'get-my-booking', 
            data : {user_id : userInfo["user_id"]},
            success: function (data) { 
                let pastBookings = data["past_bookings"]; 
                let pastbookinglist = '';
                let upcomingBookinglist = '';
                let options = { day: '2-digit', month: 'short', year: '2-digit' }; 
                let upcomingBookings = data["upcoming_bookings"]; 
                for(i=0; i < upcomingBookings.length; i++){
                    let info = upcomingBookings[i]; 
                    let bookingDate = new Date(info.booking_date);
                    let formattedDate = bookingDate.toLocaleDateString('en-US', options).replace(',', "'");
                    upcomingBookinglist += `
                        <div class="col-md-6 d-flex justify-content-left mb-2">
                            <a class="booking-container" href="${base_url}booking-info/${info.booking_id}">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="https://www.zigly.com/static/version1731405273/frontend/Amasty/JetTheme_child/en_US/Zigly_Sales/images/Past-pet-grooming.png" alt="">
                                    </div>
                                    <div class="col-9 booking-info">
                                        <p class="booking-name">${info["plan_name"]} At ${info["status"] == "no" ? "Center" : "Home"}</p>
                                        <p class="booking-time"><i class="fa fa-calendar-check-o"></i> ${formattedDate} <i class="fa fa-clock-o"></i> ${info["from_time"]}-${info["to_time"]}</p>  
                                    </div>
                                </div>
                            </a>
                        </div>
                    `;
                }
                $('#upcoming-booking').html(upcomingBookinglist); 
                for(i=0; i < pastBookings.length; i++){
                    let info = pastBookings[i]; 
                    let bookingDate = new Date(info.booking_date);
                    let formattedDate = bookingDate.toLocaleDateString('en-US', options).replace(',', "'");
                    pastbookinglist += `
                        <div class="col-md-6 d-flex justify-content-left mb-2">
                            <a class="booking-container" href="${base_url}booking-info/${info.booking_id}">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="https://www.zigly.com/static/version1731405273/frontend/Amasty/JetTheme_child/en_US/Zigly_Sales/images/Past-pet-grooming.png" alt="">
                                    </div>
                                    <div class="col-9 booking-info">
                                        <p class="booking-name">${info["plan_name"]} At Home</p>
                                        <p class="booking-time"><i class="fa fa-calendar-check-o"></i> ${formattedDate} <i class="fa fa-clock-o"></i> ${info["from_time"]}-${info["to_time"]}</p>  
                                    </div>
                                </div>
                            </a>
                        </div>
                    `;
                }
                $('#past-booking').html(pastbookinglist); 
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    } 
});