<?php
    function ChangeURL($path)
    {
        echo "<script type= ".'"text/javascript"'.">";
        echo "location = ".'"'.$path.'";';
        echo "</script>";
    } 
?>