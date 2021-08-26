<?php

header("content-type:text/plain");

include("functions.php" );
include("connection.php");
include("reportFunctions.php");
include("feedback.php");

// $sessionId=$_POST['sessionId'];
// $serviceCode=$_POST['serviceCode'];

$phoneNumber=$_POST['phoneNumber'];
$text=$_POST['text'];

$data = explode("*",$text);

$level = 0;

$level = count($data);

if($level == 0 || $level == 1){
    main_menu($phoneNumber);
}

//Initital Level
if($level>1){
    switch($data[1]){
    	case 0:
            user_register($data, $phoneNumber);
            break;
            
        case 1:
            check_if_registered($data,$phoneNumber);
            // report_emergency($data);
            //report_emergency will be availabe after user registers
            break;
        
        case 2:
            send_feedback($data);
            break;
    
        case 3:
                check_user_exist($phoneNumber);
            //check_user_exist($phoneNumber);
            //user_register($data, $phoneNumber);
            break;
        
        default:
        $text = "Invalid input\nPlease enter a valid menu option";
        ussd_end($text);
    }
}



?>
