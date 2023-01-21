<?php

	
	include_once('main.php');
	$fee=new ManageFees();
	
	
$query="WHERE aid=1";		
		$custumerslist = $fee->GetcustomersList($query);
	
	 foreach($custumerslist as $custumerslistprob)
					{
					$name=$custumerslistprob['name'];
					$lat=$custumerslistprob['lat'];
					$lng=$custumerslistprob['lng'];
					$addr=$custumerslistprob['addres'];
					$custumercity=$custumerslistprob['city'];
					}
					echo $name;
?>