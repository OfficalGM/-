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
    $start=$json[0]['label'].",".$json[0]['name'];
    $member=$json[0]['member'];
    $end=$json[$elementCount-1]['label'].",".$json[$elementCount-1]['name'];
    $day=$json[0]['day'];
    
    $data=[];
    $job=0;
    if($day==1){
        $sql="SELECT max(`Job`) as Job  FROM `trip` WHERE 1";
        $result = mysql_query($sql);
        while($row=mysql_fetch_assoc($result)){
            $job=$row['Job'];
            $job++;
        }
    }
    else{
        $sql="SELECT max(`Job`) as Job  FROM `trip` WHERE 1";
        $result = mysql_query($sql);
        while($row=mysql_fetch_assoc($result)){
            $job=$row['Job'];   
        }
    }
    
    for($i=1;$i<7;$i++){
            $data[$i]="0";
    }
    for($i=1;$i<$elementCount-1;$i++){
        $temp=$json[$i]['name'];
        $data[$i]=$temp; 
    }
    $sql="INSERT INTO `trip`(`Job`,`day`,`Name`, `trip1`, `trip2`, `trip3`, `trip4`, `trip5`, `trip6`, `trip7`, `trip8`) VALUES('".$job."','".$day."','".$member."','".$start."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."','".$end."')";
    
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
?>