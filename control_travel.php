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
    $trip=$_POST['travel'];
    $sql="SELECT `latitude`, `longitude` FROM `taipei` WHERE `name`='".$trip."'";
    $result = mysql_query($sql);
    if(mysql_num_rows($result)>0){
        while($row=mysql_fetch_assoc($result)){
            $data[]=array("name"=>$trip,"lat"=>$row['latitude'],"lng"=>$row['longitude']);
            $tempJson=$data;
           
        }
    }
    else{
        $sql="SELECT `latitude`, `longitude` FROM `taichung` WHERE `name`='".$trip."'";
        $result = mysql_query($sql);
        if(mysql_num_rows($result)>0){
            while($row=mysql_fetch_assoc($result)){
                $data[]=array("name"=>$trip,"lat"=>$row['latitude'],"lng"=>$row['longitude']);
                $tempJson=$data;
            }
        }
        else{
            $sql="SELECT `latitude`, `longitude` FROM `kaohsiung` WHERE `name`='".$trip."'";
            $result = mysql_query($sql);
            if(mysql_num_rows($result)>0){
                while($row=mysql_fetch_assoc($result)){
                    $data[]=array("name"=>$trip,"lat"=>$row['latitude'],"lng"=>$row['longitude']);
                    $tempJson=$data;
                }
            }
            else{
               $sql="SELECT `latitude`, `longitude` FROM `taipei_hotel` WHERE `name`='".$trip."'";
               $result = mysql_query($sql);
               if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$trip,"lat"=>$row['latitude'],"lng"=>$row['longitude']);
                        $tempJson=$data;
                    }
                }
                else{
                    $sql="SELECT `latitude`, `longitude` FROM `taichung_hotel` WHERE `name`='".$trip."'";
                    $result = mysql_query($sql);
                    if(mysql_num_rows($result)>0){
                        while($row=mysql_fetch_assoc($result)){
                            $data[]=array("name"=>$trip,"lat"=>$row['latitude'],"lng"=>$row['longitude']);
                            $tempJson=$data;
                        }
                    }
                    else{
                        $sql="SELECT `latitude`, `longitude` FROM `kao_hotel` WHERE `name`='".$trip."'";
                        $result = mysql_query($sql);
                        if(mysql_num_rows($result)>0){
                            while($row=mysql_fetch_assoc($result)){
                                $data[]=array("name"=>$trip,"lat"=>$row['latitude'],"lng"=>$row['longitude']);
                                $tempJson=$data;
                            }
                        }
                        else{
                            $dbname = 'trip'; 
                            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
	                        mysql_select_db($dbname);  
                            mysql_query("set names utf8");
                            $sql="SELECT`lat`, `lng` FROM `taipei` WHERE `trip` LIKE '".$trip."'";
                            $result = mysql_query($sql);
                            if(mysql_num_rows($result)>0){
                                while($row=mysql_fetch_assoc($result)){
                                    $data[]=array("name"=>$trip,"lat"=>$row['lat'],"lng"=>$row['lng']);
                                    $tempJson=$data;
                                }
                            }
                            else{
                                $sql="SELECT`lat`, `lng` FROM `activity5` WHERE `name` LIKE '".$trip."'";
                                
                                $result = mysql_query($sql);
                                if(mysql_num_rows($result)>0){
                                    while($row=mysql_fetch_assoc($result)){
                                        $data[]=array("name"=>$trip,"lat"=>$row['lat'],"lng"=>$row['lng']);
                                        
                                        $tempJson=$data;
                                    }
                                }
                            }
                        }
                    }
                } 
            }
        }
    }
    echo json_encode($tempJson,JSON_UNESCAPED_UNICODE);
?>