<?php

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 20; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

include_once('main.php');
switch($_REQUEST['op'])
{



    case "shop_list":

        $productid= $_REQUEST['x'];
        $tedad= $_REQUEST['y'];
        $amount= $_REQUEST['z'];
        $fee = new ManageFees();
        $acomment="submit by user";
        $state='1';
        $unid=randomPassword();

        $product2=$tedad*$amount;
        $product=$tedad;


        if(!$isLogedIn){
            if($_SESSION["bfslogin"]==""){

                session_start();
                $bfslognrand=rand(1000,900000);
                $_SESSION["bfslogin"] = $bfslognrand;

            }else{
                $bfslognrand=$_SESSION["bfslogin"];
            }
            $counttttt = $fee->Addshoplistbasket($productid,$bfslognrand,$amount,$product,$product2,$unid);

        }else{
            $counttttt = $fee->Addshoplistbasket($productid,$uusername,$amount,$product,$product2,$unid);

        }
        if($counttttt==1){

            echo json_encode(array(
                "statusCode"=>200,
                "state"=>"1",
                "url"=>'basket',
                "unid"=>$unid


            ),JSON_UNESCAPED_UNICODE);

        }
        else{
            echo'problem';

        }


        break;



		case "vfr":
	$addres= $_REQUEST['addres'];
	$cutomerstype= $_REQUEST['cutomerstype'];
	$lat= $_REQUEST['lat'];
	$lng= $_REQUEST['lng'];
	$name= $_REQUEST['name'];
	$submitby= $_REQUEST['submitby'];
	
$fee=new ManageFees();
$userPayments = $fee->Addcustomers($name,$lat,$lng,$addres,$cutomerstype,$submitby);
if($userPayments==1){
			echo json_encode(array(
				"statusCode"=>200,
				"formatted_address"=>$name
			));	
		
		}
		else{
			
				echo json_encode(array(
				"statusCode"=>201,
				"formatted_address"=>$name
			));	
			
		}
		
		break;
		
		case "customeridtodet":
		
		
		$idd= $_REQUEST['idd'];
	$fee = new ManageFees();
	
	
$disuserList = $fee->Getcustomerformission($idd);


foreach($disuserList as $disuserProp)
					{
						$name=$disuserProp['name'];
						$lat=$disuserProp['lat'];
						$lng=$disuserProp['lng'];
						$addres=$disuserProp['addres'];
						$cusomer_type=$disuserProp['cusomer_type'];
						
					}    
echo json_encode(array(
				"statusCode"=>200,
				"name"=>$name,
				"lat"=>$lat,
				"lng"=>$lng,
				"addres"=>$addres,
				"cusomer_type"=>$cusomer_type,
			));	
	
		break;
		
		
		
}
?>