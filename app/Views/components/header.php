<!-- header area start -->
<section class="top-5">
    <!-- top notificationbar start -->
    <div class="top-news">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="top-home">
                        <!-- offer text start -->
                        <li class="top-home-li t-content">
                            <p>Your Pet’s Health, Just a Click Away </p>
                        </li>
                        <!-- offer text end -->
                        <li class="top-home-li">
                            <ul class="top-dropdown">
                                <!-- login start -->
                                <li class="top-dropdown-li">Customer Support: 080696 01281 | Time: 9:30AM to 7:00 PM
                                </li>
                                <!-- currency start -->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- top notificationbar start -->
    <!-- header start -->
    <header class="header-area">
        <div class="header-main-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header-main">
                            <!-- logo start -->
                            <div class="header-element logo">
                                <a href="<?= base_url();?>">
                                    <img src="<?= base_url();?>assets/img/logo.png" alt="logo-image" class="img-fluid">
                                </a>
                            </div>
                            <!-- logo end -->
                            <!-- menu start -->
                            <div class="menu-area">
                                <div class="header-element header-menu">
                                    <div class="top-menu">
                                        <div class="header-element megamenu-content">
                                            <div class="mainwrap">
                                                <ul class="main-menu"> 
                                                    <li class="menu-link">
                                                        <a href="<?= base_url() ?>" class="link-title">
                                                            <span class="sp-link-title">Home</span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-link">
                                                        <a href="<?= base_url('consultation') ?>" class="link-title">
                                                            <span class="sp-link-title">Consultation</span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-link">
                                                        <a href="<?= base_url('chatwithdoctor') ?>" class="link-title">
                                                            <span class="sp-link-title">Chat with Doctor</span>
                                                        </a>
                                                    </li>
                                                    <!-- <li class="menu-link">
                                                        <a href="javascript:void(0)" class="link-title">
                                                            <span class="sp-link-title">Our Stores</span>
                                                        </a>
                                                    </li> -->
                                                    <!-- <li class="menu-link">
                                                        <a href="javascript:void(0)" class="link-title">
                                                            <span class="sp-link-title">Happy Pets</span>
                                                        </a>
                                                    </li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- menu end -->
                            <!-- header icon start -->
                            <div class="header-element right-block-box">
                                <ul class="shop-element align-items-center">
                                    <li class="side-wrap nav-toggler">
                                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                            data-target="#navbarContent">
                                            <span class="line"></span>
                                        </button>
                                    </li> 
                                    <li class="side-wrap cart-wrap"> 
                                        <div id='login-avathor' class="shopping-widget avathor">
                                            <div class="shopping-cart">
                                                <a id="login-profile" class="cart-count c-pointer">
                                                    <span class="cart-icon-wrap">
                                                        <span class="cart-icon"><span><i class="icon-user"></i></span></span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <div id='user-avathor' class="dropdown avathor" style="display:none;">
                                            <a class="dropdown-toggle 5dropdown-font-size" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                                                <img src="<?= base_url();?>assets/img/proffessor.jpg"  alt="img" class="img-fluid rounded-circle"  width="40px" height="40px">
                                            </a> 
                                            <ul class="dropdown-menu 5dropdown-font-size">
                                                <li><a class="dropdown-item c-pointer" href="<?= base_url('profile') ?>">Profile</a></li>
                                                <li><a class="dropdown-item c-pointer" href="<?= base_url('my-booking') ?>">My Bookings</a></li>
                                                <li><a class="dropdown-item logoutUser c-pointer">Logout</a></li>
                                            </ul>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                            <!-- header icon end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
</section>
<!-- header area end -->
<!-- mobile menu start -->
<div class="header-bottom-area">
    <div class="main-menu-area">
        <div class="main-navigation navbar-expand-xl">
            <div class="box-header menu-close">
                <button class="close-box" type="button"><i class="ion-close-round"></i></button>
            </div>
            <div class="navbar-collapse" id="navbarContent">
                <!-- main-menu start -->
                <div class="megamenu-content">
                    <div class="mainwrap">
                        <ul class="main-menu">
                            <li class="menu-link">
                                <a href="<?= base_url() ?>" class="link-title">
                                    <span class="sp-link-title">Home</span>
                                </a>
                            </li>
                                <li class="menu-link">
                                    <a href="<?= base_url('consultation') ?>" class="link-title">
                                        <span class="sp-link-title">Consultation</span>
                                    </a>
                                </li>
                                <li class="menu-link">
                                    <a href="<?= base_url('chatwithdoctor') ?>" class="link-title">
                                        <span class="sp-link-title">Chat with Doctor</span>
                                    </a>
                                </li>
                            <!-- <li class="menu-link">
                                <a href="javascript:void(0)" class="link-title">
                                    <span class="sp-link-title">Our Stores</span>
                                </a>
                            </li> -->
                            <!-- <li class="menu-link">
                                <a href="javascript:void(0)" class="link-title">
                                    <span class="sp-link-title">Happy Pets</span>
                                </a>
                            </li>  -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mobile menu end -->

<!-- mini cart start -->
<!-- <div class="mini-cart">
    <a href="javascript:void(0)" class="shopping-cart-close"><i class="ion-close-round"></i></a>
    <div class="cart-item-title">
        <p>
            <span class="cart-count-desc">There are</span>
            <span class="cart-count-item bigcounter">4</span>
            <span class="cart-count-desc">Products</span>
        </p>
    </div>
    <ul class="cart-item-loop">
        <li class="cart-item">
            <div class="cart-img">
                <a href="#">
                    <img src="<?= base_url();?>assets/image/cart-img.jpg" alt="cart-image" class="img-fluid">
                </a>
            </div>
            <div class="cart-title">
                <h6><a href="#">Fresh apple 5kg</a></h6>
                <div class="cart-pro-info">
                    <div class="cart-qty-price">
                        <span class="quantity">1 x </span>
                        <span class="price-box">$250.00 USD</span>
                    </div>
                    <div class="delete-item-cart">
                        <a href="empty-cart.html"><i class="icon-trash icons"></i></a>
                    </div>
                </div>
            </div>
        </li>
        <li class="cart-item">
            <div class="cart-img">
                <a href="#">
                    <img src="<?= base_url();?>assets/image/cart-img02.jpg" alt="cart-image" class="img-fluid">
                </a>
            </div>
            <div class="cart-title">
                <h6><a href="#">Natural grassbean 4kg</a></h6>
                <div class="cart-pro-info">
                    <div class="cart-qty-price">
                        <span class="quantity">1 x </span>
                        <span class="price-box">$300.00 USD</span>
                    </div>
                    <div class="delete-item-cart">
                        <a href="empty-cart.html"><i class="icon-trash icons"></i></a>
                    </div>
                </div>
            </div>
        </li>
        <li class="cart-item">
            <div class="cart-img">
                <a href="#">
                    <img src="<?= base_url();?>assets/image/cart-img03.jpg" alt="cart-image" class="img-fluid">
                </a>
            </div>
            <div class="cart-title">
                <h6><a href="#">Organic coconut juice 5ltr</a></h6>
                <div class="cart-pro-info">
                    <div class="cart-qty-price">
                        <span class="quantity">1 x </span>
                        <span class="price-box">$250.00 USD</span>
                    </div>
                    <div class="delete-item-cart">
                        <a href="empty-cart.html"><i class="icon-trash icons"></i></a>
                    </div>
                </div>
            </div>
        </li>
        <li class="cart-item">
            <div class="cart-img">
                <a href="#">
                    <img src="<?= base_url();?>assets/image/cart-img04.jpg" alt="cart-image" class="img-fluid">
                </a>
            </div>
            <div class="cart-title">
                <h6><a href="#">Orange juice 5ltr</a></h6>
                <div class="cart-pro-info">
                    <div class="cart-qty-price">
                        <span class="quantity">1 x </span>
                        <span class="price-box">$350.00 USD</span>
                    </div>
                    <div class="delete-item-cart">
                        <a href="empty-cart.html"><i class="icon-trash icons"></i></a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <ul class="subtotal-title-area">
        <li class="subtotal-info">
            <div class="subtotal-titles">
                <h6>Sub total:</h6>
                <span class="subtotal-price">$750.00 USD</span>
            </div>
        </li>
        <li class="mini-cart-btns">
            <div class="cart-btns">
                <a href="cart-2.html" class="btn btn-style1">View cart</a>
                <a href="checkout-2.html" class="btn btn-style1">Checkout</a>
            </div>
        </li>
    </ul>
</div> -->
<!-- mini cart end -->

<!-- search start -->
<div class="search-model">
    <div class="modal fade" id="search-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="search-content">
                                    <div class="search-engine">
                                        <input type="text" name="search" placeholder="Search Product.">
                                        <a href="search.html" class="search-btn"><i
                                                class="ion-ios-search-strong"></i></a>
                                    </div>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i
                                            class="ion-close-round"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- search start -->