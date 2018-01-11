<?php
$day_of_week = date("w",$todaysdate); # Day of week
$thisday_of_month = abs(date("j",$todaysdate)); # Day of the month without leading 0
$thismonth = date("n",$todaysdate); # Month without leading 0
$thisdate_in_month = date("t",$todaysdate); //date in the month
$thismonth_name = date("F",$todaysdate);
$thisyear = date("Y",$todaysdate);
$thismonth_year = mktime(0,0,0,$thismonth,0,$thisyear);  //current month and year with date 0
$thisday_of_week_number = abs(date("w",$thismonth_year)); //numeric represntation of the day of week
$current_date = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));

echo '<script type ="text/javascript"> var calendar_content= new Array(); </script>';
$thisdate_content = "";
//if ($thisday_of_week_number == "0")
//{
//	$thisday_of_week_number = 0;
//}

# PROSINEC or last month making next month 1
if ($thismonth == "12")
{
	$thisnext_year = $thisyear+1;
	$thisnext_month = "1";
}
else
{
	$thisnext_year = $thisyear;
	$thisnext_month = $thismonth+1;
}
# LEDEN or first month making last month 12
if ($thismonth == "1")
{
	$thisprevious_year = $thisyear-1;
	$thisprevious_month = "12";
}
else
{
	$thisprevious_year = $thisyear;
	$thisprevious_month = $thismonth-1;
}
$res = RunSQL("select * FROM cent Where type = '1' And dmon=$thismonth ORDER BY dday ",0,0);
 $res2 = RunSQL("select * from cent Where type <> '1' ",0,0);
 $res3 = RunSQL("select * FROM cent Where type = '1' And dmon=$thismonth AND dday=$thisday_of_month ",0,0);

 if (!$res || !$res2 || !$res3)
 {
 	echo "Error during an access to the database.";
 }
 $mujvysledek = MySQL_Fetch_Array($res);
 $resultset = MySQL_Fetch_Array($res2);
 $resultset_currentday = MySQL_Fetch_Array($res3);

$i = 0;
// td represents day of week
$temp_day_of_week = 1;
$temp_date_in_month = 1; //den is date in a month

?>
