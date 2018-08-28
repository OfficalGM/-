<?php
    header("Content-Type:text/html; charset=utf-8");
    mysql_query("set names utf8");
    $dbhost = 'localhost';   
 	$dbuser = 'root';   
 	$dbpass = '23924505';   
 	$dbname = 'trip'; 
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    $today = getdate();
    $month=$today['mon'];
    $day=$today['mday'];
    mysql_query("set names utf8");
	mysql_select_db($dbname);
    $sql ="SELECT * FROM `activity5` WHERE (loc='台北市' or loc='新北市' or loc='台中市'or loc='高雄市') and (StartM<='$month' and StartD<='$day') and (EndM>'$month[1]' or (EndM>='$month' and EndD>='$day'))ORDER BY `activity5`.`people` DESC LIMIT 20";
    
    $result = mysql_query($sql);
         if(mysql_num_rows($result)>0){
              while($row=mysql_fetch_assoc($result)){
                  $name=trim($row['name']);
                  $data[]=array("name"=>$name,"class"=>$row['class'],"address"=>$row['location'],"people"=>$row['people']);
                  $tempJson= $data;
              }
         }
     echo json_encode($tempJson,JSON_UNESCAPED_UNICODE);
?>