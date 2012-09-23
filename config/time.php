<?php

class Time{
	static $format = "M d Y";
	
	public static function getMinute($minute = 1){
		return $minute * 60;
	}
	
	public static function getHour($hour = 1){
		return self::getMinute(60) * $hour;
	}
	
	public static function getDay($day = 1){
		return self::getHour(24) * $day;
	}
	
	public static function dateDaysFromNow($days = 1){
		$time = time() + self::getDay($days);
		//return getdate($time);
		return date(self::$format,$time);
	}
	
	public static function dateToUnix($date){
		return strtotime($date);
	}
	
	public static function dateDaysFromDate($date, $days=1){
		$time = self::dateToUnix($date) + self::getDay($days);
		return date(self::$format, $time);
	}
	
	public static function unixToDate($unix){
		return date(self::$format,$unix);
	}
	
	public static function dbTimestampToArray($ts){
		$time = self::dateToUnix($ts);
		return getdate($time);
	}
	
	public static function dbTimestampToFormat($ts){
		$time = self::dateToUnix($ts);
		return self::unixToDate($time);
	}
	
}
?>
