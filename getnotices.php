<?php
    $todaysdate = mktime();
    include "noticesdatesetup.php";
    include "calendarengine.php";

    $checkdate = Date("j");
    $end_of_date='';
    switch($checkdate)
    {
        case 1:$end_of_date='st';break;
        case 2:$end_of_date='nd';break;
        case 3:$end_of_date='rd';break;
        case 21:$end_of_date='st';break;
        case 22:$end_of_date='nd';break;
        case 23:$end_of_date='rd';break;
        case 31:$end_of_date='st';break;
        default:$end_of_date='th';break;
    }
?>
<p class="noticesheading" ><br />
Today is <span style='color: #FF9900;'><?php echo Date("j").'<span class="subscript">'.$end_of_date.'</span> '.Date("F").' '.Date("Y").'.</b>'; ?></span>
</p>
<p>
  <?php
                     $remdt=0;
                                //$date_content=$date_content.efeast($day_of_week,$thismonth,$visits);
                                $thisdate_content="";
                                if ($resultset_currentday["dday"] == $thisday_of_month && $resultset_currentday["dmon"] == $thismonth && $resultset_currentday["dyear"] == $thisyear && $resultset_currentday["type"] == "1")
                                {

                                    do
                                    {
					//if matches date apply one colour scheme, else use another

					$thisdate_content=$thisdate_content."".thiseevent($thisday_of_month,$thismonth,$resultset_currentday,$visits);
					$resultset_currentday = MySQL_Fetch_Array($res3);
                                    }
                                    while($resultset_currentday);
                                }

                                $thischeckday = date("w",mktime(0,0,0,$thismonth,$thisday_of_month,$thisyear));
                                $thisfirstdayofmonth = date("w",mktime(0,0,0,$thismonth,1,$thisyear));
                                $thislastdayofmonth= date("t",mktime(0,0,0,$thismonth,1,$thisyear));

                                if ($week_array[$thischeckday] == "1")
                                {
                                    $temp_day_in_week=1;
                                    $day_in_week=$thisfirstdayofmonth;
                                    $enumerator= 1;
                                    $found = false;
                                    do
                                    {
                                        if($enumerator == $thisday_of_month)
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


                                    $thisdate_content=$thisdate_content."".this_every($temp_day_in_week,$thischeckday,$res2,$remdt,$thislastdayofmonth,$thisfirstdayofmonth,$visits);

                                }

                               /* if($thisdate_content=="")
                                {

                                    $thisdate_content="<p> &nbsp;</p>";
                                }*/
                                $thisdate_content=$thisdate_content."".thisefeast($thisday_of_month,$thismonth,$visits);
                                //$temp_date =mktime(0,0,0,$thismonth,$thisday_of_month,$thisyear);


                                 echo "<div class='notice'>".$thisdate_content."</div>";
                                  $thisdate_content="";

                         ?>

</p>
 <!-- Tomorrow -->
<p class="noticesheading"><br />
    <?php
         $todaysdate  = mktime(0,0,0,date("m"),date("d")+1,date("Y"));
         include "noticesdatesetup.php";
   
   
          $end_of_date='';
          $checkdate = Date("j", $todaysdate);
    switch($checkdate)
    {
        case 1:$end_of_date='st';break;
        case 2:$end_of_date='nd';break;
        case 3:$end_of_date='rd';break;
        case 21:$end_of_date='st';break;
        case 22:$end_of_date='nd';break;
        case 23:$end_of_date='rd';break;
        case 31:$end_of_date='st';break;
        default:$end_of_date='th';break;
    }
          
 echo Date("l", $todaysdate); ?>&nbsp;<span style='color: #FF9900;'><?php echo Date("j", $todaysdate).'<span class="subscript">'.$end_of_date.'</span> '.Date("F", $todaysdate).' '.Date("Y", $todaysdate).'.</b>'; ?></span>
</p>
<p>
  <?php
                     $remdt=0;
                                //$date_content=$date_content.efeast($day_of_week,$thismonth,$visits);
                                $thisdate_content="";
                                if ($resultset_currentday["dday"] == $thisday_of_month && $resultset_currentday["dmon"] == $thismonth && $resultset_currentday["dyear"] == $thisyear && $resultset_currentday["type"] == "1")
                                {

                                    do
                                    {
					//if matches date apply one colour scheme, else use another

					$thisdate_content=$thisdate_content."".thiseevent($thisday_of_month,$thismonth,$resultset_currentday,$visits);
					$resultset_currentday = MySQL_Fetch_Array($res3);
                                    }
                                    while($resultset_currentday);
                                }

                                $thischeckday = date("w",mktime(0,0,0,$thismonth,$thisday_of_month,$thisyear));
                                $thisfirstdayofmonth = date("w",mktime(0,0,0,$thismonth,1,$thisyear));
                                $thislastdayofmonth= date("t",mktime(0,0,0,$thismonth,1,$thisyear));

                                if ($week_array[$thischeckday] == "1")
                                {
                                    $temp_day_in_week=1;
                                    $day_in_week=$thisfirstdayofmonth;
                                    $enumerator= 1;
                                    $found = false;
                                    do
                                    {
                                        if($enumerator == $thisday_of_month)
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


                                    $thisdate_content=$thisdate_content."".this_every($temp_day_in_week,$thischeckday,$res2,$remdt,$thislastdayofmonth,$thisfirstdayofmonth,$visits);

                                }
/*
                                if($thisdate_content=="")
                                {

                                    $thisdate_content="<p> No Event Today</p>";
                                }*/
                                $thisdate_content=$thisdate_content."".thisefeast($thisday_of_month,$thismonth,$visits);
                                //$temp_date =mktime(0,0,0,$thismonth,$thisday_of_month,$thisyear);


                                 echo "<div class='notice'>".$thisdate_content."</div>";
                                  $thisdate_content="";

                         ?>
</p>
  <!-- three days time -->
<p class="noticesheading"><br />
    <?php
         
         $todaysdate  = mktime(0,0,0,date("m"),date("d")+2,date("Y"));
          include "noticesdatesetup.php";
   
   
          $end_of_date='';
           $checkdate = Date("j", $todaysdate );
    switch($checkdate)
    {
        case 1:$end_of_date='st';break;
        case 2:$end_of_date='nd';break;
        case 3:$end_of_date='rd';break;
        case 21:$end_of_date='st';break;
        case 22:$end_of_date='nd';break;
        case 23:$end_of_date='rd';break;
        case 31:$end_of_date='st';break;
        default:$end_of_date='th';break;
    }

 echo Date("l", $todaysdate); ?>&nbsp;<span style='color: #FF9900;'><?php echo Date("j", $todaysdate).'<span class="subscript">'.$end_of_date.'</span> '.Date("F", $todaysdate).' '.Date("Y", $todaysdate).'.</b>'; ?></span>
</p>
<p>
  <?php
                     $remdt=0;
                                //$date_content=$date_content.efeast($day_of_week,$thismonth,$visits);
                                $thisdate_content="";
                                if ($resultset_currentday["dday"] == $thisday_of_month && $resultset_currentday["dmon"] == $thismonth && $resultset_currentday["dyear"] == $thisyear && $resultset_currentday["type"] == "1")
                                {

                                    do
                                    {
					//if matches date apply one colour scheme, else use another

					$thisdate_content=$thisdate_content."".thiseevent($thisday_of_month,$thismonth,$resultset_currentday,$visits);
					$resultset_currentday = MySQL_Fetch_Array($res3);
                                    }
                                    while($resultset_currentday);
                                }

                                $thischeckday = date("w",mktime(0,0,0,$thismonth,$thisday_of_month,$thisyear));
                                $thisfirstdayofmonth = date("w",mktime(0,0,0,$thismonth,1,$thisyear));
                                $thislastdayofmonth= date("t",mktime(0,0,0,$thismonth,1,$thisyear));

                                if ($week_array[$thischeckday] == "1")
                                {
                                    $temp_day_in_week=1;
                                    $day_in_week=$thisfirstdayofmonth;
                                    $enumerator= 1;
                                    $found = false;
                                    do
                                    {
                                        if($enumerator == $thisday_of_month)
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


                                    $thisdate_content=$thisdate_content."".this_every($temp_day_in_week,$thischeckday,$res2,$remdt,$thislastdayofmonth,$thisfirstdayofmonth,$visits);

                                }
/*
                                if($thisdate_content=="")
                                {

                                    $thisdate_content="<p> No Event Today</p>";
                                }*/
                                $thisdate_content=$thisdate_content."".thisefeast($thisday_of_month,$thismonth,$visits);
                                //$temp_date =mktime(0,0,0,$thismonth,$thisday_of_month,$thisyear);


                                 echo "<div class='notice'>".$thisdate_content."</div>";
                                  $thisdate_content="";

                         ?>
</p>
   

