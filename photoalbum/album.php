<html>
    <head>
        <script src="js/jquery.js"></script>
        <script src="js/lightbox.min.js"></script>
        <link href="lightbox.css" rel="stylesheet" />    
    </head>
    <body>
        <?php
        $page = $_SERVER['PHP_SELF'];
       
        $column = 5;
       
        $base = "data";
        $thumbs = "thumbs";
      
        if (isset($_GET['album'])) {
            $get_album = $_GET['album'];
        }
        
        if (!isset($get_album)) {
            echo '<b>Select an album</b><br>';
            
            $handle = opendir($base);
            while (false !== ($file = readdir($handle))) {
                if (is_dir($base . "/" . $file) && $file != "." && $file != ".." && $file != $thumbs) {
                    echo "<a href='$page?album=$file'>" . $file . "</a><br>";
                }
            }
            closedir($handle);
        } else { 
            if (!is_dir($base . "/" . $get_album) || (strstr($get_album, ".") != NULL) || (strstr($get_album, "/") != NULL ) || (strstr($get_album, "\\") != NULL)) {
                echo 'Album does not exists';
            } else {
                echo "<b>" . $get_album . "</b><p />";
                $x = 0;
                                
                $handle = opendir($base . "/" . $get_album);
                while (($file = readdir($handle)) != false) {
                    if ($file != "." && $file != "..") {
                        echo "<table style='display:inline;'><tr><td><a href='$base/$get_album/$file' data-lightbox='nondatabasealbum'><img src='$base/$thumbs/$file' height='100' width='80'></a><td></tr></table>";
                        $x++;
                        if ($x == $column) {
                             echo '<br>';
                            $x = 0;
                           
                        }
                    }
                }

                closedir($handle);
                echo "<p><a href='$page'>Back to Albums";
            }
        }
        
        ?>
    </body>

</html>