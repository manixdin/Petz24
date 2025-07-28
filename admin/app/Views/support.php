<!DOCTYPE html>
<!-- TITLE -->
<title>Support</title>
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
                    <h1 class="page-title fw-semibold fs-18 mb-0">Support List</h1>

                </div>
                <!-- Page Header Close -->


                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <!-- <a 
                                    id="add_support"
                                    class="btn btn-end btn-outline-primary btn-wave d-sm-flex align-items-center justify-content-between"
                                >
                                    Add Support
                                </a> -->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Support Email</th>
                                                 <th>Support Contact</th>
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
    </div>

    <div class="modal fade bs-example-modal-lg" id="popup-modal" tabindex="-1" role="dialog" aria-labelledby="supportModelTitle" aria-hidden="true">
        <div class="modal-dialog  modal-lg  modal-dialog-">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supportModelTitle">Add Support</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="support-form">
                        <div class="container">
                            <div class="row">



                                <div class="col-lg-12 mt-3">
                                    <div class="form-floating mb-4 floating">
                                        <input
                                            class="form-control support_email" 
                                            id="support_email"
                                            placeholder="Enter the support email" 
                                            name="support_email"
                                            type="email"
                                        >
                                        <label for="support_email"><span class='text-danger'>*</span> Support Email</label>
                                        <span class="error text-danger mt-5 support_email"></span>
                                    </div>
                                </div>

                                 <div class="col-lg-12 mt-3">
                                    <div class="form-floating mb-4 floating">
                                        <input
                                            class="form-control support_contact" 
                                            id="support_contact"
                                            placeholder="Enter the support contact" 
                                            name="support_contact"
                                            type="tel"
                                        >
                                        <label for="support_contact"><span class='text-danger'>*</span> Support Contact Number</label>
                                        <span class="error text-danger mt-5 support_contact"></span>
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

    <script src="<?= base_url() ?>assets/custom/js/support.js"></script>

</body>

</html>