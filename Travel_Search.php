<?php
    header("Content-Type:text/html; charset=utf-8");
    mysql_query("set names utf8");
    $dbhost = 'localhost';   
 	$dbuser = 'root';   
 	$dbpass = '23924505';   
 	$dbname = 'travel'; 
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_query("set names utf8");
	mysql_select_db($dbname);
    $search=$_POST['x'];
    $keyword=$_POST['key'];
    switch($search){
        case "台北":
            $sql="SELECT * FROM `taipei` Where name like'%".$keyword."%'";
            $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                        while($row=mysql_fetch_assoc($result)){
                            $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description'],"label"=>$row['label']);
                            $tempJson= $data;
                            
                        }
                }
                else{
                    $data[]=array("name"=>"無此資料");
                    $tempJson=$data;
                }  
            break;
        case "台中":
             $sql="SELECT * FROM `taichung`Where name like'%".$keyword."%'";
             $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                        while($row=mysql_fetch_assoc($result)){
                            $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description'],"label"=>$row['label']);
                            $tempJson= $data;
                        }
                }
                else{
                    $data[]=array("name"=>"無此資料");
                    $tempJson=$data;
                } 
                
            break;
        case "高雄":
             $sql="SELECT * FROM `kaohsiung` Where name like'%".$keyword."%'";
             $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                        while($row=mysql_fetch_assoc($result)){
                            $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description'],"label"=>$row['label']);
                            $tempJson= $data;
                        }
                }
                else{
                    $data[]=array("name"=>"無此資料");
                    $tempJson=$data;
                } 
            break;
        case "台北1":
             $sql="SELECT * FROM `taipei_hotel` Where name like'%".$keyword."%'";
             $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                        while($row=mysql_fetch_assoc($result)){
                            $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address']);
                            $tempJson= $data;
                        }
                }
                else{
                    $data[]=array("name"=>"無此資料");
                    $tempJson=$data;
                } 
            break;
        case "台中1":
             $sql="SELECT * FROM `taichung_hotel` Where name like'%".$keyword."%'";
             $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                        while($row=mysql_fetch_assoc($result)){
                            $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address']);
                            $tempJson= $data;
                        }
                }
                else{
                    $data[]=array("name"=>"無此資料");
                    $tempJson=$data;
                } 
            break;
        case "高雄1":
             $sql="SELECT * FROM `kao_hotel` Where name like'%".$keyword."%'";
             $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                        while($row=mysql_fetch_assoc($result)){
                            $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address']);
                            $tempJson= $data;
                        }
                }
                else{
                    $data[]=array("name"=>"無此資料");
                    $tempJson=$data;
                } 
            break;

    }
    echo json_encode($tempJson,JSON_UNESCAPED_UNICODE);
?>