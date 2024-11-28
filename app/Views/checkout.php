<!DOCTYPE html>
<html lang="en">

<?php require('components/head.php')?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/checkout.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">


<?php require('components/header.php')?>


<body class="home-1"> 

<section class="section-tb-padding">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="checkout-area">
                            <div class="billing-area">
                                <form>
                                    <h2>Billing details</h2>
                                    <div class="billing-form">
                                        <ul class="billing-ul input-2">
                                            <li class="billing-li">
                                                <label>First name</label>
                                                <input type="text" name="f-name" placeholder="First name">
                                            </li>
                                            <li class="billing-li">
                                                <label>Last name</label>
                                                <input type="text" name="l-name" placeholder="Last name">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>Company name (Optional)</label>
                                                <input type="text" name="company details" placeholder="Company name">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>Street address</label>
                                                <input type="text" name="address" placeholder="Street address">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>Apartment,suite,unit etc. (Optional)</label>
                                                <input type="text" name="--" placeholder="Optional">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>Country</label>
                                                <select>
                                                    <option>Select a country</option>
                                                    <option>United country</option>
                                                    <option>Russia</option>
                                                    <option>italy</option>
                                                    <option>France</option>
                                                    <option>Ukraine</option>
                                                    <option>Germany</option>
                                                    <option>Australia</option>
                                                </select>
                                            </li>
                                        </ul>
                                        <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>State</label>
                                                <input type="text" name="city" placeholder="State">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>City</label>
                                                <input type="text" name="city" placeholder="City">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>Postcode</label>
                                                <input type="text" name="--" placeholder="Postcode">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul input-2">
                                            <li class="billing-li">
                                                <label>Email address</label>
                                                <input type="text" name="mail" placeholder="Email address">
                                            </li>
                                            <li class="billing-li">
                                                <label>Phone number</label>
                                                <input type="text" name="phone" placeholder="Phone number">
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                            <div class="order-area">
                                <div class="check-pro">
                                    <h2>In your cart (1)</h2>
                                    <ul class="check-ul">
                                        <li>
                                            <div class="check-pro-img">
                                                <a href="product.html"><img src="https://www.zigly.com/media/catalog/product/cache/c64dae22d3d7308ba9e0f4ad3d9bc2b6/f/a/farmina_n_d_grain_free_ocean_herring_orange_adult_dry_cat_food_-_1.5_kg.jpg" class="img-fluid" alt="image"></a>
                                            </div>
                                            <div class="check-content">
                                                <a href="product.html">Orange Adult Dry Cat Food</a>
                                                <span class="check-price">$230.00</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <h2>Your order</h2>
                                <ul class="order-history">
                                    <li class="order-details">
                                        <span>Total MRP</span>
                                        <span>230</span>
                                    </li>
                                    <li class="order-details">
                                        <span>Discount On MRP</span>
                                        <span>0</span>
                                    </li>
                                    <li class="order-details">
                                        <span>Delivery Charges </span>
                                        <span>0</span>
                                    </li>
                                    <li class="order-details">
                                        <span>Total Amount</span>
                                        <span>230</span>
                                    </li>
                                </ul>
                                
                                <div class="checkout-btn">
                                    <a href="order-complete.html" class="btn-style1">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
    





    <?php require('components/footer.php')?>
    <?php require('components/js.php')?>
</body>
</html>