<?php
    header("Content-Type:text/html; charset=utf-8");
    mysql_query("set names utf8");
    $dbhost = 'localhost';   
 	$dbuser = 'root';   
 	$dbpass = '23924505';   
 	$dbname = 'travel'; 
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_query("set names utf8");
	mysql_select_db($dbname);
    $travel=$_POST['x'];
    switch($travel){
        case "台中1":
            $sql="SELECT * FROM `taichung` Where label='0'";
            $result = mysql_query($sql);
            if(mysql_num_rows($result)>0){
              while($row=mysql_fetch_assoc($result)){
                  $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description'],"label"=>$row['label']);
                  $tempJson= $data;
              }      
            }  
            break;
        case "台中2":
            $sql="SELECT * FROM `taichung` Where label='1'";
            $result = mysql_query($sql);
            if(mysql_num_rows($result)>0){
              while($row=mysql_fetch_assoc($result)){
                  $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description'],"label"=>$row['label']);
                  $tempJson= $data;
              }      
            }
            break;
        case "1":
            $sql="SELECT * FROM `kaohsiung` Where class='文化'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "2":
            $sql="SELECT * FROM `kaohsiung` Where class='生態'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "3":
            $sql="SELECT * FROM `kaohsiung` Where class='古蹟'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "4":
            $sql="SELECT * FROM `kaohsiung` Where class='廟宇'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "5":
            $sql="SELECT * FROM `kaohsiung` Where class='藝術'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "6":
            $sql="SELECT * FROM `kaohsiung` Where class='小吃'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "7":
            $sql="SELECT * FROM `kaohsiung` Where class='國家公園'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "8":
            $sql="SELECT * FROM `kaohsiung` Where class='國家風景區'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "9":
            $sql="SELECT * FROM `kaohsiung` Where class='休閒農業'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "10":
            $sql="SELECT * FROM `kaohsiung` Where class='溫泉'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "11":
            $sql="SELECT * FROM `kaohsiung` Where class='自然風景'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "12":
            $sql="SELECT * FROM `kaohsiung` Where class='遊憩'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "13":
            $sql="SELECT * FROM `kaohsiung` Where class='體育健身'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "14":
            $sql="SELECT * FROM `kaohsiung` Where class='觀光工廠'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "15":
            $sql="SELECT * FROM `kaohsiung` Where class='都會公園'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "16":
            $sql="SELECT * FROM `kaohsiung` Where class='森林遊樂'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "17":
            $sql="SELECT * FROM `kaohsiung` Where class='林場'";
            $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "18":
            $sql="SELECT * FROM `kaohsiung` Where class='其他'";
             $result = mysql_query($sql);
             if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
            break;
        case "台北1":
                $sql="SELECT * FROM `taipei` Where class='公共藝術'";
                $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
                break;
        case "台北2":
                $sql="SELECT * FROM `taipei` Where class='戶外踏青'";
                $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
                break;
        case "台北3":
                $sql="SELECT * FROM `taipei` Where class='宗教信仰'";
                $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
                break;
        case "台北4":
                $sql="SELECT * FROM `taipei` Where class='春季活動'";
                $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
                break;
        case "台北5":
                $sql="SELECT * FROM `taipei` Where class='單車遊蹤'";
                $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
                break;
        case "台北6":
                $sql="SELECT * FROM `taipei` Where class='養生溫泉'";
                $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
                break;
        case "台北7":
                $sql="SELECT * FROM `taipei` Where class='歷史建築'";
                $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                    while($row=mysql_fetch_assoc($result)){
                        $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                        $tempJson= $data;
                    }
                }
                break;
        case "台北8":
                $sql="SELECT * FROM `taipei` Where class='親子共遊'";
                $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                        while($row=mysql_fetch_assoc($result)){
                            $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                            $tempJson= $data;
                        }
                    }
                break;
        case "台北9":
                $sql="SELECT * FROM `taipei` Where class='藍色公路'";
                $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                        while($row=mysql_fetch_assoc($result)){
                            $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                            $tempJson= $data;
                        }
                }
                break;
        case "台北10":
                $sql="SELECT * FROM `taipei` Where class='藝文館所'";
                $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                        while($row=mysql_fetch_assoc($result)){
                            $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                            $tempJson= $data;
                        }
                }
                break;
       case "新北1":
            $sql="SELECT * FROM `taipei` Where label='0' and class='新北市'";
                $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                        while($row=mysql_fetch_assoc($result)){
                            $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                            $tempJson= $data;
                        }
                }
                break;
      case "新北2":
            $sql="SELECT * FROM `taipei` Where label='1'and class='新北市'";
                $result = mysql_query($sql);
                if(mysql_num_rows($result)>0){
                        while($row=mysql_fetch_assoc($result)){
                            $data[]=array("name"=>$row['name'],"lat"=>$row['latitude'],"lng"=>$row['longitude'],"address"=>$row['address'],"Description"=>$row['Description']);
                            $tempJson= $data;
                        }
                }
                break;
    }
     echo json_encode($tempJson,JSON_UNESCAPED_UNICODE);
?>