<!DOCTYPE html>

<!-- TITLE -->
<title>Booking</title>
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

            <!-- <button id="getLocationBtn">Get My Location</button> -->
            <p id="status"></p>

                <!-- Page Header -->
                <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                    <h1 class="page-title fw-semibold fs-18 mb-0">Booking List</h1>
                </div>
                <!-- Page Header Close -->


                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                                                                <th>Plan Name</th>

                                                <th>User Name</th>
                                                <th>User Pet Name</th>
                                                <th>Pet Problem</th>
                                                <th>Doctor</th>
                                                <th>Booking Status</th>
                                                <th>Payment Status</th>
                                                <th>Booking Date</th>
                                                <th>What's app Number</th>

                                                <th>Action</th>
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


    <div class="modal fade bs-example-modal-lg" id="popup-modal" tabindex="-1" role="dialog"
        aria-labelledby="bookingModelTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModelTitle">View Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-content">
                    <!-- Dynamic content will be inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bs-example-modal-lg" id="popup-modal-edit" tabindex="-1" role="dialog"
        aria-labelledby="bookingeditModelTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingeditModelTitle">Edit Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="clinic-form">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-12 mt-3">
                                    <div class="form-floating mb-4 floating">
                                        <input class="form-control address" id="booking_id" name="booking_id" readonly  >
                                        <label for="booking_id"><span class='text-danger'>*</span> Booking Id</label>
                                        <span class="error text-danger mt-5 booking_id"></span>
                                    </div>
                                </div>




                                <div class="col-lg-12 mt-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="paymentstatus"
                                            aria-label="Floating label select example" name="paymentstatus">
                                            <option value="pending">Pending</option>
                                            <option value="done">Done</option>


                                        </select>
                                        <label for="paymentstatus"><span class='text-danger'>*</span>Payment Status</label>
                                    </div>

                                </div>



                                <div class="col-lg-12 mt-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="bookingstatus"
                                            aria-label="Floating label select example" name="bookingstatus">
                                            <option value="inprogress">Inprogress</option>
                                            <option value="done">Done</option>
                                        </select>
                                        <label for="bookingstatus"><span class='text-danger'>*</span>Booking Status</label>
                                    </div>

                                </div>


                            </div>
                        </div>


                        <br><br>
                        <div class="mb-3 d-flex justify-content-end">
                            <a class="btn btn-success" id="btn-submit">Submit</a>
                        </div>

                        </hr>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <?php require ('components/footer.php') ?>

    <script src="https://cdn.ckeditor.com/ckeditor5/45.0.0/classic/ckeditor.js"></script>

    <script src="<?= base_url() ?>assets/custom/js/booking.js"></script>

</body>

</html>