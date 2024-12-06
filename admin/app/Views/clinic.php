<!DOCTYPE html>

<!-- TITLE -->
<title>Clinic</title>
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
                    <h1 class="page-title fw-semibold fs-18 mb-0">Clinic List</h1>
                   
                </div>
                <!-- Page Header Close -->


                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <a 
                                    id="add_clinic"
                                    class="btn btn-end btn-outline-primary btn-wave d-sm-flex align-items-center justify-content-between"
                                >
                                    Add Clinic
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Clinic Name</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>Pincode</th>

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

    <div class="modal fade bs-example-modal-lg" id="popup-modal" tabindex="-1" role="dialog" aria-labelledby="clinicModelTitle" aria-hidden="true">
        <div class="modal-dialog  modal-lg  modal-dialog-">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clinicModelTitle">Add Clinic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="clinic-form">
                        <div class="container">
                            <div class="row">

                               
                            <div class="col-lg-12 mt-3">
                         
                                    <div class="form-floating mb-4 floating">
                                        <input
                                            class="form-control clinic_name" 
                                            id="clinic_name"
                                            placeholder="Enter the clinic name" 
                                            name="clinic_name"
                                        >
                                        <label for="clinic_name"><span class='text-danger'>*</span> Clinic Name</label>
                                        <span class="error text-danger mt-5 clinic_name"></span>
                                    </div>
                            </div>

                            <div class="col-lg-12 mt-3">
                         
                         <div class="form-floating mb-4 floating">
                             <input
                                 class="form-control address" 
                                 id="address"
                                 placeholder="Enter the clinic address" 
                                 name="address"
                             >
                             <label for="address"><span class='text-danger'>*</span> Address</label>
                             <span class="error text-danger mt-5 address"></span>
                         </div>
                 </div>


                 <div class="col-lg-12 mt-3">
                         
                         <div class="form-floating mb-4 floating">
                             <input
                                 class="form-control city" 
                                 id="city"
                                 placeholder="Enter the city" 
                                 name="city"
                             >
                             <label for="city"><span class='text-danger'>*</span> City</label>
                             <span class="error text-danger mt-5 city"></span>
                         </div>
                         </div>

                   <div class="col-lg-12 mt-3">
                         
                         <div class="form-floating mb-4 floating">
                             <input
                                 class="form-control state" 
                                 id="state"
                                 placeholder="Enter the state" 
                                 name="state"
                             >
                             <label for="state"><span class='text-danger'>*</span> State</label>
                             <span class="error text-danger mt-5 state"></span>
                         </div>
                         </div>

                         <div class="col-lg-12 mt-3">
                         
                         <div class="form-floating mb-4 floating">
                             <input
                                 class="form-control pincode" 
                                 id="pincode"
                                 placeholder="Enter the clinic pincode" 
                                 name="pincode"
                             >
                             <label for="pincode"><span class='text-danger'>*</span> Pincode</label>
                             <span class="error text-danger mt-5 pincode"></span>
                         </div>
                 </div>



                            </div>
                </div> <br><br>
                <div class="mb-3 d-flex justify-content-end">
                <a class="btn btn-success" id="btn-submit">Submit</a>
                </div>

                </hr>
                </form>

            </div>

        </div>
    </div>

    <?php require ('components/footer.php') ?>

    <script src="https://cdn.ckeditor.com/ckeditor5/45.0.0/classic/ckeditor.js"></script>

    <script src="<?= base_url() ?>assets/custom/js/clinic.js"></script>

</body>

</html>