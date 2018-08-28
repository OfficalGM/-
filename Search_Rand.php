<?php
    $dbhost = 'localhost';   
 	$dbuser = 'root';   
 	$dbpass = '23924505';   
 	$dbname = 'user';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_query("set names utf8");
    mysql_select_db($dbname);
    $sql="SELECT MAX(`Rand`) as Rand FROM `guest` WHERE 1";
    $result = mysql_query($sql);
    if(mysql_num_rows($result)>0){
        while($row=mysql_fetch_assoc($result)){
                  $Rand=$row['Rand'];
                  $Rand++;
                  $data[]=array('Rand'=>$Rand);
                  $tempJson= $data;
              }
         }
     echo json_encode($tempJson,JSON_UNESCAPED_UNICODE);
    
    
?>