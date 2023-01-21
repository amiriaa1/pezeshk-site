<?php 

include_once('class.database.php'); 

class ManageAdmins { public $link; function __construct() { global $table_prefix; $db_connection = new dbConnection(); $this->link = $db_connection->connect(); return $this->link; }

function AddAdmin($aid,$ausername,$apass,$aactive,$afname,$alname,$aemail,$atel,$apic,$astudents_can_send_pm,$allow_term_add, $allow_term_list, $allow_term_edit,
 $allow_term_del, $allow_class_add, $allow_class_list, $allow_class_edit, $allow_class_del, $allow_lesson_add, $allow_lesson_list, $allow_lesson_edit,
 $allow_lesson_del, $allow_teacher_add, $allow_teacher_list, $allow_teacher_edit, $allow_teacher_del, $allow_course_add, $allow_course_list, $allow_course_edit,
 $allow_course_del, $allow_student_add, $allow_student_list, $allow_student_edit, $allow_student_del, $allow_cs_add, $allow_cs_list, $allow_cs_edit, $allow_cs_del,
 $allow_score_add, $allow_score_list, $allow_chair_manage, $allow_financial_management, $allow_admins_add, $allow_admins_list, $allow_admins_edit, $allow_admins_del,
 $allow_settings, $allow_homepage_message, $acomment, $admin_id, $atimestamp, $allow_financial_management_user, $voucher_list, $shop_list, $add_product) 
 
 { global $table_prefix; $query = $this->link->prepare("INSERT INTO `".$table_prefix."admins` (`ausername`, `apass`, `aactive`, `afname`, `alname`, `aemail`, `atel`, `apic`, `astudents_can_send_pm`, `allow_term_add`, `allow_term_list`, `allow_term_edit`,
 `allow_term_del`, `allow_class_add`, `allow_class_list`, `allow_class_edit`, `allow_class_del`, `allow_lesson_add`, `allow_lesson_list`, `allow_lesson_edit`,
 `allow_lesson_del`, `allow_teacher_add`, `allow_teacher_list`, `allow_teacher_edit`, `allow_teacher_del`, `allow_course_add`, `allow_course_list`, `allow_course_edit`,
 `allow_course_del`, `allow_student_add`, `allow_student_list`, `allow_student_edit`, `allow_student_del`, `allow_cs_add`, `allow_cs_list`, `allow_cs_edit`, `allow_cs_del`,
 `allow_score_add`, `allow_score_list`, ` `allow_chair_manage`, `allow_financial_management`, `allow_admins_add`, `allow_admins_list`, `allow_admins_edit`, `allow_admins_del`,
 `allow_settings`, `allow_homepage_message`, `acomment`, `admin_id`, `atimestamp`, `allow_financial_management_user`, `voucher_list`, `shop_list`, `add_product`)
 VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) "); $values = array($ausername,$apass,$aactive,$afname,$alname,$aemail,$atel,$apic,$astudents_can_send_pm,$allow_term_add, $allow_term_list, $allow_term_edit, $allow_term_del, $allow_class_add, $allow_class_list, $allow_class_edit, $allow_class_del, $allow_lesson_add, $allow_lesson_list, $allow_lesson_edit, $allow_lesson_del, $allow_teacher_add, $allow_teacher_list, $allow_teacher_edit, $allow_teacher_del, $allow_course_add, $allow_course_list, $allow_course_edit, $allow_course_del, $allow_student_add, $allow_student_list, $allow_student_edit, $allow_student_del, $allow_cs_add, $allow_cs_list, $allow_cs_edit, $allow_cs_del, $allow_score_add, $allow_score_list, $allow_score_edit, $allow_chair_manage,$allow_financial_management, $allow_admins_add, $allow_admins_list, $allow_admins_edit, $allow_admins_del, $allow_settings, $allow_homepage_message, $acomment, $aid, $allow_financial_management_user); for($i=9;$i<48;$i++) if(empty($values[$i])) $values[$i]=0; $query->execute($values); $counts = $query->rowCount(); return $counts; }



function Addadminloginlog($username, $ip, $message) { global $table_prefix; $query = $this->link->prepare("INSERT INTO `log_admin_login` (`admin_id`,`admin_ip`,`login_status`,`login_page`) VALUES (?,?,?,?) "); $values = array($username, $ip, $message,'Backend');  $query->execute($values); $counts = $query->rowCount(); return $counts; }


function adminindexstatus($query) { global $table_prefix; $query = $this->link->query("SELECT SUM(uppayment) AS uppaymentsum FROM nim_user_payments"); $counts = $query->rowCount(); if($counts>=1) { $result = $query->fetchAll(); return $result; } else { return $counts; } } 


function Username2AID($ausername) { global $table_prefix; $query = $this->link->query("SELECT `aid` FROM `".$table_prefix."admins` WHERE `ausername`='$ausername'"); $result = $query->fetchAll(); return $result[0]['aid']; } 
///////////////////////////////////////////////////////////
function UpdateAdmin(
$aid,$ausername,$apass,$aactive,$afname,$alname,$aemail,$atel,$apic,$astudents_can_send_pm,$allow_term_add, $allow_term_list, $allow_term_edit,
 $allow_term_del, $allow_class_add, $allow_class_list, $allow_class_edit, $allow_class_del, $allow_lesson_add, $allow_lesson_list, $allow_lesson_edit,
 $allow_lesson_del, $allow_teacher_add, $allow_teacher_list, $allow_teacher_edit, $allow_teacher_del, $allow_course_add, $allow_course_list, $allow_course_edit,
 $allow_course_del, $allow_student_add, $allow_student_list, $allow_student_edit, $allow_student_del, $allow_cs_add, $allow_cs_list, $allow_cs_edit, $allow_cs_del,
 $allow_score_add, $allow_score_list, $allow_chair_manage, $allow_financial_management, $allow_admins_add, $allow_admins_list, $allow_admins_edit, $allow_admins_del,
 $allow_settings, $allow_homepage_message, $acomment, $admin_id, $atimestamp, $allow_financial_management_user, $voucher_list, $shop_list, $add_product
){ global $table_prefix; $query = $this->link->prepare("UPDATE `".$table_prefix."admins` SET  `ausername`=?, `apass`=?, `aactive`=?, `afname`=?, `alname`=?, `aemail`=?, `atel`=?, `apic`=?, `astudents_can_send_pm`=?, `allow_term_add`=?, `allow_term_list`=?, `allow_term_edit`=?,
 `allow_term_del`=?, `allow_class_add`=?, `allow_class_list`=?, `allow_class_edit`=?, `allow_class_del`=?, `allow_lesson_add`=?, `allow_lesson_list`=?, `allow_lesson_edit`=?,
 `allow_lesson_del`=?, `allow_teacher_add`=?, `allow_teacher_list`=?, `allow_teacher_edit`=?, `allow_teacher_del`=?, `allow_course_add`=?, `allow_course_list`=?, `allow_course_edit`=?,
 `allow_course_del`=?, `allow_student_add`=?, `allow_student_list`=?, `allow_student_edit`=?, `allow_student_del`=?, `allow_cs_add`=?, `allow_cs_list`=?, `allow_cs_edit`=?, `allow_cs_del`=?,
 `allow_score_add`=?, `allow_score_list`=?, ` `allow_chair_manage`=?, `allow_financial_management`=?, `allow_admins_add`=?, `allow_admins_list`=?, `allow_admins_edit`=?, `allow_admins_del`=?,
 `allow_settings`=?, `allow_homepage_message`=?, `acomment`=?, `admin_id`=?, `atimestamp`=?, `allow_financial_management_user`=?, `voucher_list`=?, `shop_list`=?, `add_product`=?");
 $values = array($ausername,$apass,$aactive,$afname,$alname,$aemail,$atel,$apic,$astudents_can_send_pm,$allow_term_add, $allow_term_list, $allow_term_edit,
 $allow_term_del, $allow_class_add, $allow_class_list, $allow_class_edit, $allow_class_del, $allow_lesson_add, $allow_lesson_list, $allow_lesson_edit,
 $allow_lesson_del, $allow_teacher_add, $allow_teacher_list, $allow_teacher_edit, $allow_teacher_del, $allow_course_add, $allow_course_list, $allow_course_edit,
 $allow_course_del, $allow_student_add, $allow_student_list, $allow_student_edit, $allow_student_del, $allow_cs_add, $allow_cs_list, $allow_cs_edit, $allow_cs_del,
 $allow_score_add, $allow_score_list, $ $allow_chair_manage, $allow_financial_management, $allow_admins_add, $allow_admins_list, $allow_admins_edit, $allow_admins_del,
 $allow_settings, $allow_homepage_message, $acomment, $admin_id, $atimestamp, $allow_financial_management_user, $voucher_list, $shop_list, $add_product); for($i=8;$i<51;$i++) 
 if(empty($values[$i])) $values[$i]=0; $query->execute($values); $counts = $query->rowCount(); return $counts; } 

/////////////////////////////////////////////////////////////////////////////////

function ResetPassword($aid,$apass) { global $table_prefix; $apass = md5($apass); $query = $this->link->prepare("UPDATE `".$table_prefix."admins` SET `apass`=? WHERE `aid`=?"); $values = array($apass,$aid); $query->execute($values); $counts = $query->rowCount(); return $counts; }

function UserResetPassword($email,$apass) { global $table_prefix; $apass = md5($apass); $query = $this->link->prepare("UPDATE `".$table_prefix."admins` SET `apass`=? WHERE `aemail`=?"); $values = array($apass,$email); $query->execute($values); $counts = $query->rowCount(); return $counts; }

function ChangePassword($aid,$current_pass,$new_pass) { global $table_prefix; $current_pass = md5($current_pass); $new_pass = md5($new_pass); $query = $this->link->prepare("SELECT * FROM `".$table_prefix."admins` WHERE `aid`=? AND `apass`=?"); $values = array($aid,$current_pass); $query->execute($values); $counts = $query->rowCount(); if($counts==1) { $query = $this->link->prepare("UPDATE `".$table_prefix."admins` SET `apass`=? WHERE aid=?"); $values = array($new_pass,$aid); $query->execute($values); $counts = $query->rowCount(); if($counts==1) return 2; else return 3; } else return 1; }

function LoginAdmin($username,$password) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."admins` WHERE `ausername`=? AND `apass`=?"); $values = array($username,$password); $query->execute($values); $counts = $query->rowCount(); return $counts; }

function GetAdminInfo($username) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."admins` WHERE `ausername`=?"); $values = array($username); $query->execute($values); $counts = $query->rowCount(); if($counts==1) { $result = $query->fetchAll(); return $result[0]; } else { return $counts; } } 

function GetAdminInfoById($aid) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."admins` WHERE `aid`=?"); $values = array($aid); $query->execute($values); $counts = $query->rowCount(); if($counts==1) { $result = $query->fetchAll(); return $result[0]; } else { return $counts; } }

function GetAdminList($query) { global $table_prefix; $query = $this->link->query("SELECT * FROM `".$table_prefix."admins` $query ORDER BY `aid` DESC"); $counts = $query->rowCount(); if($counts>=1) { $result = $query->fetchAll(); return $result; } else { return $counts; } } 

function GetAdminList2($query,$start,$limit) { global $table_prefix; $query = $this->link->query("SELECT * FROM `".$table_prefix."admins` $query ORDER BY `aid` DESC LIMIT $start,$limit"); $counts = $query->rowCount(); if($counts>=1) { $result = $query->fetchAll(); return $result; } else { return $counts; } } 

function UsernameAvailability($username) { global $table_prefix; if(preg_match('/^[a-z\d_]{1,50}$/i', $username)) { $query = $this->link->prepare("SELECT * FROM `".$table_prefix."admins` WHERE `ausername`=?"); $values = array($username); $query->execute($values); $counts = $query->rowCount(); if($counts==1) return 0; else return 1; } else { return 2; } } 

function AdminPermission($username,$module) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."admins` WHERE `ausername`=? AND $module=1"); $values = array($username); $query->execute($values); $counts = $query->rowCount(); if($counts==1) return 1; else return $counts; }

function DeleteAdmin($aid) { global $table_prefix; $query = $this->link->prepare("DELETE FROM `".$table_prefix."admins` WHERE `aid`=?"); $values = array($aid); $query->execute($values); $counts = $query->rowCount(); if($counts==1) return 1; else return $counts; } 

function DelPic($id) { global $table_prefix; $adminInfo = $this->GetAdminInfoById($id); if(file_exists('../img/admins/'.$adminInfo['aid'].$adminInfo['apic'])) { if(unlink('../img/admins/'.$adminInfo['aid'].$adminInfo['apic'])) return 1; else return 0; } else return 1; } 

function LastAdminID() { global $table_prefix; $query = $this->link->query("SELECT `aid` FROM `".$table_prefix."admins` ORDER BY `aid` DESC LIMIT 0,1"); $result = $query->fetchAll(); return $result[0]['aid']; }

function SendResetLink($email) { global $table_prefix; $query = $this->link->prepare("SELECT * FROM `".$table_prefix."admins` WHERE `atel`=?"); $values = array($email); $query->execute($values); $counts = $query->rowCount(); if($counts==1) { $result = $query->fetchAll(); return substr($result[0]['apass'],5,20); } else { return 0; } } 
    
    
} 

?>