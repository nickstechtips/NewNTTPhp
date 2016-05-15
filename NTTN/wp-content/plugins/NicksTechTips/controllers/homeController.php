<?php
require_once('../../../../wp-load.php');
require_once('../../../../wp-load.php');
include_once ('~/wp-content/plugins/NTTPlugin/utils/DataAccess.php');


global $wpdb;

$id = $_GET["id"];  
$method = $_GET["method"];
 
if(is_callable($method)){
    $method($id, $wpdb);
}else{
    defaultResponse(); //or some kind of error message
}


function getHybrids($wpdb){
   
    global $wpdb;
    $query = ("SELECT * FROM `inventory`.`wp_hybrid`;");       
    
    $results = $wpdb->get_results($query);
    
    return $results;
 
}

function Gethomepage(){
    global $wpdb;
    DataAccess::GetHomePage($_POST);
    
    exit();
}












