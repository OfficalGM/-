<?php
    header("Content-Type:text/html; charset=utf-8");
    mysql_query("set names utf8");
    date_default_timezone_set("Asia/Taipei");
    $year=date("Y");
    $month=date("m");
    $day=date("d");
    
    function Get($year,$month,$day){
        
        Global $tempJson,$data;
        $dbhost = 'localhost';   
 	    $dbuser = 'root';   
 	    $dbpass = '23924505';   
 	    $dbname = 'weather';
        $conn = mysql_connect($dbhost, $dbuser, $dbpass);
        mysql_query("set names utf8");
	    mysql_select_db($dbname);
        $sql = "SELECT * FROM `accu` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
        $result = mysql_query($sql);
        if(mysql_num_rows($result)>0){
              while($row=mysql_fetch_assoc($result)){
                    $accu_taipei=$row['Taipei'];
                    $accu_taichung=$row['Taichung'];
                    $accu_Kao=$row['Kao'];
            }       
        }
        $sql2="SELECT * FROM `cwb` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
        $result=mysql_query($sql2);
        if(mysql_num_rows($result)>0){
              while($row=mysql_fetch_assoc($result)){
                    $weather_channel_taipei=$row['Taipei'];
                    $weather_channel_taichung=$row['Taichung'];
                    $weather_channel_Kao=$row['Kao'];
            }       
       }
       $sql2="SELECT * FROM `foreca` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
       $result=mysql_query($sql2);
       if(mysql_num_rows($result)>0){
              while($row=mysql_fetch_assoc($result)){
                    $foreca_taipei=$row['Taipei'];
                    $foreca_taichung=$row['Taichung'];
                    $foreca_Kao=$row['Kao'];
            }       
       }
       $data[]=array("year"=>$year,"month"=>$month,"day"=>$day,"accu_taipei"=>$accu_taipei,"accu_taichung"=>$accu_taichung,"accu_Kao"=>$accu_Kao,
       "weather_channel_taipei"=>$weather_channel_taipei,"weather_channel_taichung"=>$weather_channel_taichung,"weather_channel_Kao"=>$weather_channel_Kao,
       "foreca_taipei"=>$foreca_taipei,"foreca_taichung"=>$foreca_taichung,"foreca_Kao"=>$foreca_Kao);
      
    }
    if($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12){
        if($day<23){
             for($d=0;$d<10;$d++){
                   $d2=$day+$d;
                   
                   Get($year,$month,$d2);
               }
             $tempJson=$data;
             echo json_encode($tempJson,JSON_UNESCAPED_UNICODE);
        }
        else{
                $d=9-(31-$day);
                for(;$day<32;$day++){
                     Get($year,$month,$day);
                }
                $tempJson=$data;
                 $month++;
                 if($month==13){
                      $month=1;
                      $year+=1;
                  }
                  
                for($d2=1;$d2<$d+1;$d2++){
                    Get($year,$month,$d2);
                }
                
               $tempJson=$data;
               echo Json_encode($tempJson);      
           }
    }
    elseif($month==4||$month==6||$month==9||$month==11){
          if($day<22){
               for($d=0;$d<10;$d++){
                   $d2=$day+$d;
                   Get($year,$month,$d2);
               }
               $tempJson=$data;
              echo Json_encode($tempJson);  
           }
           else{
                $d=10-(30-$day);
                for(;$day<31;$day++){
                     Get($year,$month,$day);
                }
                $tempJson=$data;
                 $month++;
                for($d2=1;$d2<$d;$d2++){
                    if($month==13)
                        $month=1;
                    Get($year,$month,$d2);
                }
                $tempJson=$data;
               echo Json_encode($tempJson);      
           }
    }
    
?>