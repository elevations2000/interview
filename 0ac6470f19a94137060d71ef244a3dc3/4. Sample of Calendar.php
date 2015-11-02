<?php
require_once "commons.php";
require_once "CalendarBase.php";

class Calendar extends CalendarBase
{     // return an object if the there is an activitie in a given date
      function dbSelectByDateAndCourseId($date, $courseId)
      {     $startDate = $date." 00:00:00";
            $endDate   = $date." 23:59:59";      
            $link  = connect();
            $calendar = new Calendar;
            $result = mysql_query("select * from calendar where startDate between '".$startDate."' and '".$endDate."' and courseId='".$courseId."'");
            $row = mysql_fetch_assoc($result);
            if ($row==null) return  $calendar;
            foreach ($row as $key => $value)          
            {     $calendar->{$key} = $value;
            }  
            disconnect($link);
            return $calendar;  
      }
      function getCalendarById($calendarId)
      {     $link = connect();
            $calendar = new Calendar;
            $result = mysql_query("select * from calendar where id='".$calendarId."'");
            $row = mysql_fetch_assoc($result);
            if ($row==null) return $calendar;
            foreach ($row as $key => $value)
            {     $calendar->{$key} = $value;
            }
            disconnect($link);
            return ($calendar);
      }
      
      //  DATABASE managment CRUD
      
      function update()
      {     $link = connect();
            $result = mysql_query("update calendar set courseId='".$this->courseId."', startDate='".$this->startDate."', endDate='".$this->endDate."',  message_es='".$this->message_es."', message_en='".$this->message_en."', typeCourse='".$this->typeCourse."' where id='".$this->id."'");
            disconnect($link);          
      }
      
      function insert()
      {     $link = connect();
            $this->id = getPrimaryKey("calendar","CA-");
            $result = mysql_query("insert into calendar values ('".$this->id."','".$this->courseId."','".$this->startDate."','".$this->endDate."','".$this->message_es."','".$this->message_en."','".$this->typeCourse."')");
            disconnect($link);          
      }
      
      function delete()
      {     $link = connect();
            $result = mysql_query("delete from calendar where id='".$this->id."'");
            disconnect($link);          
      }
      
}
?>
