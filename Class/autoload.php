<?php
    foreach (glob("*.php") as $filename)
    {
        echo $filename;
        include $filename;
    }
?>