<?php
    header("Content-Type:text/html; charset=utf-8");
    mysql_query("set names utf8");
    $hotel=$_POST['x'];
    $dbhost = 'localhost';   
 	$dbuser = 'root';   
 	$dbpass = '23924505';   
 	$dbname = 'travel'; 
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_query("set names utf8");
	mysql_select_db($dbname);
    switch($hotel){
        case "台北":
             $sql ="SELECT * FROM `taipei_hotel` Where class='民宿'";
            break;
        case "台中":
            $sql="SELECT * FROM `taichung_hotel` Where class='民宿'";
            break;  
        case "高雄":
             $sql="SELECT * FROM `kao_hotel` Where class='民宿'";
            break;
    }
    $result = mysql_query($sql);
         if(mysql_num_rows($result)>0){
              while($row=mysql_fetch_assoc($result)){
                  $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address']);
                  $tempJson= $data;
              }
         }
     echo json_encode($tempJson,JSON_UNESCAPED_UNICODE);
?>