<?php

if (isset($datum) == false)
{
	$datum = mktime();
}
$day_of_week = date("w",$datum); # Day of week
$day_of_month = abs(date("j",$datum)); # Day of the month without leading 0
$month = date("n",$datum); # Month without leading 0
$date_in_month = date("t",$datum); //date in the month
$month_name = date("F",$datum);
$year = date("Y",$datum);
$month_year = mktime(0,0,0,$month,0,$year);  //current month and year with date 0
$day_of_week_number = abs(date("w",$month_year)); //numeric represntation of the day of week
$current_date = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));

echo '<script type ="text/javascript"> var calendar_content= new Array(); </script>';

$date_content = "";
//if ($day_of_week_number == "0")
//{
//	$day_of_week_number = 0;
//}

# PROSINEC or last month making next month 1

if ($month == "12")
{
	$next_year = $year+1;
	$next_month = "1";
}
else
{
	$next_year = $year;
	$next_month = $month+1;
}
# LEDEN or first month making last month 12
if ($month == "1")
{
	$previous_year = $year-1;
	$previous_month = "12";
}
else
{
	$previous_year = $year;
	$previous_month = $month-1;
}

$res = RunSQL("select * FROM cent Where type = '1' And dmon=$month ORDER BY dday ",0,0);
 $res2 = RunSQL("select * from cent Where type <> '1' ",0,0);
 $res3 = RunSQL("select * FROM cent Where type = '1' And dmon=$month AND dday=$day_of_month ",0,0);

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

function efeast ($temp_date_in_month,$month,$visits)
{
	$ff = "admin/feasts/fst_".$month."_".$temp_date_in_month.".txt";
	if (File_Exists($ff))
	{
		$fp = FOpen($ff,"r");
		$svatej = FGetS($fp);
		$txtik = FGetS($fp);
		FClose($fp);
                
		return '<p class=&#34;feastday&#34;><span style=&#34;color:#6633FF;&#34;>The Feast of '.trim($svatej).'</span></p></hr />';
               
                
		
	}
}

function eevent ($temp_date_in_month,$month,$mujvysledek,$visits)
{
	return '<p class=&#34;event&#34;>'.$mujvysledek["tsta"].'-'.$mujvysledek["tsto"].' </br> '.$mujvysledek["header"].'</p><hr />';


}
/* Check_month takes in an array and opens database cent and checks for type 2 and 3. If exists finds the days in dayn and marks the appropiate
  index on the array.  If already exists on the array do nothing. Then returns the array
*/ 
function check_month($week_array,$res2)
{

	mysql_data_seek($res2,0); // returns the resultset pointer to the first row
	do
	{
		$resultset = MySQL_Fetch_Array($res2);
		// gets the day of the week with the date given and then checks off the corresponding index in the array
		switch($resultset["dday"])
		{
			case 0: $week_array[0] = "1";break;
			case 1: $week_array[1] = "1";break;
			case 2: $week_array[2] = "1";break;
			case 3: $week_array[3] = "1";break;
			case 4: $week_array[4] = "1";break;
			case 5: $week_array[5] = "1";break;
			case 6: $week_array[6] = "1";break;
		}


	}
	while($resultset);

	return $week_array;
}

/* this function takes in a weekly enumerator $temp_day_of_week ,day of week $checkdate . a query is set up to check for events where $dday matches $checkdate.
For each return it checks for $type.  If $type 2 (an event which holds an event each week) is found, the event is published.
If type 3 (An event which is holds an event once a month) is found $kty from the row is matched with $temp_day_of_week.  If there is a match then
the event is published. Otherwise nothing happens. The resultset is freed.
*/
function e_every($temp_day_of_week,$checkday,$res2,$remdt,$lastdayofmonth,$firstdayofmonth,$visits)
{
        
	mysql_data_seek($res2,0); // returns the resultset pointer to the first row
	do
	{
		$resultset = MySQL_Fetch_Array($res2);
		if($resultset["dday"]== $checkday)
		{
			if($resultset["type"] == "2")
			{
				
				return '<p class=&#34;event&#34;>'.$resultset["tsta"].'-'.$resultset["tsto"].'<br />'.$resultset["header"].'</p>';
			}
			elseif($resultset["type"] == "3")
			{




				$newkty = $resultset["kty"];


				if($newkty == 10)
				{
                                       
					$newkty = 0;
					$day_in_week= $firstdayofmonth;
					$foundfirst = false;


					for($enumerator= 1; $enumerator<= $lastdayofmonth; $enumerator++)
					{

						if($day_in_week == $resultset["dday"])
						{

							$newkty++;
							$foundfirst=true;
						}

						if($day_in_week == 0 && $foundfirst== false)
						{
							$newkty++;
						}
						$day_in_week = ($day_in_week+1)%7;




					}
                                        

				}
				else if($checkday < $remdt)
				{

					$newkty = $newkty + 1;


				}
                                 
				if($newkty == $temp_day_of_week)
				{
                                        
					$bgb = $resultset["colo"];
					if(!$bgb)
					{
						$bgb = "#E1E1E1";
					}
                                        
					return '<p class=&#34;event&#34;>'.$resultset["tsta"].'-'.$resultset["tsto"].'<br />'.$resultset["header"].'</p><hr />';
                                        
				}
			}
			else{}
		}
	}
	while($resultset);
        
}




$cycle_day_of_week = 1; // cycling day of the week
//cycle the vertical part of the calendar
$week_array = array(0,0,0,0,0,0,0);
if (mysql_num_rows($res2) != 0)
{
        
	$week_array= check_month($week_array,$res2);

}
$enter="true";

?>
<br />

 <div class="calendar" id="calendar" name="calendar">

      <table class="calendar_table" id="calendar_table" name="calendar_table">
          <caption><p>Today is <br /><span style='color: #0000FF;'><?php echo Date("j").'. '.Date("F").' '.Date("Y").'.</b>'; ?></span></p></caption>
        <thead>
            <tr>
                <th colspan="7" >
                    <p><a href="<?php echo '?visits='.$visits.'&datum='.mktime(0,0,0,$month,1,$year-1); ?>"><img class="calendar_arrows" src="images/Calendar_left_arrow.png" alt="icon to go back one year"/></a>&nbsp;<?php echo $year; ?>&nbsp;<a href="<?php echo '?visits='.$visits.'&datum='.mktime(0,0,0,$month,1,$year+1); ?>"><img class="calendar_arrows" src="images/Calendar_right_arrow.png" alt="icon to go forward one year"/></a></p>
                <!--  This is used for the website <p><a href="<?php echo $current_page.'?visits='.$visits.'&datum='.mktime(0,0,0,$month,1,$year-1); ?>"><img class="calendar_arrows" src="images/Calendar_left_arrow.png" alt="icon to go back one year"/></a>&nbsp;<?php echo $year; ?>&nbsp;<a href="<?php echo $current_page.'?visits='.$visits.'&datum='.mktime(0,0,0,$month,1,$year+1); ?>"><img class="calendar_arrows" src="images/Calendar_right_arrow.png" alt="icon to go forward one year"/></a></p>
                  -->
               </th>
            </tr>
            <tr>
                 <th colspan="7">
                    <p><a href="<?php echo '?visits='.$visits.'&datum='.mktime(0,0,0,$previous_month,1,$previous_year); ?>"><img class="calendar_arrows" src="images/Calendar_left_arrow.png" alt="icon to go back one month"/></a>&nbsp;<?php echo $month_name; ?>&nbsp;<a href="<?php echo '?visits='.$visits.'&datum='.mktime(0,0,0,$next_month,1,$next_year); ?>"><img class="calendar_arrows" src="images/Calendar_right_arrow.png" alt="icon to go forward one month"/></a></p>
              <!--  This is used for the website        <p><a href="<?php echo $current_page.'?visits='.$visits.'&datum='.mktime(0,0,0,$previous_month,1,$previous_year); ?>"><img class="calendar_arrows" src="images/Calendar_left_arrow.png" alt="icon to go back one month"/></a>&nbsp;<?php echo $month_name; ?>&nbsp;<a href="<?php echo $current_page.'?visits='.$visits.'&datum='.mktime(0,0,0,$next_month,1,$next_year); ?>"><img class="calendar_arrows" src="images/Calendar_right_arrow.png" alt="icon to go forward one month"/></a></p>
              -->
                 </th>
           </tr>
       </thead>
       <tfoot>
              <tr>
                 <th colspan="7">
                     <div id="calendar_content" name="calendar_content">
                         <?php
                         
                         $remdt=0;
                                //$date_content=$date_content.efeast($day_of_week,$month,$visits);
                                $date_content="";
                                // cycles through just in case there is more then one event for that day
                                if ($resultset_currentday["dday"] == $day_of_month && $resultset_currentday["dmon"] == $month && $resultset_currentday["dyear"] == $year && $resultset_currentday["type"] == "1")
                                {
                                    
                                    do
                                    {
					//if matches date apply one colour scheme, else use another
                                         
					$date_content=$date_content."".eevent($day_of_month,$month,$resultset_currentday,$visits);
					$resultset_currentday = MySQL_Fetch_Array($res3);
                                    }
                                    while($resultset_currentday);
                                }
                               
                                $checkday = date("w",mktime(0,0,0,$month,$day_of_month,$year));
                                $firstdayofmonth = date("w",mktime(0,0,0,$month,1,$year));
                                $lastdayofmonth= date("t",mktime(0,0,0,$month,1,$year));

                                if ($week_array[$checkday] == "1")
                                {
                                    $temp_day_in_week=1;
                                    $day_in_week=$firstdayofmonth;
                                    $enumerator= 1;
                                    $found = false;
                                    do
                                    {
                                        if($enumerator == $day_of_month)
					{
        					$found=true;
					}

                                        if($day_in_week == 0)
					{
						$temp_day_in_week++;
					}
                                        //$day_in_week++;
					$day_in_week = ($day_in_week+1)%7;
                                        $enumerator++;
                                    }
                                    while($found == false);

                                    
                                    $date_content=$date_content."".e_every($temp_day_in_week,$checkday,$res2,$remdt,$lastdayofmonth,$firstdayofmonth,$visits);
                                    
                                }
                                /*
                                if($date_content=="")
                                {
                                    
                                    $date_content="<p> No Event Today</p>";
                                }*/
                                $date_content=$date_content."".efeast($day_of_month,$month,$visits);
                                //$temp_date =mktime(0,0,0,$month,$day_of_month,$year);

                               
                                 echo $date_content;
                                
                                  $date_content="";
                                
                         ?>
                     </div>

                 </th>
             </tr>
        </tfoot>
        <tbody>
            <tr>
                <th>
                     <p>M</p>
                 </th>
                <th>
                     <p>T</p>
                </th>
                <th>
                     <p>W</p>
                </th>
                <th>
                     <p>T</p>
                </th>
                <th>
                     <p>F</p>
                 </th>
                 <th>
                     <p>S</p>
                  </th>
                  <th>
                     <p>S</p>
                  </th>
              </tr>
           <?php
                
               $last_day_reached = false; // whether the last day has been reached
                do
                {

                    $date_content ="";
                    $dt = 1; //dt represnts current day when cycling through
                    $remdt=0;
                    echo '<tr>';
                    //cycle horizontal cells on calendar
                    while ($dt < 8)
                    {
                        $date_content ="";
                        // if cycle_day_of_week is >= to current day+1 AND the enumerator $temp_date_in_month is <= number of days in that month
                        // only populates if day exists on calendar and starts when the first day starts and ends leaving other blank cells
                        if ($cycle_day_of_week > $day_of_week_number && $temp_date_in_month <= $date_in_month)
                        {

                            if($enter == "true") // only enters once
                            {
				$remdt= $dt;
				$enter = "false";
                            }

                            //echo '<td width="80" bgcolor="#FFFFFF">'.$ffes;
                            echo '<td>';
                        
                            
                            $temp_date =mktime(0,0,0,$month,$temp_date_in_month,$year);
                            
                            

                        
                            if ($mujvysledek["dday"] == $temp_date_in_month && $mujvysledek["dmon"] == $month && $mujvysledek["type"] == "1")
                            {
                                
				do
				{
					//if matches date apply one colour scheme, else use another
                                        if($mujvysledek["dyear"] == $year)
                                        {
                                            $date_content=$date_content."".eevent($temp_date_in_month,$month,$mujvysledek,$visits);
                                        }
					
					$mujvysledek = MySQL_Fetch_Array($res);
                                       
				}
                               	while($mujvysledek["dday"] == $temp_date_in_month);
                            }
                            
                            $checkday = date("w",mktime(0,0,0,$month,$temp_date_in_month,$year));
                            $firstdayofmonth = date("w",mktime(0,0,0,$month,1,$year));
                            $lastdayofmonth= date("t",mktime(0,0,0,$month,1,$year));
                            if($temp_date_in_month == $lastdayofmonth)
                            {
                                $last_day_reached = true;
                            }
                            
                           

                            if ($week_array[$checkday] == "1")
                            {
                                
				$date_content=$date_content."".e_every($temp_day_of_week,$checkday,$res2,$remdt,$lastdayofmonth,$firstdayofmonth,$visits);
                            }
                            $noevent = true;
                            if($date_content!="")
                            {
                                 $noevent=false;
                            }

                            $date_content=$date_content."".efeast($temp_date_in_month,$month,$visits);

                           /* if($date_content=="")
                            {
                                
                                $date_content="<p> No Event Today</p>";
                            }*/
                            echo '<script type ="text/javascript">

                                    calendar_content['.$temp_date_in_month.']="'.$date_content.'";
                                         
                                </script>';

                            if ($temp_date == $current_date )
                            {
                               
                               echo '<p id="calendar_day"><a id="calendar_day" href="'.$current_page.'?visits='.$visits.'&datum='.mktime(0,0,0,$month,$temp_date_in_month,$year).'" onclick="insertCalendarContent(calendar_content,'.$temp_date_in_month.');return false;">'.$temp_date_in_month.'</a></p>';
                                   
                            }
                            else if($date_content !=''&& $noevent==false)
                            {
                               
                               echo '<p class="calendarevent"><a href="'.$current_page.'?visits='.$visits.'&datum='.mktime(0,0,0,$month,$temp_date_in_month,$year).'" onclick="insertCalendarContent(calendar_content,'.$temp_date_in_month.');return false;">'.$temp_date_in_month.'</a></p>';

                            }

                            else
                            {
                               
                               echo '<p><a href="'.$current_page.'?visits='.$visits.'&datum='.mktime(0,0,0,$month,$temp_date_in_month,$year).'" onclick="insertCalendarContent(calendar_content,'.$temp_date_in_month.');return false;">'.$temp_date_in_month.'</a></p>';
                              
                            }
                         echo "</td>";
                            $dt++; $temp_date_in_month++; $cycle_day_of_week++;
                            $date_content = '';
                    }
                    else
                    {
                         echo '<td></td>';
			$dt++;
			$cycle_day_of_week++;
                        $date_content = '';
			
                       
                    }

            }
           
            echo "</tr>";
            if($last_day_reached==true)
            {
               
               $temp_day_of_week=7;
            }
            else
            {
                $temp_day_of_week++;
            }
            
        
        }
        while ($temp_day_of_week <= 6);
        
mysql_free_result($res);
mysql_free_result($res2);


?>
               
                 
             </tbody>
           </table>
       </div>
<br />
