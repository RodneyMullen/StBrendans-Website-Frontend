<?php



function thisefeast ($temp_date_in_month,$thismonth,$visits)
{
	$ff = "admin/feasts/fst_".$thismonth."_".$temp_date_in_month.".txt";
	if (File_Exists($ff))
	{
		$fp = FOpen($ff,"r");
		$svatej = FGetS($fp);
		$txtik = FGetS($fp);
		FClose($fp);

		//return '<p class=&#34;feastday&#34;>The Feast of '.trim($svatej).'</p></hr />';
               // return '<p />The Feast of '.trim($svatej).'</p></hr />';
                 return '<p />The Feast of '.trim($svatej).'</p>';


	}
}

function thiseevent ($temp_date_in_month,$thismonth,$mujvysledek,$visits)
{
	//return '<p class=&#34;event&#34;>'.$mujvysledek["tsta"].'-'.$mujvysledek["tsto"].' </br> '.$mujvysledek["header"].'</p><hr />';
        //return '<p >'.$mujvysledek["tsta"].'-'.$mujvysledek["tsto"].' </br> '.$mujvysledek["header"].'</p><hr />';
        if($mujvysledek["tsta"] !='' && $mujvysledek["tsto"] !='')
        {

            return '<p >'.$mujvysledek["tsta"].'-'.$mujvysledek["tsto"].': '.$mujvysledek["header"].'</p>';
        }
        else if($mujvysledek["tsta"]!='')
        {
            return '<p >'.$mujvysledek["tsta"].': '.$mujvysledek["header"].'</p>';
        }
        else
        {
            return '<p >'.$mujvysledek["header"].'</p>';
        }


}
/* Check_month takes in an array and opens database cent and checks for type 2 and 3. If exists finds the days in dayn and marks the appropiate
  index on the array.  If already exists on the array do nothing. Then returns the array
*/
function thischeck_month($week_array,$res2)
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
function this_every($temp_day_of_week,$checkday,$res2,$remdt,$lastdayofmonth,$firstdayofmonth,$visits)
{

	mysql_data_seek($res2,0); // returns the resultset pointer to the first row
	do
	{
		$resultset = MySQL_Fetch_Array($res2);
		if($resultset["dday"]== $checkday)
		{
			if($resultset["type"] == "2")
			{
                               
				//return '<p class=&#34;event&#34;>'.$resultset["tsta"].'-'.$resultset["tsto"].'<br />'.$resultset["header"].'</p>';
                                
                                if($resultset["tsta"]!='' && $resultset["tsto"]!='')
                                {

                                    return '<p />'.$resultset["tsta"].'-'.$resultset["tsto"].': '.$resultset["header"].'</p>';
                                }
                                else if($resultset["tsta"]!='')
                                {
                                    return '<p >'.$resultset["tsta"].': '.$resultset["header"].'</p>';
                                }
                                else
                                {
                                    return '<p >'.$resultset["header"].'</p>';
                                }
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

                                        
					//return '<p class=&#34;event&#34;>'.$resultset["tsta"].'-'.$resultset["tsto"].'<br />'.$resultset["header"].'</p><hr />';
                                        //return '<p />'.$resultset["tsta"].'-'.$resultset["tsto"].'<br />'.$resultset["header"].'</p><hr />';
                                        if($resultset["tsta"]!='' && $resultset["tsto"]!='')
                                        {

                                            return '<p />'.$resultset["tsta"].'-'.$resultset["tsto"].': '.$resultset["header"].'</p>';
                                        }
                                        else if($resultset["tsta"]!='')
                                        {
                                            return '<p >'.$resultset["tsta"].': '.$resultset["header"].'</p>';
                                        }
                                        else
                                        {
                                            return '<p >'.$resultset["header"].'</p>';
                                        }

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

	$week_array= thischeck_month($week_array,$res2);

}
$enter="true";
?>