<?php
  header("Content-Type:text/html; charset=utf-8");
    mysql_query("set names utf8");
    $dbhost = 'localhost';   
 	$dbuser = 'root';   
 	$dbpass = '23924505';   
 	$dbname = 'travel'; 
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    $get=$_POST['x'];
    $end=$_POST['y'];
    $week=$_POST['week'];
    $station=["松山","台北","板橋","豐原","大甲","台中","沙鹿","新左營","高雄"];
    for($i=0;$i<9;$i++){
        if(strcmp($get,$station[$i])==0){
            $pass=$i;
        }
        if(strcmp($end,$station[$i])==0){
            $pass2=$i;
        }
    }
    if($pass>$pass2){
       $pass=1;
     }
    else{
       $pass=0;
    }
    
    mysql_query("set names utf8");
	mysql_select_db($dbname);
    if((strcmp($get,"大甲")==0)||(strcmp($get,"沙鹿")==0)||(strcmp($end,"大甲")==0)||(strcmp($end,"沙鹿")==0)){
        switch($week){
            case 7:
                $sql="SELECT `車種`,`train`,`$get`,`$end`  FROM `train2` Where `pass`='".$pass."' and  `7`='1'";
                break;
            case 6:
                $sql="SELECT `車種`,`train`,`$get`,`$end`  FROM `train2` Where `pass`='".$pass."' and  `6`='1'";
                break;
            case 5:
                $sql="SELECT `車種`,`train`,`$get`,`$end`  FROM `train2` Where `pass`='".$pass."' and  `5`='1'";
                break;
            case 4:
            case 3: 
            case 2:
                $sql="SELECT `車種`,`train`,`$get`,`$end`  FROM `train2` Where `pass`='".$pass."' and  `2-4`='1'";
               break; 
            case 1:
                $sql="SELECT `車種`,`train`,`$get`,`$end`  FROM `train2` Where `pass`='".$pass."' and  `1`='1'";
                break;
        }
        $result = mysql_query($sql);
            if(mysql_num_rows($result)>0){
                while($row=mysql_fetch_assoc($result)){
                    if(($row[$get]!="X")&&($row[$end]!="X")){
				    $data[]=array("車種"=>$row['車種'],"Train"=>$row['train'],(String)$get=>$row[$get],(String)$end=>$row[$end]);
				    $tempJson=$data;
                }
		    }
	        echo json_encode($tempJson,JSON_UNESCAPED_UNICODE);
            }
    }
    else{
        switch($week){
            case 7:
                $sql="SELECT `車種`,`train`,`$get`,`$end`  FROM `train` Where `pass`='".$pass."' and  `7`='1'";
                break;
            case 6:
                $sql="SELECT `車種`,`train`,`$get`,`$end`  FROM `train` Where `pass`='".$pass."' and  `6`='1'";
                break;
            case 5:
                $sql="SELECT `車種`,`train`,`$get`,`$end`  FROM `train` Where `pass`='".$pass."' and  `5`='1'";
                break;
            case 4:
            case 3: 
            case 2:
                $sql="SELECT `車種`,`train`,`$get`,`$end`  FROM `train` Where `pass`='".$pass."' and  `2-4`='1'";
               break; 
            case 1:
                $sql="SELECT `車種`,`train`,`$get`,`$end`  FROM `train` Where `pass`='".$pass."' and  `1`='1'";
                break;
        }
        $result = mysql_query($sql);
            if(mysql_num_rows($result)>0){
                while($row=mysql_fetch_assoc($result)){
                    if(($row[$get]!="X")&&($row[$end]!="X")){
				    $data[]=array("車種"=>$row['車種'],"Train"=>$row['train'],(String)$get=>$row[$get],(String)$end=>$row[$end]);
				    $tempJson=$data;
                }
		    }
	        echo json_encode($tempJson,JSON_UNESCAPED_UNICODE);
            }
    }
    mysql_close();
?>