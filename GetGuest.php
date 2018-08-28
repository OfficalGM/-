<?php
    header("Content-Type:text/html; charset=utf-8");
    mysql_query("set names utf8");
    $dbhost = 'localhost';   
 	$dbuser = 'root';   
 	$dbpass = '23924505';   
 	$dbname = 'user'; 
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   
    mysql_query("set names utf8");
	mysql_select_db($dbname);
    $sql ="SELECT * FROM `guest` WHERE `MD5`!='0'";
    //print $sql;
    $result = mysql_query($sql);
         if(mysql_num_rows($result)>0){
              while($row=mysql_fetch_assoc($result)){
                  $data[]=array("Rand"=>$row['Rand'],"MD5"=>$row['MD5'],"day"=>$row['day'],"trip1"=>$row['trip1'],"trip2"=>$row['trip2'],"trip3"=>$row['trip3'],"trip4"=>$row['trip4'],"trip5"=>$row['trip5'],"trip6"=>$row['trip6'],"trip7"=>$row['trip7'],"trip8"=>$row['trip8']);
                  $tempJson= $data;
              }
         }
     echo json_encode($tempJson,JSON_UNESCAPED_UNICODE);
?>