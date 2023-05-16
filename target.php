<?php

include_once('main.php');


require 'functionsz.php';

if((isset($_GET['GS'])))
{
	if (isset($_COOKIE['cid'])) {
		setcookie("cid",'',time()-1200);
	}
	setcookie("cid",$_GET['GS'],time()+1200);
$unid=$_GET['GS'];
$fee=new ManageFees();
    $uusername=$_GET['id'];
$amp = $fee->Getshoplist1($uusername,$unid);

$amount=$amp["0"]['amount'];

echo''.$amount.'';

$_SESSION['course_amount']=str_replace
	(",", "", $amount);
	$_SESSION['gateway']=$unid;
	



			$_SESSION['order_id']=$unid;
			

			
			$_SESSION['pay_amount']=$amount;


    $uusername2="$unid---$uusername";
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on'? 'https://' : 'http://');
    $callBackUrl = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $parameters = array(
        "merchant"=> ZIBAL_MERCHANT_KEY,//required
        "callbackUrl"=> $callBackUrl,//required
        "amount"=> $amount,//required
        "orderId"=> $uusername2,
        "mobile"=> $_GET['phone_number']
    );

    $response = postToZibal('request', $parameters);

    $Authority=$unid;
    if ($response->result == 100)
    {
        $fee = new ManageFees();

        $status='zibal-selected--'.$uusername.'--'.$response->payLink.'--'.$response->result.'--'.$response->message.'';

        $fee->AddUserPaymentlog($Authority,$uusername,$status,$amount);
        $startGateWayUrl = "https://gateway.zibal.ir/start/".$response->trackId;
        echo'enja';
        header('location: '.$startGateWayUrl);
        echo'2222222';
        exit;
    }
    else{
        echo "result: ".$response->result."<br>";
        echo "message: ".$response->message;
        $status='zibal--token-err--'.$response->result.'-خطا در ارسال به درگاه--'.$response->message['message'].'';
        $fee->AddUserPaymentlog($Authority,$uusername,$status,$amount);
    }








}

elseif(isset($_SESSION['gateway'])){
    include_once('header.php');
	$fee=new ManageFees();	

   $rov=explode("---",$_GET['orderId']);
    $uusername=$rov["1"];
    $unid=$rov["0"];
    echo $unid;
	$autvc=count($fee->getcountshoplistpart($uusername,$unid));
	if($autvc!==0){



        if($_GET['success']==1) {


            //start verfication
            $parameters = array(
                "merchant" => ZIBAL_MERCHANT_KEY,//required
                "trackId" => $_GET['trackId'],//required

            );

            $response = postToZibal('verify', $parameters);

            if ($response->result == 100) {


                $comment=$response->message;
                $RefID=$_GET['trackId'];
                $Authority=$unid;
                $fee->updateUserPaymentlog($comment,$RefID,$Authority);
                $fee->Updateshoplistafterpay($unid);
                $getdeloo=$fee->Getshoplist1($uusername,$unid);
                $amount=$getdeloo["0"]["amount"];
                $fee->updatesalestable($amount,$uusername);


                $getsaledeop=$fee->Getsaleid($uusername);
                $sale_id=$getsaledeop["0"]["id"];
                $user_id='33';
                $cash_register_id='1';
                $account_id='3';
                $change='0';
                $paying_method='site';
                $payment_note='پرداخت از سایت';
                $payment_reference=  'spr-' . date("Ymd") . '-'. date("his");
                $fee->Addpaymenttableuser($payment_reference,$user_id,$sale_id,$cash_register_id,$account_id,$amount,$change,$paying_method,$payment_note);


                echo'تراکنش موفق شد';

            }
            else {
                $comment=$response->message;
                $RefID=$_GET['trackId'];
                $Authority=$unid;
                $fee->updateUserPaymentlog($comment,$RefID,$Authority);
                echo "پرداخت با شکست مواجه 22222.";


            }
        }else
        {
            $comment="no pay";
            $RefID=$_GET['trackId'];
            $Authority=$unid;
            $fee->updateUserPaymentlog($comment,$RefID,$Authority);
            echo "پرداخت با شکست مواجه شد.";
        }





}


}


?>