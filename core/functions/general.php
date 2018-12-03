<?php
$link = new mysqli('localhost', 'root',  '', 'dc_okota_db');
function sanitize ($data) {
    global $link;
    $data = mysqli_real_escape_string ( $link,$data);
    return $data;   
}
function array_sanitize ($item) {
    global $link;
    $item = mysqli_real_escape_string ( $link,$item);
    return $item;   
}

function output_error($errors){
    $output = array();
    foreach ($errors as $error){
        $output[] = '<li>' .$error . '</li>';
    }
    return '<ul>' . implode('', $output) . '</ul>'; 
}
?> 