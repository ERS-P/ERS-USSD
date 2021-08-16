<?php

//This file contains all reporting functions

// Fire
function report_fire($data, $text){
    global $conn;
    if(count($data)==3){
        $text = "Enter description of emergency";
        ussd_start($text); 
    }
    if(count($data)==4){
        $text = "Enter location of emergency";
        ussd_start($text); 
    }
    if(count($data)==5){
        $phoneNumber=$_POST['phoneNumber'];
        $type = "Fire";
        $description = $data[3];
        $location = $data[4];

        $sql = "INSERT INTO emergency_reports(phoneNumber, emergency_type, description, location, 
        reportDate) VALUES('$phoneNumber', '$type',
        '$description', '$location',NOW())";

        $result = mysqli_query($conn, $sql);
        if($result){
            $text = "Your emergency has been submitted successfully\n";
            ussd_end($text);
        }
        
    }
}

//Flood
function report_flood($data){
    global $conn;
    if(count($data)==3){
        $text = "Enter description of emergency";
        ussd_start($text); 
    }
    if(count($data)==4){
        $text = "Enter location of emergency";
        ussd_start($text); 
    }
    if(count($data)==5){
        $phoneNumber=$_POST['phoneNumber'];
        $type = "Flood";
        $description = $data[3];
        $location = $data[4];

        $sql = "INSERT INTO emergency_reports(phoneNumber, emergency_type, description, location, 
        reportDate) VALUES('$phoneNumber', '$type',
        '$description', '$location',NOW())";

        $result = mysqli_query($conn, $sql);
        if($result){
            $text = "Your emergency has been submitted successfully\n";
            ussd_end($text);
        }

        
    }
}

//Car Accident
function report_carAccident($data){
    global $conn;
    if(count($data)==3){
        $text = "Enter description of emergency";
        ussd_start($text); 
    }
    if(count($data)==4){
        $text = "Enter location of emergency";
        ussd_start($text); 
    }
    if(count($data)==5){
        $phoneNumber=$_POST['phoneNumber'];
        $type = "Car Accident";
        $description = $data[3];
        $location = $data[4];

        $sql = "INSERT INTO emergency_reports(phoneNumber, emergency_type, description, location, 
        reportDate) VALUES('$phoneNumber', '$type',
        '$description', '$location',NOW())";

        $result = mysqli_query($conn, $sql);
        if($result){
            $text = "Your emergency has been submitted successfully\n";
            ussd_end($text);
        }
        
    }
}

//First Aid
function report_firstAid($data){
    global $conn;
    if(count($data)==3){
        $text = "Enter description of emergency";
        ussd_start($text); 
    }
    if(count($data)==4){
        $text = "Enter location of emergency";
        ussd_start($text); 
    }
    if(count($data)==5){
        $phoneNumber=$_POST['phoneNumber'];
        $type = "First Aid";
        $description = $data[3];
        $location = $data[4];

        $sql = "INSERT INTO emergency_reports(phoneNumber, emergency_type, description, location, 
        reportDate) VALUES('$phoneNumber', '$type',
        '$description', '$location',NOW())";

        $result = mysqli_query($conn, $sql);
        if($result){
            $text = "Your emergency has been submitted successfully\n";
            ussd_end($text);
        }
        
    }
}

//Violence
function report_violence($data){
    global $conn;
    if(count($data)==3){
        $text = "Enter description of emergency";
        ussd_start($text); 
    }
    if(count($data)==4){
        $text = "Enter location of emergency";
        ussd_start($text); 
    }
    if(count($data)==5){
        $phoneNumber=$_POST['phoneNumber'];
        $type = "Violence";
        $description = $data[3];
        $location = $data[4];

        $sql = "INSERT INTO emergency_reports(phoneNumber, emergency_type, description, location, 
        reportDate) VALUES('$phoneNumber', '$type',
        '$description', '$location',NOW())";

        $result = mysqli_query($conn, $sql);
        if($result){
            $text = "Your emergency has been submitted successfully\n";
            ussd_end($text);
        }
        
    }
}

//Other
function report_other($data){
    global $conn;
    if(count($data)==3){
        $text = "Enter type of emergency";
        ussd_start($text); 
    }
    if(count($data)==4){
        $text = "Enter description of emergency";
        ussd_start($text); 
    }
    if(count($data)==5){
        $text = "Enter location of emergency";
        ussd_start($text); 
    }
    if(count($data)==6){
        $phoneNumber=$_POST['phoneNumber'];
        $type = $data[3];
        $description = $data[4];
        $location = $data[5];

        $sql = "INSERT INTO emergency_reports(phoneNumber, emergency_type, description, location, 
        reportDate) VALUES('$phoneNumber', '$type',
        '$description', '$location',NOW())";

        $result = mysqli_query($conn, $sql);
        if($result){
            $text = "Your emergency has been submitted successfully\n";
            ussd_end($text);
        }
        else{
            die(mysqli_error($conn));
        }
        
    }
}

?>
