<?php 
include 'db_connect.php';

if(isset($_POST['uname']))
{
$query = "SELECT `sugar_level` ,`date_of_treatment` as `dt`, `bp` from patient_history where uname=$uname;";
$r = mysqli_query($h,$query) or die("Error..");
$s_level_json='[';
$bp_json='[';

$len = mysqli_num_rows($r) -1;
while ($arr = mysqli_fetch_array($r)) 
{
	$sl = $arr['sugar_level'];
	$bp = $arr['bp'];
	$d_o_t=$arr['dt'];
	$s_level_json.='['.$d_o_t.','.$sl.']';
	$bp_json.='['.$d_o_t.','.$bp.']';

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

}

if($_POST['val']==1)
	return $s_level_json;
else
	return $bp_json;
}
?>