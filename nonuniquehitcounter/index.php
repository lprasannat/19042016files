<?php
$filename="counter.txt";
function increment_count(){
    global $filename;
     $currentvalue = (file_exists($filename)) ? file_get_contents($filename) : 0;
    file_put_contents($filename, ++$currentvalue);
}
increment_count();
?>