<?php 

if(isset($_POST['convert']))
{
    $amount=$_POST['amount'];
    $from=$_POST['from'];
    $to=$_POST['to'];
currency_convert($amount,$from,$to);
}
function currency_convert($amount,$from,$to)
{
  $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from&to=$to");
  $get = explode("<span class=bld>",$get);
  $get = explode("</span>",$get[1]);  
  $converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);
  echo $converted_amount;
}

?>
<html>
    <head>
        <title>
            CURRENCY CONVERTER
        </title>
    </head>
    <Body>
        <form action="" method="post">
            <input type="text" name="amount"/>
        <input type="text" name="from"/>
        <input type="text" name="to"/>
        <input type="submit" name="convert"/>
        </form>  
    </Body>
</html>