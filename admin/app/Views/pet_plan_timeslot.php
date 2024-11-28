<!DOCTYPE html>

<!-- TITLE -->
<title>Time Slot Details</title>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

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
                    <h1 class="page-title fw-semibold fs-18 mb-0">Time Slot Details</h1>
                </div>
                <!-- Page Header Close -->


                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <a 
                                    id="add_pet"
                                    class="btn btn-end btn-outline-primary btn-wave d-sm-flex align-items-center justify-content-between"
                                >
                                    Add Time Slot Details
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>From Time</th>
                                                <th>To Time</th>  
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

    <div class="modal fade bs-example-modal-lg" id="popup-modal" tabindex="-1" role="dialog" aria-labelledby="petModelTitle" aria-hidden="true">
        <div class="modal-dialog  modal-lg  modal-dialog-">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="petModelTitle">Add Time Slot Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="pet-form">
                        <div class="container">
                            <div class="row"> 
                                <div class="col-lg-12 mt-3">
                                    <div class="form-floating mb-4 floating">
                                    <input type="time" class="form-control" id="from_time" placeholder="Enter the from name" name="from_time">
                                    <label for="from_time"><span class='text-danger'>*</span> From Time</label>
                                    </div>
                                </div>   
                                <div class="col-lg-12 mt-3">
                                    <div class="form-floating mb-4 floating">
                                        <input type="time" class="form-control"  id="to_time" placeholder="Enter the to name"  name="to_time">
                                        <label for="to_time"><span class='text-danger'>*</span> To Time</label>
                                    </div>
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
    <script src="<?= base_url() ?>assets/custom/js/pet_plan_timeslot.js"></script>
</body>

</html>