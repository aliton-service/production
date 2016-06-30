<?php

class DateTimeManager
{
    static public function StrDateToUnix($date)
    {
        $DateTime = new DateTime($date);
        $DateTime = new DateTime($DateTime->format('d.m.Y H:i:s'));
               
        return $DateTime->getTimestamp();
    }
    
    static public function DateTimeDiffMinute($date1, $date2)
    {
            return ($date2-$date1)/60;
    }
    
    static public function YiiDateToAliton($Date) {
        // Формат даты 1987-03-10 00:00:00.000 приводим к виду  18.11.2015 19:17
        $Result = NULL;
        $Result = $Date;
        
        if (isset($Result[2]))
            if ($Result[2] === '.')
                return $Result;
            
        if (strlen($Result) === 0)
            return NULL;
            
        if ((strlen($Date) == 23) || (strlen($Date) == 19) || (strlen($Date) == 16)) {
            $Result = $Date[8] . $Date[9];
            $Result .= '.' . $Date[5] . $Date[6];
            $Result .= '.' . $Date[0] . $Date[1] . $Date[2] . $Date[3];
            $Result .= ' ' . $Date[11] . $Date[12];
            $Result .= ':' . $Date[14] . $Date[15];
        }
        return $Result;
    }
}


