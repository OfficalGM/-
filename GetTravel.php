<?php
//台北
	header ('charset=Unicode');
	$dbhost = 'localhost';   
 	$dbuser = 'root';   
 	$dbpass = '23924505';   
	$dbname = 'travel'; 
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname);  
    mysql_query("set names utf8");
    $json=file_get_contents('php://input');
    
    
    $json=json_decode($json,true);
    $elementCount=count($json);
    
    for($i=0;$i<$elementCount;$i++){
            $dbname = 'travel'; 
            mysql_select_db($dbname);  
            mysql_query("set names utf8");
            $str=$json[$i]['travel'];
            $sql="SELECT `latitude`, `longitude`, `label` FROM `taipei` WHERE `name`like'".$str."'";
            
            $result = mysql_query($sql);
            if(mysql_num_rows($result)>0) { 
                //景點
                
                while($row=mysql_fetch_assoc($result)){
                    $data[]=array("name"=>$str,"lat"=>$row['latitude'],"lng"=>$row['longitude'],"label2"=>$row['label']);
                }
            }
            else{
                //旅館
                $sql="SELECT `latitude`, `longitude` FROM `taipei_hotel` WHERE `name` like'".$str."'";
                $result = mysql_query($sql);
                if(mysql_num_rows($result)>0) {
                    
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$str,"lat"=>$row['latitude'],"lng"=>$row['longitude'],"label2"=>'0');
                    }
                }
                else{
	                $dbname = 'trip'; 
                    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
	                mysql_select_db($dbname);  
                    mysql_query("set names utf8");
                    $sql="SELECT`lat`, `lng` FROM `taipei` WHERE `trip` LIKE '".$str."'";
                    $result = mysql_query($sql);
                    if(mysql_num_rows($result)>0){
                        
                        while($row=mysql_fetch_assoc($result)){
                            $data[]=array("name"=>$str,"lat"=>$row['lat'],"lng"=>$row['lng'],"label2"=>'0');
                        }
                    }
                    else{
                        $sql="SELECT`lat`, `lng` FROM `activity5` WHERE `name` LIKE '".$str."'";
                        $result = mysql_query($sql);
                        
                        while($row=mysql_fetch_assoc($result)){
                            $data[]=array("name"=>$str,"lat"=>$row['lat'],"lng"=>$row['lng'],"label2"=>'0');
                        }
                    }
                }
            }
    }
    $tempJson=$data;
    echo Json_encode($tempJson,JSON_UNESCAPED_UNICODE);  
?>