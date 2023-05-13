<?php
include('main.php');
include('header.php');

$fee = new ManageFees();
if(isset($_POST['submit'])){

    function randomPassword() {
        $alphabet = '123456789';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 10; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    $fgwwt1 = json_encode($_POST,true);
    $productid="basket";
    $amount=$_POST['priceget'];
    $product=$fgwwt1;
    $product2="basket2";
    $acomment="submit from basket";
    $state='1';
    $unid=randomPassword();
    if($amount=="0" OR $amount==""){

        echo'سبد خرید خالی است';
        exit;
    }
    $counttttt = $fee->Addshoplist($productid,$uusername,$amount,$product,$product2,$acomment,$state,$unid);

    if ($counttttt==1){
        echo "<script>window.location.href='checkout?unid=$unid';</script>";
    }



}
if(isset($_GET['delete'])){
    $delet=$_GET['delete'];

    $deleteprobe = $fee->deletebasketitem($delet);
    if ($deleteprobe==1){

        echo"ایتم با موفقیت از سبد خرید خذف شد";

    }



}

if(!$isLogedIn){

    $discountList = $fee->Getbasketforuser($_SESSION["bfslogin"]);
    $discountListsum = $fee->Getbasketforusersum($_SESSION["bfslogin"]);

}else{

    $discountList = $fee->Getbasketforuser($uusername);
    $discountListsum = $fee->Getbasketforusersum($uusername);
}
$aftertotal=$discountListsum["0"]["total"];
$aftertotal2=number_format($discountListsum["0"]["total"],0,'.',',');
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
                    <h1>سبد خرید</h1>
                    <ul>
                        <li><a href="#">خانه</a></li>
                        <li>سبد خرید</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title Area -->

        <!-- Start Cart Area -->
		<section class="cart-area ptb-70">
            <div class="container">
                <form method="post" action="">
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">تولید - محصول</th>
                                    <th scope="col">نام</th>
                                    <th scope="col">قیمت واحد</th>
                                    <th scope="col">تعداد</th>
                                    <th scope="col">جمع</th>
                                </tr>
                            </thead>

                            <tbody>
                        
                              ';
$counterr=1;
foreach($discountList as $discountProp69)
{
    $uinid=$discountProp69["uinid"];
    $data1=$discountProp69["data1"];
    $data2=$discountProp69["data2"];
    $id=$discountProp69["product_id"];
    $query = "WHERE id=$id  ORDER BY `products`.`id` ASC";
    $dist = $fee->Getproductlist($query);
    $imp=explode(",",$dist["0"]['image']);
    $totalrow=$discountProp69["price"]*$data1;

echo'

                                                
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#">
                                            <img src="https://panel.dentcenter.ir/public/images/product/'.$imp["0"].'" alt="مورد">
                                        </a>
                                    </td>

                                    <td class="product-name">
                                        <a href="product?id='.$dist["0"]["id"].'">'.$dist["0"]["name"].'</a>
                                    </td>

                                    <td class="product-price">
                                        <span class="unit-amount">'.$discountProp69["price"].' تومان</span>
                                    </td>

                                    <td class="product-quantity">
                                        <div class="input-counter">
                                       '.$data1.' 
                                        </div>
                                    </td>

                                    <td class="product-subtotal">
                                        <span class="subtotal-amount">'.$totalrow.' تومان</span>

                                        <a href="basket?delete='.$discountProp69["id"].'" class="remove"><i class="bx bx-trash"></i></a>
                                    </td>
                                </tr>

                                
                                ';
}
$dispricesh2_change=number_format($discountListsum["0"]["total"],0,'.',',');
$ersal='50000';
$totalbaersal=$ersal+$discountListsum["0"]["total"];
echo'
                                
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-buttons">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-sm-7 col-md-7">
                                <div class="shopping-coupon-code">
                                    <input type="text" class="form-control" placeholder="کد تخفیف" name="coupon-code" id="coupon-code">
                                    <button disabled="disabled" >درخواست تخفیف</button>
                                </div>
                            </div>

                            <div class="col-lg-5 col-sm-5 col-md-5 text-right">
                               
                            </div>
                        </div>
                    </div>

                    <div class="cart-totals">
                        <h3>مجموع سبد خرید</h3>

                        <ul>
                            <li>جمع <span>'.$dispricesh2_change.' تومان</span></li>
                            <li>حمل و نقل <span>'.$ersal.' تومان</span></li>
                            <li>در کل <span>'.$totalbaersal.' تومان</span></li>
                        </ul>
 <input type="hidden" name="priceget" id="priceget" class="form-control" value="'.$totalbaersal.'">
 ';
if($isLogedIn){echo'<button name="submit" id="submit"  class="default-btn"><i class="flaticon-trolley"></i>اقدام به پرداخت</button>';}
echo'
                                   </form>
                                  ';

if(!$isLogedIn)
{echo'<a href="login"><center><div name="frs" id="frs" class="default-btn"><i class="flaticon-trolley"></i>ثبت نام کنید یا وارد حساب شوید و خرید را ادامه دهید</div></center></a>';}

echo'
                     
                    </div>
                </form>
            </div>
        </section>
		<!-- End Cart Area -->
		
		
		';
include('footer.php');
echo'
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




