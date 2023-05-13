<?php
include('main.php');
include('header.php');

$fee = new ManageFees();

echo'
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

        <!-- Start Page Title Area -->
        <section class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h1>با ما تماس بگیرید</h1>
                    <ul>
                        <li><a href="#">خانه</a></li>
                        <li>با ما تماس بگیرید</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title Area -->

        <!-- Start Contact Area -->
        <section class="contact-info-area pt-70 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="single-contact-info-box">
                            <div class="icon">
                                <i class="flaticon-placeholder"></i>
                            </div>
                            <h3>نشانی</h3>
                            <p><a href="#" target="_blank">تهران نواب ، مرکز خرید و فروش تجهیزات دندانپزشکی کشور افرا واحد 601</a></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="single-contact-info-box">
                            <div class="icon">
                                <i class="flaticon-phone-ringing"></i>
                            </div>
                            <h3>تلفن</h3>
                            <p><a href="tel:02155436424">خط تلفن: 55436424 021 </a></p>
                            <p><a href="tel:09224645525">پشتیبانی : 09125245542 09224645525</a></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="single-contact-info-box">
                            <div class="icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <h3>پست الکترونیک</h3>
                            <p><a href="mailto:hello@drodo.com">info@dentcenter.ir</a></p>
                           
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="single-contact-info-box">
                            <div class="icon">
                                <i class="flaticon-clock"></i>
                            </div>
                            <h3>ساعات کاری</h3>
                            <p>شنبه - چهارشنبه</p>
                            <p>8:00 صبح - 19:00 ظهر</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="contact-area pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="contact-form">
                            <span class="sub-title">در تماس باشید</span>
                            <h2>ما می خواهیم یک تجربه عالی را برای شما فراهم کنیم</h2>
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>نام و نام خانوادگی</label>
                                            <input type="text" name="name" class="form-control" id="name" required="" data-error="لطفا نام خود را وارد کنید">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>آدرس ایمیل</label>
                                            <input type="email" name="email" class="form-control" id="email" required="" data-error="لطفا ایمیل خود را وارد کن">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>موبایل</label>
                                            <input type="text" name="phone_number" class="form-control" id="phone_number" required="" data-error="لطفا شماره تلفن خود را وارد کنید">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>موضوع</label>
                                            <input type="text" name="subject" class="form-control" id="subject">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>پیام</label>
                                            <textarea name="message" disabled="disabled" id="message" class="form-control" cols="30" rows="6" required="" data-error="لطفا پیام خود را وارد کنید"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="default-btn pb-3">پیام فرستادن</button>
                                        <div id="msgSubmit" class="h3 text-center hidden mt-3"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-12">
                        <div class="contact-image text-center">
                            <img src="assets/img/contact.png" alt="تصویر">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="maps">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1620.4357222119952!2d51.37959407121683!3d35.68016729305193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e0050c2bb631b%3A0x95d2f1821c5a99fd!2sTehran%20Province%2C%20Tehran%2C%20Navvab%20Expy%2C%20Iran!5e0!3m2!1sen!2s!4v1683554824334!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        </div>
        
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

        <!-- End Contact Area -->
';
include('footer.php');
?>


