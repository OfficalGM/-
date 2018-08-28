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
    $Job=0;
    $user=$_COOKIE['user'];
    for($i=0;$i<8;$i++){
        $data[$i]="0";
    }
    $day=0;
    for($i=0;$i<$elementCount;$i++){
        if($json[$i]['day']==4){
            $data[$i]=$json[$i]['name'];
            $Job=$json[$i]['Job'];
            $day=1;
        }
    }
   
    $sql="INSERT INTO `trip`(`Job`, `Name`, `day`, `trip1`, `trip2`, `trip3`, `trip4`, `trip5`, `trip6`, `trip7`, `trip8`) VALUES('".$Job."','".$user."','4','".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."','".$data[7]."')";
    echo $sql;
    if($day==1){
        $result = mysql_query($sql);
        if($result === FALSE){
            $response=array('success'=>'0');
		    $response=json_encode($response); 
            echo  $response;
        }
        else{
            $response=array('success'=>'1');
		    $response=json_encode($response); 
            echo  $response;
        }
    }
    
    
?>