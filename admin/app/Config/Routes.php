<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Workflow\LoginLogout;

$routes->get('/', 'BaseAction::index');
$routes->get('dashboard', 'BaseAction::dashboard');

# Product
$routes->get('product', 'BaseAction::product');

# Product Type
$routes->get('product_type', 'BaseAction::product_type');

# Product Category
$routes->get('product_category', 'BaseAction::product_category');

# Product image

$routes->get('product_image', 'BaseAction::product_image');


# Pet
$routes->get('pet', 'BaseAction::pet');

#Brand
$routes->get('brand', 'BaseAction::brand');


#Breed
$routes->get('breed', 'BaseAction::breed');
$routes->get('clinic', 'BaseAction::clinic');

###########################[ API Routes ]##################################

# Login Logout
$routes->post('login-check', 'Workflow_LoginLogout::logincheck');
$routes->get('logout', 'Workflow_LoginLogout::logout');

# User
$routes->get('getusercount', 'Workflow_User::getUserCount');

# Pet
$routes->get('getpet', 'Workflow_Pet::getPet');
$routes->post('getspecificpet', 'Workflow_Pet::getSpecificPet');
$routes->post('insertpet', 'Workflow_Pet::insertPet');
$routes->post('updatepet', 'Workflow_Pet::updatePet');
$routes->post('deletepet', 'Workflow_Pet::deletePet');

# Product Type
$routes->get('getproducttype', 'Workflow_Product_Type::getProductType');
$routes->post('getspecificproducttype', 'Workflow_Product_Type::getspecificProductType');
$routes->post('insertproducttype', 'Workflow_Product_Type::insertProductType');
$routes->post('updateproducttype', 'Workflow_Product_Type::updateProductType');
$routes->post('deleteproducttype', 'Workflow_Product_Type::deleteProductType');

# Product Category
$routes->get('getproductcategory', 'Workflow_Product_Category::getProductCategory');
$routes->post('getspecificproductcategory', 'Workflow_Product_Category::getspecificProductCategory');
$routes->post('insertproductcategory', 'Workflow_Product_Category::insertProductCategory');
$routes->post('updateproductcategory', 'Workflow_Product_Category::updateProductCategory');
$routes->post('deleteproductcategory', 'Workflow_Product_Category::deleteProductCategory');

# Brand
$routes->get('getbrand', 'Workflow_Brand::getBrand');
// $routes->post('getspecificproductcategory', 'Workflow_Product_Category::getspecificProductCategory');
$routes->post('insertbrand', 'Workflow_Brand::insertBrand');
$routes->post('updatebrand', 'Workflow_Brand::updateBrand');
$routes->post('deletebrand', 'Workflow_Brand::deleteBrand');

# Brand
$routes->get('getbreed', 'Workflow_Breed::getBreed');
// $routes->post('getspecificproductcategory', 'Workflow_Product_Category::getspecificProductCategory');
$routes->post('insertbreed', 'Workflow_Breed::insertBreed');
$routes->post('updatebreed', 'Workflow_Breed::updateBreed');
$routes->post('deletebreed', 'Workflow_Breed::deleteBreed');


# Product
$routes->get('getproduct', 'Workflow_Product::getProduct');
// $routes->post('getspecificproductcategory', 'Workflow_Product_Category::getspecificProductCategory');
$routes->post('insertproduct', 'Workflow_Product::insertProduct');
$routes->post('updateproduct', 'Workflow_Product::updateProduct');
$routes->post('deleteproduct', 'Workflow_Product::deleteProduct');


# Product Image
$routes->get('getproductimage', 'Workflow_Product_Image::getProductImage');
$routes->post('insertproductimage', 'Workflow_Product_Image::insertProductImage');
$routes->post('updateproductimage', 'Workflow_Product_Image::updateProductImage');
$routes->post('deleteproductimage', 'Workflow_Product_Image::deleteProductImage');


# Clinic
$routes->get('getclinic', 'Workflow_Clinic::getClinic');
$routes->post('insertclinic', 'Workflow_Clinic::insertClinic');
// $routes->post('updateproductimage', 'Workflow_Clinic::updateProductImage');
// $routes->post('deleteproductimage', 'Workflow_Clinic::deleteProductImage');

//NAVBAR ROUTES
$routes->get('title', 'Navbar::title');
$routes->post('navbartitle', 'Navbar::getTitle');
$routes->post('navbartitleedit', 'Navbar::navbartitleedit');
$routes->post('inserttile', 'Navbar::inserttile');
$routes->post('deletetitle', 'Navbar::deletetitle');
$routes->get('pages', 'Navbar::pages');
$routes->post('get-pages', 'Navbar::getpages');
$routes->post('delete-page-list', 'Navbar::deletepagelist');
$routes->post('insertpages', 'Navbar::insertpages');
$routes->post('updatepages', 'Navbar::updatepages');
$routes->post('delete-page', 'Navbar::deletepage');

// PRODUCT CONTOLLER$routes->post('insert-product-list', 'Product::insert');
$routes->post('getproduct', 'Product::getproduct');
$routes->post('getsubmenu', 'Product::getsubmenu');
$routes->post('deleteproduct', 'Product::deleteproduct');
$routes->post('update-product-list', 'Product::updateproduct');

// ================== Created by mani start ==================
// PET PLAN CONTROLLER
$routes->get('pet-plan', 'Workflow_PetPlan::index');
$routes->get('getpetplan', 'Workflow_PetPlan::getpetplan');
$routes->post('insertpetplan', 'Workflow_PetPlan::insertPetPlan');
$routes->post('updatepetplan', 'Workflow_PetPlan::updatePetPlan');
$routes->post('deletepetplan', 'Workflow_PetPlan::deletePetPlan');

// PET PLAN DETAILS CONTROLLER
$routes->get('pet-plan-details', 'Workflow_PetPlanDetails::index');
$routes->get('getpetplandetails', 'Workflow_PetPlanDetails::getpetplandetails');
$routes->post('insertpetplandetails', 'Workflow_PetPlanDetails::insertPetPlanDetails');
$routes->post('updatepetplandetails', 'Workflow_PetPlanDetails::updatePetPlanDetails');
$routes->post('deletepetplandetails', 'Workflow_PetPlanDetails::deletePetPlanDetails');


// PET PLAN TIMESLOT DETAILS CONTROLLER
$routes->get('pet-plan-timeslot', 'Workflow_PetPlanTimeSlot::index');
$routes->get('gettimeslot', 'Workflow_PetPlanTimeSlot::getTimeSlot');
$routes->post('inserttimeslot', 'Workflow_PetPlanTimeSlot::insertTimeSlot');
$routes->post('updatetimeslot', 'Workflow_PetPlanTimeSlot::updateTimeSlot');
$routes->post('deletetimeslot', 'Workflow_PetPlanTimeSlot::deleteTimeSlot');
// ================== Created by mani end ==================    























