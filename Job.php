<?php
    $dbhost = 'localhost';   
 	$dbuser = 'root';   
 	$dbpass = '23924505';   
 	$dbname = 'user';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_query("set names utf8");
    mysql_select_db($dbname);
    $json=file_get_contents('php://input');
    $json=json_decode($json,true);
    $elementCount=count($json);
    $data=[];
    $sql="SELECT Max(`Job`) FROM `trip` WHERE 1";
    $result = mysql_query($sql);
    $Job=0;
    $user=$_COOKIE['user'];
    if(mysql_num_rows($result)>0){
       $row = mysql_fetch_array($result);
       $Job=$row[0];
       $Job++;
       $response[]=array("Job"=>$Job);
        echo Json_encode($response);      
    }
    
    
   
    
    
?>