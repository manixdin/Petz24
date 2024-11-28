<!DOCTYPE html>
<html lang="en">

<?php require('components/head.php')?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/product.css">

<?php require('components/header.php')?>


<body class="home-1">
    <section class="section-tb-padding ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12 d-none d-lg-inline">
                    <div class="all-filter">
                        <div class="categories-page-filter">
                            <h4 class="filter-title">Categories</h4>
                            <a href="#category-filter" data-bs-toggle="collapse" class="filter-link"><span>Categories
                                </span><i class="fa fa-angle-down"></i></a>
                            <ul class="all-option collapse" id="category-filter">
                                <li class="grid-list-option">
                                    <input type="checkbox">
                                    <a href="javascript:void(0)">Food <span class="grid-items">(4)</span></a>
                                </li>
                                <li class="grid-list-option">
                                    <input type="checkbox">
                                    <a href="javascript:void(0)">Treats<span class="grid-items">(6)</span></a>
                                </li>
                                <li class="grid-list-option">
                                    <input type="checkbox">
                                    <a href="javascript:void(0)">Toys <span class="grid-items">(8)</span></a>
                                </li>
                                <li class="grid-list-option">
                                    <input type="checkbox">
                                    <a href="javascript:void(0)">Health & Hygiene <span
                                            class="grid-items">(7)</span></a>
                                </li>
                                <li class="grid-list-option">
                                    <input type="checkbox">
                                    <a href="javascript:void(0)">Brushes & Combos<span class="grid-items">(3)</span></a>
                                </li>
                                <li class="grid-list-option">
                                    <input type="checkbox">
                                    <a href="javascript:void(0)">Shampoo<span class="grid-items">(10)</span></a>
                                </li>
                                <li class="grid-list-option">
                                    <input type="checkbox">
                                    <a href="javascript:void(0)">Towels & Wipes<span class="grid-items">(12)</span></a>
                                </li>
                                <li class="grid-list-option">
                                    <input type="checkbox">
                                    <a href="javascript:void(0)">Conditioner<span class="grid-items">(11)</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="price-filter">
                            <h4 class="filter-title">Filter by price</h4>
                            <a href="#price-filter" data-bs-toggle="collapse" class="filter-link"><span>Filter by price
                                </span><i class="fa fa-angle-down"></i></a>
                            <ul class="all-price collapse" id="price-filter">
                                <price-range class="price-range">
                                    <div class="price-range-group group-range">
                                        <input type="range" class="range" min="0" max="18999" value="18" id="range1">
                                        <input type="range" class="range" min="0" max="18999" value="15000" id="range2">
                                    </div>
                                    <div class="price-input-group group-input">
                                        <div class="price-range-input input-prefix">
                                            <label class="input-prefix-label">From</label>
                                            <span class="input-prefix-value">₹ <span id="demo1"></span></span>
                                        </div>
                                        <span class="price-range-delimeter">-</span>
                                        <div class="price-range-input input-prefix">
                                            <label class="input-prefix-label">To</label>
                                            <span class="input-prefix-value">₹ <span id="demo2"></span></span>
                                        </div>
                                    </div>
                                </price-range>
                            </ul>
                        </div>
                        <div class="vendor-filter">
                            <h4 class="filter-title">Filter By Brand</h4>
                            <a href="#vendor" data-bs-toggle="collapse" class="filter-link"><span>Filter by vendor
                                </span><i class="fa fa-angle-down"></i></a>
                            <ul class="all-vendor collapse" id="vendor">
                                <li class="f-vendor">
                                    <input type="checkbox">
                                    <label>Kolan</label>
                                </li>
                                <li class="f-vendor">
                                    <input type="checkbox">
                                    <label>Pedigree</label>
                                </li>
                                <li class="f-vendor">
                                    <input type="checkbox">
                                    <label>Kong</label>
                                </li>
                                <li class="f-vendor">
                                    <input type="checkbox">
                                    <label>Orijien</label>
                                </li>
                                <li class="f-vendor">
                                    <input type="checkbox">
                                    <label>Goodies</label>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12 ">
                    <div class="grid-list-area">
                        <div class="grid-list-select">
                            <ul class="grid-list">
                            </ul>
                            <ul class="grid-list-selector">
                                <li>
                                    <label>Sort by</label>
                                    <select>
                                        <option>High to low</option>
                                        <option>Low to High</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <div class="grid-pro">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 my-4">
                                    <div class="grid-product">
                                        <div class="grid-items">
                                            <div class="tred-pro">
                                                <div class="tr-pro-img">
                                                    <a href="<?php echo base_url();?>product-description">
                                                        <img class="img-fluid"
                                                            src="https://www.zigly.com/media/catalog/product/cache/c64dae22d3d7308ba9e0f4ad3d9bc2b6/1/_/1_15__1.jpg"
                                                            alt="pro-img1">
                                                    </a>
                                                </div>
                                                <div class="Pro-lable">
                                                    <span class="p-text">New</span>
                                                </div>
                                            </div>
                                            <div class="caption">
                                                <span class="fw-bold">Pedigree</span>
                                                <h3><a href="<?php echo base_url();?>product-description">Pedigree Meat & Milk Dry Food</a></h3>
                                                <div class="rating d-flex space-between">
                                                    <span
                                                            class="old-price px-2"><del>760.00 </del></span><span
                                                            class="new-price">₹684.00 </span>
                                                </div>

                                            </div>
                                            <a href="petz:;" class="btn btn-style1-custom"><i
                                                    class="fa fa-shopping-bag d-none d-lg-inline"></i>
                                                Add to cart</a>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6 my-4">
                                    <div class="grid-product">
                                        <div class="grid-items">
                                            <div class="tred-pro">
                                                <div class="tr-pro-img">
                                                    <a href="<?php echo base_url();?>product-description">
                                                        <img class="img-fluid"
                                                            src="https://www.zigly.com/media/catalog/product/cache/c64dae22d3d7308ba9e0f4ad3d9bc2b6/p/e/pedigree_adult_grilled_liver_chunks_in_gravy_with_vegetables_wet_dog_food_-_70g_7.jpg"
                                                            alt="pro-img1">
                                                    </a>
                                                </div>
                                                <div class="Pro-lable">
                                                    <span class="p-text">New</span>
                                                </div>
                                            </div>
                                            <div class="caption">
                                                <span class="fw-bold">Pedigree</span>
                                                <h3><a href="<?php echo base_url();?>product-description">Pedigree Puppy Chicken - 70gm</a></h3>
                                                <div class="rating d-flex space-between">
                                                    <span
                                                            class="old-price px-2"><del>50.00 </del></span><span
                                                            class="new-price">40.00 </span>
                                                </div>

                                            </div>
                                            <a href="petz:;" class="btn btn-style1-custom"><i
                                                    class="fa fa-shopping-bag  d-none d-lg-inline"></i>
                                                Add to cart</a>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-4 col-sm-6 my-4">
                                    <div class="tred-pro">
                                        <div class="grid-product">
                                            <div class="grid-items">
                                                <div class="tr-pro-img">
                                                    <a href="<?php echo base_url();?>product-description">
                                                        <img class="img-fluid"
                                                            src="https://www.zigly.com/media/catalog/product/cache/c64dae22d3d7308ba9e0f4ad3d9bc2b6/z/g/zg6306-royal_canin_maxi_puppy_wet_dog_food_140_gm.jpg"
                                                            alt="pro-img1">
                                                    </a>
                                                </div>

                                                <div class="Pro-lable">
                                                    <span class="p-discount">-10%</span>
                                                </div>
                                            </div>
                                            <div class="caption">
                                                <span class="fw-bold">Royal Canin</span>
                                                <h3><a href="<?php echo base_url();?>product-description">Maxi Puppy Wet Dog Food 140gm</a></h3>
                                                <div class="rating d-flex space-between">
                                                   <span
                                                            class="old-price px-2"><del>145.00 </del></span><span
                                                            class="new-price">130.00 </span>
                                                </div>

                                            </div>
                                            <a href="petz:;" class="btn btn-style1-custom"><i
                                                    class="fa fa-shopping-bag d-none d-lg-inline"></i>
                                                Add to cart</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-4 col-sm-6 my-4">
                                    <div class="grid-product">
                                        <div class="grid-items">
                                            <div class="tred-pro">
                                                <div class="tr-pro-img">
                                                    <a href="<?php echo base_url();?>product-description">
                                                        <img class="img-fluid"
                                                            src="https://www.zigly.com/media/catalog/product/cache/c64dae22d3d7308ba9e0f4ad3d9bc2b6/1/2/1242.jpg"
                                                            alt="pro-img1">
                                                    </a>
                                                </div>



                                            </div>
                                            <div class="caption">
                                                <span class="fw-bold">DOGAHOLIC</span>
                                                <h3><a href="<?php echo base_url();?>product-description">Milky Chew Chicken 10pcs</a></h3>
                                                <div class="rating d-flex space-between">
                                                    <span
                                                            class="old-price px-2"><del>375.00 </del></span><span
                                                            class="new-price">337.00 </span>
                                                </div>

                                            </div>
                                            <a href="petz:;" class="btn btn-style1-custom"><i
                                                    class="fa fa-shopping-bag d-none d-lg-inline"></i>
                                                Add to cart</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-4 col-sm-6 my-4">
                                    <div class="grid-product">
                                        <div class="grid-items">
                                            <div class="tred-pro">
                                                <div class="tr-pro-img">
                                                    <a href="<?php echo base_url();?>product-description">
                                                        <img class="img-fluid"
                                                            src="https://www.zigly.com/media/catalog/product/cache/c64dae22d3d7308ba9e0f4ad3d9bc2b6/z/e/zee_dog_neopro_tangerine_dog_leash_1.jpg"
                                                            alt="pro-img1">
                                                    </a>
                                                </div>
                                                <div class="Pro-lable">
                                                    <span class="p-discount">-10%</span>
                                                </div>

                                            </div>

                                            <div class="caption">
                                                <span class="fw-bold">ZEE DOGS</span>
                                                <h3><a href="<?php echo base_url();?>product-description">Neopro Tangerine Dog Lash</a></h3>
                                                <div class="rating d-flex space-between">
                                                    <span
                                                            class="old-price px-2"><del>2799.00 </del></span><span
                                                            class="new-price">2519.00 </span>
                                                </div>

                                            </div>
                                            <a href="<?php echo base_url();?>product-description" class="btn btn-style1-custom"><i
                                                    class="fa fa-shopping-bag d-none d-lg-inline"></i>
                                                Add to cart</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-4 col-sm-6 my-4">
                                    <div class="grid-product">
                                        <div class="grid-items">
                                            <div class="tred-pro">
                                                <div class="tr-pro-img">
                                                    <a href="<?php echo base_url();?>product-description">
                                                        <img class="img-fluid"
                                                            src="https://www.zigly.com/media/catalog/product/cache/c64dae22d3d7308ba9e0f4ad3d9bc2b6/p/e/pet_head_furtastic_conditioner_250_ml_6.jpg"
                                                            alt="pro-img1">
                                                    </a>
                                                </div>


                                            </div>

                                            <div class="caption">
                                                <span class="fw-bold">PET HEAD</span>
                                                <h3><a href="<?php echo base_url();?>product-description">Furtastic Conditioner 250ml</a></h3>
                                                <div class="rating d-flex space-between">
                                                    <span
                                                            class="old-price px-2"><del>1499.00 </del></span><span
                                                            class="new-price">1349.00 </span>
                                                </div>

                                            </div>
                                            <a href="petz:;" class="btn btn-style1-custom"><i
                                                    class="fa fa-shopping-bag d-none d-lg-inline"></i>
                                                Add to cart</a>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-lg-4 col-sm-6 my-4">
                                    <div class="grid-product">
                                        <div class="grid-items">
                                            <div class="tred-pro">
                                                <div class="tr-pro-img">
                                                    <a href="<?php echo base_url();?>product-description">
                                                        <img class="img-fluid"
                                                            src="https://www.zigly.com/media/catalog/product/cache/c64dae22d3d7308ba9e0f4ad3d9bc2b6/5/1/51pnxdrljel._sl1500_.jpg"
                                                            alt="pro-img1">
                                                    </a>
                                                </div>


                                            </div>

                                            <div class="caption">
                                                <span class="fw-bold">GIGWI</span>
                                                <h3><a href="<?php echo base_url();?>product-description">Regular Comb For Dog & Cats</a></h3>
                                                <div class="rating d-flex space-between">
                                                    <span
                                                            class="old-price px-2"><del>875.00 </del></span><span
                                                            class="new-price">787.00 </span>
                                                </div>

                                            </div>
                                            <a href="petz:;" class="btn btn-style1-custom"><i
                                                    class="fa fa-shopping-bag d-none d-lg-inline"></i>
                                                Add to cart</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-4 col-sm-6 my-4">
                                    <div class="grid-product">
                                        <div class="grid-items">
                                            <div class="tred-pro">
                                                <div class="tr-pro-img">
                                                    <a href="<?php echo base_url();?>product-description">
                                                        <img class="img-fluid"
                                                            src="https://www.zigly.com/media/catalog/product/cache/c64dae22d3d7308ba9e0f4ad3d9bc2b6/10104899-1.jpg"
                                                            alt="pro-img1">
                                                    </a>
                                                </div>
                                                <div class="Pro-lable">
                                                    <span class="p-text">New</span>
                                                </div>


                                            </div>

                                            <div class="caption">
                                                <span class="fw-bold">M-PETS</span>
                                                <h3><a href="<?php echo base_url();?>product-description">Oval Slicker Brush For Cats & Dog</a></h3>
                                                <div class="rating d-flex space-between">
                                                    <span
                                                            class="old-price px-2"><del>699.00 </del></span><span
                                                            class="new-price">629.00 </span>
                                                </div>

                                            </div>
                                            <a href="petz:;" class="btn btn-style1-custom"><i
                                                    class="fa fa-shopping-bag d-none d-lg-inline"></i>
                                                Add to cart</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-4 col-sm-6 my-4">
                                    <div class="grid-product">
                                        <div class="grid-items">
                                            <div class="tred-pro">
                                                <div class="tr-pro-img">
                                                    <a href="<?php echo base_url();?>product-description">
                                                        <img class="img-fluid"
                                                            src="https://www.zigly.com/media/catalog/product/cache/c64dae22d3d7308ba9e0f4ad3d9bc2b6/m/a/main_2.jpg"
                                                            alt="pro-img1">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="caption">
                                                <span class="fw-bold">TOPDOG</span>
                                                <h3><a href="<?php echo base_url();?>product-description">Premium Watermelon Mist Spray 100ml</a></h3>
                                                <div class="rating d-flex space-between">
                                                    <span
                                                            class="old-price px-2"><del>475.00 </del></span><span
                                                            class="new-price">427.00 </span>
                                                </div>

                                            </div>
                                            <a href="petz:;" class="btn btn-style1-custom"><i
                                                    class="fa fa-shopping-bag d-none d-lg-inline"></i>
                                                Add to cart</a>
                                        </div>
                                    </div>
                                </div>



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