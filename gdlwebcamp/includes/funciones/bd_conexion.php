<?php 
 $connection = new mysqli('localhost', 'root', 'admin123', 'gdlwebcamp');
    if($connection -> connection_error){
        echo $error -> $connection -> connection_error;
    }
?>