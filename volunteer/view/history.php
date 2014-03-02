<h4>Work History View</h4>
<?php

    $workHistory = array('1', '2', '3');
    global $workHistory2;
    
    $date = array('20130115', '20130116', '20130117');
    $start = array('05030', '0630', '0730');
    $end = array('1000', '1700', '1200');
    $association = array('Project Name', 'Event Name', 'Other');
    $authorized = array('Yes', 'Yes', 'No');
       
    $month;
    $day;
    $year;
    
    $startHrs;
    $endHrs;
    $startMins;
    $endMins;
    
    $timeOfDay;
    $timeOfDay2;
    
    global $totalHours;
       
    //require_once 'model/dbio_klt5179.php';
    
    //$workHistory = $dbio->getWorkHistory($vid='99');
    
    $totalHours = 0;
        
?>
<form action="index.php" method="GET">
    <table>
        <tr>
            <th>Event/Project</th>
            <th>Date Worked</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Authorized</th>
        </tr>
        <?php
        
        global $col;
        
        $col = count($workHistory);
        
        for ($i = 0; $i < $col;)
        {
            $workHistory2 = $workHistory[$i];
            // $i++;
            
            /*
            $date = $workHistory2->getDate();
            $start = $workHistory2->getStart();
            $end = $workHistory2->getEnd();
            $association = $workHistory2->getAssoc();
            $authorized = $workHistory2->getAuth();
            //$dateString = $workHistory->getDateString();
    
            //var_dump($workHistory);
             * 
             */
            
            $month = substr($date[$i],4,2);
            $day = substr($date[$i],6,8);
            $year = substr($date[$i],0,4);
    
            $startHrs = intval(substr($start[$i],0,2));
            $startMins = intval(substr($start[$i],2,5));
    
            $endHrs = substr($end[$i],0,2);
            $endMins = substr($end[$i],2,4);
            
    
            $timeOfDay = ($startHrs > 11) ? 'PM' : 'AM';
            $timeOfDay2 = ($endHrs > 11) ? 'PM' : 'AM';
    
            //$totalHours = $totalHours+($endHrs - $startHrs);
            $totalHours = $totalHours+5;
    
            if ($startHrs > 12) {$startHrs = strval($startHrs-12);}
            if ($endHrs > 12) {$endHrs = strval($endHrs-12);}
            
            echo '<tr>';
                echo '<td>' . $association[$i] . '</td>';
                echo '<td>' . $month . '/' . $day . '/' . $year . '</td>';
                echo '<td>' . $startHrs . ':' . $startMins . ' ' . $timeOfDay . '</td>';
                echo '<td>' . $endHrs . ':' . $endMins . ' ' . $timeOfDay2 . '</td>';
                echo '<td>' . $authorized[$i] . '</td>';
            echo '</tr>'; 
            
            $i++;
    
        }
        ?>
    </table>
    <br/>
    <br/>
    <label>Total Hours Worked: <?php echo $totalHours; ?></label>
</form>