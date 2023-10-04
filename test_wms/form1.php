<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: entry.html');
    exit;
}

include 'form1_connect.php';
include 'order_query.php';

$orderItems_queryResult = orderItem_query();

?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <title>Product Order Form</title>
    <link rel="stylesheet" href="form1.css">
    <script src="form1.js" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js" integrity="sha512-r22gChDnGvBylk90+2e/ycr3RVrDi8DIOkIGNhJlKfuyQM4tIRAI062MaV8sfjQKYVGjOBaZBOA87z+IhZE9DA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    <h1>Product Order Form</h1>

    <input type="text" id="myInput" onkeyup="searchTable()" placeholder="Search for products..">

    <input type="text" name="" id="">

    <div class="row-style">

        <!-- <div class="columns-style">
        <table class="table table-striped table-bordered" id="ProductTable">
            <tbody>
                <tr>
                    <th>PRODUCT FORM</th>
                </tr>
                <tr>
                    <th>TRULITE BLEACH POWDER</th>
                </tr>
                <tr>
                    <td><span class="product-title">POWDER BLUE 500G (TL1)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">POWDER WHITE 500G (TL2)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <th>TRUZONE CREAM PEROXIDE 250ML</th> 
        
                </tr>
                <tr>
                    <td><span class="product-title">10 VOL CREAM PEROXIDE 250ML (T1)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">20 VOL CREAM PEROXIDE 250ML (T2)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <th>TRUZONE CREAM PEROXIDE 1LT            </th>
                </tr>
                <tr>
                    <td><span class="product-title">10 VOL CREAM PEROXIDE 1LT (T23)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">20 VOL CREAM PEROXIDE 1LT (T24)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">30 VOL CREAM PEROXIDE 1LT (T26)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">40 VOL CREAM PEROXIDE 1LT (T28)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <th>TRUZONE SHMAPOO & CONDITIONER 1LT            </th>
                </tr>
                <tr>
                    <td><span class="product-title">COCONUT OIL SHAMPO 1LT (T7)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">HERBAL COMPLEX CONDITI 1LT (T9)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">TANGERINE SHAMPO 1LT (T13)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">JOJOBA SHIAMPO 1LT (T15)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">PEACH SORBET SHAMPOO 1LT (T16)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">RHUBARB SHAMPO 1LT (T17)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">LEMON LIME SHAMPO 1LT (T18)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">JOJOBA HAIR TREATMENT 1LT (T20)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">TEA TREE SHAMPO 1LT (T21)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <th>TRUZONE SHAMPOO 5LT            </th>
                </tr>
                <tr>
                    <td><span class="product-title">FRESH APPLE SHAMPO 5LT (T5)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">COCONUT OIL SHAMPO 5LT (T6)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">TANGERINE SHAMPO 5LT (T12)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">ALMOND SHAMPO 5LT (T14)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">LEMON LIME SHAMPO 5LT (T19)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">TEA TREE SHAMPO 5LT (T22)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">HERBAL SHAMPO 5LT (T31)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <th>TRUZONE CONDITIONER 5LT            </th>
                </tr>
                <tr>
                    <td><span class="product-title">HAIR AND CONDITIONER 5LT (T10)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">HERBAL ANTI OXY CONDITIONER 5LT (T11)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">HERBAL COMPLEX CONDITI 5LT (T8)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">BEAUTY PURIFIED WATER 5 LITRE (V2)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <th>ARGAN OIL            </th>
                </tr>
                <tr>
                    <td><span class="product-title">TRUZONE ARGAN OIL 100ML (T30)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <th>VINES            </th>
                </tr>
                <tr>
                    <td><span class="product-title">EBE GLOSS 120ML (XP1)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">SURGICAL SPIRIT 500ML (V3)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">ACETONE 500ML (V4)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">HAIR COLOUR SATIN REMOVER 500ML (V5)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">WITCH AZEL 500ML (V6)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <th>SHAMPOO            </th>
                </tr>
                <tr>
                    <td><span class="product-title">COLOUR BOMB BLEACH POWDER (N4)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <th>HAND GELL            </th>
                </tr>
                <tr>
                    <td><span class="product-title">ANTI BACTERIAL CLEANSER 100ML (N1)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
                <tr>
                    <td><span class="product-title">ANTI BACTERIAL GELL 450ML (N3)</span>
                        <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity"
                            placeholder="Quantity">
                        <button class="btn-add">ADD</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div> -->
    <div class="columns-style">



<form action="form1Add.php" method="POST">
    ORDER ITEMS
    <div class="cartItems"></div>


    TOTAL PRODUCTS - <input type="number" class="total-order-items" name="totalItems">
    <button name="submit" class="btn-order" type="submit" value="submit">PURCHASE ORDER</button>

</form>

</div>

        <div class="columns-style">
            <table class="table table-striped table-bordered" id="ProductTable">
                <tbody>
                    <tr>

                        <?php
                        while ($row_data = mysqli_fetch_assoc($orderItems_queryResult)) {
                        ?>
                        <?php 
                        if ($row_data['productCode'] == "") {
                            # code...
                            ?>
                            <th><span class="product-title"><?php echo $row_data['productName']; ?></span></th>
                            <?php
                            
                        } else {
                            # code...
                            ?>
                            <td><span class="product-title"><?php echo $row_data['productName']; ?>
                                    <?php echo $row_data['productCode'];  ?> </span>
                                <input class="product-quantity" min="1" max="9999" type="number" name="itemQuantity" placeholder="Quantity">
    
                                <button class="btn-add">ADD</button>
                            </td>
                            <?php
                        }
                        
                        ?>
                            
                    </tr>
                <?php
                        }
                ?>

                </tbody>
            </table>
        </div>

        

    </div>

</body>

</html>