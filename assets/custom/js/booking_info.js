$(document).ready(function() {
    // ****** Variable Declaration Start ******
    var today = new Date().setHours(0, 0, 0, 0); 
    let userPetPlan = [];
    var level = 0, editMode = false;   
    const calendar = $('#calendar');
    const monthYearDisplay = $('#month-year');
    let currentDate = new Date(), selectedDayElement = null;
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    // ****** Variable Declaration End ****** 

    getBookingInfo();
    function getBookingInfo(){ 
        let userInfo = DECRYPT_DATA(localStorage.getItem('user_data')); 
        const url = new URL(window.location.href);
        const pathSegments = url.pathname.split('/').filter(segment => segment !== '');
        const booking_id = pathSegments.pop();  
        let formData = {"user_id" : userInfo["user_id"], booking_id};
        $.ajax({
            type: 'POST',
            url: base_url + 'get-booking-info', 
            data : formData,
            success: function (response) {  
                if(response){
                    let bookingJSON = JSON.parse(response["booking_json"]);
                    bookingJSON = {...bookingJSON, plan_img : response.plan_img, payment_status: response.payment_status,  booking_status: response.booking_status }
                    renderReview(bookingJSON);
                } 
                else{
                    $('.review-area').html(`
                        <div class="m-4 p-4 text-center"> 
                            <h4 class="mb-3"> No booking Found!!! </h4>
                        </div>
                    `).addClass("bg-danger-subtle");
                    $('.section-tb-padding').addClass("bg-danger-subtle");
                } 
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        }); 
    }
 
    // ================= Render Review start  ================= 
    function renderReview(bookingInfo){
        $("#review-plan-image").attr("src", base_url +"/admin/"+bookingInfo.plan_info.plan_img);
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
        $('.payment-status').text(bookingInfo.payment_status);
        $('.booking-status').text(bookingInfo.booking_status);
    }
    // ================= Render Review end  ================= 

    

}); 