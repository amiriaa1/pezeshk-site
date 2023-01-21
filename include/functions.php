<?php

if(!isset($score_sum))$score_sum=0;
function aasort (&$array, $key, $order) {
	$sorter=array();
	$ret=array();
	reset($array);
	foreach ($array as $ii => $va) {
		$sorter[$ii]=$va[$key];
	}
	if($order=="asc")
		asort($sorter);
	else
		arsort($sorter);
	foreach ($sorter as $ii => $va) {
		$ret[$ii]=$array[$ii];
	}
	$array=$ret;
}

include_once('../main.php');
function investrefcod($ucomment1,$uusername,$amount2)
{	


$fee=new ManageFees();
$student = new ManageStudents();

$discountListcount = $fee->GetreferalListcodcount($ucomment1);

if($discountListcount==1){

$fee=new ManageFees();
$student = new ManageStudents();

	$discountList = $fee->GetreferalListcod($ucomment1);
foreach($discountList as $discountProp)
{$codcod=$discountProp['uusername'];}

$test=date("d");
$mah=date("m");
					
						
						$leftmount=$daybyday-$test;
						$percentage=0.5 ;
                        $totalWidth=$amount2;
                        $amount = ($percentage / 100) * $totalWidth;
					$uiddd=$codcod;
					
			$courseList = $fee->GetWalletother($uiddd);
			 foreach ($courseList as $courseStudentInfo)
			{$referralwallet=$courseStudentInfo['referralwallet'];
			$upois=$courseStudentInfo['uid'];}
			
$sum=$referralwallet+$amount;
$umps=$codcod;
$ccvggt = $fee->WalletUpdatereferral2($sum,$umps);
$uptrack_codeprob='1212';
$uppaymentdprob=$amount;
$uidprob=$upois;
$fee->AddUserPayment($uidprob,$uppaymentdprob,0,$uptrack_codeprob,'deposit to referral wallet for '.$uusername.' invest by youre referral  ',10);
}
else
{echo'the referral cod  not finde';}
return $ccvggt;
}




function getRealIpAddr()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP']))
	    //check ip from share internet
	    {
	    $ip=$_SERVER['HTTP_CLIENT_IP'];
	    }
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	    //to check ip is pass from proxy
	    {
	    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	else
	    {
	    $ip=$_SERVER['REMOTE_ADDR'];
	    }
	return $ip;
}

function XMLClean($strin) {
    $strout = null;
    for ($i = 0; $i < strlen($strin); $i++) {
        switch ($strin[$i]) {
            case '<':
                    $strout .= '#tlt;';
                    break;
            case '>':
                    $strout .= '#tgt;';
                    break;
            case '&':
                    $strout .= '#tamp;';
                    break;
            case '"':
                    $strout .= '#tquot;';
                    break;
            default:
                    $strout .= $strin[$i];
        }
    }

    return $strout;
}

function redypay($vouch,$cid,$uid)
{
if($vouch!==''){
$course = new ManageCourses();
$num_of_vo = count($course->Getvoucehr($vouch));	
if($num_of_vo!==0){	
$volist = $course->Getvoucehr($vouch);
foreach($volist as $voProp)
{$amtchek=$voProp['amount'];}
$shopamount = $course->Getshopamount($cid);
foreach($shopamount as $shopamountp)
{$amount2=$shopamountp['amount'];}
$amount=$amount2-$amtchek;
$pid=$cid;
$voucehr=$vouch;
$amvoucehr=$amtchek;
$aut=substr(time(),-5);
$getway='پرداخت آنلاین';
$after=$amount2;
$fee=new ManageFees();
$fee->AddUserFactor($uid,$pid,$amount,$voucehr,$amvoucehr,$aut,$getway,$after);
echo "<script>window.location.href='target?GS=$aut';</script>";
exit;
}else{echo'voucehr valid nist';}	


}else{
$course = new ManageCourses();	
$shopamount = $course->Getshopamount($cid);
foreach($shopamount as $shopamountp)
{$amount2=$shopamountp['amount'];}
$amount=$amount2;
$pid=$cid;
$voucehr='';
$amvoucehr='';
$aut=substr(time(),-5);
$getway='پرداخت آنلاین';
$after=$amount2;
$fee=new ManageFees();
$fee->AddUserFactor($uid,$pid,$amount,$voucehr,$amvoucehr,$aut,$getway,$after);
echo "<script>window.location.href='target?GS=$aut';</script>";
exit;
	
	
	
	
}	
	

	
	
}


function XMLDirt($str)
{
	$str = str_replace("#tlt;", "<", $str);
	$str = str_replace("#tgt;", ">", $str);
	$str = str_replace("#tamp;", "&", $str);
	$str = str_replace("#tquot;", '"', $str);
	return $str;
}
function xml2array ( $xmlObject, $out = array () )
{
	foreach ( (array) $xmlObject as $index => $node )
	    $out[$index] = ( is_object ( $node ) ||  is_array ( $node ) ) ? xml2array ( $node ) : $node;

	return $out;
}

function G2J($date)
{
	include_once 'jdf';
	$d = explode(' ',$date);
	$d_date = explode('-',$d[0]); //date
	$d_time = explode(':',$d[1]); //time
	$year = $d_date[0];
	$month = $d_date[1];
	$day = $d_date[2];
	$hour=$d_time[0];
	$minute=$d_time[1];
	$second=$d_time[2];
	$Jd = gregorian_to_jalali($year,$month,$day);
	// if ($Jd[1]<=6)
	// 	$timestamp =gmmktime($hour,$minute,$second,$month,$day,$year)+16200;
	// else
	// 	$timestamp =gmmktime($hour,$minute,$second,$month,$day,$year)+12600;
	$timestamp =gmmktime($hour,$minute,$second,$month,$day,$year);
	return jdate("Y-m-d H:i:s",$timestamp);
}


function StudentResult($uid,$action,$termID,$root=0)
{
	global $system_settings,$theme,$dir,$align1,$align2,$uusername_title,$table_prefix,$student,$term,$sc,$cs,$obj,$level,$major,$lesson,$userRank,$score_sum,$show_remaining;
	$addr = ($root==1?'':'../');
	if(!isset($student)) $student=new ManageStudents();
	if(!isset($term)) $term=new ManageTerms();
	if(!isset($sc)) $sc=new ManageScoreColumns();
	if(!isset($cs)) $cs=new ManageCourseStudents();
	if(!isset($obj)) $obj=new ManageObjections();
	if(!isset($level)) $level=new ManageLevels();
	if(!isset($major)) $major=new ManageMajors();
	if(!isset($lesson)) $lesson=new ManageLessons();
	$termsAve = array();
	$studentProp = $student->GetStudentInfoById($uid);
	$termList = $student->GetStudentTermList($uid);
	$content="";
	if(file_exists($addr.'img/students/'.$studentProp['uid'].$studentProp['upic'].''))
		$userPic = $addr.'img/students/'.$studentProp['uid'].$studentProp['upic'];
	else
		$userPic = $addr.'img/student.png';
	$content .= '
	<script type="text/javascript">
		$(document).ready(function()
		{
			$("#print").click(
				function()
				{
					$("#toolbar").hide();
					$("#print").hide();
					$("#tid").hide();
					window.print();
				}
			);
			$("#tid").change(function()
			{
				$("#termForm").submit();
			}
			);
		}
		);
		function Print(id)
		{
			$(".terms").hide();
			$("#"+id).show();
			$("#toolbar").hide();
			$("#print").hide();
			$("#tid").hide();
			window.print();
		}
	</script>
	
		<div style="width:150px; float:'.$align2.'" class="center">
			<img src="'.$addr.'img/institute_logo.png" style="height:80px;"><br>
			<b class="">'.$system_settings['institute_name'].'</b><br><br>
		</div>
		
		<div style="width:300px; float:'.$align1.'; margin:10px;">
		
			<img src="'.$userPic.'" style="height:70px; float:'.$align1.'; margin-'.$align2.':10px;">
			
	
	';
	$ucurrent_major=$major->GetMajorInfoById($studentProp['ucurrent_major']);
	$ucurrent_major=$ucurrent_major['mtitle'];
	$ulevel=$level->GetStudentLevelId($uid);
	$ulevel=$level->GetLevelInfoById($ulevel);
	$ulevel=$ulevel['lvtitle'];
	$content .= '
	
	'._FULLNAME.':'.$studentProp['ufname'].' '.$studentProp['ulname'].'
	<br>
	';
	$content .= '
	</div>

	<br clear="both">
	';
	$factorsTotal = 0;
	$effectiveFactorsTotal = 0;
	$effectiveFactorsTotalScored = 0;
	$canceledFactorsTotal = 0;
	$sumOfFinalScoresTotal = 0;
	$content .= '
	<div id="table-container">';
	foreach ($termList as $termInfo)
	{
		$effectiveFactorsTermScored = 0;
		$tid=$termInfo['tid'];
		$content .= '


	<!-- Styles -->
	<style>
	.chartdiv {
	  width: 100%;
	  height: 500px;
	}

	</style>

	<!-- Resources -->
	<script src="'.$addr.'js/amcharts/core.js"></script>
	<script src="'.$addr.'js/amcharts/charts.js"></script>
	<script src="'.$addr.'js/amcharts/themes/material.js"></script>
	<script src="'.$addr.'js/amcharts/themes/animated.js"></script>


	
		';
		$content .= '
		<div style="width:100%;">
			<table style="border:2px black solid; width:100%;">
				<tr class="default_font ">
					<td style="width:80px;" class="table_print_header">
						'._CCODE.'
					</td>
					
				
				
				
				
					
				';
		$scList = $term->GetTermScoreColumns($tid);
		//$scList = array_reverse($scList);
		foreach ($scList as $scInfo)
		{
			$content .= '
					<td style="width:50px;" class="table_print_header">'.$scInfo['sctitle'].'</td>';
		}
	
		if(!(isset($show_remaining) && $show_remaining==0))
		
		$content .= '
				
				
				</tr>
				';
		$courseList = $student->GetStudentCourseList($uid,$termInfo['tid']);
		$i=1;
		$factorsTerm = 0;
		$effectiveFactorsTerm = 0;
		$canceledFactorsTerm = 0;
		$sumOfFinalScoresTerm = 0;
		$scoreColumnArray = array(array());
		$termScores=array();
		foreach ($courseList as $courseStudentInfo)
		{
			if($i%2==0)
				$bgCourse = "tr_hover_class";
			else
				$bgCourse = "";
			$content .= '<tr style="height:30px; border-bottom:silver;" class="table_rows default_font '.$bgCourse.' table_rows_border">';
			
			$content .= '<td style="text-align:center;">
				'.$courseStudentInfo['ccode'].'
				</td>';
				
		
			
		
			
			$lessonUnits = $lesson->GetLessonUnits($courseStudentInfo['lid']);
			$sumOfLessonUnits = $lesson->GetSumOfUnits($courseStudentInfo['lid']);
			$factorsTotal+=$sumOfLessonUnits;
			$factorsTerm+=$sumOfLessonUnits;
			if ($courseStudentInfo['eff_on_term_avg']==1 && $courseStudentInfo['cucanceled']!=1)
				$effectiveFactorsTerm+=$sumOfLessonUnits;
			if ($courseStudentInfo['eff_on_total_avg']==1 && $courseStudentInfo['cucanceled']!=1)
				$effectiveFactorsTotal+=$sumOfLessonUnits;
			if ($courseStudentInfo['cucanceled']==1)
			{
				$canceledFactorsTotal+=$sumOfLessonUnits;
				$canceledFactorsTerm+=$sumOfLessonUnits;
			}

			
			
		
		
			$sumOfColumnsFactors = 0;
			$sumOfColumnsScoresMultipliedByFactor = 0;
			
			foreach ($scList as $scInfo)
			{
				$scid = $scInfo['scid'];
				$cuid = $courseStudentInfo['cuid'];
				$studentScore = $cs->GetStudentScoreByColumnID($cuid,$scid);
				$courseColumnScoreFactor = $sc->GetCourseScoreColumnFactor($courseStudentInfo['cid'],$scInfo['scid']);
				if(!($courseColumnScoreFactor===NULL) && !($studentScore['usscore']===NULL) && !($studentScore['usscore']==="") && $courseStudentInfo['descriptive_score']!=1)
				{
					if(!isset($scoreColumnArray[$scid]['sumOfScoreColumnFacors']))
					{
						$scoreColumnArray[$scid]['sumOfScoreColumnFacors']=0;
						$scoreColumnArray[$scid]['sumOfColumnScoreMultipliedByFactor']=0;
					}
					if($courseStudentInfo['eff_on_term_avg']==1)
					{
						$scoreColumnArray[$scid]['sumOfScoreColumnFacors'] += $sumOfLessonUnits;
						$scoreColumnArray[$scid]['sumOfColumnScoreMultipliedByFactor']+=($sumOfLessonUnits*$studentScore['usscore']);
					}

					$sumOfColumnsFactors += $courseColumnScoreFactor['cscfactor'];
					$sumOfColumnsScoresMultipliedByFactor+=($courseColumnScoreFactor['cscfactor']*$studentScore['usscore']);
				}
				$usscore_status = "";
				if($termInfo['grade_active']==0 && $studentScore['usscore']!=="" && $studentScore['usscore']!==NULL)
					$usscore_status = _SCORE_STATUS_2;
				else
					$usscore_status = $cs->GetScoreStatus($studentScore['usscore_status']);
				$usscore_exam_status = $cs->GetScoreExamStatus($studentScore['usscore_exam_status']);
				$content .= '
				<td style="text-align:center;">';
				if($courseColumnScoreFactor===NULL)
					$content .= '-';
				else
				{
					if($studentScore['usscore']===NULL || $studentScore['usscore']==="")
						$content .= '<span class="small">'._SCORE_NOT_AVAILABLE.'</span>';
					else
					{
					
						if($studentScore['usscore']!=="" && $studentScore['usscore']!==NULL)
						{
							
							$objProp = $obj->GetObjectionInfo($studentScore['usid']);
							if($termInfo['grade_active']==0)
								$content .= '';
							else
							{
								if($objProp==0)
								{
									if($courseStudentInfo['objection']==1)
									{
										
									}
									else
										$content .= '<button title=\''._OBJECTION_IS_DISABLED.'\' class=\'title btn btn btn-warning\'>'._OBJECTION.'</button>';
								}
								else
								{
									switch($objProp['ostatus'])
									{
										case 1:
											$ostaus = _OBJ_STATUS_1;
											break;
										case 2:
											$ostaus = _OBJ_STATUS_2;
											break;
										case 3:
											$ostaus = _OBJ_STATUS_3;
											break;
									}
									$content .= ''._OBJECTION_STATUS.': <b>'.$ostaus.'</b>';
								}
							}
						}
						

//<div class="container">
//  <div class="skills html">'.$studentScore['usscore'].'</div>
//</div>
 
						$content .= ''.$studentScore['usscore'].'</a></span>';
						
					}
				}
				
				$content .= '
				</td>
				
				';
				$termScores[$courseStudentInfo['lname'].' ('.$courseStudentInfo['ccode'].')'][$scInfo['sctitle']]=(empty($studentScore['usscore'])?0:$studentScore['usscore']);
			}
			if($courseStudentInfo['descriptive_score']==0)
			{
				$courseFinalScore = GetStudentFinalColumnScore($uid,$courseStudentInfo['cid']);

				
				//Students Number
				$cid = $courseStudentInfo['cid'];
				$query = " WHERE `".$table_prefix."course_student`.`cid`='$cid' ";
				$order = " ORDER BY `ulname`,`ufname`";
				$courseStudentList = $cs->GetCourseStudentList($query,$order);
				$courseFinalScoreAve = GetCourseFinalScoreAve($cid);
				arsort($userRank);
				$userRank = array_search($uid, array_keys($userRank))+1;
			}
			
		
			
			if($courseStudentInfo['cucanceled']!=1 && $courseStudentInfo['descriptive_score']==0 && $courseFinalScore!=NULL)
			{
				if($courseStudentInfo['eff_on_term_avg']==1)
				{
					$effectiveFactorsTermScored+=$sumOfLessonUnits;
					$sumOfFinalScoresTerm += $sumOfLessonUnits*($sumOfColumnsFactors==0?0:round($sumOfColumnsScoresMultipliedByFactor/($score_sum==1?1:$sumOfColumnsFactors),2));
				}
				if($courseStudentInfo['eff_on_total_avg']==1)
				{
					$effectiveFactorsTotalScored+=$sumOfLessonUnits;
					$sumOfFinalScoresTotal += $sumOfLessonUnits*($sumOfColumnsFactors==0?0:round($sumOfColumnsScoresMultipliedByFactor/($score_sum==1?1:$sumOfColumnsFactors),2));
				}
			}
			
		
		
			$content .= '
			</tr>';
			$i++;
		}
		/////////////////Column Average
	
		/////////////////!Column Average
		$content .= '</table><br>';
		$termScoresJSON="";
		foreach ($termScores as $lessonss) {
			foreach ($lessonss as $lname => $score) {
				$termScoresJSON .= '{"lesson":"'.$lname.'","score":'.$score.'},';
			}
		}
		$termScoresJSON =mb_substr($termScoresJSON,0,-1);
		$content .= '
		<script>
		am4core.ready(function() {

		// Themes begin
		am4core.useTheme(am4themes_material);
		am4core.useTheme(am4themes_animated);
		// Themes end_point
		/* Create chart instance */
		var chart'.$termInfo['tid'].' = am4core.create("chartdiv'.$termInfo['tid'].'", am4charts.RadarChart);

		/* Add data */
		chart'.$termInfo['tid'].'.data = ['.$termScoresJSON.'];

		/* Create axes */
		var categoryAxis = chart'.$termInfo['tid'].'.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "lesson";

		var valueAxis = chart'.$termInfo['tid'].'.yAxes.push(new am4charts.ValueAxis());
		valueAxis.renderer.axisFills.template.fill = chart'.$termInfo['tid'].'.colors.next();
		valueAxis.renderer.axisFills.template.fillOpacity = 0.05;

		/* Create and configure series */
		var series = chart'.$termInfo['tid'].'.series.push(new am4charts.RadarSeries());
		series.dataFields.valueY = "score";
		series.dataFields.categoryX = "lesson";
		series.name = "Scores";
		series.strokeWidth = 5;

		}); // end am4core.ready()
		</script>

		<!-- HTML -->
		<div id="chartdiv'.$termInfo['tid'].'" class="chartdiv"></div>


		<script>
			$(function (){
			 $("a[rel=popover]").popover({title:"'._DETAILES.'",container:"body",trigger:"click",placement:"bottom"});
			});
		</script>
		<style>
		.popover-title { height: 0px; font-size:1px; overflow:hidden}
		</style>';
		$termsAve[$termInfo['tid']]=($effectiveFactorsTerm==0 || $effectiveFactorsTermScored==0?_SCORE_NOT_AVAILABLE:round($sumOfFinalScoresTerm/$effectiveFactorsTermScored,2));
		$content .= '
		<center class="alert alert-warning">
			'._TERM_FACTORS.': '.$factorsTerm.' &nbsp;&nbsp;&nbsp;&nbsp;
			'._TERM_EFFECTIVE_FACTORS.': '.$effectiveFactorsTerm.'&nbsp;&nbsp;&nbsp;&nbsp;
			'._TERM_CANCELED_FACTORS.': '.$canceledFactorsTerm.'&nbsp;&nbsp;&nbsp;&nbsp;
			'._TERM_AVE.': '.$termsAve[$termInfo['tid']].'</center>
		<br>
	</div>
	</div>
	';
	}
	$content .= '</div>';
	$totalAve = ($effectiveFactorsTotalScored==0?_SCORE_NOT_AVAILABLE:round($sumOfFinalScoresTotal/$effectiveFactorsTotalScored,2));
	$content .= '
	<div class="alert alert-success" style="text-align:center;">
		'._TOTAL_FACTORS.': '.$factorsTotal.' &nbsp;&nbsp;&nbsp;&nbsp;
		'._TOTAL_EFFECTIVE_FACTORS.': '.$effectiveFactorsTotal.' &nbsp;&nbsp;&nbsp;&nbsp;
		'._TOTAL_CANCELED_FACTORS.': '.$canceledFactorsTotal.' &nbsp;&nbsp;&nbsp;&nbsp;
		'._TOTAL_AVE.': '.$totalAve.'
	</div>
	';
	
	
		$content .= '
		<div class="modal fade" id="send_objection">
		  <div class="modal-dialog">
		    <div class="modal-content">
		        <form action="javascript:addObject()" method="post" name="send_objection_form">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">'._ADD_OBJECTION.'</h4>
		      </div>
		      <div class="modal-body">
					<div id="final_result">
						'._OBJECTION_MESSAGE.':<br>
						<center><textarea name="otext" class="input" id="otext" style="direction:'.$dir.'; width:400px; height:100px;"></textarea><br>
						<input type="hidden" name="usid" id="usid" value="">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        		<button type="submit" class="btn btn-primary">'._ADD_OBJECTION.'</button>
						<div id="obj_result">
						</div>
					</div>
		      </div>
		      <div class="modal-footer">
						'._OBJECTION_MESSAGE_NOTE.'
		      </div>
		    </div><!-- /.modal-content -->
				</form>
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		';
	
	
	$content .= '
		<script type="text/javascript">
			function send_objection(id){
				$("#send_objection").modal()
				document.forms["send_objection_form"].usid.value = id;
				document.forms["send_objection_form"].otext.value = "";
				document.getElementById("obj_result").innerHTML = "";
			}
			function addObject()
			{
				$("#obj_result").html(\'<img src="img/wait.gif">\');
				var usid = $("#usid").val();
				var otext = $("#otext").val();
				$.ajax({
				    url: "aj",
				    type: "POST",
				    data: {op:"add_objection",usid:usid,otext:otext},
				    success: function(data,status){
					    $("#final_result").html(data);
					},
				    error: function(){$("#obj_result").html("Problem in Ajax")}
				});
			}
		</script>
		<center>
			<input type="button" class="btn btn-primary noprint" id="print" value="'._PRINT.'" style="margin-bottom:100px;">
		</center>
		
	
		';
			if($studentProp['uusername']=="002"){
				$content .= '
				<div id="t'.$termInfo['tcode'].'" class="terms">
				<center style="font-family:Times New Roman; font-size:20px; font-weight:bold;">
			'._RESULTS.' '._IN_TERM.' '.$termInfo['tname'].' ('._TCODE.': '.$termInfo['tcode'].') 
			<input type="button" class="btn btn-default noprint" onclick="Print(\'t'.$termInfo['tcode'].'\')" value="'._PRINT.'">
		</center>';}
	if($action=="print_total")
		echo $content;
	elseif ($action=="say_term")
		return $termsAve[$termID];
	elseif ($action=="say_total")
		return $totalAve;
}

function StudentResultTotal($uid,$action,$termID,$root=0)
{
	global $system_settings,$theme,$dir,$align1,$align2,$uusername_title,$table_prefix,$student,$term,$sc,$cs,$obj,$level,$major,$lesson,$userRank,$score_sum,$show_remaining;
	$addr = ($root==1?'':'../');
	if(!isset($student)) $student=new ManageStudents();
	if(!isset($term)) $term=new ManageTerms();
	if(!isset($sc)) $sc=new ManageScoreColumns();
	if(!isset($cs)) $cs=new ManageCourseStudents();
	if(!isset($obj)) $obj=new ManageObjections();
	if(!isset($level)) $level=new ManageLevels();
	if(!isset($major)) $major=new ManageMajors();
	if(!isset($lesson)) $lesson=new ManageLessons();
	$termsAve = array();
	$studentProp = $student->GetStudentInfoById($uid);
	$termList = $student->GetStudentTermList($uid);
	$content="";
	if(file_exists($addr.'img/students/'.$studentProp['uid'].$studentProp['upic'].''))
		$userPic = $addr.'img/students/'.$studentProp['uid'].$studentProp['upic'];
	else
		$userPic = $addr.'img/student.png';
	$content .= '
	<script type="text/javascript">
		$(document).ready(function()
		{
			$("#print").click(
				function()
				{
					$("#toolbar").hide();
					$("#print").hide();
					$("#tid").hide();
					window.print();
				}
			);
			$("#tid").change(function()
			{
				$("#termForm").submit();
			}
			);
		}
		);
		function Print(id)
		{
			$(".terms").hide();
			$("#"+id).show();
			$("#toolbar").hide();
			$("#print").hide();
			$("#tid").hide();
			window.print();
		}
	</script>
		<div style="width:150px; float:'.$align2.'" class="center">
			<img src="'.$addr.'img/institute_logo.png" style="height:80px;"><br>
			<b class="">'.$system_settings['institute_name'].'</b><br><br>
		</div>
		<div style="width:300px; float:'.$align1.'; margin:10px;">
			<img src="'.$userPic.'" style="height:70px; float:'.$align1.'; margin-'.$align2.':10px;">
	';
	$ucurrent_major=$major->GetMajorInfoById($studentProp['ucurrent_major']);
	$ucurrent_major=$ucurrent_major['mtitle'];
	$ulevel=$level->GetStudentLevelId($uid);
	$ulevel=$level->GetLevelInfoById($ulevel);
	$ulevel=$ulevel['lvtitle'];
	$content .= '
	
	'._FULLNAME.': <b>'.$studentProp['ufname'].' '.$studentProp['ulname'].'</b><br>'.$uusername_title.': <b>'.$studentProp['uusername'].'</b><br>
	'._UCURRENCT_MAJOR.': <b>'.$ucurrent_major.'</b><br>
	'._ULEVEL.': <b>'.$ulevel.'</b><br>
	';
	$content .= '
	</div>
	<div style="width:150px; float:'.$align1.'; margin:10px;">
	'._FANAME.': <b>'.$studentProp['ufaname'].'</b><br>
	'._CARDID.': <b>'.$studentProp['ucardid'].'</b><br>
	</div>
	<br clear="both">
	';
	$factorsTotal = 0;
	$effectiveFactorsTotal = 0;
	$effectiveFactorsTotalScored = 0;
	$canceledFactorsTotal = 0;
	$sumOfFinalScoresTotal = 0;
	$content .= '
	<div id="table-container">';
	$index=1;
		$content .= '
			<table style="border:2px black solid; width:100%;">';
	foreach ($termList as $termInfo)
	{
		$effectiveFactorsTermScored = 0;
		$tid=$termInfo['tid'];

		$content .= '
		';
		$scList = $term->GetTermScoreColumns($tid);
				if($index==1)
					$content .= '
				<tr class="default_font ">
					<td style="width:80px;" class="table_print_header">
						ترم
					</td>
					<td style="width:80px;" class="table_print_header">
						'._CCODE.'
					</td>
					<td style="width:70px;" class="table_print_header">
						'._LCODE.'
					</td>
					<td style="width:150px;" class="table_print_header">
						'._LESSON_NAME.'
					</td>
					<td style="width:100px;" class="table_print_header">
						'._FACTOR.'
					</td>
					<td style="width:80px;" class="table_print_header small">
						'._EFFECT_ON_TERM_AVE.'
					</td>
					<td style="width:80px;" class="table_print_header small">
						'._EFFECT_ON_TOTAL_AVE.'
					</td>
					<td style="width:100px;" class="table_print_header">
						'._TEACHER.'
					</td>
					<td style="width:60px;" class="table_print_header">
						'._SCORE_TYPE.'
					</td>';
		
		//$scList = array_reverse($scList);
		if($index==1)
		{
			// foreach ($scList as $scInfo)
			// {
			// 	$content .= '
			// 			<td style="width:50px;" class="table_print_header">'.$scInfo['sctitle'].'</td>';
			// }
			$content .= '
						<td style="width:50px;" class="table_print_header">
							'._FINAL_SCORE_AFTER_COLUMN_FACTORS.'
						</td>
					</tr>
					';
			
		}
		$index++;
		$courseList = $student->GetStudentCourseList($uid,$termInfo['tid']);
		$i=1;
		$factorsTerm = 0;
		$effectiveFactorsTerm = 0;
		$canceledFactorsTerm = 0;
		$sumOfFinalScoresTerm = 0;
		$scoreColumnArray = array(array());
		$courseNums=count($courseList);
		foreach ($courseList as $courseStudentInfo)
		{
			if($i%2==0)
				$bgCourse = "tr_hover_class";
			else
				$bgCourse = "";
			$content .= '<tr style="height:30px; border-bottom:silver;" class="table_rows default_font '.$bgCourse.' table_rows_border">';
			
			if($i==1)
			{
				$lvgrade = $level->GetLevelInfoById($courseStudentInfo['lvid']);
				$content .= '<td style="text-align:center;" rowspan="'.($courseNums).'">
				'.$lvgrade['lvgrade'].'<br>
				'.$termInfo['tname'].' ('.$termInfo['tcode'].') 
				</td>';
			}
			$content .= '<td style="text-align:center;">
				'.$courseStudentInfo['ccode'].'
				</td>';
				
			$content .= '<td style="text-align:center;">
				'.$courseStudentInfo['lcode'].'
				</td>';
			
			$content .= '<td style="text-align:'.$align1.';">
				'.$courseStudentInfo['lname'].'
				</td>';
			
			$lessonUnits = $lesson->GetLessonUnits($courseStudentInfo['lid']);
			$sumOfLessonUnits = $lesson->GetSumOfUnits($courseStudentInfo['lid']);
			$factorsTotal+=$sumOfLessonUnits;
			$factorsTerm+=$sumOfLessonUnits;
			if ($courseStudentInfo['eff_on_term_avg']==1 && $courseStudentInfo['cucanceled']!=1)
				$effectiveFactorsTerm+=$sumOfLessonUnits;
			if ($courseStudentInfo['eff_on_total_avg']==1 && $courseStudentInfo['cucanceled']!=1)
				$effectiveFactorsTotal+=$sumOfLessonUnits;
			if ($courseStudentInfo['cucanceled']==1)
			{
				$canceledFactorsTotal+=$sumOfLessonUnits;
				$canceledFactorsTerm+=$sumOfLessonUnits;
			}

			$content .= '<td style="text-align:'.$align1.';">
				'.$sumOfLessonUnits.' <small class="help">(';
			foreach ($lessonUnits as $lessonUnit) {
				$content .= $lessonUnit['untitle'].': '.$lessonUnit['lufactor'].' '._UNIT.($lessonUnit!=end($lessonUnits)?' / ':'');
			}
			$content .= ')
				</small></td>';
			$content .= '<td style="text-align:center;">
				'.($courseStudentInfo['eff_on_term_avg']==1?_YES:_NO).'
				</td>';
			$content .= '<td style="text-align:center;">
				'.($courseStudentInfo['eff_on_total_avg']==1?_YES:_NO).'
				</td>';
			$content .= '<td style="text-align:'.$align1.';">
				'.$courseStudentInfo['pfname'].' '.$courseStudentInfo['plname'].'
				</td>';
			$content .= '<td style="text-align:center;">
				<span class="small">'.($courseStudentInfo['descriptive_score']==1?_DESCRIPTIVE:_NONDESCRIPTIVE).'</span>
				</td>';
			$sumOfColumnsFactors = 0;
			$sumOfColumnsScoresMultipliedByFactor = 0;
			
			foreach ($scList as $scInfo)
			{
				$scid = $scInfo['scid'];
				$cuid = $courseStudentInfo['cuid'];
				$studentScore = $cs->GetStudentScoreByColumnID($cuid,$scid);
				$courseColumnScoreFactor = $sc->GetCourseScoreColumnFactor($courseStudentInfo['cid'],$scInfo['scid']);
				if(!($courseColumnScoreFactor===NULL) && !($studentScore['usscore']===NULL) && !($studentScore['usscore']==="") && $courseStudentInfo['descriptive_score']!=1)
				{
					if(!isset($scoreColumnArray[$scid]['sumOfScoreColumnFacors']))
					{
						$scoreColumnArray[$scid]['sumOfScoreColumnFacors']=0;
						$scoreColumnArray[$scid]['sumOfColumnScoreMultipliedByFactor']=0;
					}
					if($courseStudentInfo['eff_on_term_avg']==1)
					{
						$scoreColumnArray[$scid]['sumOfScoreColumnFacors'] += $sumOfLessonUnits;
						$scoreColumnArray[$scid]['sumOfColumnScoreMultipliedByFactor']+=($sumOfLessonUnits*$studentScore['usscore']);
					}

					$sumOfColumnsFactors += $courseColumnScoreFactor['cscfactor'];
					$sumOfColumnsScoresMultipliedByFactor+=($courseColumnScoreFactor['cscfactor']*$studentScore['usscore']);
				}
				$usscore_status = "";
				if($termInfo['grade_active']==0 && $studentScore['usscore']!=="" && $studentScore['usscore']!==NULL)
					$usscore_status = _SCORE_STATUS_2;
				else
					$usscore_status = $cs->GetScoreStatus($studentScore['usscore_status']);
				$usscore_exam_status = $cs->GetScoreExamStatus($studentScore['usscore_exam_status']);
				// $content .= '
				// <td style="text-align:center;">';
				if($courseColumnScoreFactor===NULL)
					// $content .= '-';
					$content .= '';
				else
				{
					if($studentScore['usscore']===NULL || $studentScore['usscore']==="")
						// $content .= '<span class="small">'._SCORE_NOT_AVAILABLE.'</span>';
						$content .= '';
					else
					{
						// $content .= '
						// 	<span title="'._CLICK_TO_SEE_DETAILES.'" class="title"><a class="popover_link" style="cursor:pointer" tabindex="0" role="button" data-trigger="focus" data-placement="bottom" rel="popover"
						// 	data-content="
						// 	'._SCORE_STATUS.': <b>'.$usscore_status.'</b><br>
						// 	'._EXAM_STATUS.': <b>'.$usscore_exam_status.'</b><br>
						// 	'._SCORE_COMMENTS.': '.$studentScore['uscomment'].'<br>';
						if($studentScore['usscore']!=="" && $studentScore['usscore']!==NULL)
						{
							
							$objProp = $obj->GetObjectionInfo($studentScore['usid']);
							// if($termInfo['grade_active']==0)
							// 	// $content .= '<span class="small">'._GRADE_CHANGE_TIME_FINISHED.'.</span>';
							// 	$content .= '';
							// else
							// {
							// 	if($objProp==0)
							// 	{
							// 		if($courseStudentInfo['objection']==1)
							// 		{
							// 			$content .= '<button onclick=\'javascript:send_objection('.$studentScore['usid'].')\' class=\'btn btn btn-warning\'>'._OBJECTION.'</button>';
							// 		}
							// 		else
							// 			$content .= '<button title=\''._OBJECTION_IS_DISABLED.'\' class=\'title btn btn btn-warning\'>'._OBJECTION.'</button>';
							// 	}
							// 	else
							// 	{
							// 		switch($objProp['ostatus'])
							// 		{
							// 			case 1:
							// 				$ostaus = _OBJ_STATUS_1;
							// 				break;
							// 			case 2:
							// 				$ostaus = _OBJ_STATUS_2;
							// 				break;
							// 			case 3:
							// 				$ostaus = _OBJ_STATUS_3;
							// 				break;
							// 		}
							// 		$content .= ''._OBJECTION_STATUS.': <b>'.$ostaus.'</b>';
							// 	}
							// }
						}
						// $content .= '">'.$studentScore['usscore'].'</a></span>';
					}
				}
				// $content .= '
				// </td>
				// ';
			}
			if($courseStudentInfo['descriptive_score']==0)
			{
				$courseFinalScore = GetStudentFinalColumnScore($uid,$courseStudentInfo['cid']);

				//Students Number
				$cid = $courseStudentInfo['cid'];
				$query = " WHERE `".$table_prefix."course_student`.`cid`='$cid' ";
				$order = " ORDER BY `ulname`,`ufname`";
				$courseStudentList = $cs->GetCourseStudentList($query,$order);
				$courseFinalScoreAve = GetCourseFinalScoreAve($cid);
				arsort($userRank);
				$userRank = array_search($uid, array_keys($userRank))+1;
			}
			
			$content .= '
				<td style="text-align:center;">
					'.($courseStudentInfo['descriptive_score']==1?'<span class="small">'._DESCRIPTIVE.'</span>':$courseFinalScore).'
				</td>
			';
			if($courseStudentInfo['cucanceled']!=1 && $courseStudentInfo['descriptive_score']==0 && $courseFinalScore!=NULL)
			{
				if($courseStudentInfo['eff_on_term_avg']==1)
				{
					$effectiveFactorsTermScored+=$sumOfLessonUnits;
					$sumOfFinalScoresTerm += $sumOfLessonUnits*($sumOfColumnsFactors==0?0:round($sumOfColumnsScoresMultipliedByFactor/($score_sum==1?1:$sumOfColumnsFactors),2));
				}
				if($courseStudentInfo['eff_on_total_avg']==1)
				{
					$effectiveFactorsTotalScored+=$sumOfLessonUnits;
					$sumOfFinalScoresTotal += $sumOfLessonUnits*($sumOfColumnsFactors==0?0:round($sumOfColumnsScoresMultipliedByFactor/($score_sum==1?1:$sumOfColumnsFactors),2));
				}
			}
			
			$content .= '
			</tr>';
			$i++;
		}
		/////////////////Column Average
		// $content .= '
		// 	<tr class="default_font ">
		// 		<td colspan="8" class="table_print_header">
		// 			'._COLUMN_AVERAGE.'
		// 		</td>
		// 		';
		$scList = $term->GetTermScoreColumns($tid);
		//$scList = array_reverse($scList);
		foreach ($scList as $scInfo)
		{
			$scid = $scInfo['scid'];
			// $content .= '
			// 	<td style="width:50px;" class="table_print_header">'.(isset($scoreColumnArray[$scid]['sumOfScoreColumnFacors']) && !empty($scoreColumnArray[$scid]['sumOfScoreColumnFacors'])?round($scoreColumnArray[$scid]['sumOfColumnScoreMultipliedByFactor']/$scoreColumnArray[$scid]['sumOfScoreColumnFacors'],2):'').'</td>';
		}
		// $content .= '
		// 		<td colspan="5" class="table_print_header">
		// 		</td>
		// 	</tr>
		// 		';
		/////////////////!Column Average
		$termsAve[$termInfo['tid']]=($effectiveFactorsTerm==0 || $effectiveFactorsTermScored==0?_SCORE_NOT_AVAILABLE:round($sumOfFinalScoresTerm/$effectiveFactorsTermScored,2));
		$content .= '
		<tr style="background-color:#aaa">
			<td colspan="'.(count($scList)+10).'" align="center">
			'._TERM_FACTORS.': '.$factorsTerm.' &nbsp;&nbsp;&nbsp;&nbsp;
			'._TERM_EFFECTIVE_FACTORS.': '.$effectiveFactorsTerm.'&nbsp;&nbsp;&nbsp;&nbsp;
			'._TERM_CANCELED_FACTORS.': '.$canceledFactorsTerm.'&nbsp;&nbsp;&nbsp;&nbsp;
			'._TERM_AVE.': '.$termsAve[$termInfo['tid']].'
			</td>
		</tr>';
	}
	$totalAve = ($effectiveFactorsTotalScored==0?_SCORE_NOT_AVAILABLE:round($sumOfFinalScoresTotal/$effectiveFactorsTotalScored,2));
		$content .= '
		<tr style="background-color:#92D050; border-bottom:silver; font-weight:bold" class="table_rows default_font '.$bgCourse.' table_rows_border">
			<td colspan="'.(count($scList)+10).'" align="center">
			'._TOTAL_FACTORS.': '.$factorsTotal.' &nbsp;&nbsp;&nbsp;&nbsp;
			'._TOTAL_EFFECTIVE_FACTORS.': '.$effectiveFactorsTotal.' &nbsp;&nbsp;&nbsp;&nbsp;
			'._TOTAL_CANCELED_FACTORS.': '.$canceledFactorsTotal.' &nbsp;&nbsp;&nbsp;&nbsp;
			'._TOTAL_AVE.': '.$totalAve.'
			</td>
		</tr>';
		$content .= '
				</table><br>
		<script>
			$(function (){
			 $("a[rel=popover]").popover({title:"'._DETAILES.'",container:"body",trigger:"click",placement:"bottom"});
			});
		</script>
		<style>
		.popover-title { height: 0px; font-size:1px; overflow:hidden}
		</style>
	</div>
	</div>
	';
	$content .= '</div>';
	
	
		$content .= '
		<div class="modal fade" id="send_objection">
		  <div class="modal-dialog">
		    <div class="modal-content">
		        <form action="javascript:addObject()" method="post" name="send_objection_form">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">'._ADD_OBJECTION.'</h4>
		      </div>
		      <div class="modal-body">
					<div id="final_result">
						'._OBJECTION_MESSAGE.':<br>
						<center><textarea name="otext" class="input" id="otext" style="direction:'.$dir.'; width:400px; height:100px;"></textarea><br>
						<input type="hidden" name="usid" id="usid" value="">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        		<button type="submit" class="btn btn-primary">'._ADD_OBJECTION.'</button>
						<div id="obj_result">
						</div>
					</div>
		      </div>
		      <div class="modal-footer">
						'._OBJECTION_MESSAGE_NOTE.'
		      </div>
		    </div><!-- /.modal-content -->
				</form>
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		';
	
	
	$content .= '
		<script type="text/javascript">
			function send_objection(id){
				$("#send_objection").modal()
				document.forms["send_objection_form"].usid.value = id;
				document.forms["send_objection_form"].otext.value = "";
				document.getElementById("obj_result").innerHTML = "";
			}
			function addObject()
			{
				$("#obj_result").html(\'<img src="img/wait.gif">\');
				var usid = $("#usid").val();
				var otext = $("#otext").val();
				$.ajax({
				    url: "aj",
				    type: "POST",
				    data: {op:"add_objection",usid:usid,otext:otext},
				    success: function(data,status){
					    $("#final_result").html(data);
					},
				    error: function(){$("#obj_result").html("Problem in Ajax")}
				});
			}
		</script>
		<center>
			<input type="button" class="btn btn-primary noprint" id="print" value="'._PRINT.'" style="margin-bottom:100px;">
		</center>
		';
	if($action=="print_total")
		echo $content;
	elseif ($action=="say_term")
		return $termsAve[$termID];
	elseif ($action=="say_total")
		return $totalAve;
}

function GetStudentFinalColumnScore($uid,$cid)
{
	global $table_prefix,$course,$cs,$score_sum;
	if(!isset($course)) $course = new ManageCourses();
	if(!isset($cs)) $cs = new ManageCourseStudents();
	$courseInfo = $course->GetCourseInfoById($cid);
	$tid = $courseInfo['tid'];
	$scList = $course->GetCourseScoreColumnsList($cid);
	$sumOfColumnsFactors=0;
	$sumOfColumnsScoresMultipliedByFactor=0;
	$query = " WHERE `".$table_prefix."course_student`.`cid`='$cid' AND `".$table_prefix."course_student`.`uid`='$uid'";
	$order = " ORDER BY `ulname`,`ufname`";
	$courseStudentList = $cs->GetCourseStudentList($query,$order);
	$courseStudentInfo=$courseStudentList[0];
	foreach ($scList as $scInfo)
	{
		$cscfactor = $scInfo['cscfactor'];
		$cscid = $scInfo['cscid'];
		$cuid = $courseStudentInfo['cuid'];
		$studentScore = $cs->GetStudentScore($cuid,$cscid);
		if($courseInfo['descriptive_score']==1 && !is_numeric($studentScore['usscore']))
			return NULL;
		// $courseColumnScoreFactor = $sc->GetCourseScoreColumnFactor($courseStudentInfo['cid'],$scInfo['scid']);
		if($studentScore['usscore']!=NULL && $studentScore['usscore_exam_status']!=3)
		{
			$sumOfColumnsFactors += $cscfactor;
			$sumOfColumnsScoresMultipliedByFactor+=($cscfactor*$studentScore['usscore']);
		}
	}
	if(empty($sumOfColumnsFactors))
		return NULL;
	else
		return round($sumOfColumnsScoresMultipliedByFactor/($score_sum==1?1:$sumOfColumnsFactors),2);
}

function GetCourseFinalScoreAve($cid)
{
	global $table_prefix,$course,$cs;
	global $userRank;
	$userRank=array();
	if(!isset($course)) $course = new ManageCourses();
	if(!isset($cs)) $cs = new ManageCourseStudents();
	$query = " WHERE `".$table_prefix."course_student`.`cid`='$cid' ";
	$order = " ORDER BY `ulname`,`ufname`";
	$courseStudentList = $cs->GetCourseStudentList($query,$order);
	$num_of_course_students=count($courseStudentList);
	$sumOfStudentsFinalScores=0;
	foreach ($courseStudentList as $courseStudentInfo)
	{
		$uid=$courseStudentInfo['uid'];
		$userFinalColumnScore = GetStudentFinalColumnScore($uid,$cid);
		if ($userFinalColumnScore!=NULL)//All Scores are set
		{
			$sumOfStudentsFinalScores+=$userFinalColumnScore;
			$userRank[$uid]=$userFinalColumnScore;
		}
		else
			$num_of_course_students--;
	}
	if ($num_of_course_students==0)
		return 0;
	else
		return round($sumOfStudentsFinalScores/$num_of_course_students,2);
}
// function GetStudentRank($uid,$cid)
// {
// 	global $table_prefix,$course,$cs;
// 	if(!isset($course)) $course = new ManageCourses();
// 	if(!isset($cs)) $cs = new ManageCourseStudents();
// 	$query = " WHERE `".$table_prefix."course_student`.`cid`='$cid' ";
// 	$order = " ORDER BY `ulname`,`ufname`";
// 	$courseStudentList = $cs->GetCourseStudentList($query,$order);
// 	GetStudentFinalColumnScore($uid,$cid)
// }

function changePass()
{
	echo '
	<div class="modal fade" id="change_pass">
	  <div class="modal-dialog">
	    <div class="modal-content">
	        <form action="javascript:changePass()" method="post" name="change_pass_form">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">'._CHANGE_PASSWORD.'</h4>
	      </div>
	      <div class="modal-body">
	        	'._CURRENT_PASSWORD._REQUIRED.':<br><input type="password" name="current_pass" class="form-control" id="current_pass" style="direction:ltr;"><br>
	        	'._NEW_PASSWORD._REQUIRED.':<br><input type="password" name="new_pass" class="form-control" id="new_pass" style="direction:ltr;"><br>
	        	'._CONFIRM_PASSWORD._REQUIRED.':<br><input type="password" name="confirm_pass" class="form-control" id="confirm_pass" style="direction:ltr;"><br>
	        	<div id="pass_result">
	        	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">'._UPDATE.'</button>
	      </div>
	        </form>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
					';
}



function StudentFinancialStatus($uid,$action)
{
	global $system_settings,$theme,$language,$align1,$align2,$uusername_title,$table_prefix,$student,$fee,$distypes;
	if(!isset($student)) $student=new ManageStudents();
	if(!isset($fee)) $fee=new ManageFees();
	$studentProp = $student->GetStudentInfoById($uid);
	$userCoursesFees = $fee->GetUserCoursesFees($uid);
	$userPayments = $fee->GetUserPayments($uid);
	$tids=array();
	$content='';
	$content .= '
	<h3><span class="label label-primary">'._FEE_SUMMARY.' '._STUDENT_TITLE.' '.$studentProp['ufname'].' '.$studentProp['ulname'].'</span></h3>';
	$content .= '
	<span class="label label-danger">'._COURSES_FEES.':</span>
	<table class="table table-bordered">
		<tr style="font-weight:bold; text-align:center">
			<td>'._TNAME.'</td>
			<td style="color:red; width:200px;">'._PAYABLE_FEE.'</td>
		</tr>
		';
	$sum_of_user_course_fees=0;
	foreach ($userCoursesFees as $userCourseFee) {
		$tids[]=$userCourseFee['tid'];
		$sum_of_user_course_fees+=$userCourseFee['total_course_fee'];
		$userCourseFee['total_course_fee_final']=$userCourseFee['total_course_fee'];
		$content .= '
		<tr>
			<td><h4><span class="label label-default">'.$userCourseFee['tname'].'</span></h4>';
		$studentCourseList = $student->GetStudentCourseList($uid,$userCourseFee['tid']);
		$content .= '
				<table class="table table-bordered">
					<tr style="font-weight:bold; text-align:center">
						<td>'._LESSON_NAME.'</td>
						<td>'._COURSE_FEE.'</td>
					</tr>
				';
		foreach ($studentCourseList as $studentCourseInfo) {
			$content .= '
					<tr>
						<td>'.$studentCourseInfo['lname'].'</td>
						<td>'.number_format($fee->GetCourseFee($studentCourseInfo['cid'])).' '._CURRENCY.'</td>
					</tr>
				';
		}
		$content .= '
				</table>';
		$studentTermDiscounts = $fee->GetDiscountList(" WHERE `".$table_prefix."user_discounts`.`uid`=$uid AND `".$table_prefix."user_discounts`.`tid`=".$userCourseFee['tid']);
		if(count($studentTermDiscounts)>0)
		{
			$content .= '
					<span class="label label-success">'._DISCOUNTS.':</span>
					<table class="table table-bordered">
						<tr style="font-weight:bold;">
						<td>'._DISCOUNT_id.'</td>
							<td>'._DISCOUNT_TYPE.'</td>
							<td>'._AMOUNT.'</td>
							<td>'._DEADLINE.'</td>
							<td>پرداخت اقساط</td>
						</tr>
					';
			foreach ($studentTermDiscounts as $studentTermDiscountInfo) {
				if($studentTermDiscountInfo['distype']==2)
				{
					$sum_of_user_course_fees-=($userCourseFee['total_course_fee']*$studentTermDiscountInfo['disbody']/100);
					$userCourseFee['total_course_fee_final']-=($userCourseFee['total_course_fee']*$studentTermDiscountInfo['disbody']/100);
				}
				if($studentTermDiscountInfo['distype']==1)
				{
					$sum_of_user_course_fees-=$studentTermDiscountInfo['disbody'];
					$userCourseFee['total_course_fee_final']-=$studentTermDiscountInfo['disbody'];
				}
				$content .= '
						<tr>
						<td>'.$studentTermDiscountInfo['disid'].'</td>
							<td>'.$distypes[$studentTermDiscountInfo['distype']].'</td>
							<td style="'.($studentTermDiscountInfo['distype']==1 || $studentTermDiscountInfo['distype']==2?'color:green':'').'">'.$studentTermDiscountInfo['disbody'].''.($studentTermDiscountInfo['distype']==2?'% ('.($userCourseFee['total_course_fee']*10/100).' '._CURRENCY.')':'').' '.($studentTermDiscountInfo['distype']==1?_CURRENCY:'').'</td>
							<td>'.($language=='farsi'?substr(G2J($studentTermDiscountInfo['disdeadline'].' 00:00:00'),0,10):$studentTermDiscountInfo['disdeadline']).'</td>';
							if($studentTermDiscountInfo['distype']==3){
							$content .= '
					
								<td>
								<form action="pay2" method="post">
									<input type="hidden" name="disid" value="('.$studentTermDiscountInfo['disid'].') ">
									<input type="hidden" name="amount" value="'.$studentTermDiscountInfo['disbody'].'">';
									if($studentTermDiscountInfo['discheque_passed']==1){
									$content .= '	<center>'._PAY_ok.'</center>';}
									else{
									$content .= '<center><input type="submit" name="pay" value="'._PAY.'" class="btn btn-success btn-sm"></center>';}
									$content .= '
								</form>
								</td>
						</tr>
					';}
			}
			$content .= '
					</table>';
		}
		$content .= '
		<span class="label label-danger">'._USER_COSTS.':</span>
		<table class="table table-bordered">
			<tr style="font-weight:bold; text-align:center">
				<td>'._UCTITLE.'</td>
				<td>'._UCDATE.'</td>
				<td>'._UCCOMMENT.'</td>
				<td style="color:red; width:200px;">'._UCPAYMENT.'</td>
			</tr>
			';
		$sum_of_user_costs=0;
		$userCosts = $fee->GetUserCosts($uid,$userCourseFee['tid']);
		foreach ($userCosts as $userCost) {
			$sum_of_user_costs+=$userCost['ucpayment'];
			$content .= '
			<tr>
				<td>'.$userCost['uctitle'].'</td>
				<td>'.($language=='farsi'?G2J($userCost['ucdate']):$userCost['ucdate']).'</td>
				<td>'.$userCost['uccomment'].'</td>
				<td style="color:red;">'.number_format($userCost['ucpayment'], 0, '.', ',').' '._CURRENCY.'</td>
			</tr>
			';
		}
		$sum_of_user_course_fees+=$sum_of_user_costs;
		$userCourseFee['total_course_fee_final']+=$sum_of_user_costs;
		$content .= '
			<tr>
				<td colspan="3"><b>'._TOTAL_SUM.'</b></td>
				<td style="color:red;"><b>'.number_format($sum_of_user_costs, 0, '.', ',').' '._CURRENCY.'</b></td>
			</tr>
			';
		$content .= '</table>';
		$content .= '
			</td>
			<td style="color:red;">'.number_format($userCourseFee['total_course_fee_final'], 0, '.', ',').' '._CURRENCY.'</td>
		</tr>
		';
	}
		$content .= '
		<tr>
			<td><b>'._TOTAL_SUM.'</b></td>
			<td style="color:red;"><b>'.number_format($sum_of_user_course_fees, 0, '.', ',').' '._CURRENCY.'</b></td>
		</tr>
		';
	$content .= '</table>';
	$userCosts = $fee->GetUserCosts2($uid,$tids);
	if(count($userCosts)>0)
	{
		$content .= '
		<span class="label label-danger">'._USER_COSTS.':</span>
		<table class="table table-bordered">
			<tr style="font-weight:bold; text-align:center">
				<td>'._UCTITLE.'</td>
				<td>'._UCDATE.'</td>
				<td>'._UCCOMMENT.'</td>
				<td style="color:red; width:200px;">'._UCPAYMENT.'</td>
			</tr>
			';
		$sum_of_user_costs=0;
		
		foreach ($userCosts as $userCost) {
			$sum_of_user_costs+=$userCost['ucpayment'];
			$content .= '
			<tr>
				<td>'.$userCost['uctitle'].'</td>
				<td>'.($language=='farsi'?G2J($userCost['ucdate']):$userCost['ucdate']).'</td>
				<td>'.$userCost['uccomment'].'</td>
				<td style="color:red;">'.number_format($userCost['ucpayment'], 0, '.', ',').' '._CURRENCY.'</td>
			</tr>
			';
		}
		$sum_of_user_course_fees+=$sum_of_user_costs;
		$content .= '
			<tr>
				<td colspan="3"><b>'._TOTAL_SUM.'</b></td>
				<td style="color:red;"><b>'.number_format($sum_of_user_costs, 0, '.', ',').' '._CURRENCY.'</b></td>
			</tr>
			';
		$content .= '</table>';
	}
	$content .= '
	<br>
	<br>
	<span class="label label-success">'._USER_PAYMENTS.':</span>
	<table class="table table-bordered">
		<tr style="font-weight:bold; text-align:center">
			<td>'._UPGATEWAY.'</td>
			<td>'._UP_DATE.'</td>
			<td>'._UPTRACK_CODE.'</td>
			<td style="color:green; width:200px;">'._UPPAYMENT.'</td>
		</tr>
		';
	$sum_of_user_payments=0;
	foreach ($userPayments as $userPayment) {
		$sum_of_user_payments+=$userPayment['uppayment'];
		
		
		
		$gateway = ($userPayment['walletacc']==10?_Walletplus
		
		:($userPayment['walletacc']==20?_Walletbn
		
		:($userPayment['upgateway']==1?_GATEWAY1
		
		:($userPayment['upgateway']==2?_GATEWAY2
		:($userPayment['upgateway']==3?_GATEWAY3:_CASH)))));
		$content .= '
		<tr>
			<td style="color:'.($userPayment['walletacc']==10?'green':'red').';">'.$userPayment['upcomment'].'</td>
			<td dir="ltr">'.($language=='farsi'?G2J($userPayment['update']):$userPayment['update']).'</td>
			<td dir="ltr">'.$userPayment['uptrack_code'].'</td>
			
			
			<td style="color:'.($userPayment['walletacc']==10?'green':'red').';">'.number_format($userPayment['uppayment'], 0, '.', ',').' '._CURRENCY.'</td>
		</tr>
		';
	}
	$content .= '
		<tr>
			<td colspan="3"><b>'._TOTAL_SUM.'</b></td>
			<td style="color:green;"><b>'.number_format($sum_of_user_payments, 0, '.', ',').' '._CURRENCY.'</b></td>
		</tr>
		';
	$content .= '</table>';

	//Get Terms that do not have courses but have discounts
	// $tids_string=implode(",", $tids);
	// $studentTermDiscounts = $fee->GetDiscountList(" WHERE `".$table_prefix."user_discounts`.`uid`=$uid  AND `".$table_prefix."user_discounts`.`tid` NOT IN ($tids_string)");
	// if(count($studentTermDiscounts)>0)
	// {
	// 	$content .= '
	// 			<span class="label label-success">'._DISCOUNTS.':</span>
	// 			<table class="table table-bordered">
	// 				<tr style="font-weight:bold;">
	// 					<td>'._DISCOUNT_TYPE.'</td>
	// 					<td>'._AMOUNT.'</td>
	// 					<td>'._DEADLINE.'</td>
	// 				</tr>
	// 			';
	// 	foreach ($studentTermDiscounts as $studentTermDiscountInfo) {
	// 		if($studentTermDiscountInfo['distype']==2)
	// 		{
	// 			$sum_of_user_course_fees-=($userCourseFee['total_course_fee']*10/100);
	// 			$userCourseFee['total_course_fee_final']-=($userCourseFee['total_course_fee']*10/100);
	// 		}
	// 		if($studentTermDiscountInfo['distype']==1)
	// 		{
	// 			$sum_of_user_course_fees-=$studentTermDiscountInfo['disbody'];
	// 			$userCourseFee['total_course_fee_final']-=$studentTermDiscountInfo['disbody'];
	// 		}
	// 		$content .= '
	// 				<tr>
	// 					<td>'.$distypes[$studentTermDiscountInfo['distype']].'</td>
	// 					<td style="'.($studentTermDiscountInfo['distype']==1 || $studentTermDiscountInfo['distype']==2?'color:green':'').'">'.$studentTermDiscountInfo['disbody'].''.($studentTermDiscountInfo['distype']==2?'% ('.($userCourseFee['total_course_fee']*10/100).' '._CURRENCY.')':'').' '.($studentTermDiscountInfo['distype']==1?_CURRENCY:'').'</td>
	// 					<td>'.($language=='farsi'?substr(G2J($studentTermDiscountInfo['disdeadline'].' 00:00:00'),0,10):$studentTermDiscountInfo['disdeadline']).'</td>
	// 				</tr>
	// 			';
	// 	}
	// 	$content .= '
	// 			</table>';
	// }
	
$totalPayableCost = $sum_of_user_payments-$sum_of_user_course_fees;

//$totalPayableCost = $sum_of_user_course_fees-$sum_of_user_payments;
if($system_settings["wallet_status"]==1){
	$fee = new ManageFees();
							$courseList = $fee->GetWallet($uid);
			                foreach ($courseList as $courseStudentInfo)
			                {$wallet=$courseStudentInfo['wallet'];
							
							if($wallet<0){$content .= '	<h4 class="alert alert-danger">'._TOTAL_wallet.': <span style="direction: ltr">‎'.number_format(($wallet), 0, '.', ',').'</span>'._CURRENCY.'<br>میزان اعتبار شما منفی می باشد لطفا برای افزایش اعتبار اقدام نمایید در غیر این صورت خساب کاربری پس از یک هفته مسدود میگردد</h4>';}
							else{	
							$content .= '	<h4 class="alert alert-success">'._TOTAL_wallet.': <span style="direction: ltr">‎'.number_format(($wallet), 0, '.', ',').'</span>'._CURRENCY.'</h4>';}
                            ;}

}
else{
if($totalPayableCost>0)
{
	$content .= '
	<h4 class="alert alert-'.($totalPayableCost>0?'success':'danger').'">'._TOTAL_wallet.': <span style="direction: ltr">‎'.number_format(($totalPayableCost), 0, '.', ',').'</span> +'._CURRENCY.'</h4>';
	}
	else{
			$content .= '
	<h4 class="alert alert-'.($totalPayableCost>0?'success':'danger').'">'._TOTAL_PAYABLE_COST.': <span style="direction: ltr">‎'.number_format(($totalPayableCost), 0, '.', ',').'</span> '._CURRENCY.'</h4>';

		
	}}
	
	if ($action=="print")
		echo $content;
	else if ($action=="say")
		return $totalPayableCost;
}
function Success($message)
{
	echo '<div class="text-dark3 alert-success">'.$message.'.</div>';
}
function Failure($message)
{
	echo '<div class="text-dark3 alert-danger" >'.$message.'!</div>';
}

function getPMs($type,$xid,$start)
{
	global $pm,$page_limit,$align2;

	$pm_count = $pm->GetPMsCount($type,$xid);
	if($pm_count>$page_limit)
	{
		$pages = floor($pm_count/$page_limit)+($pm_count%$page_limit==0?0:1);
		echo '
		<div class="inline-input" style="text-align:'.$align2.'">'.$pm_count.' '._PM.' | 
		'._PAGE.': <select id="page" class="form-control" style="width:70px">';
		for ($i=0; $i < $pages; $i++) { 
			echo '
			<option value="'.$i.'" '.($i==$start?'selected':'').'>'.($i+1).'</option>
			';
		}
		echo '
		</select>
		</div>
		<script>
		$(document).ready(function(){
			$("#page").on("change", function()
			{

				getPMs("getPMs",$("#page").val(),"inbox");
			});
		});
		</script>
		';
	}

	$pms = $pm->GetPMs($type,$xid,($start*$page_limit));
	echo '
			  	<table class="table">
			  		<tr>
			  			<th width="25px"><input type="checkbox" id="checkAllPMs" onclick="Checkbox(\'pms_checkboxes\',this)"></th>
			  			<th>'._PMSUBJECT_HEADER.'</th>
			  			<th>'._PMFROM_HEADER.'</th>
			  			<th>'._PMDATE_HEADER.'</th>
			  		</tr>
			  	';
	foreach ($pms as $pmInfo)
	{
		if ($pmInfo['pmfrom_key']=='pid')
		{
			$teacher = new ManageTeachers();
			$teacherInfo = $teacher->GetTeacherInfoById($pmInfo['pmfrom_id']);
			$pmfrom = $teacherInfo['pcode'].' ('._TEACHER.': '.$teacherInfo['pfname'].' '.$teacherInfo['plname'].') ';
		}
		elseif ($pmInfo['pmfrom_key']=='aid')
		{
			$admin = new ManageAdmins();
			$adminInfo = $admin->GetAdminInfoById($pmInfo['pmfrom_id']);
			$pmfrom = $adminInfo['ausername'].' ('._ADMIN.': '.$adminInfo['afname'].' '.$adminInfo['alname'].') ';
		}
		elseif ($pmInfo['pmfrom_key']=='uid' || $pmInfo['pmfrom_key']=='prid') {
			$student = new ManageStudents();
			$studentInfo = $student->GetStudentInfoById($pmInfo['pmfrom_id']);
			$pmfrom = $studentInfo['uusername'].' ('.($pmInfo['pmfrom_key']=='prid'?_PARENT_OF:'').' '._STUDENT.': '.$studentInfo['ufname'].' '.$studentInfo['ulname'].') ';
		}
		else
			$pmfrom = 'N/A';
		echo '
					<tr>
						<td><input type="checkbox" value="'.$pmInfo['pmid'].'" class="pms_checkboxes"></td>
			  			<td><a href="javascript:loadPM('.$pmInfo['pmid'].')" '.(empty($pmInfo['pmread'])?'style="font-weight:bold;"':'').'>'.$pmInfo['pmsubject'].'</a></td>
			  			<td>'.$pmfrom.'</td>
			  			<td dir="ltr">'.G2J($pmInfo['pmdate']).'</td>
			  		</tr>
		';
	}

	echo '
			</table>
			<input type="button" id="deleteSelectedPMs" onclick="delPMs(\'pms_checkboxes\',\'inbox\',\'getPMs\')" value="'._DELETE_SELECTED.'" class="btn btn-danger small" style="display:none">
			<script>
			$(document).ready(function(){
				$("input[type=checkbox]").click(function()
				{
					$("#deleteSelectedSentPMs").show();
					$("#deleteSelectedPMs").show();
				});
			});
			function delPMs(className,resultDIV,op)
			{
				if(confirm("'._ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_PM.'"))
				{
					var selectedItems = $("."+className+":checkbox:checked").map(function() {
					    $.ajax({
					        url: "aj",
					        type: "POST",
					        data: {op:"delPM",pmid:this.value},
					        success: function(data,status){
					    	},
					        error: function(){$("#"+resultDIV).html("Problem in Ajax")}
					    });
					    getPMs(op,0,resultDIV);
					}).get();
				}
			}
			</script>';
	
}

function getSentPMs($type,$xid,$start)
{
	global $pm,$page_limit,$align2;

	$pm_count = $pm->GetSentPMsCount($type,$xid);
	if($pm_count>$page_limit)
	{
		$pages = floor($pm_count/$page_limit)+($pm_count%$page_limit==0?0:1);
		echo '
		<div class="inline-input" style="text-align:'.$align2.'">'.$pm_count.' '._PM.' | 
		'._PAGE.': <select id="page_sent" class="form-control" style="width:70px">';
		for ($i=0; $i < $pages; $i++) { 
			echo '
			<option value="'.$i.'" '.($i==$start?'selected':'').'>'.($i+1).'</option>
			';
		}
		echo '
		</select>
		</div>
		<script>
		$(document).ready(function(){
			$("#page_sent").on("change", function() {

				getPMs("getSentPMs",$("#page_sent").val(),"sent");
			});
			$("input[type=checkbox]").click(function()
			{
				$("#deleteSelectedSentPMs").show();
				$("#deleteSelectedPMs").show();
			});
		});
		</script>
		';
	}

	$sent_pms = $pm->GetSentPMs($type,$xid,($start*$page_limit));
	echo '
			  	<table class="table">
			  		<tr>
			  			<th width="25px"><input type="checkbox" id="checkAllSentPMs" onclick="Checkbox(\'sent_pms_checkboxes\',this)"></th>
			  			<th>'._PMSUBJECT_HEADER.'</th>
			  			<th>'._PMTO_HEADER.'</th>
			  			<th>'._PMDATE_HEADER.'</th>
			  		</tr>
			  	';
	foreach ($sent_pms as $pmInfo)
	{
		if ($pmInfo['pmto_key']=='pid')
		{
			$teacher = new ManageTeachers();
			$teacherInfo = $teacher->GetTeacherInfoById($pmInfo['pmto_id']);
			$pmto = $teacherInfo['pcode'].' ('._TEACHER.': '.$teacherInfo['pfname'].' '.$teacherInfo['plname'].') ';
		}
		elseif ($pmInfo['pmto_key']=='aid')
		{
			$admin = new ManageAdmins();
			$adminInfo = $admin->GetAdminInfoById($pmInfo['pmto_id']);
			$pmto = $adminInfo['ausername'].' ('._ADMIN.': '.$adminInfo['afname'].' '.$adminInfo['alname'].') ';
		}
		elseif ($pmInfo['pmto_key']=='uid' || $pmInfo['pmto_key']=='prid')
		{
			$student = new ManageStudents();
			$studentInfo = $student->GetStudentInfoById($pmInfo['pmto_id']);
			$pmto = $studentInfo['uusername'].' ('.($pmInfo['pmto_key']=='prid'?_PARENT_OF.' ':'')._STUDENT.': '.$studentInfo['ufname'].' '.$studentInfo['ulname'].') ';
		}
		else
			$pmto = 'N/A';
		echo '
					<tr>
						<td><input type="checkbox" value="'.$pmInfo['pmid'].'" class="sent_pms_checkboxes"></td>
			  			<td><a href="javascript:loadSentPM('.$pmInfo['pmid'].')" '.(empty($pmInfo['pmread'])?'style="font-weight:bold;"':'').'>'.$pmInfo['pmsubject'].'</a></td>
			  			<td>'.$pmto.'</td>
			  			<td dir="ltr">'.G2J($pmInfo['pmdate']).'</td>
			  		</tr>
		';
	}

	echo '
				</table>
				<input type="button" id="deleteSelectedSentPMs" onclick="delPMs(\'sent_pms_checkboxes\',\'sent\',\'getSentPMs\')" value="'._DELETE_SELECTED.'" class="btn btn-danger small" style="display:none">';
	
}
function ForumPost($avatar,$post_float="left",$fullname="",$quote="",$message="",$date,$edited=0,$new=0,$cfid,$show_edit=0,$show_delete=0)
{
	echo '
	<div class="forum_post" style="" id="post'.$cfid.'">
		<div class="avatar" style="float: '.$post_float.'; margin:3px; border:1px solid gray; border-radius:50%; background-image:url('.$avatar.'); background-size:cover; width:35px; height:35px;"></div>';
	
	echo '
		<div class="forum_post_message col-md-8" style="float:'.$post_float.'; padding:10px; min-height:80px; background-color:'.($new==1?'#FFF7E5; transition:background-color 3s;':'#FFF;').' border-radius:5px; margin:3px; margin-bottom:10px;">
			<small class="label label-default">'.$fullname.'</small><br>
		 	'.$quote.'<div id="postmessage'.$cfid.'">'.$message.'</div><br>
			<br><div class="" style="color:gray; text-align:left; direction:ltr"> <span style="cursor:pointer;" onclick="AddQuote(\''.substr(strip_tags($message),0,20).'...\',\'t\'); $(\'#reply_to\').val(\''.$cfid.'\'); $(\'#message\').focus()" class="glyphicon glyphicon-share-alt"></span> '.($show_edit==1?'<span style="cursor:pointer;" onclick="EditPost('.$cfid.')" class="glyphicon glyphicon-pencil"></span>':'').' '.($show_delete==1?'<span style="cursor:pointer;" onclick="DeletePost('.$cfid.')" class="glyphicon glyphicon-trash"></span>':'').' '.G2J($date).' '.($edited==1?'edited':'').'</div>
		</div>
	</div><br clear="both">';
}
function LoadForumPosts($cid,$cfid,$start,$previous=0)
{
	global $pid,$uid,$student,$teacher,$align1,$page_limit,$addr;
	if(file_exists('img/teacher.png'))
		$addr='';
	else
		$addr='../';

	if(!isset($forum)) $forum = new ManageForums();
	$postList = $forum->GetPostList($query="WHERE cid=$cid".($start==NULL?" AND cfid>$cfid":""),($start==NULL?0:$start),$page_limit);
	$postList = array_reverse($postList);
	foreach ($postList as $postInfo)
	{
		if(empty($postInfo['uid']))
		{
			if(file_exists($addr.'img/teachers/'.$postInfo['pid'].$postInfo['ppic']))
				$avatar = $addr.'img/teachers/'.$postInfo['pid'].$postInfo['ppic'];
			else
				$avatar = $addr.'img/teacher.png';
		}
		elseif(empty($postInfo['pid']))
		{
			if(file_exists($addr.'img/students/'.$postInfo['uid'].$postInfo['upic']))
				$avatar = $addr.'img/students/'.$postInfo['uid'].$postInfo['upic'];
			else
				$avatar = $addr.'img/student.png';
		}
		$post_float=($pid==$postInfo['pid']?'right':'left');
		if(empty($postInfo['uid']))
			$fullname = $postInfo['pcode'].' ('.$postInfo['pfname'].' '.$postInfo['plname'].')';
		else
			$fullname = $postInfo['uusername'].' ('.$postInfo['ufname'].' '.$postInfo['ulname'].')';
		$message=preparePostForum($postInfo['message']);
		$date=$postInfo['date'];
		$edited=$postInfo['edited'];
		$quote="";
		if(!empty($postInfo['reply_to']))
		{
			$replyInfo = $forum->GetPostInfoById($postInfo['reply_to']);
			if(empty($postInfo['uid']))
			{
				if(!isset($teacher)) $teacher = new ManageTeachers();
				$replyerInfo = $teacher->GetTeacherInfoById($replyInfo['pid']);
				$replyerInfo=$replyerInfo['pfname'].' '.$replyerInfo['plname'].'('.$replyerInfo['pcode'].')';
			}
			else
			{
				if(!isset($student)) $student = new ManageStudents();
				$replyerInfo = $student->GetStudentInfoById($replyInfo['uid']);
				$replyerInfo=$replyerInfo['ufname'].' '.$replyerInfo['ulname'].'('.$replyerInfo['uusername'].')';
				
			}
			$quote = '<div style="font-style:italic; border-'.$align1.':15px solid #0275D8; padding-'.$align1.':5px; margin-'.$align1.':5px;">'.$replyerInfo.': '.substr($replyInfo['message'],0,20).'...</div>';
		}
		$show_edit=($pid==$postInfo['pid'] || $uid==$postInfo['uid']?1:0);
		$show_delete=($pid==$postInfo['pid'] || $uid==$postInfo['uid']?1:0);
		ForumPost($avatar,$post_float,$fullname,$quote,$message,$date,$edited,$new=1,$postInfo['cfid'],$show_edit,$show_delete);
	}
	if(count($postList) && $previous==0)
		echo '
	<script>
	$(document).ajaxComplete(function(){
	    $(".forum_post_message").css({"background-color": "#FFFFFF"});
	    $("#last_cfid").val("'.$postList[count($postList)-1]['cfid'].'");
	});
	</script>
	';
	if(count($postList) && $previous==1)
		echo '
	<script>
	setTimeout(function(){
	    $(".forum_post_message").css({"background-color": "#FFFFFF"});
	},1000);
	</script>
	';
}
function ForumScripts($cid)
{
	global $forum_interval,$page_limit;
	echo '
	<script>
		$(document).ready(function(){
			$("#container").css({"width":"100%","margin":"0px"});
			$(".jumbotron").css({"padding":"10px"});
			$("#profile_timer").hide();
			$("#contentEditable").hide();
			$("#drag-handle").hide();
			$("h3").css({"margin":"0px","margin-bottom":"10px"});
			Scroll();
			$("#message").keydown(function (e) {
				if (e.ctrlKey && e.keyCode == 13) {
					$("#reply_forum").submit();
				}
			});
		})
		function Scroll(dir="down"){
			if(dir=="up")
				$("#main_forum_container").animate({ scrollTop: 0 }, 600);
			else
				$("#main_forum_container").animate({ scrollTop: $("#main_forum_container")[0].scrollHeight }, 600);
		}
		setInterval(function(){
			$("#waiting").html(\'<img src="'.$addr.'img/wait.gif">\');
			var last_cfid = $("#last_cfid").val();
			$.ajax({
			    url: "aj",
			    type: "POST",
			    data: {op:"load_forum_posts",cid:"'.$cid.'",last_cfid:last_cfid,start:null,previous:0},
			    success: function(data,status){
			    	$("#waiting").html(\'\');
				    $("#main_forum_container").append(data);
			    	if(data!="")
				    	Scroll();
				},
			    error: function(){}
			});
		},'.(isset($forum_interval)?$forum_interval:15000).');
		function PostForumMessage(){
			$("#waiting").html(\'<img src="'.$addr.'img/wait.gif">\');
			var last_cfid = $("#last_cfid").val();
			var message = $("#message").val();
			var reply_to = $("#reply_to").val();
			var edit = $("#edit").val();
			var edit_cfid = $("#edit_cfid").val();
			$.ajax({
			    url: "aj",
			    type: "POST",
			    data: {op:"post_forum_message",cid:"'.$cid.'",last_cfid:last_cfid,message:message,reply_to:reply_to,edit:edit,edit_cfid:edit_cfid},
			    success: function(data,status){
			    	$("#waiting").html(\'\');
			    	$("#reply_div").html(\'\');
			    	$("#message").val(\'\');
			    	$("#edit").val(0);
			    	if(edit==1)
			    	{
			    		var edit_cfid = $("#edit_cfid").val();
			    		message = message.replace(/\n/g, "<br>");
						$("#postmessage"+edit_cfid).html(message);
						$("#postmessage"+edit_cfid).css({"background-color":"#FFF7E5"});
						setTimeout(function(){
						  $("#postmessage"+edit_cfid).css({"background-color":"#FFFFFF"});
						}, 2000);
			    	}
			    	else
			    	{
					    $("#main_forum_container").append(data);
					    Scroll();
			    	}
				},
			    error: function(){$("#waiting").html("Problem in Ajax");Scroll()}
			});
		}
		function LoadPreviousPosts(cid,start)
		{
			$.ajax({
			    url: "aj",
			    type: "POST",
			    data: {op:"load_forum_posts",cid:cid,last_cfid:null,start:start,previous:1},
			    success: function(data,status){
			    	$("#load_more").remove();
			    	if(data!="")
			    	{
					    $("#main_forum_container").prepend(data);
					    $("#main_forum_container").prepend("<div style=\"text-align:center; direction:ltr\" id=\"load_more\"><a href=\"javascript:LoadPreviousPosts("+cid+","+(cfid-'.$page_limit.')+"\">Load more...</a></div>");
			    	}
				},
			    error: function(){$("#waiting").html("Problem in Ajax");Scroll()}
			});
		}
		function AddQuote(text,reply_to)
		{
			$("#reply_div").html(text+" <span class=\'glyphicon glyphicon-remove\' onclick=\'RemoveQuote()\'></span>");
			$("#reply_to").val(reply_to);
		}
		function RemoveQuote()
		{
			$("#reply_div").html("");
			$("#reply_to").val(null);
		}
		function DeletePost(cfid)
		{
			if(confirm(\''._ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_PM.'\'))
			{
				$.ajax({
				    url: "aj",
				    type: "POST",
				    data: {op:"delete_post",cfid:cfid},
				    success: function(data,status){
				    	$("#post"+cfid).slideUp();
					},
				    error: function(){$("#waiting").html("Problem in Ajax");Scroll()}
				});
			}
		}
		function EditPost(cfid)
		{
			$.ajax({
			    url: "aj",
			    type: "POST",
			    data: {op:"edit_post",cfid:cfid},
			    success: function(data,status){
			    	$("#message").val(data);
			    	$("#edit").val(1);
			    	$("#edit_cfid").val(cfid);
				},
			    error: function(){$("#waiting").html("Problem in Ajax");Scroll()}
			});
		}
	</script>
	';
}
function preparePostForum($value='')
{
	$value=nl2br($value);
	$url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i'; 
	$value = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $value);
	return $value;
}
?>