<?php

//CON
function ussd_start($text){
    echo "CON  ".$text;
}

//END
function ussd_end($text){
    echo "END ".$text;
    exit(0);
}

//main menu
function main_menu($phoneNumber){
    global $conn;
     $select_phone ="SELECT * FROM user WHERE 
     phoneNumber = '$phoneNumber'";
     $query = mysqli_query($conn, $select_phone) 
     or die("There is an error: ".mysqli_error($conn));

     $check = mysqli_num_rows($query); 
     if($check>0){
        $text = "Welcome to Emergency System\n
        1.Report an emergency\n
        2.Send a feedback\n
        3.Check if you are registered";

        ussd_start($text);
    }
     else{
         //Prompt user to register before getting access
         $text = "Welcome to Emergency System\n
         Please register first before performing any activity.
         Press 0 to REGISTER";

         ussd_start($text);
     }
}

//check for existence of user 
//once user exists, main menu will be availble
function check_user_exist($phoneNumber){
    global $conn;
    $select_phone ="SELECT * FROM user WHERE phoneNumber = '$phoneNumber'";
    $query = mysqli_query($conn, $select_phone) 
    or die("There is an error: ".mysqli_error($conn));

    $check = mysqli_num_rows($query); 
    if($check>0){
        $text = "You have been registered on this platform";
        ussd_end($text);
    }
}

//User registration 
function user_register($data){
    global $conn; 
    if(count($data)==2){
        $text = "Enter your first name";
        ussd_start($text); 
    }
    if(count($data)==3){
        $text = "Enter your last name";
        ussd_start($text); 
    }
    if(count($data)==4){
        $text = "Press 1 if your gender is male or 2 for female";
        ussd_start($text); 
    }
    if(count($data)==5){
        $text = "Enter a vaild ID Number";
        ussd_start($text); 
    }
    if(count($data)==6){
        $text = "Enter your email";
        ussd_start($text); 
    }
    if(count($data)==7){
        $phoneNumber=$_POST['phoneNumber'];
        $firstname = $data[2];
        $lastname = $data[3];
        //gender
        if($data[4]=="1"){
            $gender = "male";
        }else{
            $gender = "female";
        }
        $idNumber = $data[5];
        $email = $data[6];

        $sql = "INSERT INTO user(phoneNumber, firstname, lastname, 
        gender, idNumber, email, registerDate) VALUES('$phoneNumber',
        '$firstname', '$lastname', '$gender', '$idNumber', '$email'
        ,NOW())";

        $result = mysqli_query($conn, $sql);

        if($result){
        $text = "Thank you $firstname $lastname, you have been
        registered successfully";
        ussd_end($text);
        }
        else{
            die("There was an error: ". mysqli_error($conn));
        }

    }
}

//check if user has already registered
function check_if_registered($data, $phoneNumber){
    global $conn;
    $select_phone ="SELECT * FROM user WHERE 
    phoneNumber = '$phoneNumber'";
    $query = mysqli_query($conn, $select_phone) 
    or die("There is an error: ".mysqli_error($conn));

    $check = mysqli_num_rows($query); 
    if($check>0){
        report_emergency($data,$phoneNumber);
    }
    else{
        $text = "Please register first before performing any activity";
        ussd_end($text);
    }

}

//report emergency
function report_emergency($data){
    if(count($data)==2){
    $text = "Choose the type of emergency\n
    1.Fire
    2.Flood
    3.Car Accident
    4.First Aid
    5.Violence
    6.Other";
    ussd_start($text);
    }
    
     if(count($data)>2){
        if($data[2]==1){
            report_fire($data,$text);
        }
        else if($data[2]==2){
            report_flood($data,$text);
        }
        else if($data[2]==3){
            report_carAccident($data,$text);
        }
        else if($data[2]==4){
            report_firstAid($data,$text);

        }
        else if($data[2]==5){
            report_violence($data,$text);
        }
        else if($data[2]==6){
            report_other($data,$text);
        }
        else{
            $text = "Invalidate Entry, please try again";
            ussd_end($text);
        }
    }
}

//send feed back
function send_feedback($data){
    if(count($data)==2){
    $text = "Choose one of the feedbacks\n
    1.Emergency has been curbed\n
    2.Emergency has not been curbed\n
    3.Other";
    ussd_start($text);
    }
    
    if(count($data)>2){
        if($data[2]==1){
            emergency_curbed($data,$text);
        }
        if($data[2]==2){
            emergency_notcurbed($data,$text);
        }
        if($data[2]==3){
            emergency_other($data,$text);
        }
        else{
            $text="Invalid Entry, try again";
            ussd_end($text);
        }
    }
    
}



//-------------------Emergencies---------------------\\


?>
