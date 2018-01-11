<?php
/* 
 * Calandar for which lists events
 * and open the template in the editor.
 */



if (isset($datum) == false)
{
	$datum = mktime();
}
$cdne = date("w",$datum); # Day of week
$dato = abs(date("j",$datum)); # Day of the month without leading 0
$mes = date("n",$datum); # Month without leading 0
$ndnu = date("t",$datum); //date in the month
$popisekm = date("F",$datum);
$rok = date("Y",$datum);
$prvni = mktime(0,0,0,$mes,0,$rok);  //current month and year with date 0
$pden = abs(date("w",$prvni)); //numeric represntation of the day of week
//if ($pden == "0")
//{
//	$pden = 0;
//}

# PROSINEC or last month making next month 1
if ($mes == "12")
{
	$rokd = $rok+1;
	$mesd = "1";
}
else
{
	$rokd = $rok;
	$mesd = $mes+1;
}
# LEDEN or first month making last month 12
if ($mes == "1")
{
	$rokp = $rok-1;
	$mesp = "12";
}
else
{
	$rokp = $rok;
	$mesp = $mes-1;
}

?>
<div class="calendar" id="calendar" name="calendar">
    <table class="calendar_table" id="calendar_table" name="calendar_table">
        <thead>
            <tr>
                <th colspan="7">
                    <p><a href=""><img class="calendar_arrows" src="images/Calendar_left_arrow.png" alt="icon to go back one year"/></a>2009<a href=""><img class="calendar_arrows" src="images/Calendar_right_arrow.png" alt="icon to go forward one year"/></a></p>
                </th>
                                    </tr>
                                    <tr>
                                        <th colspan="7">
                                            <p><a href=""><img class="calendar_arrows" src="images/Calendar_left_arrow.png" alt="icon to go back one month"/></a>November<a href=""><img class="calendar_arrows" src="images/Calendar_right_arrow.png" alt="icon to go forward one month"/></a></p>
                                        </th>
                                    </tr>

                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="7">
                                            <p>Mass at 6:30</p>
                                        </th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <th>
                                            <p>S</p>
                                        </th>
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
                                    </tr>