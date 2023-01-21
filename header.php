<?php
include('main.php');


if($uactive!=='1' && $isLogedIn){
	
	header("Location: verification");
}



echo' 



<!doctype html>
<html lang="zxx">
    
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Links of CSS files -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/boxicons.min.css">
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="assets/css/nice-select.min.css">
        <link rel="stylesheet" href="assets/css/fancybox.min.css">
        <link rel="stylesheet" href="assets/css/rangeSlider.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">

        <title>'.$system_title.'</title>

        <link rel="icon" type="image/png" href="assets/img/favicon.png">
    </head>
 
    <body>

        <!-- Start Top Header Area -->
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-7">
                        <ul class="top-header-contact-info">
                            <li><i class="bx bx-phone-call"></i> <a href="tel:+1234567898">456-7898322</a></li>
                            <li><i class="bx bx-map"></i> <a href="#" target="_blank">ایران - تهران</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-6 col-md-5">
                        <ul class="top-header-menu">
                            <li>
                                <div class="dropdown language-switcher d-inline-block">
                                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="assets/img/flag/ir-flag.png" class="shadow-sm" alt="تصویر">
                                        <span>فارسی </i></span>
                                    </button>

                                  
                                </div>
                            </li>

                            <li>
                                <div class="dropdown currency-switcher d-inline-block">
                                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span>تومان ایران </span>
                                    </button>

                                    
                                </div>
                            </li>

                            <li><a href="profile-authentication">حساب من</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Header Area -->

        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <div class="drodo-responsive-nav">
                <div class="container">
                    <div class="drodo-responsive-menu">
                        <div class="logo">
                            <a href="index">
                                <img src="assets/img/logo.png" width="80" height="80" alt="لوگو">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="drodo-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="index">
                            <img src="assets/img/logo.png" width="80" height="80" alt="لوگو">
                        </a>

                        <div class="collapse navbar-collapse mean-menu">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a href="#" class="nav-link active">خانه </a>
                                    
                                </li>

                                <li class="nav-item megamenu"><a href="#" class="nav-link">محصولات <i class="bx bx-chevron-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <h6 class="submenu-title">دسته اول</h6>

                                                        <ul class="megamenu-submenu">
                                                            <li><a href="#">لوازم بهداشتی</a></li>

                                                          
                                                        </ul>
                                                    </div>

                                                    <div class="col">
                                                        <h6 class="submenu-title">دسته دوم</h6>

                                                        <ul class="megamenu-submenu">
                                                            <li><a href="products-left-sidebar">ماسک سه لایه</a></li>

                                                            
                                                        </ul>
                                                    </div>

                                                    
                                                    <div class="col">
                                                        <h6 class="submenu-title">دسته سوم</h6>

                                                        <ul class="megamenu-submenu">
                                                            <li><a href="single-products-1">واکسن سینوفارم</a></li>

                                                       
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                
                                <li class="nav-item"><a href="#" class="nav-link">وبلاگ </a>
                                   
                                </li>

                                <li class="nav-item"><a href="contact" class="nav-link">تماس با ما</a></li>
                            </ul>

                            <div class="others-option">
                                <div class="option-item">
                                    <div class="wishlist-btn">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#shoppingWishlistModal"><i class="bx bx-heart"></i></a>
                                    </div>
                                </div>

                                <div class="option-item">
                                    <div class="cart-btn">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#shoppingCartModal"><i class="bx bx-shopping-bag"></i><span>3</span></a>
                                    </div>
                                </div>

                                <div class="option-item">
                                    <div class="search-btn-box">
                                        <i class="search-btn bx bx-search-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->
        
        <!-- Start Search Overlay -->
        <div class="search-overlay">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="search-overlay-layer"></div>
                    <div class="search-overlay-layer"></div>
                    <div class="search-overlay-layer"></div>
                    
                    <div class="search-overlay-close">
                        <span class="search-overlay-close-line"></span>
                        <span class="search-overlay-close-line"></span>
                    </div>

                    <div class="search-overlay-form">
                        <form>
                            <input type="text" class="input-search" placeholder="اینجا را جستجو کنید ...">
                            <button type="submit"><i class="bx bx-search-alt"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Search Overlay -->

<script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/magnific-popup.min.js"></script>
        <script src="assets/js/fancybox.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/owl.carousel2.thumbs.min.js"></script>
        <script src="assets/js/meanmenu.min.js"></script>
        <script src="assets/js/nice-select.min.js"></script>
        <script src="assets/js/rangeSlider.min.js"></script>
        <script src="assets/js/sticky-sidebar.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/form-validator.min.js"></script>
        <script src="assets/js/contact-form-script.js"></script>
        <script src="assets/js/ajaxchimp.min.js"></script>
        <script src="assets/js/main.js"></script>
';          
?>
	