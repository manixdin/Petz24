<!DOCTYPE html>

<!-- TITLE -->
<title>Doctor</title>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<?php require ('components/head.php') ?>

<body>

    <!-- PAGE -->
    <div class="page">
        <?php require ('components/topnav.php') ?>

        <?php require ('components/sidenavbar.php') ?>

        <!-- MAIN-CONTENT -->
        <div class="main-content app-content">
            <div class="container-fluid">

                <!-- Page Header -->
                <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                    <h1 class="page-title fw-semibold fs-18 mb-0">Doctor List</h1>

                </div>
                <!-- Page Header Close -->


                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <a id="add_doctor"
                                    class="btn btn-end btn-outline-primary btn-wave d-sm-flex align-items-center justify-content-between">
                                    Add Doctor
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Doctor Name</th>
                                                <th>Language</th>
                                                <th>Designation</th>
                                                <th>Registration No</th>
                                                <th>Image</th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- data -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="popup-modal" tabindex="-1" role="dialog"
        aria-labelledby="doctorModelTitle" aria-hidden="true">
        <div class="modal-dialog  modal-lg  modal-dialog-">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="doctorModelTitle">Add Doctor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="doctor-form">
                        <div class="container">
                            <div class="row">



                                <div class="col-lg-12 mt-3">
                                    <div class="form-floating mb-4 floating">
                                        <input class="form-control doctor_name" id="doctor_name"
                                            placeholder="Enter the Doctor name" name="doctor_name">
                                        <label for="doctor_name"><span class='text-danger'>*</span> Doctor Name</label>
                                        <span class="error text-danger mt-5 doctor_name"></span>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="languageselect"
                                            aria-label="Floating label select example" name="language_id">
                                            <option value="">Select a Language</option>


                                        </select>
                                        <label for="languageselect"><span class='text-danger'>*</span>Language Name</label>
                                    </div>

                                </div>

                                <div class="col-lg-12 mt-3">
                                    <div class="form-floating mb-4 floating">
                                        <input class="form-control designation" id="designation"
                                            placeholder="Enter the Designation" name="designation">
                                        <label for="designation"><span class='text-danger'>*</span> Designation</label>
                                        <span class="error text-danger mt-5 designation"></span>
                                    </div>
                                </div>



                                <div class="col-lg-12 mt-3">
                                    <div class="form-floating mb-4 floating">
                                        <input class="form-control doctor_name" id="registration_no"
                                            placeholder="Enter the Registration No" name="registration_no">
                                        <label for="registration_no"><span class='text-danger'>*</span> Registration
                                            No</label>
                                        <span class="error text-danger mt-5 registration_no"></span>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <div>
                                        <label for="doctor_img" class="form-label"><span class='text-danger'>*</span>
                                            Doctor Image &nbsp;
                                            <span class="text text-success text-small">AllowedFiles : png,jpeg,jpg [1080
                                                x 1440px]</span>
                                        </label>
                                        <div>
                                            <input class="form-control" type="file" id="doctor_img" name="doctor_img">

                                            <img src="" id="doctor_image_url" alt="image" width="130px"
                                                style="padding-top: 15px; display:none;">

                                            <span class="error text-danger doctor_img mt-5"></span>
                                        </div>

                                    </div>
                                </div>

                                <div class="mt-3 d-flex justify-content-end align-items-end">
                                    <a class="btn btn-success" id="btn-submit">Submit</a>
                                </div>

                                </hr>
                    </form>

                </div>

            </div>
        </div>

    </div>





    </div>
    <?php require ('components/footer.php') ?>

    <script src="https://cdn.ckeditor.com/ckeditor5/45.0.0/classic/ckeditor.js"></script>

    <script src="<?= base_url() ?>assets/custom/js/doctor.js"></script>

</body>

</html>