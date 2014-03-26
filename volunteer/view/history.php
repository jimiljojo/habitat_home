<h2>volunteer/view/history.php</h2>
<hr>

<?php
        global $dir;
        global $sub;
        global $act;
        global $msg;
        $event_id=$dbio->getEventId($person_id);
        $event=$event_id;
        $dbevent= $dbio->getEvent($event);
        $dbdate= $dbio->getDate($event);
        $dbStartTime= $dbio->getStartTime($event);
        $dbEndTime= $dbio->getEndTime($event);
        

       
        //$dbevent = $dbio->getEventDate($event);
        //var_dump($dbevent);
    
	// TITLE: Volunteer Work History View
	// FILE: volunteer/view/history.php
	// AUTHOR: Logan Gurreri

        $workHistory = array('1', '2', '3', '4', '5');
        global $workHistory2;
        
        //$association = array('Penn State Build', 'Charity Event', 'Dinner', 'Meeting', 'Fundraiser');
        $association = array($dbevent);
        //$date = array('20140305', '20140309', '20140313', '20140315','20140401');
        $date = array($dbdate);
        // $start = array('1100', '0800', '0800', '0700','0700');
        $start = array($dbStartTime);
        // $end = array('1230', '0830', '0900', '0830', '0800');
        $end = array($dbEndTime);

        $auth = array('No', 'No', 'No', 'Yes', 'Yes');
        
        $month;
        $day;
        $year;
        
        $startHours;
        $endHours;
        $startMins;
        $endMins;
        
        $timeOfDay;
        $timeOfDay2;
        
        global $totalHours;
        global $totalEndMin;
        global $totalStartMin;
        global $totalMin;
        
        $totalHours = 0;
        $totalEndMin = 0;
        $totalStartMin = 0;
        $totalMin = 0;
         
?>

<style>
    table,th,td
    {
        border:1px solid black;
        border-collapse:collaspe;
        padding: 5px;
    }
</style>

<form>
<table>
    <tr>
        <th>Event/Project</th>
        <th>Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Authorized</th>
    </tr>
    
    <?php
        // global $col;
        
                
        // $col = count($workHistory);
        
        // for ($i = 0; $i < $col;)
        // {
        //     $workHistory2 = $workHistory[$i];
            
        //     // $month = substr($date[$i],4,2);
        //     // $day = substr($date[$i],6,8);
        //     // $year = substr($date[$i],0,4);
        //     $month = substr($date[$i]);
        //     $day = substr($date[$i]);
        //     $year = substr($date[$i]);

        //     $startHours = substr($start[$i],0,2);
        //     $startMins = substr($start[$i],2,5);
            
        //     $endHours = substr($end[$i],0,2);
        //     $endMins = substr($end[$i],2,4);
            
        //     $timeOfDay = ($startHours > 11) ? 'PM' : 'AM';
        //     $timeOfDay2 = ($endHours > 11) ? 'PM' : 'AM';
            
           // $totalHours = $totalHours+($dbEndTime - $dbStartTime);
        //     $totalEndMin = $totalEndMin+($endMins);
        //     $totalStartMin = $totalStartMin+($startMins);
        
            
        //     if ($startHours > 12) {$startHours = strval($startHours-12);}
        //     if ($endHours > 12) {$endHours = strval($endHours-12);}
            
            echo '<tr>';
                // echo '<td>' . $association[$i] . '</td>';
                // echo '<td>' . $day . '/' . $month . '/' . $year . '</td>';
                // echo '<td>' . $startHours . ':' . $startMins . ' ' . $timeOfDay . '</td>';
                // echo '<td>' . $endHours . ':' . $endMins . ' ' . $timeOfDay2 . '</td>';
                // echo '<td>' . $auth[$i] . '</td>';
                echo '<td>' . $dbevent . '</td>';
                echo '<td>' . $dbdate . '</td>';
                echo '<td>' . $dbStartTime . '</td>';
                echo '<td>' . $dbEndTime . '</td>';
                echo '<td>' . "Yes" . '</td>';
            echo '</tr>';
            
        //     $i++;
            
        // }
        
        $totalMin = $totalMin+($totalEndMin-$totalStartMin);
        
        while ($totalMin >= 60)
        {
            $totalMin = $totalMin - 60;
            $totalHours = $totalHours + 1;                 
        }
        
        while ($totalMin < 0)
        {
            $totalMin = $totalMin + 60;
            $totalHours = $totalHours - 1;
        }
    ?>
   
</table>
    
    <h5>Total Time Worked:
    <?php
    if ($totalMin == "0")
    {
        echo $totalHours . ' hours.';
    }
    else
    {
        echo $totalHours . ' hours ' . $totalMin . ' minutes.';
    }
    ?></h5>
    
</form>
<hr>

