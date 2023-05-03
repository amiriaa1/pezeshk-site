<?php
include('main.php');
include('header.php');

$fee = new ManageFees();
$id=$_GET["id"];

$Getproducttype = $fee->Getproductfromid($id);
$imp=explode(",",$Getproducttype["0"]['image']);
echo'
   <!-- Start Page Title Area -->
        <section class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h1>جزئیات محصولات</h1>
                    <ul>
                        <li><a href="#">خانه</a></li>
                        <li>جزئیات محصولات</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title Area -->

        <!-- Start Product Details Area -->
        <section class="product-details-area pt-70 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div class="products-details-image">
                            <ul class="products-details-image-slides owl-theme owl-carousel" data-slider-id="1">
                                <li><img src="https://panel.dentcenter.ir/public/images/product/'.$imp["0"].'" alt="تصویر"></li>
                        
                            </ul>

                            <!-- Carousel Thumbs -->
                            <div class="owl-thumbs products-details-image-slides-owl-thumbs" data-slider-id="1">
                                <div class="owl-thumb-item">
                                ';
if($imp["1"]==""){}
else{
    echo'<img src="https://panel.dentcenter.ir/public/images/product/'.$imp["1"].'" alt="تصویر">';
}
echo'
                                    
                                </div>

                                <div class="owl-thumb-item">
                                                               ';
if($imp["2"]==""){}
else{
    echo'<img src="https://panel.dentcenter.ir/public/images/product/'.$imp["2"].'" alt="تصویر">';
}
echo'
                                </div>

                                <div class="owl-thumb-item">
                                                                   ';
if($imp["3"]==""){}
else{
    echo'<img src="https://panel.dentcenter.ir/public/images/product/'.$imp["3"].'" alt="تصویر">';
}
echo'
                                </div>

                                <div class="owl-thumb-item">
                                                                   ';
if($imp["4"]==""){}
else{
    echo'<img src="https://panel.dentcenter.ir/public/images/product/'.$imp["4"].'" alt="تصویر">';
}
echo'
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-12">
                        <div class="products-details-desc">
                            <h3>'.$Getproducttype["0"]["name"].'</h3>

                            <div class="price">
                              ';

if($Getproducttype["0"]['price']=="0")
{echo' <span class="new-price">قیمت : تماس بگیرید </span>';}
else
{ echo' <span class="new-price">'.$Getproducttype["0"]['price'].'</span> تومان';}
echo'
                                           
                               
                               
                            </div>

                     

                            <ul class="products-info">
                            ';
$Getproducttype222 = $fee->Getproductmojodi($id);
if($Getproducttype222["0"]["qty"]==NULL OR $Getproducttype222["0"]["qty"]=="0"){

    echo'  <li><span>موجودی: </span> نا موجود</li>';
}
else{
    echo'  <li><span>موجودی: </span> <a href="#">موجود است ('.$Getproducttype222["0"]["qty"].' مورد)</a></li>';

}
echo'
                              

                            </ul>

                    
                            <div class="products-add-to-cart">
                                <div class="input-counter">
                                    <span class="minus-btn"><i class="bx bx-minus"></i></span>
                                    <input type="text" value="1" min="1">
                                    <span class="plus-btn"><i class="bx bx-plus"></i></span>
                                </div>

                            </div>

                            <div class="wishlist-btn">
                                <a href="#"><i class="bx bx-heart"></i> افزودن به لیست علاقه مندی ها</a>
                            </div>

                            <div class="buy-checkbox-btn">
                             

                                <div class="item">
                                    <a href="#" class="default-btn">خرید کنید</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="products-details-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description">توضیحات</a></li>
                                <li class="nav-item"><a class="nav-link" id="shipping-tab" data-bs-toggle="tab" href="#shipping" role="tab" aria-controls="shipping">حمل نقل</a></li>
                            </ul>
        
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel">
                                   '.$Getproducttype["0"]["product_details"].'
                                </div>
        
                                <div class="tab-pane fade" id="shipping" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>حمل نقل</td>
                                                    <td>پشنهاد ویژه ارسال رایگان به  تهران</td>
                                                </tr>
    
                                                <tr>
                                                    <td>تحویل</td>
                                                    <td>
                                         یک روز کاری
                                                     
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
        
            


        <!-- Start QuickView Modal Area -->
        <div class="modal fade productsQuickView" id="productsQuickView" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="نزدیک">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>

                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="products-image">
                                <img src="assets/img/products/products-img1.jpg" alt="تصویر">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="products-content">
                                <h3><a href="#">ماسک صورت </a></h3>

                                <div class="price">
                                    <span class="old-price">45000 تومان</span>
                                    <span class="new-price">35000 تومان</span>
                                </div>

                                <div class="products-review">
                                    <div class="rating">
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                        <i class="bx bxs-star"></i>
                                    </div>
                                    <a href="#" class="rating-count">3 بررسی</a>
                                </div>

                                <ul class="products-info">
                                    <li><span>فروشنده: </span> <a href="#">لرو</a></li>
                                    <li><span>موجودی: </span> <a href="#">موجود است (7 مورد)</a></li>
                                    <li><span>نوع محصولات: </span> <a href="#">ماسک</a></li>
                                </ul>

                                <div class="products-color-switch">
                                    <h4>رنگ:</h4>

                                    <ul>
                                        <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="سیاه" class="color-black"></a></li>
                                        <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="سفید" class="color-white"></a></li>
                                        <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="سبز" class="color-green"></a></li>
                                        <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="سبز زرد" class="color-yellowgreen"></a></li>
                                        <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="چاله" class="color-teal"></a></li>
                                    </ul>
                                </div>

                                <div class="products-size-wrapper">
                                    <h4>اندازه:</h4>

                                    <ul>
                                        <li><a href="#">کوچک</a></li>
                                        <li class="active"><a href="#">متوسط</a></li>
                                        <li><a href="#">بزرگ</a></li>
                                        <li><a href="#">خیلی بزرگ</a></li>
                                    </ul>
                                </div>

                                <div class="products-add-to-cart">
                                    <div class="input-counter">
                                        <span class="minus-btn"><i class="bx bx-minus"></i></span>
                                        <input type="text" min="1" value="1">
                                        <span class="plus-btn"><i class="bx bx-plus"></i></span>
                                    </div>

                                    <button type="submit" class="default-btn"><i class="flaticon-trolley"></i> افزودن به سبد خرید</button>
                                </div>

                                <a href="#" class="view-full-info">یا مشاهده اطلاعات کامل</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End QuickView Modal Area -->

        <!-- Start Shopping Cart Modal -->
        <div class="modal right fade shoppingCartModal" id="shoppingCartModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="نزدیک">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>

                    <div class="modal-body">
                        <h3>سبد خرید من (3)</h3>

                        <div class="products-cart-content">
                            <div class="products-cart d-flex align-items-center">
                                <div class="products-image">
                                    <a href="#"><img src="assets/img/products/products-img1.jpg" alt="تصویر"></a>
                                </div>

                                <div class="products-content">
                                    <h3><a href="#">ماسک صورت </a></h3>
                                    <div class="products-price">
                                        <span>1 </span>
                                        <span>X </span>
                                        <span class="price">39000 تومان</span>
                                    </div>
                                </div>
                                <a href="#" class="remove-btn"><i class="bx bx-trash"></i></a>
                            </div>

                            <div class="products-cart d-flex align-items-center">
                                <div class="products-image">
                                    <a href="#"><img src="assets/img/products/products-img2.jpg" alt="تصویر"></a>
                                </div>

                                <div class="products-content">
                                    <h3><a href="#">دستکش محافظ</a></h3>
                                    <div class="products-price">
                                        <span>1 </span>
                                        <span>X </span>
                                        <span class="price">99000 تومان</span>
                                    </div>
                                </div>
                                <a href="#" class="remove-btn"><i class="bx bx-trash"></i></a>
                            </div>

                            <div class="products-cart d-flex align-items-center">
                                <div class="products-image">
                                    <a href="#"><img src="assets/img/products/products-img3.jpg" alt="تصویر"></a>
                                </div>

                                <div class="products-content">
                                    <h3><a href="#">اسلحه دماسنج مادون قرمز</a></h3>
                                    <div class="products-price">
                                        <span>1 </span>
                                        <span>X </span>
                                        <span class="price">99000 تومان</span>
                                    </div>
                                </div>
                                <a href="#" class="remove-btn"><i class="bx bx-trash"></i></a>
                            </div>
                        </div>

                        <div class="products-cart-subtotal">
                            <span>جمع </span>

                            <span class="subtotal">228000 تومان</span>
                        </div>

                        <div class="products-cart-btn">
                            <a href="#" class="default-btn">ادامه به پرداخت</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Shopping Cart Modal -->

        <!-- Start Shopping Cart Modal -->
        <div class="modal right fade shoppingWishlistModal" id="shoppingWishlistModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="نزدیک">
                        <span aria-hidden="true"><i class="bx bx-x"></i></span>
                    </button>

                    <div class="modal-body">
                        <h3>لیست خواسته های من (3)</h3>

                        <div class="products-cart-content">
                            <div class="products-cart d-flex align-items-center">
                                <div class="products-image">
                                    <a href="#"><img src="assets/img/products/products-img1.jpg" alt="تصویر"></a>
                                </div>

                                <div class="products-content">
                                    <h3><a href="#">ماسک صورت </a></h3>
                                    <div class="products-price">
                                        <span>1 </span>
                                        <span>X </span>
                                        <span class="price">39000 تومان</span>
                                    </div>
                                </div>
                                <a href="#" class="remove-btn"><i class="bx bx-trash"></i></a>
                            </div>

                            <div class="products-cart d-flex align-items-center">
                                <div class="products-image">
                                    <a href="#"><img src="assets/img/products/products-img2.jpg" alt="تصویر"></a>
                                </div>

                                <div class="products-content">
                                    <h3><a href="#">دستکش محافظ</a></h3>
                                    <div class="products-price">
                                        <span>1 </span>
                                        <span>X </span>
                                        <span class="price">99000 تومان</span>
                                    </div>
                                </div>
                                <a href="#" class="remove-btn"><i class="bx bx-trash"></i></a>
                            </div>

                            <div class="products-cart d-flex align-items-center">
                                <div class="products-image">
                                    <a href="#"><img src="assets/img/products/products-img3.jpg" alt="تصویر"></a>
                                </div>

                                <div class="products-content">
                                    <h3><a href="#">اسلحه دماسنج مادون قرمز</a></h3>
                                    <div class="products-price">
                                        <span>1 </span>
                                        <span>X </span>
                                        <span class="price">99000 تومان</span>
                                    </div>
                                </div>
                                <a href="#" class="remove-btn"><i class="bx bx-trash"></i></a>
                            </div>
                        </div>

                        <div class="products-cart-subtotal">
                            <span>جمع </span>

                            <span class="subtotal">228000 تومان</span>
                        </div>

                        <div class="products-cart-btn">
                            <a href="#" class="default-btn">مشاهده سبد خرید</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Shopping Cart Modal -->

        <!-- Start Products Filter Modal Area -->
        <div class="modal left fade productsFilterModal" id="productsFilterModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="نزدیک">
                        <span aria-hidden="true"><i class="bx bx-x"></i> نزدیک</span>
                    </button>

                    <div class="modal-body">
                        <div class="woocommerce-widget-area">
                            <div class="woocommerce-widget price-list-widget">
                                <h3 class="woocommerce-widget-title">فیلتر با قیمت</h3>

                                <div class="collection-filter-by-price">
                                    <input class="js-range-of-price" type="text" data-min="0" data-max="1055" name="filter_by_price" data-step="10">
                                </div>
                            </div>

                            <div class="woocommerce-widget color-list-widget">
                                <h3 class="woocommerce-widget-title">رنگ</h3>

                                <ul class="color-list-row">
                                    <li class="active"><a href="#" title="سیاه" class="color-black"></a></li>
                                    <li><a href="#" title="قرمز" class="color-red"></a></li>
                                    <li><a href="#" title="زرد" class="color-yellow"></a></li>
                                    <li><a href="#" title="سفید" class="color-white"></a></li>
                                    <li><a href="#" title="آبی" class="color-blue"></a></li>
                                    <li><a href="#" title="سبز" class="color-green"></a></li>
                                    <li><a href="#" title="سبز زرد" class="color-yellowgreen"></a></li>
                                    <li><a href="#" title="رنگ صورتی" class="color-pink"></a></li>
                                    <li><a href="#" title="بنفشه" class="color-violet"></a></li>
                                    <li><a href="#" title="بنفش آبی" class="color-blueviolet"></a></li>
                                    <li><a href="#" title="اهک" class="color-lime"></a></li>
                                    <li><a href="#" title="آلو" class="color-plum"></a></li>
                                    <li><a href="#" title="چاله" class="color-teal"></a></li>
                                </ul>
                            </div>

                            <div class="woocommerce-widget brands-list-widget">
                                <h3 class="woocommerce-widget-title">مارک های تجاری</h3>

                                <ul class="brands-list-row">
                                    <li><a href="#">گوچی</a></li>
                                    <li><a href="#">ویرجیل ابلوح</a></li>
                                    <li><a href="#">بالنسیاگا</a></li>
                                    <li class="active"><a href="#">مونکلر</a></li>
                                    <li><a href="#">فندی</a></li>
                                    <li><a href="#">ورساچه</a></li>
                                </ul>
                            </div>

                            <div class="woocommerce-widget woocommerce-ads-widget">
                                <img src="assets/img/ads.jpg" alt="تصویر">

                                <div class="content">
                                    <span>تازه رسیده ها</span>
                                    <h3>دماسنج الکترونیکی مدرن</h3>
                                    <a href="#" class="default-btn"><i class="flaticon-trolley"></i> اکنون خرید کنید</a>
                                </div>

                                
                            </div>

                            <div class="woocommerce-widget best-seller-widget">
                                <h3 class="woocommerce-widget-title">کتاب پرفروش</h3>

                                <article class="item">
                                    <a href="#" class="thumb">
                                        <span class="fullimage cover bg1" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <h4 class="title usmall"><a href="#">اسلحه دماسنج</a></h4>
                                        <span>65000 تومان</span>
                                        <div class="rating">
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </article>

                                <article class="item">
                                    <a href="#" class="thumb">
                                        <span class="fullimage cover bg2" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <h4 class="title usmall"><a href="#">دستکش محافظ</a></h4>
                                        <span>65000 تومان</span>
                                        <div class="rating">
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star-half"></i>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </article>

                                <article class="item">
                                    <a href="#" class="thumb">
                                        <span class="fullimage cover bg3" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <h4 class="title usmall"><a href="#">ظرف آرایشی و بهداشتی</a></h4>
                                        <span>139000 تومان</span>
                                        <div class="rating">
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bx-star"></i>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Products Filter Modal Area -->

        <div class="go-top"><i class="bx bx-up-arrow-alt"></i></div>

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
include('footer.php');



?>



