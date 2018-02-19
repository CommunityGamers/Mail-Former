<?php
//Config
 
//Recipient
$mailTo = 'name@domain.de';
 
//Where comes the Mail from
$mailFrom = '"No-reply" <name@servername/wunschname.de>';
 
//mail subject
$mailSubject = 'Betreff';
 
//redirect to page, if the process was done
$returnPage = 'gesendet.php';
 
//redirect to page, if the process was NOT done
$returnErrorPage = 'error.php';
 
//Mail text (at the top o.t. mail content)
$mailText = "MailText \n \n------------------------------\n \n";
 
//Creating the mail
 
if(isset($_POST['submit'])){
    foreach($_POST as $name => $value) {
        if(is_array($value)) {
            $mailText .= $name . ":\n";
           
            foreach($valueArray as $entry) {
                $mailText .= "   " . $value . "\n";
               
            }
        }else{
            $mailText .= $name . ": " . $value . "\n"."\n";
        }
    }
}
 
if(isset($_POST['submit'])) {
    //Delivery mail
 
    $mailSent = @mail($mailTo, $mailSubject, $mailText, "Von: ".$mailFrom);
 
    //Return side
 
    if($mailSent == TRUE) {
        header("Location:" . $returnPage);
    }else{
        header("Location:" . $returnErrorPage);
    }
}
 
exit();
 
