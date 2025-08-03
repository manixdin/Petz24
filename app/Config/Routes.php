<?php

use CodeIgniter\Router\RouteCollection;

$routes->post('razorpay/order', 'RazorpayController::createOrder');
$routes->post('razorpay/verify', 'RazorpayController::verifyPayment');



$routes->get('/', 'BaseAction::index');

/*====[ Product Module ]=====*/
$routes->get('product', 'BaseAction::product');
$routes->get('product-description', 'BaseAction::productDescription');

/*====[ Product Module ]=====*/
$routes->get('profile', 'BaseAction::profile');

/*====[ Booking Module Start ]=====*/
$routes->get('booking','BookingController::index');
$routes->get('chatbooking','BookingController::chatbooking');

$routes->get('get-pet-list','BookingController::getPetList');
$routes->get('get-support-details','BookingController::getSupportDetails');

$routes->get('get-doctor-language','BookingController::getDoctorLanguage');
$routes->post('get-doctors','BookingController::getDoctors');

$routes->post('get-breed-list','BookingController::getBreedList');
$routes->post('get-user-pet-plan','BookingController::getUserPetPlan');


$routes->post('get-time-slot','BookingController::getTimeSlot');
$routes->post('add-booking','BookingController::addBooking');
/*====[ Booking Module End ]=====*/
/*====[ Clinic Booking Module Start ]=====*/
$routes->get('clinic-booking','ClinicBookingController::index');
$routes->get('get-clinic-list','ClinicBookingController::getClinicList');
/*====[ Clinic Booking Module End ]=====*/
// User Pet List Start
$routes->post('get-user-pet-list','UserPetController::getUserPetList');
$routes->post('add-user-pet','UserPetController::addUserPet');
$routes->post('update-user-pet','UserPetController::updateUserPet');
$routes->post('delete-user-pet','UserPetController::deleteUserPet');
// User Pet List End
// User Address Functionality start
$routes->post('get-user-address','UserAddressController::getUserAddress');
$routes->post('add-user-address','UserAddressController::addUserAddress');
$routes->post('update-user-address','UserAddressController::updateUserAddress');
$routes->post('delete-user-address','UserAddressController::deleteUserAddress');
// User Address Functionality start

/*====[ My Booking Module ]=====*/
$routes->get('my-booking', 'MyBookingController::index');
$routes->post('get-my-booking', 'MyBookingController::getMyBooking');
$routes->get('booking-info/(:num)', 'MyBookingController::bookingInfo/$1');
$routes->post('get-booking-info', 'MyBookingController::getBookingInfo');

//Cart
$routes->get('cart', 'BaseAction::cart');
//Wishlist
$routes->get('wishlist', 'BaseAction::wishlist');
// pet grooming
$routes->get('consultation', 'BaseAction::consultation');
$routes->get('chatwithdoctor', 'BaseAction::chatwithdoctor');


//terms and condition
$routes->get('terms-conditions', 'BaseAction::termsAndCondition');
//Privacypolicy
$routes->get('privacy-policy', 'BaseAction::privacypolicy');
//order
$routes->get('order', 'BaseAction::order');
//checkout
$routes->get('checkout', 'BaseAction::checkout');
//About us
$routes->get('about', 'BaseAction::about');
//Contact us
$routes->get('contact', 'BaseAction::contact');
//FAQ
$routes->get('faq', 'BaseAction::faq');

//Experience
$routes->get('experience', 'BaseAction::experience');
//Add Pet
$routes->get('addpet', 'BaseAction::addpet');
//Grooming Center
$routes->get('groomingcenter', 'BaseAction::groomingcenter');
// Consultation Center
$routes->get('consultationcenter', 'BaseAction::consultationcenter');

###########################[ API Routes ]##################################

# User Signin
$routes->post('signinuser', 'Workflow_User::signinUser');

# User Signup
$routes->post('insertuser', 'Workflow_User::signupUser');

# Get Specific User Data
$routes->post('getspecificuser', 'Workflow_User::getSpecificUser');
# Get Specific User Data
$routes->post('updatespecificuser', 'Workflow_User::updateSpecificUser');
