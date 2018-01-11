<?php

    if(!isset($current_time))
    {
        $current_time = mktime();

    }
    $res = RunSQL("select * FROM parish_centre_schedule ORDER BY time",0,0);
    if (!$res)
    {
            echo "Error during an access to the database.";
    }
    else
    {
        $week_array = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday","Friday", "Saturday");
        $resultset = MySQL_Fetch_Array($res);
        $schedule_array = array(array(),array(),array(),array(),array(),array(),array());
        $biggest_array_count = 0; // keep track of what the biggest of the day arrays are to help
        // constructing the html table
        // in order of the resultset: id, name, time, day and notes
        while($resultset)
        {
            $day = $resultset['Day'];
            
            foreach($week_array as $key => $val)
            {
                if($val == $day)
                {
                    $temp_array = $schedule_array[$key];
                    break;
                }
            }
            
            $string = "<td><p> ".$resultset['Name']."<br />".substr($resultset['Time'], 0,5)."<br />".$resultset['Notes']."</p> </td>";
            array_push($temp_array, $string);
            if(count($temp_array)> $biggest_array_count)
            {
                $biggest_array_count = count($temp_array);
            }
            $schedule_array[$key] = $temp_array;
            $resultset = MySQL_Fetch_Array($res);
        }
        mysql_free_result($res);

        $day_of_week = idate("w",$current_time);
        
        ?>
       <div id="ParishCentreTimeschedule" name="ParishCentreTimeschedule" ></div>
        <h2>PARISH CENTRE TIMESCHEDULE</h2>


             <table class ="centre_schedule">
                 
                 <thead>
                      <tr>
                          <?php
                            foreach($week_array as $key => $day)
                            {
                                if($key ==$day_of_week )
                                {
                                    echo "<th id='centre_schedule_weekend' name='centre_schedule_weekend'><p>".$day."</p></th>";
                                }
                                else
                                {
                                    echo "<th><p>".$day."</p></th>";
                                }
                            }
                          ?>

                      </tr>
                 </thead>
                 <tfoot>
                     <tr><td></td></tr>
                 </tfoot>
                 <tbody>
                    
                         <?php
                               for($i=0; $i<= $biggest_array_count; $i++)
                               {
                                   echo '<tr>';
                                   foreach($schedule_array as $key => $day_array)
                                   {
                                      if(!array_key_exists($i, $day_array))
                                     
                                       {
                                           echo "<td></td>";
                                       }
                                       else
                                       {
                                          
                                           echo "<p>".$day_array[$i]."</p>";
                                       }

                                   }
                                   echo '</tr>';

                               }
                          ?>

                  </tbody>



             </table>

         

     <?php
    }
?>
