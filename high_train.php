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
    
    $pass=6;
    $pass2=6;
    $station=["南港","台北","板橋","台中","高雄"];
  
    for($i = 0; $i < 5; $i++){
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
    switch($week){
        case 7:
            $sql="SELECT `Train`,`$get`,`$end`  FROM `high_train` Where `pass`='".$pass."' and  `sunday`='1'";
            break;
        case 1:
         $sql="SELECT `Train`,`$get`,`$end` FROM `high_train` Where `pass`='".$pass."' and  `monday`='1'";
            break;
        case 2:
         $sql="SELECT `Train`,`$get`,`$end` FROM `high_train` Where `pass`='".$pass."' and  `tuesday`='1'";
            break;
        case 3:
         $sql="SELECT `Train`,`$get`,`$end` FROM `high_train` Where `pass`='".$pass."' and  `wednesday`='1'";
            break;
        case 4:
         $sql="SELECT `Train`,`$get`,`$end` FROM `high_train` Where `pass`='".$pass."' and  `thursday`='1'";
            break;
        case 5:
         $sql="SELECT `Train`,`$get`,`$end` FROM `high_train` Where `pass`='".$pass."' and  `friday`='1'";
            break;
        case 6:
         $sql="SELECT `Train`,`$get`,`$end` FROM `high_train` Where `pass`='".$pass."' and  `saturday`='1'";
            break;
    }
    
    $result = mysql_query($sql);
	if(mysql_num_rows($result)>0){
        while($row=mysql_fetch_assoc($result)){
            if(($row[$get]!="0")&&($row[$end]!="0")){
				$data[]=array("Train"=>$row['Train'],(String)$get=>$row[$get],(String)$end=>$row[$end]);
				$tempJson=$data;
            }
		}
	    echo json_encode($tempJson,JSON_UNESCAPED_UNICODE);
    }
    mysql_close();
?>
