<?php
require 'connection.php';
ini_set("SMTP",'lakshmi.nadella@karmanya.co.in');
$headers="From:lakshmi.nadella@karmanya.co.in";
$message=$_POST['message'];
for($x=0;$x<count($_GET);$x++){
    if($_GET["mail_$x"]){
        $to=$_GET["mail_$x"];
        $subject="NewsLetter";
        $body="Dear".$_GET["name_$x"]."
                \n\n $message\n\n
               karmanya ";
        mail($to,$subject,$body,$headers);
    }
}
echo "all mails are processed";
?>