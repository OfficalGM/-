<?php
  header("Access-Control-Allow-Origin:*");
    header("Content-Type:application/json; charset=utf-8");
 
    $dbhost = 'localhost';   
 	$dbuser = 'root';   
 	$dbpass = '23924505';   
 	$dbname = 'weather';
    $x=$_POST['x'];
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_query("set names utf8");
	mysql_select_db($dbname);
    $month=date("m")-1;
    switch($x){
        case 1:
            $count=12;
            $count2=13;
            $count3=16;
            //$sql="SELECT COUNT(DISTINCT `day`) as COUNT  FROM `taipei_predict` WHERE `month` = '".$month."'and `Label`='1'";
            //$sql2="SELECT COUNT(`Taipei`)  as COUNT FROM `accu` WHERE `month`='".$month."' and `Taipei`='1'";
            // $sql3="SELECT COUNT(`Taipei`)  as COUNT FROM `cwb_2` WHERE `month`='".$month."' and `Taipei`='1'";
            break;
        case 2:
            $count=8;
            $count2=2;
            $count3=8;
            //$sql="SELECT COUNT(DISTINCT `day`) as COUNT  FROM `taichung_ans` WHERE `month` = '".$month."'and `Label`='1'";
            //$sql2="SELECT COUNT(`Taichung`)  as COUNT FROM `accu` WHERE `month`='".$month."' and `Taichung`='1'";
            //$sql3="SELECT COUNT(`Taichung`)  as COUNT FROM `cwb_2` WHERE `month`='".$month."' and `Taichung`='1'";
            //SELECT COUNT(DISTINCT `day`) FROM `taichung_ans` WHERE `month`='4' and `Label`='1'
            break;
        case 3:
            $count=7;
            $count2=4;
            $count3=7;
            //$sql="SELECT COUNT(DISTINCT `day`) as COUNT  FROM `kaohsiung_predict` WHERE `month` = '".$month."'and `Label`='1'";
            //$sql2="SELECT COUNT(`Kao`)  as COUNT FROM `accu` WHERE `month`='".$month."' and `Kao`='1'";
            // $sql3="SELECT COUNT( `Kao`) as COUNT FROM`cwb_2` WHERE `month`='4' and `Kao`='1'";
            break;
    }
    /*$result = mysql_query($sql) or die(mysql_error());
    if(mysql_num_rows($result)>0){
        while($row=mysql_fetch_assoc($result)){
               $count=$row['COUNT'];    
        }
    }
   
    $result = mysql_query($sql2) or die(mysql_error());
    if(mysql_num_rows($result)>0){
        while($row=mysql_fetch_assoc($result)){
               $count2=$row['COUNT'];    
        }
    }
    $result = mysql_query($sql3) or die(mysql_error());
    if(mysql_num_rows($result)>0){
        while($row=mysql_fetch_assoc($result)){
               $count3=$row['COUNT'];    
        }
    }
    if($count>$count3)
            $count=$count3;
    if(($count3-$count)>=3)
        $count=$count3-1;*/
    
    $data[]=array("me"=>(string)$count,"accu"=>(string)$count2,"cwb"=>(string)$count3);
    $tempJson=$data;
    echo Json_encode($tempJson);  
    mysql_close();
?>