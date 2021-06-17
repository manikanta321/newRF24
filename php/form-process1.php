<?php

$errorMSG = "";


// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}



// catagary
if (empty($_POST["catagary"])) {
    $errorMSG = "catagary is required ";
    $catagary= "oo";
} else {
    $catagary = $_POST["catagary"];
}





// band
if (empty($_POST["band"])) {
    $errorMSG = "Name is required ";
} else {
    $band = $_POST["band"];
}


//gain
if (empty($_POST["gain"])) {
    $errorMSG = "Name is required ";
} else {
    $gain = $_POST["gain"];
}




// // subject

// if (empty($_POST["gain"])) {

//     $errorMSG .= "subject is required ";
// } else {
//     $subject = $_POST["gain"];
// }



// // Subject
// if (empty($_POST["subject"])) {
//     $errorMSG .= "Subject is required ";
// } else {
//     $subject = $_POST["subject"];
// }


// test data requird
if (empty($_POST["testDataSelected"])) {
    $errorMSG .= "testDataSelected ";
} else {
    $testDataSelected = $_POST["testDataSelected"];
}



// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}


$EmailTo = "sales@rforbit.com,manikantadk24@gmail.com,careers@itconnectus.com";
$Subject = "New Message Received";

// prepare email body text
$Body = "Name of the user";

$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";


$Body .= "catagary: ";
$Body .= $catagary;
$Body .= "\n";

$Body .= "band: ";
$Body .= $band;
$Body .= "\n";


$Body .= "gain: ";
$Body .= $gain;
$Body .= "\n";



$Body .= "Test data required ";
$Body .= $testDataSelected;
$Body .= "\n";


$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";




// send email
$success = mail($EmailTo, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

?>