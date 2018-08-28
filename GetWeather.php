<?php
    header("Content-Type:text/html; charset=utf-8");
    $year=date("Y");
    $month=date("m");
    $day=date("d");
    $featureday=date('Y-m-d', time() + ( 1*24 * 60 * 60));
    $featureday1=date('Y-m-d', time() + ( 2*24 * 60 * 60));
    $featureday2=date('Y-m-d', time() + ( 3*24 * 60 * 60));
    $featureday3=date('Y-m-d', time() + ( 4*24 * 60 * 60));
    $featureday=explode("-",$featureday);
    $featureday1=explode("-",$featureday1);
    $featureday2=explode("-",$featureday2);
    $featureday3=explode("-",$featureday3);
    $loc="台中";//$_POST['loc'];
    switch($loc){
        case "台北":
            $sql="SELECT  `hr`, `Label` FROM `taipei_predict` WHERE year='".$year."'and month='".$month."'and day='".$day."'";
            $sql2="SELECT  `hr`, `Label` FROM `taipei_predict` WHERE year='".$featureday[0]."'and month='".$featureday[1]."'and day='".$featureday[2]."'";
            $sql3="SELECT  `hr`, `Label` FROM `taipei_predict` WHERE year='".$featureday1[0]."'and month='".$featureday1[1]."'and day='".$featureday1[2]."'";
            $sql4="SELECT  `hr`, `Label` FROM `taipei_predict` WHERE year='".$featureday2[0]."'and month='".$featureday2[1]."'and day='".$featureday2[2]."'";
            $sql5="SELECT  `hr`, `Label` FROM `taipei_predict` WHERE year='".$featureday3[0]."'and month='".$featureday3[1]."'and day='".$featureday3[2]."'";

            break;
        case "台中":
            $sql="SELECT  `hr`, `Label` FROM `taichung_ans` WHERE year='".$year."'and month='".$month."'and day='".$day."'";
            $sql2="SELECT  `hr`, `Label` FROM `taichung_ans` WHERE year='".$featureday[0]."'and month='".$featureday[1]."'and day='".$featureday[2]."'";
            $sql3="SELECT  `hr`, `Label` FROM `taichung_ans` WHERE year='".$featureday1[0]."'and month='".$featureday1[1]."'and day='".$featureday1[2]."'";
            $sql4="SELECT  `hr`, `Label` FROM `taichung_ans` WHERE year='".$featureday2[0]."'and month='".$featureday2[1]."'and day='".$featureday2[2]."'";
            $sql5="SELECT  `hr`, `Label` FROM `taichung_ans` WHERE year='".$featureday3[0]."'and month='".$featureday3[1]."'and day='".$featureday3[2]."'";
            break;
        case "高雄":
             $sql="SELECT  `hr`, `Label` FROM `kaohsiung_predict` WHERE year='".$year."'and month='".$month."'and day='".$day."'";
            $sql2="SELECT  `hr`, `Label` FROM `kaohsiung_predict` WHERE year='".$featureday[0]."'and month='".$featureday[1]."'and day='".$featureday[2]."'";
            $sql3="SELECT  `hr`, `Label` FROM `kaohsiung_predict` WHERE year='".$featureday1[0]."'and month='".$featureday1[1]."'and day='".$featureday1[2]."'";
            $sql4="SELECT  `hr`, `Label` FROM `kaohsiung_predict` WHERE year='".$featureday2[0]."'and month='".$featureday2[1]."'and day='".$featureday2[2]."'";
            $sql5="SELECT  `hr`, `Label` FROM `kaohsiung_predict` WHERE year='".$featureday3[0]."'and month='".$featureday3[1]."'and day='".$featureday3[2]."'";
            break;
    }
    get($sql,$year,$month,$day);
    get($sql2,$featureday[0],$featureday[1],$featureday[2]);
    get($sql3,$featureday1[0],$featureday1[1],$featureday1[2]);
    get($sql4,$featureday2[0],$featureday2[1],$featureday2[2]);
    get($sql5,$featureday3[0],$featureday3[1],$featureday3[2]);
    
    function get($sql,$year,$month,$day){ 
        Global $data,$tempJson;
        Global $i;
        $dbhost = 'localhost';   
 	    $dbuser = 'root';   
 	    $dbpass = '23924505';   
 	    $dbname = 'weather';
        $conn = mysql_connect($dbhost, $dbuser, $dbpass);
        mysql_query("set names utf8");
        mysql_select_db($dbname);
        $result = mysql_query($sql);
        $label=0;$label1=0;$label2=0;
        while($row=mysql_fetch_assoc($result)){
            if($row['hr']>=6&&$row['hr']<12){
                $label+=$row['Label'];
                if($label>=1)
                    $label=1;
            }
            else if($row['hr']>=12&&$row['hr']<18){
                $label1+=$row['Label'];
                if($label1>=1)
                    $label1=1;
            }
            else if($row['hr']>=18&&$row['hr']<24){
                $label2+=$row['Label'];
                if($label2>=1)
                    $label2=1;
            }
        }
        $i++;
        $data[]=array("day"=>$i,"早上"=>$label,"下午"=>$label1,"晚上"=>$label2);
    }  
    $tempJson=$data;     
     echo Json_encode($tempJson,JSON_UNESCAPED_UNICODE);   
?>