<?php

function confirm_query($result_set)
{
    global $connection;
    if(!$result_set)
    {
        die("Database query failed! ".mysqli_error($connection));
    }
		
}
function phpmail($to,$sub,$msg){

    $mailto = $to;
    $mailSub = $sub;
    $mailMsg = $msg;
   require 'PHPMailer-master/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "ashishbindra2@gmail.com";
   $mail ->Password = "9815039236";
   $mail ->SetFrom("ashishbindra2@gmail.com");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }


}

function all_journals()
{
    global $connection;
    $query="SELECT * FROM journal_names ";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}
function all_statu()
{
    global $connection;
    $query="SELECT * FROM status ";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}
function  count_journals(){
	global $connection;
	$q="select count(*) as journal_ID from journal_names";
	$qr= mysqli_query($connection,$q);
	$result=$qr->fetch_row();
	return $result[0];
}
function Issue_show(){
	global $connection;
	$q="select count(*) as J_ISSUES_ID from j_issues";
	$qr= mysqli_query($connection,$q);
	$result=$qr->fetch_row();
	return $result[0];
	
}
function add_journal($name, $abb, $issn_e, $issn_p, $freq, $status,$id)
{
    global $connection;
    
    $name=mysqli_real_escape_string($connection,$name);
    $abb=mysqli_real_escape_string($connection,$abb);
    $issn_e=mysqli_real_escape_string($connection,$issn_e);
    $issn_p=mysqli_real_escape_string($connection,$issn_p);
    $freq=mysqli_real_escape_string($connection,$freq);
    //$status=mysqli_real_escape_string($connection,$status);
    
    $query="INSERT INTO journal_names ( JOURNAL_NAME, JOURNAL_N_ABB, J_ISSN_E, J_ISSN_P, FREQUENCY, STATUS,STREAM_ID ) VALUES ('{$name}', '{$abb}', '{$issn_e}', '{$issn_p}', '{$freq}', {$status},{$id})";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
}

function delete_journal($ID)
{
    global $connection;
    $query="DELETE FROM journal_names WHERE JOURNAL_ID={$ID}";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}
function delete_issues($ID)
{
    global $connection;
    $query="DELETE FROM  j_issues WHERE J_ISSUES_ID={$ID}";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}

function special_issue(){
	 global $connection;
    $query="select J_ISSUES_ID,JOURNAL_NAME,ISSUE_MONTH,VOLUME_NO,IS_SPECIAL_ISSUE,ISSUE_YEAR,D_O_UPLOADING,SPECIAL_ISSUE_NAME FROM journal_names, j_issues where  journal_names.JOURNAL_ID=j_issues.JOURNAL_ID and IS_SPECIAL_ISSUE=1";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
	
	
}
function update_journal($ID, $name, $abb, $issn_e, $issn_p, $frequency, $status,$Sid)
{echo $Sid;
    global $connection;
    $query="UPDATE journal_names SET JOURNAL_NAME='{$name}', JOURNAL_N_ABB='{$abb}', J_ISSN_E='{$issn_e}', J_ISSN_P='{$issn_p}', FREQUENCY='{$frequency}', STATUS={$status},STREAM_ID={$Sid} WHERE JOURNAL_ID={$ID}";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}



function update_issues($J_ID,$Issue_mo,$Vol_no,$spl_iss,$iss_yer,$SiN)
{
	
    global $connection;
    $query="UPDATE j_issues SET  ISSUE_MONTH='{$Issue_mo}', VOLUME_NO='{$Vol_no}', IS_SPECIAL_ISSUE='{$spl_iss}',D_O_UPLOADING=Now(), ISSUE_YEAR='{$iss_yer}',SPECIAL_ISSUE_NAME='{$SiN}' WHERE J_ISSUES_ID={$J_ID}";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}
function view_issues(){
	global $connection;
	$q="SELECT J_ISSUES_ID,JOURNAL_NAME,ISSUE_MONTH,VOLUME_NO,IS_SPECIAL_ISSUE,ISSUE_YEAR,D_O_UPLOADING,
	SPECIAL_ISSUE_NAME FROM journal_names,j_issueswhere  journal_names.JOURNAL_ID=j_issues.JOURNAL_ID";
	$result=mysqli_query($connection,$q);
	confirm_query($result);
	return $result;
	
	
}
function add_issue($jid, $month, $vol_no, $is_spl, $year, $d_o_upload, $stat_id,$issue_name)
{
    global $connection;
    $query="INSERT INTO j_issues(JOURNAL_ID,ISSUE_MONTH,VOLUME_NO,IS_SPECIAL_ISSUE,ISSUE_YEAR,D_O_UPLOADING,JOURNAL_STATUS_ID,SPECIAL_ISSUE_NAME ) VALUES ({$jid},'{$month}','{$vol_no}',{$is_spl},'{$year}',{$d_o_upload},{$stat_id},'{$issue_name}'\)";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
}

function all_streams()
{
    global $connection;
    $query="SELECT * FROM stream WHERE STATUS=1";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}
function re_streams($ST)
{
    global $connection;
    $query="SELECT * FROM stream WHERE STATUS=1 AND STREAM_ID = '$ST'";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}


function stream_search($sid)
{
    global $connection;
    $query="SELECT * FROM stream WHERE STREAM_ID={$sid}";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}
function iNsert_paper_status_after_review($file,$status,$comment)
{
    global $connection;
    $query="INSERT INTO paper_status_after_review  (PAPER_SUB_ID ,STATUS_ID ,REVIEWER_COMMENTS_TO_AUTHOR ) VALUES ({$file},{$status},'{$comment}')";
    $result=mysqli_query($connection,$query);
    confirm_query($result);

}function add_stream($st_name, $status)
{
    global $connection;
    $query="INSERT INTO stream (STREAM_NAME,STATUS ) VALUES ('{$st_name}',{$status})";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
}

function all_status()
{
    global $connection;
    $query="SELECT * FROM journal_status";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}

function all_editors()
{
    global $connection;
    $query="SELECT * FROM editors ";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}

function add_editor($sid, $ename, $email, $mobile, $web, $role, $status)
{
    global $connection;
    $ename=mysqli_real_escape_string($connection,$ename);
    $email=mysqli_real_escape_string($connection,$email);
    $mobile=mysqli_real_escape_string($connection,$mobile);
    $role=mysqli_real_escape_string($connection,$role);
    $web=mysqli_real_escape_string($connection,$web);
    
    $query="INSERT INTO editors (STREAM_ID, NAME, EMAIL, MOBILE, WEBLINK, ROLE, STATUS ) VALUES ({$sid}, '{$ename}', '{$email}', '{$mobile}', '{$web}', '{$role}', {$status})";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
}

function delete_editor($ID)
{
    global $connection;
    $query="DELETE FROM editors WHERE EIC_ID={$ID}";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}

function add_author($fname, $mname, $lname, $title, $gender, $email, $mobile, $designation, $institute, $city, $state, $country)
{
    global $connection;
    $fname=mysqli_real_escape_string($connection,$fname);
    $mname=mysqli_real_escape_string($connection,$mname);
    $lname=mysqli_real_escape_string($connection,$lname);
    $title=mysqli_real_escape_string($connection,$title);
    $email=mysqli_real_escape_string($connection,$email);
    $mobile=mysqli_real_escape_string($connection,$mobile);
    $designation=mysqli_real_escape_string($connection,$designation);
    $institute=mysqli_real_escape_string($connection,$institute);
    $city=mysqli_real_escape_string($connection,$city);
    $state=mysqli_real_escape_string($connection,$state);
    $country=mysqli_real_escape_string($connection,$country);
    
    $query="INSERT INTO  author_details ( FNAME, MNAME, LNAME, TITLE, GENDER, EMAIL, MOBILE, DESIGNATION, INSTITUTE_NAME, CITY, STATE, COUNTRY ) VALUES ('{$fname}', '{$mname}', '{$lname}', '{$title}', '{$gender}', '{$email}', '{$mobile}', '{$designation}', '{$institute}', '{$city}', '{$state}', '{$country}' )";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
}

function all_authors()
{
    global $connection;
    $query="SELECT * FROM  author_details";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}

function delete_author($ID)
{
    global $connection;
    $query="DELETE FROM  author_details WHERE AUTH_ID={$ID}";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}


function all_assignment($rid)
{
     global $connection;
    $query="SELECT * FROM  assignment WHERE REVIEWER_ID={$rid}";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}
function assignment($J_ID,$issue,$file,$reviewr,$date)
{
     global $connection;
               $J_ID=mysqli_real_escape_string($connection,$J_ID);
               $issue=mysqli_real_escape_string($connection,$issue);
               $file=mysqli_real_escape_string($connection,$file);  
               $reviewr=mysqli_real_escape_string($connection,$reviewr);

    $query="INSERT INTO assignment ( JOURNAL_ID , ISSUE_ID , PAPER_ID,REVIEWER_ID , DATE ) VALUES ('{$J_ID}','{$issue}','{$file}','{$reviewr}',Now())";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
}
function a_assignment($RID,$active)
{
     global $connection;
    $RID=mysqli_real_escape_string($connection,$RID);
    $active=mysqli_real_escape_string($connection,$active);
    
    $query="INSERT INTO assignment where REVIEWER_ID=$RID ( ACTIVE ) VALUES ( {$active} )";
    $result=mysqli_query($connection,$query);
    confirm_query($result);

}
function notification_update($RID)
{
    global $connection;
    $qrys="UPDATE assignment SET notification=1 WHERE REVIEWER_ID='$RID'";
    $result=mysqli_query($connection,$qrys);
    confirm_query($result);

}
function pa_assignment($RID)
{
     global $connection;
   // $RID=mysqli_real_escape_string($connection,$RID);
   // $active=mysqli_real_escape_string($connection,$active); 
    $query="SELECT * FROM assignment where REVIEWER_ID=$RID ";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}
function paper_submission_detail($RID)
{
    global $connection;

    $query="SELECT * FROM  paper_submission_detail p JOIN assignment a ON p.PAPER_SUB_ID=a.PAPER_SUB_ID"; 
    //$query="SELECT TITLE,FNAME  FROM  paper_submission_detail inner join author_details on author_details.AUTH_ID = paper_submission_detail.AUTH_ID";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}
function paper_submission_details($PID)
{
    global $connection;

    $query="SELECT * FROM  paper_submission_detail  WHERE PAPER_SUB_ID='$PID'"; 
    //$query="SELECT TITLE,FNAME  FROM  paper_submission_detail inner join author_details on author_details.AUTH_ID = paper_submission_detail.AUTH_ID";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}

function paper_title($PID)
{
    global $connection;

    $query="SELECT TITLE FROM  paper_submission_detail where PAPER_SUB_ID='$PID'";
    //$query="SELECT TITLE,FNAME  FROM  paper_submission_detail inner join author_details on author_details.AUTH_ID = paper_submission_detail.AUTH_ID";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}
function author_details($AUTH_ID)
{
    global $connection;

    $query="SELECT * FROM  author_details where AUTH_ID='$AUTH_ID'";
    //$query="SELECT TITLE,FNAME  FROM  paper_submission_detail inner join author_details on author_details.AUTH_ID = paper_submission_detail.AUTH_ID";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}
function reviewer_revimder_details($RID)
{
    global $connection;

    $query="SELECT * FROM  reviewer_revimder_details WHERE  REMIDER_NUMBER ='$RID'";
    //$query="SELECT TITLE,FNAME  FROM  paper_submission_detail inner join author_details on author_details.AUTH_ID = paper_submission_detail.AUTH_ID";
    $result=mysqli_query($connection,$query);
    confirm_query($result);
    return $result;
}
function add_paper_status_after_review($status,$comment,$rating,$PAPER_SUB_ID)
{
     global $connection;
    $RID=mysqli_real_escape_string($connection,$RID);
    $active=mysqli_real_escape_string($connection,$active);
    
    $query="INSERT INTO paper_status_after_review where PAPER_SUB_ID=$PAPER_SUB_ID (REVIEWER_COMMENTS_TO_AUTHOR,RANKIG ,SATUS ) VALUES ('{$comment}','{$rating}','{$status}')";
    $result=mysqli_query($connection,$query);
    confirm_query($result);

}
?>