<?php
session_start();

include'form1_connect.php';

if(isset($_POST['submit'])){
    date_default_timezone_set('Europe/London');
    
    $totalItems = $_POST['totalItems'];
    $orderProduct = $_POST['orderProduct'];
    $orderQuantity = $_POST['orderQuantity'];
    // $typeQty = $_POST['typeQty'];
    $submitDate = date('Y-m-d');
    $submitTime = date('H-i-s');
    $submitDateTime = date('d-m-Y-H-i');
    $shopName = $_SESSION['name'];
    $batchNo = $shopName.$submitDateTime;

    foreach($orderProduct as $index => $allProducts)
    {
        $q_products = $allProducts;
        $q_quantity = $orderQuantity[$index];
        
        
        $query = "INSERT INTO Products (orderProduct,orderQuantity,submitDate,submitTime,shopName,batchNo) 
        VALUES ('$q_products','$q_quantity','$submitDate','$submitTime','$shopName','$batchNo')";
        $query_run = mysqli_query($con, $query); 
    }

    if($query_run){
        header('Location: shop_page.php');

    }
    else
    {
        header('Location: form1.php');
    }

}


?>