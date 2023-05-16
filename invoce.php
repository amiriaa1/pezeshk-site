<?php
include('main.php');

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

    $productid="basket";
    $amount=$_POST['priceget'];
    $phone_number=$_POST['phone_number'];
    $uid=$_POST['uid'];
    $product=$_GET['id'];
    $product2="basket2";
    $acomment="submit from invoce";
    $state='2';
    $uusername="invoce";
    $unid=randomPassword();

    $counttttt = $fee->Addshoplist($productid,$uusername,$amount,$product,$product2,$acomment,$state,$unid);

    if ($counttttt==1){
        header("Location: target?GS=$unid&id=$product&phone_number=$phone_number");
        exit;
    }



}
include('header.php');
if(isset($_GET['id'])){}else{echo'اختلال';exit;}

$id=$_GET['id'];
$getinvoceiio = $fee->Getfactorforinvocepage($id);
if($getinvoceiio["0"]["customer_id"]==null or $getinvoceiio["0"]["customer_id"]==""){echo'فاکتور صحیح نیست';exit;}
$Getcustomersatlas = $fee->Getcustomersatlas($getinvoceiio["0"]["customer_id"]);



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

                    
                </div>
            </div>
        </div>
        <!-- End Search Overlay -->

        <!-- Start Page Title Area -->
        <section class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h1>نمایش فاکتور</h1>
                    <ul>
                        <li><a href="#">خانه</a></li>
                        <li>نمایش فاکتور</li>

                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title Area -->

        <!-- Start Cart Area -->
		<section class="cart-area ptb-70">
            <div class="container">
             <h4>مشتری گرامی :  '.$Getcustomersatlas["0"]["name"].'---'.$Getcustomersatlas["0"]["phone_number"].'</h4>
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
foreach($getinvoceiio as $getinvoceiioprobe)
{
$id2=$getinvoceiioprobe["product_id"];
    $query = "WHERE id=$id2  ORDER BY `products`.`id` ASC";
    $dist = $fee->Getproductlist($query);
    $imp=explode(",",$dist["0"]['image']);
    $totalrow=$dist["0"]["price"]*$getinvoceiioprobe["qty"];

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
                                        <span class="unit-amount">'.$dist["0"]["price"].' ریال</span>
                                    </td>

                                    <td class="product-quantity">
                                        <div class="input-counter">
                                       '.$getinvoceiioprobe["qty"].' 
                                        </div>
                                    </td>

                               
                                    <td class="product-quantity">
                                        <div class="input-counter">
                                       '.$totalrow.'  ریال
                                        </div>
                                    </td>
                                </tr>


';
}


echo'
                            
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-buttons">
                        <div class="row align-items-center">
                         

                            <div class="col-lg-5 col-sm-5 col-md-5 text-right">
                               
                            </div>
                        </div>
                    </div>

                    <div class="cart-totals">
                        <h3>مجموع سبد خرید</h3>
';


if($getinvoceiio["0"]["paid_amount"]==NULL OR $getinvoceiio["0"]["paid_amount"]==""){$grand=$getinvoceiio["0"]["grand_total"];$pay_shode="0";}
else{
    $grand=$getinvoceiio["0"]["grand_total"]-$getinvoceiio["0"]["paid_amount"];
    $pay_shode=$getinvoceiio["0"]["paid_amount"];
}
echo'
                        <ul>
                            <li>جمع <span>'.$getinvoceiio["0"]["total_price"].' ریال</span></li>
                            <li>حمل و نقل <span>'.$getinvoceiio["0"]["shipping_cost"].' ریال</span></li>
                           <li>تخفیف <span>'.$getinvoceiio["0"]["order_discount"].' ریال</span></li>
                               <li>پرداخت شده <span>'.$pay_shode.' ریال</span></li>
                                   <li>مانده <span>'.$grand.' ریال</span></li>
                            ';



echo'





                        </ul>

 ';







if($getinvoceiio["0"]["paid_amount"]==$getinvoceiio["0"]["grand_total"]){
    echo'<button disabled="disabled" class="default-btn"><i class="flaticon-trolley"></i>فاکتور بدهکار نیست</button>';

}else{
    echo'
<button name="submit" id="submit"  class="default-btn"><i class="flaticon-trolley"></i>  اقدام به پرداخت</button>
';

}

echo'
 <input type="hidden" name="priceget" id="priceget" class="form-control" value="'.$grand.'">
  <input type="hidden" name="uid" id="uid" class="form-control" value="'.$id.'">
    <input type="hidden" name="phone_number" id="phone_number" class="form-control" value="'.$Getcustomersatlas["0"]["phone_number"].'">
                                   </form>
             
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