<?php
    if (Yii::app()->user->isGuest)
        echo '<p>Для авторизации кликните: <a href="' . Yii::app()->createUrl ('site/login') .'">здесь</a>.';
    /*
    function holidays_count($datestart, $dateend, $holidays = array()) {
        if ($datestart > $dateend)
            return holidays_count($datestart, $dateend, $holidays);
        
        $sd = date("N", $datestart);
        $ed = date("N", $dateend);
        
        echo '<br>$datestart: ' . date('d.m.Y', $datestart) . '<br>$dateend: ' . date('d.m.Y', $dateend);
        echo '<br>$sd: ' . $sd . '<br>$ed: ' . $ed . '<br>($datestart - $dateend)/(86400*7): ' . (($dateend - $datestart)/(86400*7)); 
        
        $w = max(floor(($dateend - $datestart)/(86400*7)), 0);
        
        if ($sd > $ed) $w++;
        if ($ed == 7) $w++;
        
        $h = $w*2;
        
        foreach ($holidays as $hd) {
            echo '<br>$hd: ' . $hd;
            $hd = strtotime($hd);
            
            if ($hd >= $datestart && $hd <= $dateend && date("N", $hd) < 6)
                $h++;
        }
            
        return $h;
    }

    $datestart = strtotime('2016-01-01');
    $dateend = strtotime('2016-01-31');
    
    $holidays = array();
    $holidays[] = '2016-01-01';
    $holidays[] = '2016-01-04';
    $holidays[] = '2016-01-05';
    $holidays[] = '2016-01-06';
    $holidays[] = '2016-01-07';
    $holidays[] = '2016-01-08';
    
    //echo '<br>$h: ' . holidays_count($datestart, $dateend, $holidays);
    */
?>

