<div id="signin_signup_popup" class="modal" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg"> <!-- Changed to modal-lg to accommodate larger width -->
    <div class="modal-content d-flex flex-row">
      
      <!-- Left section: Image & content -->
      <div class="left-section d-none d-lg-block">
        <div class="image-container">
          <img src="<?= base_url();?>assets/img/login.png" alt="Illustration of girl reading" class="illustration-image">
        </div>
      </div>

      <!-- Right section: Form content -->
      <div class="right-section">
        <div class="p-3 d-flex justify-content-between">
          <h5 class="signin_signu-modal-title">Sign up</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body custom-small">
          <form class='custom-form' id="signup_signin_form">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="First Name" aria-label="Firstname"
                aria-describedby="basic-addon1" id="first_name" name="first_name">
            </div>
            <small class="text-danger error first_name"></small>

            <div class="input-group mt-4">
              <input type="text" class="form-control" placeholder="Last Name" aria-label="Lastname"
                aria-describedby="basic-addon1" id="last_name" name="last_name">
            </div>
            <small class="text-danger error last_name"></small>

            <div class="input-group mt-4 signin-form-element">
              <input type="text" class="form-control" placeholder="Email Id" aria-label="Emailid"
                aria-describedby="basic-addon1" id="email_id" name="email_id">
            </div>
            <small class="text-danger error email_id"></small>

            <div class="input-group mt-4 signin-form-element">
              <input type="password" class="form-control custom-password-input" placeholder="Password" aria-label="Password"
                aria-describedby="basic-addon1" id="password" name="password">
              <i class="fa fa-eye-slash password-eye c-pointer"></i>
            </div>
            <small class="text-danger error password"></small>

            <div class="input-group mt-4">
              <span class="input-group-text" id="basic-addon1">+91</span>
              <input type="number" class="form-control" placeholder="Mobile Number" aria-label="Mobilenumber"
                aria-describedby="basic-addon1" id="mobile_number" name="mobile_number">
            </div>
            <small class="text-danger error mobile_number"></small>
          </form>
        </div>

        <div class="py-3 d-flex flex-column align-items-center mt-3">
          <a id="signup-signin-submit" type="button" class="btn btn-primary">Login</a>
          <div class='my-2 signup-content ls-content'>Already an user!, <a show='signin'
              class='show-ls-popup text-primary c-pointer'>Login</a> </div>
          <div class='my-2 signin-content ls-content'>Don't have an account!, <a show='signup'
              class='show-ls-popup text-primary c-pointer'>Signup</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
