<?php
if(isset($_FILES['upload'])==true){
    $files=$_FILES['upload'];
for($x=0;$x<count($files['name']);$x++){
    $name=$files['name'][$x];
    $tmp_name=$files['tmp_name'][$x];
    move_uploaded_file($tmp_name,'upload/'.$name);
}    
//print_r(count($files));
}
?>
<form action="" method="post"enctype="multipart/form-data">
    <input type="file" name="upload[]" multiple>    
    <input type="submit" name="submit" value="Upload">
    
</form>