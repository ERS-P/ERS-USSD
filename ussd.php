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

//Second level responses
if($level>2){
    switch($data[2]){
    	case 0:
    	    user_register($data);
            break;
        case 1:
            if($text=="1*2*1"){
                emergency_curbed($data,$text);
            }
            else{
            report_fire($data,$text);
            }
            break;
        
        case 2:
            if($text=="1*2*2"){
                emergency_notcurbed($data,$text);
            }
            else{
            report_flood($data);
            }
            break;
        
//emergency_other moves further to level4            
        case 3:
            if($text=="1*2*3" || $level==4){
                emergency_other($data,$text);
            }
            else{
            report_carAccident($data);
            }
            break;

        case 4:
            report_firstAid($data);
            break;

        case 5:
            report_violence($data);
            break;

        case 6:
            report_other($data);
            break;
        
        
        //default:
        //$text = "Invalidate input\nPlease enter a valid menu option";
        //ussd_end($text);
    }
}

?>
