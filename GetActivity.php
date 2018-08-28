<?php
    header("Content-Type:text/html; charset=utf-8");
    mysql_query("set names utf8");
    $activity=$_POST['x'];
    $dbhost = 'localhost';   
 	$dbuser = 'root';   
 	$dbpass = '23924505';   
 	$dbname = 'trip'; 
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    $date=$_POST['date'];
    $month=explode("/",$date);
    mysql_query("set names utf8");
	mysql_select_db($dbname);
    switch($activity){
        case "台北":
            $sql ="SELECT * FROM `activity5` WHERE (loc='台北市' or loc='新北市') and (StartM<='$month[1]' and StartD<='$month[2]') and (EndM>'$month[1]' or (EndM>='$month[1]' and EndD>='$month[2]'))ORDER BY `activity5`.`people` DESC LIMIT 20";
           //print $sql;
            break;
        case "台中":
            $sql ="SELECT * FROM `activity5` WHERE loc='台中市'  and (StartM<='$month[1]' and StartD<='$month[2]') and (EndM>'$month[1]' or (EndM>='$month[1]' and EndD>='$month[2]'))ORDER BY `activity5`.`people` DESC LIMIT 30";
            break;  
        case "高雄":
           $sql ="SELECT * FROM `activity5` WHERE loc='高雄市' and (StartM<='$month[1]' and StartD<='$month[2]') and (EndM>'$month[1]' or (EndM>='$month[1]' and EndD>='$month[2]'))ORDER BY `activity5`.`people` DESC LIMIT 30";
            break;
    }
    $result = mysql_query($sql);
         if(mysql_num_rows($result)>0){
              while($row=mysql_fetch_assoc($result)){
                  $data[]=array("name"=>$row['name'],"class"=>$row['class'],"address"=>$row['location'],"people"=>$row['people']);
                  $tempJson= $data;
              }
         }
     echo json_encode($tempJson,JSON_UNESCAPED_UNICODE);
?>