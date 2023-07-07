<?php

function render($view, $title, $data=null){
    if($data){
        $data = extract($data);
    }

    require('views/'.$view.'.php');
}    
?>