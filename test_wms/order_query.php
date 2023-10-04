<?php

include 'form1_connect.php';

function orderItem_query(){
    global $con;
    $query_orderItems = "select * from Cosmetics_Products";
    $orderItems_result = mysqli_query($con, $query_orderItems);
    return $orderItems_result;  
}

function usersDetails_query(){
    global $con;
    $query_userDetails = "select * from Users";
    $userDetails_result = mysqli_query($con, $query_userDetails);
    return $userDetails_result;
}

function view_adminOrderList(){
    global $con;
    //this query takes only the products name based on the 
    $query_orderAllList = "SELECT submitDate, shopName, COUNT(orderProduct) as productCount FROM Products GROUP BY submitDate, shopName";
    $orderAllListDetails_result = mysqli_query($con, $query_orderAllList);
    return $orderAllListDetails_result;
}


?>