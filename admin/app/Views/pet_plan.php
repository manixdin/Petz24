<!DOCTYPE html>

<!-- TITLE -->
<title>Pet Plan</title>
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
                    <h1 class="page-title fw-semibold fs-18 mb-0">Pet Plan</h1>
                </div>
                <!-- Page Header Close -->


                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <!-- <a id="add_pet"
                                    class="btn btn-end btn-outline-primary btn-wave d-sm-flex align-items-center justify-content-between">
                                    Add Plan
                                </a> -->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Plan Name</th>
                                                <th>Price</th>
                                                <th>Plan Type</th>

                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
        aria-labelledby="petModelTitle" aria-hidden="true">
        <div class="modal-dialog  modal-lg  modal-dialog-">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="petModelTitle">Add Plan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="pet-form">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 mt-3" style="display:none">
                                    <div class="form-floating">
                                        <select class="form-select" id="petselect"
                                            aria-label="Floating label select example" name="pet_id">
                                            <option value="">Select Pet</option>
                                        </select>
                                        <label for="petselect"><span class='text-danger'>*</span>Pet Type</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="form-floating mb-4 floating">
                                        <input class="form-control" id="plan_name" placeholder="Enter the pet name"
                                            name="plan_name">
                                        <label for="plan_name"><span class='text-danger'>*</span> Plan Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="form-floating mb-4 floating">
                                        <input class="form-control" id="plan_price" placeholder="Enter the pet name"
                                            name="plan_price">
                                        <label for="plan_price"><span class='text-danger'>*</span> Plan Price</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3" style="display:none">
                                    <div class="form-floating mb-4 floating">
                                        <input class="form-control" id="duration" placeholder="Enter the pet name"
                                            name="duration">
                                        <label for="duration"><span class='text-danger'>*</span> Plan Duration (in
                                            mins)</label>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="plan_type"
                                            aria-label="Floating label select example" name="plan_type">
                                            <option value="">Select Plan Type</option>
                                            <option value="1">Consultation with Doctor</option>
                                            <option value="2">Chat with Doctor</option>
                                        </select>
                                        <label for="plan_type"><span class='text-danger'>*</span>Pet Type</label>
                                    </div>
                                </div>


                                <div class="col-lg-12 mt-3">
                                    <div>
                                        <label for="plan_img" class="form-label"><span class='text-danger'>*</span> Plan
                                            Image &nbsp;
                                            <span class="text text-success text-small">AllowedFiles : png,jpeg,jpg [1080
                                                x 1440px]</span>
                                        </label>
                                        <div>
                                            <input class="form-control" type="file" id="plan_img" name="plan_img">
                                            <img src="" id="plan_img_url" alt="image" width="130px"
                                                style="padding-top: 15px; display:none;">
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
    <script src="<?= base_url() ?>assets/custom/js/pet_plan.js"></script>
</body>

</html>