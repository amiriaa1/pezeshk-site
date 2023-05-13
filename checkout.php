<?php
include('main.php');
include('header.php');

$fee = new ManageFees();

echo'


<!-- Start Checkout Area -->
		<section class="checkout-area ptb-70">
            <div class="container">
                <div class="user-actions">
                    <i class="bx bx-log-in"></i>
                    <span>حساب ندارید؟ <a href="profile-authentication.html">برای ورود اینجا کلیک کنید</a></span>
                </div>

                <form>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="billing-details">
                                <h3 class="title">جزئیات صورتحساب</h3>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
										    <label>کشور <span class="required">*</span></label>
										
                                            <div class="select-box">
                                                <select>
                                                    <option>امارات متحده عربی</option>
                                                    <option>چین</option>
                                                    <option>انگلستان</option>
                                                    <option>آلمان</option>
                                                    <option>فرانسه</option>
                                                    <option>ژاپن</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>نام <span class="required">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>نام خانوادگی <span class="required">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>نام شرکت</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label>آدرس <span class="required">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label>شهر <span class="required">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>  شهرستان <span class="required">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label> کدپستی<span class="required">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>آدرس ایمیل <span class="required">*</span></label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>تلفن <span class="required">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="create-an-account">
                                            <label class="form-check-label" for="create-an-account">حساب ایجاد می کنید؟</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="ship-different-address">
                                            <label class="form-check-label" for="ship-different-address">به آدرس دیگری ارسال شود؟</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="notes" id="notes" cols="30" rows="5" placeholder="یادداشت های سفارش" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="order-details">
                                <h3 class="title">سفارش شما</h3>

                                <div class="order-table table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">نام محصول</th>
                                                <th scope="col">جمع</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td class="product-name">
                                                    <a href="#">ظروف آرایشی</a>
                                                </td>

                                                <td class="product-total">
                                                    <span class="subtotal-amount">139000 تومان</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="product-name">
                                                    <a href="#">میکروسکوپ جدید</a>
                                                </td>

                                                <td class="product-total">
                                                    <span class="subtotal-amount">55000 تومان</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="product-name">
                                                    <a href="#">دستگاه سمعک</a>
                                                </td>

                                                <td class="product-total">
                                                    <span class="subtotal-amount">55000 تومان</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="product-name">
                                                    <a href="#">استتوسکوپ فلزی</a>
                                                </td>

                                                <td class="product-total">
                                                    <span class="subtotal-amount">79000 تومان</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="order-subtotal">
                                                    <span>جمع کل سبد خرید</span>
                                                </td>

                                                <td class="order-subtotal-price">
                                                    <span class="order-subtotal-amount">27000تومان</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="order-shipping">
                                                    <span>حمل نقل</span>
                                                </td>

                                                <td class="shipping-price">
                                                    <span>30000 تومان</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="total-price">
                                                    <span>سفارش کل</span>
                                                </td>

                                                <td class="product-subtotal">
                                                    <span class="subtotal-amount">57000 تومان</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="payment-box">
                                    <div class="payment-method">
                                        <p>
                                            <input type="radio" id="direct-bank-transfer" name="radio-group" checked="">
                                            <label for="direct-bank-transfer">انتقال مستقیم بانکی</label> 
                                            پرداخت خود را مستقیماً به حساب بانکی ما انجام دهید. لطفاً از شناسه سفارش خود به عنوان مرجع پرداخت استفاده کنید. تا زمانی که وجه در حساب ما پاک نشود ، سفارش شما ارسال نمی شود.
                                        </p>
                                        <p>
                                            <input type="radio" id="paypal" name="radio-group">
                                            <label for="paypal">پی پال</label>
                                        </p>
                                        <p>
                                            <input type="radio" id="cash-on-delivery" name="radio-group">
                                            <label for="cash-on-delivery">پرداخت نقدی هنگام تحویل</label>
                                        </p>
                                    </div>
                                    <a href="#" class="default-btn"><i class="flaticon-tick"></i>سفارش دهید<span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        		';
include('footer.php');
echo'
		<!-- End Checkout Area -->

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
?>


