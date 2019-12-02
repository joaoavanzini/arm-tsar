<?php
require_once('index.php');
require_once('./include/mysqli_connect.php');  

if (isset( $_POST["quant1"])){
    echo "Body: ".$_POST["quant1"];
    $query = "INSERT INTO li_ajax_control_load (titulo, angulo, ordem_no) VALUES ('body', '90', '$tutorial_id') ";
}elseif(isset( $_POST["quant2"])){
    echo "Claw: ".$_POST["quant2"];
    $query = "INSERT INTO li_ajax_control_load (titulo, angulo, ordem_no) VALUES ('claw', 'open', '$tutorial_id') ";
}elseif(isset( $_POST["quant3"])){
    echo "Attack: ".$_POST["quant3"];
    $query = "INSERT INTO li_ajax_control_load (titulo, angulo, ordem_no) VALUES ('attack', '90', '$tutorial_id') ";
}elseif(isset( $_POST["quant4"])){
    echo "Elevator: ".$_POST["quant4"];
    $query = "INSERT INTO li_ajax_control_load (titulo, angulo, ordem_no) VALUES ('elevator', '90', '$tutorial_id') ";
}

mysqli_query($con, $query);



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