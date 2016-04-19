<?php
require 'connection.php';
echo "<h1>Mailing List</h1>send to<p>";
echo "<form action='send.php' method='post'>";
$MailCount=0;
$NameCount=0;
$Query=mysqli_query($con,"SELECT * FROM  MailingList WHERE Send='1'");
while($GetRow=mysqli_fetch_assoc($Query))
{
    //echo $GetRow['Email']."<br>";
    echo "<input type='checkbox' name='mail_".$MailCount++."' value='".$GetRow['Email']."' CHECKED>".$GetRow["FirstName"]."".$GetRow['LastName']."(".$GetRow["Email"].")"
            . "<input type='hidden' name='name_".$NameCount++."' value='".$GetRow['FirstName']."'<br>";
   
    
}


echo "<p>Message:<br>
<textarea name='message'></textarea><p>
<input type='submit' name='submit' value='Send'>
</form>";
?>