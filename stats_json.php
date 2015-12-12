<?php 

function jsonize($uname ,$val , $h)
{
$q1="SELECT `u_id` from user_details where uname='$uname';";
$r1=mysqli_query($h,$q1);
$arr1 = mysqli_fetch_array($r1);
$uid = $arr1['u_id'];	
$query = "SELECT `sugar_level` ,`date_of_treatment` as `dt`, `bp` from patient_history where p_id=$uid;";
$r = mysqli_query($h,$query) or die("Error..".mysqli_error($h));
$s_level_json='[';
$bp_json='[';

$len = mysqli_num_rows($r) -1;
while ($arr = mysqli_fetch_array($r)) 
{
	$sl = $arr['sugar_level'];
	$bp = $arr['bp'];
	$d_o_t=$arr['dt'];
	$s_level_json.="['$d_o_t' , $sl]";
	$bp_json.="['$d_o_t' , $bp ]";

	if($len>0)
	{
		$s_level_json.=',';
		$bp_json.=',';
	}
	else
	{
		$s_level_json.=']';
		$bp_json.=']';
	}	
$len--;
}

if($val==1)
	return $s_level_json;
else
	return $bp_json;
}


?>