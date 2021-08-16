<?php

//Feedback functions
//Curbed
function emergency_curbed($data, $text){
    global $conn;
    if(count($data)==3){
        $phoneNumber=$_POST['phoneNumber'];
        $feedback = "Emergency has been curbed";

        $sql = "INSERT INTO feedbacks(phoneNumber,feedback)
        VALUES('$phoneNumber', '$feedback')";

        $result = mysqli_query($conn, $sql);
        if($result){
            $text = "Your feedback submitted successfully\n";
            ussd_end($text);
        }
    }
}

//Not curbed
function emergency_notcurbed($data,$text){
    global $conn;
    if(count($data)==3){
        $phoneNumber=$_POST['phoneNumber'];
        $feedback = "Emergency has not been curbed";

        $sql = "INSERT INTO feedbacks(phoneNumber,feedback)
        VALUES('$phoneNumber', '$feedback')";

        $result = mysqli_query($conn, $sql);
        if($result){
            $text = "Your feedback submitted successfully\n";
            ussd_end($text);
        }
    }
}

//Custom feedback
function emergency_other($data,$text){
    global $conn;
    if(count($data)==3){
        $text = "Please enter your feedback:";
        ussd_start($text);
    }
    if(count($data)==4){
        $phoneNumber=$_POST['phoneNumber'];
        $feedback = $data[3];


        $sql = "INSERT INTO feedbacks(phoneNumber,feedback)
        VALUES('$phoneNumber', '$feedback')";

        $result = mysqli_query($conn, $sql);
        if($result){
            $text = "Your feedback submitted successfully\n";
            ussd_end($text);
        }
    }
}
?>
