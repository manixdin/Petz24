<!DOCTYPE html>
<html lang="en">

<?php require('components/head.php')?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/petgrooming.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">


<?php require('components/header.php')?>


<body class="home-1">

    <section class="petgrooming-content section-tb-padding">
        <div class="container text-center">
            <h2 class="section-title">Professional Pet Grooming Services In VAN</h2>
            <div class="row justify-content-center mt-4">
                <!-- Service Item 1 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="service-item">
                        <div class="image-wrapper">
                            <img src="https://www.zigly.com/media/wysiwyg/breed-specific-haircut.png"
                                alt="Breed Specific Haircut" class="service-image">
                        </div>
                        <div class="service-text">
                            <h5 class="service-title">Breed Specific Haircut</h5>
                            <p class="service-description">Zigly's experienced groomers suggest specialty trims for each
                                breed.</p>
                        </div>
                    </div>
                </div>
                <!-- Service Item 2 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="service-item">
                        <div class="image-wrapper">
                            <img src="https://www.zigly.com/media/wysiwyg/grooming-experts-zigly.png"
                                alt="Grooming Experts" class="service-image">
                        </div>
                        <div class="service-text">
                            <h5 class="service-title">Grooming Experts</h5>
                            <p class="service-description">Zigly certified and trained groomers for your little
                                companions.</p>
                        </div>
                    </div>
                </div>
                <!-- Service Item 3 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="service-item">
                        <div class="image-wrapper">
                            <img src="https://www.zigly.com/media/wysiwyg/grooming-product-zigly.png"
                                alt="Quality Products" class="service-image">
                        </div>
                        <div class="service-text">
                            <h5 class="service-title">Quality Products</h5>
                            <p class="service-description">A wide variety of tested products to ensure the best care.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Service Item 4 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="service-item">
                        <div class="image-wrapper">
                            <img src="https://www.zigly.com/media/wysiwyg/grooming-experts-convinence.png"
                                alt="High Convenience" class="service-image">
                        </div>
                        <div class="service-text">
                            <h5 class="service-title">High Convenience</h5>
                            <p class="service-description">Curate a package of the services you need for your pet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>


    <div class="book-appoinment"><button id="book-now" class="appoinment" type="submit"> <a
                href="/services/grooming/">BOOK NOW</a> </button>

    </div>


    <section class="grooming-section">


    <div class="container-fluid">
  <div class="tab-section">
    <div class="tab-link active" onclick="showPackage('basic')">BASIC GROOMING</div>
    <div class="tab-link" onclick="showPackage('full')">FULL GROOMING PACKAGE WITH SPA</div>
  </div>

  <!-- Basic Grooming Package -->
  <div id="basic" class="package-container">
    <div class="package-image">
      <img src="https://www.zigly.com/media/mageplaza/blog/post/resize/400x/y/o/your_guide_to_ticks_fleas_in_pets_symptoms_treatment_care.jpg" alt="Basic Grooming Image">
    </div>
    <div class="package-details">


      <div class="price">
        <div class="left">

        <span>
        *Prices may vary as per breed
        </span>

        <div>BASIC GROOMING</div>

        </div>

        <div class="right">

        <div> ₹1,549.00</div>

        <span>
        60 mins
        </span>


       
        </div>
      </div>
     


      <p class="included">What's Included</p>
      <ul>
        <li>Bath Shampoo Conditioner</li>
        <li>Cleaning Package includes Ear and Nail Cleaning</li>
        <li>Bath and Blow Dry</li>
      </ul>
      <p class="description">
        Upon assessing your dog’s skin & coat, our groomers use suitable products, ensuring that it leaves with a clean coat & ears, and trimmed paws.
      </p>
    </div>
  </div>

  <!-- Full Grooming Package -->
  <div id="full" class="package-container" style="display: none;">
    <div class="package-image">
      <img src="https://www.zigly.com/media/mageplaza/blog/post/resize/400x/d/o/dog_allergies.png" alt="Full Grooming Spa Package Image">
    </div>
    <div class="package-details">
     

      
      <div class="price">
        <div class="left">

        <span>
        *Prices may vary as per breed
        </span>

        <div>FULL GROOMING PACKAGE WITH SPA</div>

        </div>

        <div class="right">

        <div>₹2,499.00 </div>

        <span>
        90 mins
        </span>


       
        </div>
      </div>
      <p class="included">What's Included</p>
      <ul>
        <li>Bath Shampoo and Conditioner</li>
        <li>Ear Cleaning and Nail Trimming</li>
        <li>Full Body Haircut and Styling</li>
        <li>Relaxing Massage and Aromatherapy</li>
        <li>Bath and Blow Dry</li>
      </ul>
      <p class="description">
        This package provides a complete grooming experience with spa-like relaxation, ensuring your pet is pampered and groomed to perfection.
      </p>
    </div>
  </div>
</div>


    </section>
  
    <div class="book-appoinment extra-padd-for-above-gif"><button id="book-now" class="appoinment" type="submit"> <a
                href="/services/grooming/">BOOK NOW</a> </button>

    </div>

    <section class="zigly-home-section">


        <div class="zigly-home-section-wrapper">

            <div class="left">
                <div class="left-content">
                    <div class="left-heading">Zigly at Home</div>
                    <h3>Enjoy best-in-class <br>grooming services <br>from the comfort of <br>your home</h3>

                    <div class="book-appoinment-2">
                    <button class="appoinment" type="submit"> <a href="/services/grooming/">BOOK NOW</a> </button>

                </div>
                </div>

                
               
            </div>

            <div class="right">

                <div class="zigly-steps">
                    <div class="step">
                        <div class="icon-circle">
                            <img src="https://www.zigly.com/media/wysiwyg/petgrooming/icons_zigly_-06.png"
                                alt="Select Service Icon" class="step-icon">
                        </div>
                        <p>1. Select your services</p>
                    </div>
                    <div class="step">
                        <div class="icon-circle">
                            <img src="https://www.zigly.com/media/wysiwyg/petgrooming/icons_zigly_-07.png"
                                alt="Select Date & Time Icon" class="step-icon">
                        </div>
                        <p>2. Select the date & time</p>
                    </div>
                    <div class="step">
                        <div class="icon-circle">
                            <img src="https://www.zigly.com/media/wysiwyg/petgrooming/Group_3810.png"
                                alt="Groomer Assigned Icon" class="step-icon">
                        </div>
                        <p>3. A groomer is assigned</p>
                    </div>
                    <div class="step">
                        <div class="icon-circle">
                            <img src="https://www.zigly.com/media/wysiwyg/petgrooming/at-home-icon.png"
                                alt="Enjoy Home Icon" class="step-icon">
                        </div>
                        <p>4. Enjoy the Zigly at home</p>
                    </div>
                </div>



            </div>



        </div>




    </section>



    <section class='card-section'>
    <div class="container">
    <div class="section-heading">Day-to-day Tips To Maintain Your Pet's Health</div>

    <div class="row">
      <!-- Card 1 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="https://www.zigly.com/media/mageplaza/blog/post/resize/400x/d/o/dog_allergies.png" alt="Dog Allergies">
          <div class="card-body">
            <h5>Dog Allergies - Know All About Them!</h5>
            <p>Common dog allergies that you need to be aware of to ensure your pet's health.</p>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="https://www.zigly.com/media/mageplaza/blog/post/resize/400x/d/r/dry_skin_in_dogs.png" alt="Dry Skin in Dogs">
          <div class="card-body">
            <h5>Here's How You Can Prevent Dry Skin In Dogs</h5>
            <p>Learn effective tips to keep your dog's skin hydrated and prevent dryness.</p>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="https://www.zigly.com/media/mageplaza/blog/post/resize/400x/y/o/your_guide_to_ticks_fleas_in_pets_symptoms_treatment_care.jpg" alt="Ticks and Fleas in Pets">
          <div class="card-body">
            <h5>Your Guide To Ticks & Fleas in Pets: Symptoms, Treatment, Care</h5>
            <p>Identify, treat, and prevent ticks and fleas to keep your pet safe and healthy.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
    </section>

    <div class="book-appoinment-3"><button id="book-now" class="appoinment" type="submit"> <a
                href="/services/grooming/">BOOK NOW</a> </button>

    </div>

<section class="quality-section">

    <div class="container-fluid ">
    <div class="section-heading">Quality And Convenience - The Mantra Of Zigly Tribe</div>
    <div class="sub-heading">Your little bundle of joy will always be in good hands. Our groomers are not just certified but also care for your pets with all their heart. And the best part is, that your pet can enjoy all our services at home.</div>

    <div class="content-section">
      <div class="content-card">
        <img src="https://www.zigly.com/media/wysiwyg/certified_groomers.png" alt="Certified Groomers">
        <div class="content-description">
          <h5>Certified Groomers, At Your Service</h5>
          <p>When the question is of your pet's upkeep, our certified, pet-loving groomers ensure that your pet enjoys the best-in-class services at the comfort of its home.</p>
        </div>
      </div>
      <div class="content-card">
        <img src="https://www.zigly.com/media/wysiwyg/certified_groomers.png" alt="Happy Pets, Happy Parents">
        <div class="content-description">
          <h5>Happy Pets, Happy Parents</h5>
          <p>Our high-quality services address your pets' needs with the ultimate perfection! Every grooming session will help them be their best, happy selves.</p>
        </div>
      </div>
    </div>

    <div class="book-appoinment-4">
                    <button class="appoinment" type="submit"> <a href="/services/grooming/">BOOK NOW</a> </button>

                </div>
  </div>
  </section>


    <?php require('components/footer.php')?>
    <?php require('components/js.php')?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">

    <script src="<?php echo base_url();?>assets/custom/js/grooming.js"></script>

</body>

</html>