<?php

 include_once('class.database.php');

 class ManageSettings
 { public $link; function __construct() 
 { $db_connection = new dbConnection(); $this->link = $db_connection->connect(); return $this->link; }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 function UpdateSettings($system_title, $institute_name, $student_register, $register_cost, $allow_user_modify_profile, $student_select_unit,$maximum_units, $student_select_unit_in_shortage,
 $student_select_unit_minimum_balance
 , $student_view_result_in_dept, $parent_panel, $schedule_button, $card_button, $result_button, $fee_button, $sms_panel, $sms_teachers
 , $sms_panel_url, $sms_panel_number, $sms_panel_username, $sms_panel_password, $language, $dir, $theme, $jamaa_active, $files_final_size, 
 $bulk_email, $uusername_title, $ufname_status, $ulname_status, $ufaname_status, $uemail_status, $ugender_status, $ustatus_status, $ubirthdate_status, $ucardid_status, 
 $ucard_place_status, $udegree_status, $umajor_status, $uarmy_status, $ujob_status, $uskills_status, $uhome_address_status, $uhome_zipcode_status, $uhome_tel_status, 
 $uwork_address_status, $uwork_zipcode_status, $uwork_tel_status, $umobile_status, $upic_status, 
 $unewsletter_status, $gateway1_key, $gateway2_key, $gateway3_key, $aid) 
 { global $table_prefix; $query = $this->link->prepare
 ("UPDATE `".$table_prefix."settings` SET `system_title`=?, `institute_name`=?, `student_register`=?, `register_cost`=?, `allow_user_modify_profile`=?,
 `student_select_unit`=?, `maximum_units`=?, `student_select_unit_in_shortage`=?, `student_select_unit_minimum_balance`=?
 , `student_view_result_in_dept`=?, `parent_panel`=?, `schedule_button`=?, `card_button`=?, `result_button`=?, `fee_button`=?
 , `sms_panel`=?, `sms_teachers`=?, `sms_panel_url`=?, `sms_panel_number`=?, `sms_panel_username`=?, `sms_panel_password`=?, `language`=?, `dir`=?, `theme`=?, `jamaa_active`=?
 , `files_final_size`=?, `bulk_email`=?, `uusername_title`=?, `ufname_status`=?, `ulname_status`=?, `ufaname_status`=?, `uemail_status`=?, `ugender_status`=?, `ustatus_status`=?
 , `ubirthdate_status`=?, `ucardid_status`=?, `ucard_place_status`=?, `udegree_status`=?, `umajor_status`=?, `uarmy_status_status`=?, `ujob_status`=?, `uskills_status`=?
 , `uhome_address_status`=?, `uhome_zipcode_status`=?, `uhome_tel_status`=?, `uwork_address_status`=?, `uwork_zipcode_status`=?, `uwork_tel_status`=?, `umobile_status`=?
 , `upic_status`=?, `unewsletter_status`=?, `gateway1_key`=?, `gateway2_key`=?, `gateway3_key`=?, `aid`=? WHERE `id`=1"); $values = array($system_title, $institute_name
 , $student_register, $register_cost, $allow_user_modify_profile, $student_select_unit,$maximum_units, $student_select_unit_in_shortage, $student_select_unit_minimum_balance
 , $student_view_result_in_dept, $parent_panel, $schedule_button, $card_button, $result_button, $fee_button, $sms_panel, $sms_teachers, $sms_panel_url, $sms_panel_number
 , $sms_panel_username, $sms_panel_password, $language, $dir, $theme, $jamaa_active, $files_final_size, $bulk_email, $uusername_title, $ufname_status, $ulname_status
 , $ufaname_status, $uemail_status, $ugender_status, $ustatus_status, $ubirthdate_status, $ucardid_status, $ucard_place_status, $udegree_status, $umajor_status
 , $uarmy_status, $ujob_status, $uskills_status, $uhome_address_status, $uhome_zipcode_status, $uhome_tel_status, $uwork_address_status, $uwork_zipcode_status
 , $uwork_tel_status, $umobile_status, $upic_status, $unewsletter_status, $gateway1_key, $gateway2_key, $gateway3_key, $aid); $query->execute($values); 
 $counts = $query->rowCount(); return $counts; }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




 function UpdateMessages($user_homepage_message,$users_message,$teachers_message,$admins_message,$exam_card_bottom_message,$maintenance_pm,$aid)
 { global $table_prefix; $query = $this->link->prepare("UPDATE `".$table_prefix."settings` SET `user_homepage_message`=?, `users_message`=?, `teachers_message`=?
 , `admins_message`=?, `exam_card_bottom_message`=?, `maintenance_pm`=?,`aid`=? WHERE `id`=1"); $values = array($user_homepage_message,$users_message,$teachers_message,$admins_message,$exam_card_bottom_message,$maintenance_pm,$aid); $query->execute($values); $counts = $query->rowCount(); return $counts; } 
 
 
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




  function maintenance($maintenance,$sms_admin_addpaymen,$sms_admin_login,$wallet_status,$aid) 
 { global $table_prefix; $query = $this->link->prepare
 ("UPDATE `".$table_prefix."settings` SET `maintenance`=?, `sms_admin_addpaymen`=?, `sms_admin_login`=?, `wallet_status`=?, `aid`=? WHERE `id`=1"); $values = array($maintenance, $sms_admin_addpaymen, $sms_admin_login, $wallet_status, $aid); $query->execute($values); 
 $counts = $query->rowCount(); return $counts; }
 
 
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 function SystemSettings() { global $table_prefix,$site_key; 
 $query = $this->link->query("SELECT * FROM `".$table_prefix."settings` ORDER BY `id` DESC LIMIT 0,1"); $counts = $query->rowCount(); if($counts>=1) 
 { $result = $query->fetchAll(); return $result[0]; } else { return $counts; } }


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 function CheckSiteKey() 
 {return -1;} 
 
 
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 function IsPaidPanel() {return 1;}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 function ShowCR() {}} 
 
 
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 function get_domain() {} 
 
 
 ?>