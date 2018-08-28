<?php
   //今日
    header("Content-Type:text/html; charset=utf-8");
    mysql_query("set names utf8");
    date_default_timezone_set("Asia/Taipei");
    $year=date("Y");
    $month=date("m");
    $day=date("d");
    $x=$_POST['today'];
    $dbhost = 'localhost';   
 	$dbuser = 'root';   
 	$dbpass = '23924505';   
 	$dbname = 'weather';
    $rain=0;
    $AvgPs=0;
    $AvgRh=0; 
    $MaxTx=0;
    $MinTx=0;
    switch($x){
        case 1:
            $sql = "SELECT * FROM `taipei_predict` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
             $sql2="SELECT MAX(`TX`) FROM `taipei_predict` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
            $sql3="SELECT MIN(`TX`) FROM `taipei_predict` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
            break;
        case 2:
            $sql = "SELECT * FROM `taichung_ans` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
             $sql2="SELECT MAX(`TX`) FROM `taichung_ans` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
            $sql3="SELECT MIN(`TX`) FROM `taichung_ans` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
            break;
        case 3:
            $sql = "SELECT * FROM `kaohsiung_predict` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
            $sql2="SELECT MAX(`TX`) FROM `kaohsiung_predict` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
            $sql3="SELECT MIN(`TX`) FROM `kaohsiung_predict` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
            break;
    }
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_query("set names utf8");
	mysql_select_db($dbname);
    $result = mysql_query($sql);
    
    if(mysql_num_rows($result)>0){
        while($row=mysql_fetch_assoc($result)){
                $rain+=$row['Label'];
                $AvgPs+=$row['PS'];
                $AvgRh+=$row['RH'];
        }
         
    }
    
    $result=mysql_query($sql2);
         if(mysql_num_rows($result)>0){
             $row = mysql_fetch_array($result);
             $MaxTx=$row[0];
         }
    
    $result=mysql_query($sql3);
    if(mysql_num_rows($result)>0){
             $row = mysql_fetch_array($result);
             $MinTx=$row[0];
    }  
    if($rain>0)
        $rain=1;
    else
        $rain=0;
    $AvgPs=round($AvgPs/24);
    $AvgRh=round($AvgRh/24);
    $data[]=array("year"=>$year,"month"=>$month,"day"=>$day,"AvgPs"=>$AvgPs,"MaxTx"=>round($MaxTx),"MinTx"=>round($MinTx),"AvgRh"=>$AvgRh,"Rain"=>$rain);
    $tempJson=$data;
    echo Json_encode($tempJson);
                  
       
    

         
?>
