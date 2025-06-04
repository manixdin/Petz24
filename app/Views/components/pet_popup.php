<div id="add-pet_popup" class="modal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="p-3 d-flex justify-content-between">
                <h5 class="signin_signu-modal-title">Pet Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <form id="user-pet-form" class="billing-address-1" enctype="multipart/form-data">
                                <!-- Type -->
                                <div class="billing-addresss-1">
                                    <label for="type">Pet TYPE</label>
                                    <div class="toggle-container">
                                        <div class="toggle-container">
                                            <select class="breed" id="pet-list" name="pet_id"></select>
                                        </div>
                                    </div>
                                </div>
                                <p class="error pet-list-error"></p>
                                <!-- Breed -->
                                <div class="billing-addresss-1">
                                    <label for="breed">BREED</label>
                                    <div class="toggle-container">
                                        <select class="breed" id="breed-list" name="breed_id">
                                            <option value="">Select breed</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="error breed-list-error"></p>
                                <!-- Gender -->
                                <div class="billing-addresss-1">
                                    <label for="gender">GENDER</label>
                                    <div class="toggle-container add">
                                        <button gender="male" type="button"
                                            class="toggle-btn active maleBtn gender-toggle">Male</button>
                                        <button gender="female" type="button"
                                            class="toggle-btn femaleBtn gender-toggle">Female</button>
                                    </div>
                                </div>
                                <!-- DOB -->
                                <div class="billing-addresss-1">
                                    <label for="dob">DOB</label>
                                    <div class="toggle-container">
                                        <input type="date" id="dob" name="date_of_birth">
                                    </div>
                                </div>
                                <p class="error dob-error"></p>
                                <!-- Age -->
                                <div class="billing-addresss-1">
                                    <label for="age">AGE</label>
                                    <div class="toggle-container">
                                        <input type="number" class="age-year" placeholder="Year" name="age_year"
                                            id="age_year" readonly>
                                        <input type="number" class="age-month" placeholder="Month" name="age_month"
                                            id="age_month" readonly>
                                    </div>
                                </div>
                                <p class="error age-error"></p>
                                <!-- Name -->
                                <div class="billing-addresss-1">
                                    <label for="name">NAME</label>
                                    <div class="toggle-container">
                                        <input type="text" placeholder="Enter name" id="pet-name" class="name"
                                            name="name">
                                    </div>
                                </div>

                                <p class="error pet-name-error"></p>

                                <div class="billing-addresss-1">
                                    <label for="pet_img" class="form-label"> Pet Image &nbsp;

                                    </label>
                                    <div class="toggle-container">
                                        <input class="form-control" type="file" id="pet_img" name="pet_img">
                                        <input class="form-control" type="hidden" id="old_img" name="old_img">


                                    </div>
                                    
                                    
                                </div>

                                <div class="billing-addresss-1">
                                     <img src="" id="pet_image_url" alt="image" width="130px"
                                            style="padding-top: 15px; display:none;">
</div>
                                <p class="error pet-img-error"></p>



                                <div class="h-100 d-inline-block">
                                    <button type="button" class="btn btn-style1-custom" id="add-pet">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-8">
                            <img src="https://www.zigly.com/static/version1710913419/frontend/Amasty/JetTheme_child/en_US/Zigly_Managepets/images/banner-1.png"
                                alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>