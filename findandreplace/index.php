
<?php
function addDelimiter(&$in){
    $in='/'.trim($in).'/';
}

if(isset($_POST['find'],$_POST['replace'],$_POST['text'])===true){
    if(empty($_POST['find'])===false){
        $find=explode(',',$_POST['find']);
        array_walk($find,'addDelimiter');      
    }
    $replace=(empty($_POST['replace'])==false)?explode(',',$_POST['replace']):'';
    $text = (empty($find) === false && empty($replace) === false) ? preg_replace($find, $replace, $_POST['text']) : $_POST['text'];
    
    
}
?>
<form action="" method="post">
    <input type="text" name="find" placeholder="words,to,find">
    <input type="text" name="replace" placeholder="replacement,text,here">
    <p><textarea name="text" rows="10" cols="37"><?php echo (empty($text)==false)?$text:'';?></textarea></p>
    <input type="submit" value="submit">
</form>