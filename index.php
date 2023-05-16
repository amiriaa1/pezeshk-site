<?php
include('main.php');
include('header.php');

$fee = new ManageFees();

echo'

        <!-- Start Home Slides Area -->
        <section class="home-slides owl-carousel owl-theme">
        
           ';
$id='';
$Getproducttype2 = $fee->Getproductlistbestsell2($id);
foreach($Getproducttype2 as $Getproducttype2Prop) {
    $imp=explode(",",$Getproducttype2Prop['image']);
    echo '
        


            <div class="single-banner-item">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="row align-items-center">
                    
                                <div class="col-lg-7 col-md-12">
                                    <div class="banner-image text-center">
        <img src="https://panel.dentcenter.ir/public/images/product/'.$imp["0"].'" alt="تصویر">

                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <div class="banner-content">
                                        <span class="sub-title">تازه رسیده ها</span>
                                        <h3><span>'.$Getproducttype2Prop['name'].'</span></h3>
                                    
                                        <div class="btn-box">
                                            <div class="d-flex align-items-center float-left">
                                                <span class="price">'.$Getproducttype2Prop['price'].' تومان</span>
                                              
                                                <a href="product?id='.$Getproducttype2Prop['id'].'" class="default-btn"><i class="flaticon-trolley"></i>مشاهده محصول </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
}
echo'

</section>
        <!-- End Home Slides Area -->
        
        <!-- Start Banner Categories Area -->
        <section class="banner-categories-area pt-70 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner-categories-box">
                            <img src="assets/img/banner-categories/banner-categories-img1.jpg" alt="تصویر">

                            <div class="content">
                                <span class="sub-title">محصولات ویژه بزودی...</span>
                                <h3><a href="#">محصولات ویژه بزودی...</a></h3>
                                <div class="btn-box">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="default-btn"><i class="flaticon-trolley"></i>بزودی </a>
                                        <span class="price">0 تومان</span><span class="price"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner-categories-box">
                            <img src="assets/img/banner-categories/banner-categories-img2.jpg" alt="تصویر">

                            <div class="content">
                                <span class="sub-title">محصولات ویژه بزودی...</span>
                                <h3><a href="#">محصولات ویژه بزودی...</a></h3>
                                <div class="btn-box">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="default-btn"><i class="flaticon-trolley"></i>بزودی </a>
                                        <span class="price">0 تومان</span><span class="price"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Categories Area -->

  
        <!-- Start Products Area -->
        <section class="products-area pb-40">
            <div class="container">
                <div class="section-title">
                    <h2>بهترین فروش</h2>
                </div>

                <div class="products-slides owl-carousel owl-theme">
                
                
                ';
$id='';
$Getproducttype = $fee->Getproductlistbestsell($id);
foreach($Getproducttype as $GetproducttypeProp) {
    $imp=explode(",",$GetproducttypeProp['image']);
    echo '
                    <div class="single-products-box">
                        <div class="image">
                                        <a href="product?id='.$GetproducttypeProp['id'].'" class="d-block"><img src="https://panel.dentcenter.ir/public/images/product/'.$imp["0"].'" alt="تصویر"></a>

                            <div class="new">جدید</div>

                            <div class="buttons-list">
                                <ul>
                                 
                                  
                                    <li>
                                        <div class="quick-view-btn">
                                           <a href="product?id='.$GetproducttypeProp['id'].'" data-bs-toggle="modal" data-bs-target="#productsQuickView">
                                                <i class="bx bx-search-alt"></i>
                                                <span class="tooltip-label">مشاهده سریع</span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="content">
                        <h3><a href="product?id='.$GetproducttypeProp['id'].'">'.$GetproducttypeProp['name'].'</a></h3>
                            <div class="price">
                                 ';

    if($GetproducttypeProp['price']=="0")
    {echo' <span class="new-price">تماس بگیرید </span>';}
    else
    { echo' <span class="new-price">'.$GetproducttypeProp['price'].'</span> تومان';}
    echo'
                                           
                            </div>
                        </div>
                    </div>

';
}

echo'

                </div>
            </div>
        </section>
        <!-- End Products Area -->

        <!-- Start Products Promotions Area -->
        <section class="products-promotions-area pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-products-promotions-box">
                            <img src="assets/img/promotions/promotions-img1.jpg" alt="تصویر">

                            <div class="content">
                                <span class="sub-title">معامله ویژه</span>
                                <h3>سیب نمک مگا</h3>
                                <span class="discount"><span>تا</span> 70٪ تخفیف </span>
                                <a href="" class="link-btn">اکنون خرید کنید<i class="flaticon-left-chevron"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-products-promotions-box">
                            <img src="assets/img/promotions/promotions-img2.jpg" alt="تصویر">

                            <div class="content">
                                <span class="sub-title">تازه رسیده ها</span>
                                <h3>ضدعفونی‌کننده</h3>
                                <span class="discount"><span>تا</span> 49000 تومان</span>
                                <a href="" class="link-btn">اکنون خرید کنید<i class="flaticon-left-chevron"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                        <div class="single-products-promotions-box">
                            <img src="assets/img/promotions/promotions-img3.jpg" alt="تصویر">

                            <div class="content">
                                <span class="sub-title">مجموعه داغ</span>
                                <h3>دما سنج</h3>
                                <span class="discount"><span>تا</span> 20٪ تخفیف </span>
                                <a href="" class="link-btn">اکنون خرید کنید<i class="flaticon-left-chevron"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Products Promotions Area -->

    
        <!-- Start Hot Deal Area -->
        <section class="hot-deal-area ptb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="hot-deal-content">
                            <span class="sub-title">معامله ماه</span>
                            <h2>تا <span>80٪</span> تخفیف تمام فروش ها نهایی هستند!</h2>
                            <div id="timer" class="flex-wrap d-flex justify-content-center">
                                <div id="days" class="align-items-center flex-column d-flex justify-content-center"></div>
                                <div id="hours" class="align-items-center flex-column d-flex justify-content-center"></div>
                                <div id="minutes" class="align-items-center flex-column d-flex justify-content-center"></div>
                                <div id="seconds" class="align-items-center flex-column d-flex justify-content-center"></div>
                            </div>
                            <a href="#" class="default-btn"><i class="flaticon-trolley"></i> اکنون خرید کنید</a>
                            <div class="back-text">1402</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Hot Deal Area -->

        <!-- Start Brands Area -->
        <section class="brands-area pt-70 pb-40">
            <div class="container">
                <div class="section-title">
                    <h2>فروش مارک ها</h2>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-2 col-sm-4 col-md-2 col-6">
                        <div class="single-brands-item">
                            <a href="#" class="d-block"><img src="assets/img/brands/brands-img1.png" alt="تصویر"></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-4 col-md-2 col-6">
                        <div class="single-brands-item">
                            <a href="#" class="d-block"><img src="assets/img/brands/brands-img2.png" alt="تصویر"></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-4 col-md-2 col-6">
                        <div class="single-brands-item">
                            <a href="#" class="d-block"><img src="assets/img/brands/brands-img3.png" alt="تصویر"></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-4 col-md-2 col-6">
                        <div class="single-brands-item">
                            <a href="#" class="d-block"><img src="assets/img/brands/brands-img4.png" alt="تصویر"></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-4 col-md-2 col-6">
                        <div class="single-brands-item">
                            <a href="#" class="d-block"><img src="assets/img/brands/brands-img5.png" alt="تصویر"></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-4 col-md-2 col-6">
                        <div class="single-brands-item">
                            <a href="#" class="d-block"><img src="assets/img/brands/brands-img6.png" alt="تصویر"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Brands Area -->

        <!-- Start Blog Area -->
        <section class="blog-area pb-40">
            <div class="container">
                <div class="section-title">
                    <h2>وبلاگ ما</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-post">
                            <div class="post-image">
                                <a href="single-blog-1" class="d-block"><img src="assets/img/blog/blog-img1.jpg" alt="تصویر"></a>
                            </div>

                            <div class="post-content">
                                <h3><a href="single-blog-1">یک محقق در حال انجام تحقیقات در مورد ویروس کرونا در آزمایشگاه است</a></h3>
                                <ul class="post-meta align-items-center d-flex">
                                    <li>
                                        <div class="flex align-items-center">
                                            <img src="assets/img/user1.jpg" alt="تصویر">
                                            <a href="#">حمید رجب</a>
                                        </div>
                                    </li>
                                    <li>1399-10-8</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-post">
                            <div class="post-image">
                                <a href="single-blog-1" class="d-block"><img src="assets/img/blog/blog-img2.jpg" alt="تصویر"></a>
                            </div>

                            <div class="post-content">
                                <h3><a href="single-blog-1">شما باید 20 ثانیه دستان خود را بشویید تا خود را آزاد کنید</a></h3>
                                <ul class="post-meta align-items-center d-flex">
                                    <li>
                                        <div class="flex align-items-center">
                                            <img src="assets/img/user2.jpg" alt="تصویر">
                                            <a href="#">پگاه وطنی</a>
                                        </div>
                                    </li>
                                    <li>1399-8-8</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                        <div class="single-blog-post">
                            <div class="post-image">
                                <a href="single-blog-1" class="d-block"><img src="assets/img/blog/blog-img3.jpg" alt="تصویر"></a>
                            </div>

                            <div class="post-content">
                                <h3><a href="single-blog-1">برای رهایی از خود پوشیدن لباس مناسب بسیار مهم است</a></h3>
                                <ul class="post-meta align-items-center d-flex">
                                    <li>
                                        <div class="flex align-items-center">
                                            <img src="assets/img/user3.jpg" alt="تصویر">
                                            <a href="#">رضا محمودی</a>
                                        </div>
                                    </li>
                                    <li>1399-8-16</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Area -->

';
include('footer.php');

echo'
       
        <!-- Links of JS files -->
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