<?php
    require_once('index.php');
    require_once('./include/mysqli_connect.php');  

    $port = "COM3";

    //echo $_POST["post_range1"]."\n", $_POST["post_range2"]."\n", $_POST["post_range3"]."\n", $_POST["post_range4"]."\n" ;
    $query1 = mysqli_query($con, "SELECT * FROM li_ajax_control_load ORDER BY ordem_no ASC");
    $rowCount = mysqli_num_rows($query1);

    if($rowCount > 0){ 
        while($row = mysqli_fetch_assoc($query1)){ 
            $tutorial_id = 	$row['id'];
            //echo $tutorial_id."\n";
            $post = "post_range".$tutorial_id;
            //echo $tutorial_id."-";
            //echo $post;
            //echo $_POST[$post]."\n";
            $query = "UPDATE li_ajax_control_load SET angulo = '".$_POST[$post]."' WHERE id = ".$row['id'];
            mysqli_query($con, $query);
            $titulo = mysqli_query($con, "SELECT titulo FROM li_ajax_control_load WHERE id = ".$row['id']);
            $titulo = mysqli_fetch_assoc($titulo);

            if ($titulo["titulo"] == "claw"){
                $move = "e";
            }elseif($titulo["titulo"] == "attack"){
                $move = "q";
            }elseif($titulo["titulo"] == "body"){
                $move = "r";
            }elseif($titulo["titulo"] == "elevator"){
                $move = "w";
            }

            exec("MODE $port BAUD=9600 PARITY=n DATA=8 XON=on STOP=1");
            $fp = fopen($port, 'w+');
            fwrite($fp, $move."-".$_POST[$post]);
            //echo $move."-".$_POST[$post]."\n";
            fclose($fp);
            sleep(1);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="refresh" content="0.1; URL='http://localhost/arm-tsar/system/'"/>

</head>
<body>
</body>
</html>