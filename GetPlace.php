<?php
    header("Content-Type:text/html; charset=utf-8");
    mysql_query("set names utf8");
    $activity=$_POST['x'];
    $dbhost = 'localhost';   
 	$dbuser = 'root';   
 	$dbpass = '23924505';   
 	$dbname = 'trip'; 
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_query("set names utf8");
	mysql_select_db($dbname);
    switch($activity){
        case "台北":
            $sql ="SELECT`trip`,(SUM(`rank5`*5+`rank4`*4+`rank3`*3)/(`rank5`+`rank4`+`rank3`)) as price FROM `taipei` WHERE (`loc`='0' or 'loc'='1') and `rank5`>20 and `rank4`>10 and `rank3` >10 GROUP BY `trip`  
ORDER BY `price`  DESC LIMIT 20";
           //print $sql;
            break;
        case "台中":
            $sql ="SELECT`trip`,(SUM(`rank5`*5+`rank4`*4+`rank3`*3)/(`rank5`+`rank4`+`rank3`)) as price FROM `taipei` WHERE `loc`='2' and `rank5`>10 and `rank4`>10 and `rank3` >10 GROUP BY `trip`  
ORDER BY `price`  DESC LIMIT 20 ";
            break;  
        case "高雄":
           $sql ="SELECT`trip`,(SUM(`rank5`*5+`rank4`*4+`rank3`*3)/(`rank5`+`rank4`+`rank3`)) as price FROM `taipei` WHERE `loc`='3' and `rank5`>10 and `rank4`>10 and `rank3` >10 GROUP BY `trip`  
ORDER BY `price`  DESC LIMIT 20";
            break;
    }
    $result = mysql_query($sql);
         if(mysql_num_rows($result)>0){
              while($row=mysql_fetch_assoc($result)){
                  $price=round($row['price'],1);
                  $data[]=array("name"=>$row['trip'],"price"=>$price);
                  $tempJson= $data;
              }
         }
     echo json_encode($tempJson,JSON_UNESCAPED_UNICODE);
?>