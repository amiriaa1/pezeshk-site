<?php


include_once('main.php');
switch($_REQUEST['op'])
{
	
	
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