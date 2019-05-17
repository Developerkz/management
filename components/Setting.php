<?php
class Setting{
	
	public static function page404(){
		require_once(P."html/404.php");
		exit();
	}
	public static function uri(){
		echo URL;
	}
	public static function getUri(){
		return URL;
	}
	public static function getImage($folder = ''){
		if($folder == ''){
			echo "files/images/";
		}
		else{
			echo "files/".$folder."/";
		}
	}
	public static function toKBSize( $size ){
	    $fileSize = 0;
	    if ($size > 1024 * 1024) {
	        $fileSize = round($size * 100 / (1024 * 1024) / 100).'MB';
	    }else {
	        $fileSize = round(($size * 100 / 1024) / 100).'KB';
	    }
	    return $fileSize;
	}
	public static function transform($text){
			$letters = array(
				'a','b','c','d','e','f',
				'g','h','i','j','k','l',
				'm','n','o','p','q','r',
				's','t','u','v','w','x',
				'y','z',
				'A','B','C','D','E','F',
				'G','H','I','J','K','L',
				'M','N','O','P','Q','R',
				'S','T','U','V','W','X',
				'Y','Z',
				'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п',
	            'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',
	            'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П',
	            'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я',
	            '1','2','3','4','5','6','7','8','9','0',' ',
	            '`','!','@','#','$','%','^','&','*','(',')','=',
	            '<','>',',','.','/','?',':',';','"','\'','[',']',
	            '{','}','\\','|','+','-','_','~'
			);

			$filter = array(
				'a','b','c','d','e','f',
				'g','h','i','j','k','l',
				'm','n','o','p','q','r',
				's','t','u','v','w','x',
				'y','z',
				'A','B','C','D','E','F',
				'G','H','I','J','K','L',
				'M','N','O','P','Q','R',
				'S','T','U','V','W','X',
				'Y','Z',
				'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п',
	            'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',
	            'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П',
	            'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я',
	            '1','2','3','4','5','6','7','8','9','0',' ',
	            '','','','','','','','','','','','',
	            '','','','','','','','','','','','',
	            '','','','','','','',''
			);

			$word = str_replace($letters, $filter, $text);
			return $word;
	}
	public static function getTime($time){
		if($time){
			$pattern = '/([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9]{2}):([0-9]{2}):([0-9]{2})/';
			$year = preg_replace($pattern, '$1', $time);
			$month = preg_replace($pattern, '$2', $time);
			$day = preg_replace($pattern, '$3', $time);
			$hour = preg_replace($pattern, '$4', $time);
			$minute = preg_replace($pattern, '$5', $time);
			$months = array(
				'01' => 'Январь','02' => 'Февраль','03' => 'Март',
				'04' => 'Апрель','05' => 'Май','06' => 'Июнь',
				'07' => 'Июль','08' => 'Август','09' => 'Сентябрь',
				'10' => 'Октябрь','11' => 'Ноябрь','12' => 'Декабрь','00' => '',
			);
			return $hour.":".$minute." , ".$day." ".$months[$month]." ".$year;
		}
		else{
			return false;
		}
	}
	public static function generate($start_num = 10,$end_number = 20){
		if($start_num > $end_number){return false;}
		$number = rand($start_num,$end_number);
	    $arr = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','r','s',
					 't','u','v','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L',
					 'M','N','O','P','R','S','T','U','V','X','Y','Z','1','2','3','4','5','6',
	                 '7','8','9','0');
	    $password = "";
	    for($i = 0; $i < $number; $i++){
	      $index = rand(0, count($arr) - 1);
	      $password .= $arr[$index];
	    }
	  return $password;
	}
	public static function sendMail($from,$to,$subject,$body)
	{
		$charset = 'utf-8';
		mb_language("ru");
		$headers  = "MIME-Version: 1.0 \n" ;
		$headers .= "From: <".$from."> \n";
		$headers .= "Reply-To: <".$from."> \n";
		$headers .= "Content-Type: text/html; charset=$charset \n";
		$subject = '=?'.$charset.'?B?'.base64_encode($subject).'?=';
		mail($to,$subject,$body,$headers);
	}
	public static function encryption($password){
		$password = md5($password).md5($password);
		$password = strrev($password);
		$password = md5($password);
		$password = strrev($password);
		return $password;
	}
	public static function checkDevice() { 
	    $mobile_agent_array = array(
	    	'ipad', 'iphone', 'android', 'pocket', 'palm', 'windows ce', 
	    	'windowsce', 'cellphone', 'opera mobi', 'ipod', 'small', 
	    	'sharp', 'sonyericsson', 'symbian', 'opera mini', 'nokia', 
	    	'htc_', 'samsung', 'motorola', 'smartphone', 'blackberry', 
	    	'playstation portable', 'tablet browser'
	    );
	    $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	    foreach ($mobile_agent_array as $mobile_agent) {    
	        if (strpos($agent, $mobile_agent) !== false) return ucfirst($mobile_agent);   
	    }
	    return "PC"; 
	}

}