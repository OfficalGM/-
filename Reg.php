<?php
    header("Content-Type:text/html; charset=utf-8");
    mysql_query("set names utf8");
    $dbhost = 'localhost';   
 	$dbuser = 'root';   
 	$dbpass = '23924505';   
 	$dbname = 'user';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_query("set names utf8");
	mysql_select_db($dbname);
    $Name=$_POST['Name'];
    $Pas=$_POST['pas'];
    $sql = "SELECT * FROM `user` WHERE  Name= '".$Name."'";
    $result = mysql_query($sql);
    if(mysql_num_rows($result)>0){
        while($row=mysql_fetch_assoc($result)){
            $response = array('success'=>0); 
	        $response=json_encode($response); 
            echo  $response;
        }
    }
    else{
         $sql2="INSERT INTO `user`(`Name`,`pas`) values('".$Name."','".$Pas."')";
         $result = mysql_query($sql2);
         if($result>0){
             $response = array('success'=>1);
            $response=json_encode($response); 
            echo  $response;
         }
             
           
        }
         
    
?>
