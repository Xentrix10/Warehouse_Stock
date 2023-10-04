<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: entry.html');
    exit;
  }
include 'form1_connect.php';


$viewOrder_shopName = $_REQUEST['shopName'];
$viewOrder_submitDate = $_REQUEST['date'];

$viewOrder_query = "SELECT orderProduct,orderQuantity FROM Products WHERE shopName = '$viewOrder_shopName' AND submitDate = '$viewOrder_submitDate' ";

$viewOrderResult = mysqli_query($con, $viewOrder_query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> ADMIN - DASHBOARD</title>
  <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
  <link rel="stylesheet" href="tooplate-wave-cafe.css">
  <link rel="stylesheet" href="table-design.css">

</head>

<body>
  <div class="tm-container">
    <div class="tm-row">
      <!-- Site Header -->
      <div class="tm-left">
        <div class="tm-left-inner">
          <div class="tm-site-header">
            <i class="fas fa-coffee fa-3x tm-site-logo"></i>
            <h1 class="tm-site-name">ADMIN DASHBOARD</h1>
          </div>
          <nav class="tm-site-nav">
            <ul class="tm-site-nav-ul">
              <li class="tm-page-nav-item">
                <a href="#drink" class="tm-page-link active">
                  <i class="fas fa-mug-hot tm-page-link-icon"></i>
                  <span>VIEW ORDERS</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#about" class="tm-page-link">
                  <i class="fas fa-users tm-page-link-icon"></i>
                  <span>VIEW USERS</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#special" class="tm-page-link">
                  <i class="fas fa-glass-martini tm-page-link-icon"></i>
                  <span>RETURN QUERIES</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#contact" class="tm-page-link">
                  <i class="fas fa-comments tm-page-link-icon"></i>
                  <span>CONTACT QUERIES</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="logout.php" class="tm-page-link">
                  <i class="fas fa-comments tm-page-link-icon"></i>
                  <span>LOGOUT</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="tm-right">
        <main class="tm-main">
          

          <!-- About Us Page -->
          <div id="about" class="tm-page-content">
            <div class="tm-black-bg tm-mb-20 tm-about-box-1">
              <h2 class="tm-text-primary tm-about-header">ORDER</h2>
              <div class="tm-list-item tm-list-item-2">
                <div class="tm-list-item-text-2">
                  <table class="table table-striped table-bordered" id="ProductTable">
                    <tbody>
                        <tr>
                            <td><?php echo $viewOrder_shopName; ?></td>
                            <td><?php echo $viewOrder_submitDate; ?></td>
                        </tr>
                      <tr>
                        <?php
                        while ($row_data = mysqli_fetch_assoc($viewOrderResult)) {
                        ?>
                          <td> <?php echo $row_data['orderProduct']; ?> </td>
                          <td> <?php echo $row_data['orderQuantity']; ?> </td>
                      </tr>
                    <?php
                        }
                    ?>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
           

          </div>
          <!-- end About Us Page -->

        </main>
      </div>
    </div>
    <footer class="tm-site-footer">
      <p class="tm-black-bg tm-footer-text">Copyright 2020 Wave Cafe

        | Design: <a href="" class="tm-footer-link" rel="sponsored" target="_parent">Tooplate</a></p>
    </footer>
  </div>



  <script src="js/jquery-3.4.1.min.js"></script>
  

</body>

</html>