<?php 

//echo "Yo Mama<br />";

//connect to sql server
$con = mysqli_connect("localhost", "root", "ywc123", "openemr")
	or die("Could not connect to Server");
	echo "Connected to Database Succesfully<br />";

$tomorrow1 = mktime(0,0,0, date("m"), date("d") +2, date("Y"));
$tomorrow2 = date("Y-m-d", $tomorrow1);
//echo $tomorrow2;
$today2 = date('Y-m-d:H:i:s');
$filename = "PBXdata-".$today2.".csv";
$filename2 = date('m-d-y').".csv";
$filename3 = "voicent.csv";
//echo $today2;


//Place query into a Variable
$pbx_query = "SELECT DISTINCT CONCAT(patient_data.fname,' ', patient_data.lname), patient_data.phone_home, CONCAT(DATE_FORMAT(cal_events.pc_eventDate, '%m/%d/%Y'),  		' ',	DATE_FORMAT(cal_events.pc_startTime, '%h:%i %p')), CONCAT(DATE_FORMAT(cal_events.pc_eventDate, '%m/%d/%Y'),  ' ', DATE_FORMAT(cal_events.pc_endTime, '%h:%i %p')), patient_data.call_time INTO OUTFILE '/home/tech/Shares/voicent/".$filename3."'   FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'   LINES TERMINATED BY '\n'   FROM (patient_data)  LEFT JOIN  openemr_postcalendar_events AS cal_events ON patient_data.pid=cal_events.pc_pid
                WHERE  cal_events.pc_eventDate = '".$tomorrow2."' and cal_events.pc_title != \"09. Vocation Counselor\" GROUP BY patient_data.pid ORDER BY patient_data.postal_code";




//execute query for results
$res = mysqli_query($con, $pbx_query)
or die(mysqli_error($con));



?>
