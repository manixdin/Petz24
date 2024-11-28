<!DOCTYPE html>
<html lang="en">

<?php require('components/head.php')?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/addpet.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">
<?php require('components/header.php')?>

<style>

</style>

<body class="home-1">
    <div class="container section-tb-padding">
        <div class="row">
            <div class="col-lg-4">
                <div class="billing-area my-2 my-lg-0">
                    <div class="billing-title">
                        <h4>Update Pet</h4>
                    </div>
                    <div class="billing-address-1">
                        <!-- Type -->
                        <div class="billing-addresss-1">
                            <label for="type">TYPE</label>
                            <div class="toggle-container">
                                <button id="dogBtn" class="toggle-btn active dogBtn"
                                    onclick="toggleType('dog')">Dog</button>
                                <button id="catBtn" class="toggle-btn catBtn" onclick="toggleType('cat')">Cat</button>
                            </div>
                        </div>
                        <!-- Gender -->
                        <div class="billing-addresss-1">
                            <label for="gender">GENDER</label>
                            <div class="toggle-container">
                                <button id="maleBtn" class="toggle-btn  maleBtn"
                                    onclick="toggleGender('male')">Male</button>
                                <button id="femaleBtn" class="toggle-btn active femaleBtn"
                                    onclick="toggleGender('female')">Female</button>
                            </div>
                        </div>
                        <!-- Breed -->
                        <div class="billing-addresss-1">
                            <label for="breed">BREED</label>
                            <div class="toggle-container">
                                <input type="text" placeholder="Enter breed" class="breed">
                            </div>
                        </div>
                        <!-- DOB -->
                        <div class="billing-addresss-1">
                            <label for="dob">DOB</label>
                            <div class="toggle-container">
                                <input type="date" class="dob">
                            </div>
                        </div>
                        <!-- Age -->
                        <div class="billing-addresss-1">
                            <label for="age">AGE</label>
                            <div class="toggle-container">
                                <input type="number" class="age-year" placeholder="Year">
                                <input type="number" class="age-month" placeholder="Month">
                            </div>
                        </div>
                        <!-- Name -->
                        <div class="billing-addresss-1">
                            <label for="name">NAME</label>
                            <div class="toggle-container">
                                <input type="text" placeholder="Enter name" class="name">
                            </div>
                        </div>

                        <div class="my-4">
                            <label for="name">SELECT AVATAR(optional)</label><br>
                            <div class="pet-img-wrapper d-flex align-items-center justify-content-around">
                                <div class="add-pet">
                                    <span class="add-pet-label">Add Photo</span>
                                    <input type="file" id="add-pet-field" style="display: none;">
                                </div>

                                <div class="default-pet">
                                    <img src="https://www.zigly.com/static/version1710913419/frontend/Amasty/JetTheme_child/en_US/Zigly_Managepets/images/ava_dog-1.png"
                                        alt="" class="img-fluid pet-active">
                                    <img src="https://www.zigly.com/static/version1710913419/frontend/Amasty/JetTheme_child/en_US/Zigly_Managepets/images/ava_dog-2.png"
                                        alt="" class="img-fluid">
                                    <img src="https://www.zigly.com/static/version1710913419/frontend/Amasty/JetTheme_child/en_US/Zigly_Managepets/images/ava_dog-3.png"
                                        alt="" class="img-fluid">
                                </div>

                            </div>
                        </div>


                        <a href="petz:;" class="btn btn-style1-custom"> Add Pet</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <img src="https://www.zigly.com/static/version1710913419/frontend/Amasty/JetTheme_child/en_US/Zigly_Managepets/images/banner-1.png"
                    alt="" class="img-fluid">
            </div>
        </div>
    </div>

    <?php require('components/footer.php')?>
    <?php require('components/js.php')?>

    <script>
    $(document).ready(function() {
        $('.add-pet-label').on('click', function() {
            $('#add-pet-field').trigger('click');
        });

        $('#add-pet-field').on('change', function() {
            console.log('File selected:', $(this).val());
            // Add your code to handle the file upload using jQuery
        });
    });

    function toggleType(type) {
        // Remove active class from all type buttons
        document.querySelectorAll('#dogBtn, #catBtn').forEach(btn => {
            btn.classList.remove('active');
        });
        // Add active class to the clicked type button
        document.getElementById(`${type}Btn`).classList.add('active');
    }

    function toggleGender(gender) {
        // Remove active class from all gender buttons
        document.querySelectorAll('#maleBtn, #femaleBtn').forEach(btn => {
            btn.classList.remove('active');
        });
        // Add active class to the clicked gender button
        document.getElementById(`${gender}Btn`).classList.add('active');
    }
    </script>
</body>

</html>