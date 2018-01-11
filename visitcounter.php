<?php
	function computeVisitors($visits)
	{
		if(!$visits)
		{
			RunSQL("UPDATE statistics SET Visits = Visits+1 WHERE stats=1",0,0);
			$res = RunSQL("select * FROM statistics where stats=1 ",0,0);
 			if (!$res) 
 			{
 				$visits = 'Currently Unavailable';
 			}
			$mujvysledek = MySQL_Fetch_Array($res);
 			$visits= $mujvysledek["Visits"];
			mysql_free_result($res);
		}
		return $visits;
		
	}
	
	function showVisitors($visits)
	{
		echo " <p><h5> Number of Visitors since September 2008: <span style='color: #0000FF;'>".$visits."</span></h5></p>";
	}



?>