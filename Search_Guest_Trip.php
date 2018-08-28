<?php
    $dbhost = 'localhost';   
 	$dbuser = 'root';   
 	$dbpass = '23924505';   
 	$dbname = 'user';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_query("set names utf8");
    mysql_select_db($dbname);
    $code=$_POST['code'];
    $day=$_POST['day'];
    $sql="SELECT  `trip1`, `trip2`, `trip3`, `trip4`, `trip5`, `trip6`, `trip7`, `trip8` FROM `guest` WHERE `MD5`= '".$code."' and `day`='".$day."'";
    //echo $sql;
    $result = mysql_query($sql);
     if(mysql_num_rows($result)>0){
              while($row=mysql_fetch_assoc($result)){
                   $data[]=array("0"=>$row['trip1'],"1"=>$row['trip2'],"2"=>$row['trip3'],"3"=>$row['trip4'],"4"=>$row['trip5'],"5"=>$row['trip6'],"6"=>$row['trip7'],"7"=>$row['trip8']);
                  //$data[]=array("1"=>$row['trip1'],"2"=>$row['trip2'],"3"=>$row['trip3'],"4"=>$row['trip4'],"5"=>$row['trip5'],"6"=>$row['trip6'],"7"=>$row['trip7'],"8"=>$row['trip8']);
                  $tempJson= $data;
              }
         }
     echo json_encode($tempJson,JSON_UNESCAPED_UNICODE);
    ?>