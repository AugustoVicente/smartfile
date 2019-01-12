<?php 
    class DateConverter 
    {
        function __construct()
        {
        }
        public function getDate($datetime)
        {
            $dateReturn = substr($datetime, -11, 2).'/';
            $dateReturn .= substr($datetime, 5, 2).'/';
            $dateReturn .= substr($datetime, 0, 4);
            return $dateReturn;
        }
        public function getDateFromDate($datetime)
        {
            $dateReturn = substr($datetime, -2, 2).'/';
            $dateReturn .= substr($datetime, 5, 2).'/';
            $dateReturn .= substr($datetime, 0, 4);
            return $dateReturn;
        }
    }
?>