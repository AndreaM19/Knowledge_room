<?php
class LoginSessions{
	
	/*Start a login session*/
	public static function startSession(){
		session_cache_limiter('nocache');
		session_start();

	}
	
	/*Stop a login session*/
	public static function stopSession($location){
		$_SESSION=array();
		session_destroy();
		if(isset($_COOKIE[session_name()])){
			setcookie(session_name(),'',time()-86400,'/');
		}
		header("location:".$location."");
	}
}