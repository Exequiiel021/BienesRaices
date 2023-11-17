<?php 

    function conectarDB(){
        $db = mysqli_connect('localhost', 'root', 'Exe230994' , 'bienesraices_crud');
        $db->set_charset('utf8');

        return $db;
    }
?>