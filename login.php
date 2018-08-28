<?php
	header("charset=utf-8");
    mysql_query("set names utf8");
	$dbhost = 'localhost';   
 	$dbuser = 'root';   
 	$dbpass = '23924505';   
	$dbname = 'user'; 
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
	$account=$_POST['id'];
	$pas=$_POST['pas'];
	mysql_query("set names utf8");
	mysql_select_db($dbname);  
	$sql="SELECT `Name`, `pas`FROM `User` WHERE `Name`='".$account."' and `pas`='".$pas."'";
	//$sql="SELECT `Name`, `pas`FROM `User` WHERE `Name`='aaa@gmail.com'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0){
		$response=array('success'=>'1');
		$response=json_encode($response); 
        echo  $response;
	}
	else{
		$response = array('success'=>'0');
		$response=json_encode($response);
        echo  $response;
	}
	mysql_close();
	
	
	
	
?>