<?php
include_once('main.php');
$fee=new ManageFees();

$uusername="sr-20230425-011926";
$unid="8599388861";


$getdeloo=$fee->Getshoplist1($uusername,$unid);
$amount=$getdeloo["0"]["amount"];


$getsaledeop=$fee->Getsaleid($uusername);

$sale_id=$getsaledeop["0"]["id"];

$sale_id=$getsaledeop["0"]["id"];
$user_id='33';
$cash_register_id='1';
$account_id='3';
$change='0';
$paying_method='site';
$payment_note='پرداخت از سایت';
$payment_reference=  'spr-' . date("Ymd") . '-'. date("his");
$iooo=$fee->Addpaymenttableuser($payment_reference,$user_id,$sale_id,$cash_register_id,$account_id,$amount,$change,$paying_method,$payment_note);

echo $iooo;

?>