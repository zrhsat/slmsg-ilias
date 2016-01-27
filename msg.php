<?php
$msgFolder = "html/";
//grouping array to create group messages from groups.json
if(file_exists("groups.json")){
     $groups = json_decode(file_get_contents("groups.json"),true); 
}
//get the whole request uri sent by js script by variable
if( $_REQUEST["source"] ) {
    //do something
}
//get the hostname sent by js script by variable
if( $_REQUEST["host"] ) {
    //do something
}
//check if ref_id is available
if( $_REQUEST["ref_id"] ) {
//output group message if available    
    if(array_key_exists( $_REQUEST['ref_id'] , $groups)){
        if(file_exists($msgFolder.$groups[$_REQUEST['ref_id']].".html")){
            echo file_get_contents ( $msgFolder.$groups[$_REQUEST['ref_id']].".html");
        }
    } 
//outout module message if no group message is available    
    else{
        if(file_exists($msgFolder.$_REQUEST['ref_id'].".html")){
            echo file_get_contents ( $msgFolder.$_REQUEST['ref_id'].".html");
        }   
    } 
}
//do something if no ref_id is available
else{
    if(file_exists($msgFolder."nomsg.html")){
        echo file_get_contents ( $msgFolder."nomsg.html");
    } 
} 
?>