<?php
	//����10��
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
        $rain=0;
        $AvgPs=0;
        $AvgRh=0;
        $AvgWd=0;
        $MaxTx=0;
        $MinTx=0;
        $conn = mysql_connect($dbhost, $dbuser, $dbpass);
        mysql_query("set names utf8");
	    mysql_select_db($dbname);
         $sql = "SELECT * FROM `kaohsiung_predict` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
         $result = mysql_query($sql);
         if(mysql_num_rows($result)>0){
              while($row=mysql_fetch_assoc($result)){
                  $rain+=$row['Label'];
                  $AvgPs+=$row['PS'];
                  $AvgRh+=$row['RH'];
                  $AvgWd+=$row['WD'];
              }       
         }
         $sql2="SELECT MAX(`TX`) FROM `kaohsiung_predict` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
         $result=mysql_query($sql2);
         if(mysql_num_rows($result)>0){
             $row = mysql_fetch_array($result);
             $MaxTx=$row[0];
         }
          $sql3="SELECT MIN(`TX`) FROM `kaohsiung_predict` WHERE  year= '".$year."' and month ='".$month."'  and day ='".$day."'";
         $result=mysql_query($sql3);
         if(mysql_num_rows($result)>0){
             $row = mysql_fetch_array($result);
             $MinTx=$row[0];
         }  
         if($rain>0)
            $rain=1;
         else
            $rain=0;
         $AvgWd=round($AvgWd/24);  
         $AvgPs=round($AvgPs/24);
         $AvgRh=round($AvgRh/24);
        $data[]=array("year"=>$year,"month"=>$month,"day"=>$day,
        "AvgPs"=>$AvgPs,"MaxTx"=>round($MaxTx),"MinTx"=>round($MinTx),"AvgWd"=>$AvgWd,"AvgRh"=>$AvgRh,"Rain"=>$rain);
        
          
    } 
    
    
   if ($year%4==0 && $year%100!=0 || $year%400==0){
       if($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12){
           if($day<23){
               for($d=0;$d<10;$d++){
                   $d2=$day+$d;
                   Get($year,$month,$d2);
               }
               $tempJson=$data;
              echo Json_encode($tempJson);  
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
        else{
            if($day<21){
               for($d=0;$d<10;$d++){
                   $d2=$day+$d;
                   Get($year,$month,$d2);
               }
               $tempJson=$data;
              echo Json_encode($tempJson);  
           }
           else{
                $d=8-(30-$day);
                for(;$day<31;$day++){
                     Get($year,$month,$day);
                }
                $tempJson=$data;
                 $month++; 
                for($d2=1;$d2<$d;$d2++){
                    Get($year,$month,$d2);
                }
                $tempJson=$data;
               echo Json_encode($tempJson);      
           }
        }
   }
   else{
              if($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12){
           if($day<23){
               for($d=0;$d<10;$d++){
                   $d2=$day+$d;
                   Get($year,$month,$d2);
               }
               $tempJson=$data;
              echo Json_encode($tempJson);  
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
                for(;$day<32;$day++){
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
        else{
            if($day<21){
               for($d=0;$d<10;$d++){
                   $d2=$day+$d;
                   Get($year,$month,$d2);
               }
               $tempJson=$data;
              echo Json_encode($tempJson);  
           }
           else{
                $d=7-(30-$day);
                for(;$day<32;$day++){
                     Get($year,$month,$day);
                }
                $tempJson=$data;
                 $month++; 
                for($d2=1;$d2<$d;$d2++){
                    Get($year,$month,$d2);
                }
                $tempJson=$data;
               echo Json_encode($tempJson);      
           }
        }

   }
    

?>
