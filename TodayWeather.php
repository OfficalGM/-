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
    switch($x){
        case 1:
            $sql = "SELECT * FROM `taipei_predict` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
            break;
        case 2:
            $sql = "SELECT * FROM `taichung_ans` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
            break;
        case 3:
            $sql = "SELECT * FROM `kaohsiung_predict` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
            break;
    }
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_query("set names utf8");
	mysql_select_db($dbname);
    $result = mysql_query($sql);
    
    if(mysql_num_rows($result)>0){
              while($row=mysql_fetch_assoc($result)){
                  $PS=$row['PS'];
                  $RH=$row['RH'];
                  $row['TX']=round($row['TX'],1);
                  $data[]=array("hr"=>$row['hr'],"PS"=>$PS,"RH"=>$RH,"Tx"=>$row['TX']);
                  $tempJson=$data;
              }
               
    }
    echo Json_encode($tempJson);     
                  
                  
       
    

         
?>
