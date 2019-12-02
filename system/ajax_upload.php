<?php
require_once('./include/mysqli_connect.php');
$post_order = isset($_POST["post_order_ids"]) ? $_POST["post_order_ids"] : [];
if(count($post_order)>0){
    for($order_no= 0; $order_no < count($post_order); $order_no++)
    {
     $query = "UPDATE li_ajax_control_load SET ordem_no = '".($order_no+1)."' WHERE id = '".$post_order[$order_no]."'";
     mysqli_query($con, $query);
    }
    echo true; 
}else{
    echo false; 
}
