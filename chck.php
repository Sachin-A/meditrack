<?php
include 'db_connect.php';
function chck($id , $type , $current , $h)
{
	$person = ($type==2)?"doctors":"u_trackers";

	$query="SELECT `$person` from user_details where u_id=".$current.";";
	$res = mysqli_query($h , $query) or die("Error...".mysqli_error($h));
	$arr = mysqli_fetch_array($res);
	$l = preg_split("/;/", $arr[$person]);


if($l[0]!=''){
	if(in_array($id, $l))
		return 1;
	else
		return 0;
}
else return 0;

}

?>