<?php
include 'form1_connect.php';
include 'order_query.php';



// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: entry.html');
  exit;
}

$orderFilteredAllList = view_adminOrderList();

$userDetailsResult = usersDetails_query();
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
          <div id="drink" class="tm-page-content">
            <!-- Drink Menu Page -->
            <nav class="tm-black-bg tm-drinks-nav">
              <ul>
                <li>
                  <a href="#" class="tm-tab-link active" data-id="cold">View Orders</a>
                </li>
                <!-- <li>
                  <a href="#" class="tm-tab-link" data-id="hot">View Return Queries</a>
                </li> -->
                <!-- <li>
                  <a href="#" class="tm-tab-link" data-id="juice">Fruit Juice</a>
                </li> -->
              </ul>
            </nav>

            <div id="cold" class="tm-tab-content">
              <div class="tm-list">
                <div class="tm-list-item">
                  <div class="tm-black-bg tm-list-item-text">
                    <p class="tm-list-item-description">

                    <table class="table table-striped table-bordered" id="ProductTable">
                      <tbody>


                        <tr>

                          <?php
                          while ($row_data = mysqli_fetch_assoc($orderFilteredAllList)) {
                          ?>
                            <td> <?php echo $row_data['submitDate']; ?> </td>
                            <td> <?php echo $row_data['shopName']; ?> </td>
                            <td><?php echo $row_data['productCount']; ?> </td>
                            <td> <button type="button"><a href="admin_viewEachOrder.php?shopName=<?php echo $row_data['shopName'];?>&date=<?php echo $row_data['submitDate'];?>">View</a></button> </td>
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

           
            <!-- end Drink Menu Page -->
          </div>

          <!-- About Us Page -->
          <div id="about" class="tm-page-content">
            <div class="tm-black-bg tm-mb-20 tm-about-box-1">
              <h2 class="tm-text-primary tm-about-header">USER DETAILS</h2>
              <div class="tm-list-item tm-list-item-2">
                <div class="tm-list-item-text-2">

                  <table class="table table-striped table-bordered" id="ProductTable">
                    <tbody>


                      <tr>

                        <?php
                        while ($row_data = mysqli_fetch_assoc($userDetailsResult)) {
                        ?>
                          <td> <?php echo $row_data['username']; ?> </td>
                          <td> <?php echo $row_data['password']; ?> </td>
                          <td><?php echo $row_data['userRole']; ?> </td>
                          <td> <button type="button">Edit</button> </td>
                          <td> <button type="button"><a href="admin-deleteUser.php?id=<?php echo $row_data["id"]; ?>">Delete</a></button> </td>
                      </tr>
                    <?php
                        }
                    ?>
                    <tr>
                      <form action="" method="post">
                        <td> <input type="text" name="new-user" id="" class="new-user"> </td>
                        <td> <input type="text" name="new-user-password" id="" class="new-user-password"></td>
                        <td> <input type="text" name="new-userRole" class="new-userRole"></td>
                        <td> <button type="submit" name="submit-newUser">Create User</button></td>

                      </form>

                      <td class="newUserStatus"> </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- ANOTHER PARAGRAPH CARD CODE -->
            <!-- <div class="tm-black-bg tm-mb-20 tm-about-box-2">              
              <div class="tm-list-item tm-list-item-2">                
                <div class="tm-list-item-text-2">
                  <h2 class="tm-text-primary">How we began</h2>
                  <p>If you wish to support us, please contact Tooplate. Thank you. Duis bibendum erat nec ipsum consectetur sodales.</p>                  
                </div>                
                <img src="img/about-2.png" alt="Image" class="tm-list-item-img tm-list-item-img-big tm-img-right">                
              </div>
              <p>Donec non urna elit. Quisque ut magna in dui mattis iaculis eu finibus metus. Suspendisse vel mi a lacus finibus vehicula vel ut diam. Nam pellentesque, mi quis ullamcorper.</p>
            </div> -->

          </div>
          <!-- end About Us Page -->

          <!-- Special Items Page -->
          <div id="special" class="tm-page-content">
            <div class="tm-special-items">
              <div class="tm-black-bg tm-special-item">
                <img src="img/special-01.jpg" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">Special One</h2>
                  <p class="tm-special-item-text">Here is a short text description for the first special item. You are not allowed to redistribute this template ZIP file.</p>
                </div>
              </div>
              <div class="tm-black-bg tm-special-item">
                <img src="img/special-02.jpg" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">Second Item</h2>
                  <p class="tm-special-item-text">You are allowed to download, modify and use this template for your commercial or non-commercial websites.</p>
                </div>
              </div>
              <div class="tm-black-bg tm-special-item">
                <img src="img/special-03.jpg" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">Third Special Item</h2>
                  <p class="tm-special-item-text">Pellentesque in ultrices mi, quis mollis nulla. Quisque sed commodo est, quis tincidunt nunc.</p>
                </div>
              </div>
              <div class="tm-black-bg tm-special-item">
                <img src="img/special-04.jpg" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">Special Item Fourth</h2>
                  <p class="tm-special-item-text">Vivamus finibus nulla sed metus sagittis, sed ultrices magna aliquam. Mauris fermentum.</p>
                </div>
              </div>
              <div class="tm-black-bg tm-special-item">
                <img src="img/special-05.jpg" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">Sixth Sense</h2>
                  <p class="tm-special-item-text">Here is a short text description for sixth item. This text is four lines.</p>
                </div>
              </div>
              <div class="tm-black-bg tm-special-item">
                <img src="img/special-06.jpg" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">Seventh Item</h2>
                  <p class="tm-special-item-text">Curabitur eget erat sit amet sapien aliquet vulputate quis sed arcu.</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end Special Items Page -->

          <!-- Contact Page -->
          <div id="contact" class="tm-page-content">
            <div class="tm-black-bg tm-contact-text-container">
              <h2 class="tm-text-primary">Contact Wave</h2>
              <p>Wave Cafe Template has a video background. 
                You can use this layout for your websites. 
                Please contact Tooplate's Facebook page. 
                Tell your friends about our website.</p>
            </div>
            <div class="tm-black-bg tm-contact-form-container ">
              <form action="" method="POST" id="contact-form">
                <div class="tm-form-group">
                  <input type="text" name="name" class="tm-form-control" placeholder="Name" required="" />
                </div>
                <div class="tm-form-group">
                  <input type="email" name="email" class="tm-form-control" placeholder="Email" required="" />
                </div>
                <div class="tm-form-group tm-mb-30">
                  <textarea rows="6" name="message" class="tm-form-control" placeholder="Message" required=""></textarea>
                </div>
                <div>
                  <button type="submit" class="tm-btn-primary tm-align-right">
                    Submit
                  </button>
                </div>
              </form>
            </div>
          </div>
          <!-- end Contact Page -->
        </main>
      </div>
    </div>
    <footer class="tm-site-footer">
      <p class="tm-black-bg tm-footer-text">Copyright 2020 Wave Cafe

        | Design: <a href="" class="tm-footer-link" rel="sponsored" target="_parent">Tooplate</a></p>
    </footer>
  </div>



  <script src="js/jquery-3.4.1.min.js"></script>
  <script>
    function setVideoSize() {
      const vidWidth = 1920;
      const vidHeight = 1080;
      const windowWidth = window.innerWidth;
      const windowHeight = window.innerHeight;
      const tempVidWidth = windowHeight * vidWidth / vidHeight;
      const tempVidHeight = windowWidth * vidHeight / vidWidth;
      const newVidWidth = tempVidWidth > windowWidth ? tempVidWidth : windowWidth;
      const newVidHeight = tempVidHeight > windowHeight ? tempVidHeight : windowHeight;
      const tmVideo = $('#tm-video');

      tmVideo.css('width', newVidWidth);
      tmVideo.css('height', newVidHeight);
    }

    function openTab(evt, id) {
      $('.tm-tab-content').hide();
      $('#' + id).show();
      $('.tm-tab-link').removeClass('active');
      $(evt.currentTarget).addClass('active');
    }

    function initPage() {
      let pageId = location.hash;

      if (pageId) {
        highlightMenu($(`.tm-page-link[href^="${pageId}"]`));
        showPage($(pageId));
      } else {
        pageId = $('.tm-page-link.active').attr('href');
        showPage($(pageId));
      }
    }

    function highlightMenu(menuItem) {
      $('.tm-page-link').removeClass('active');
      menuItem.addClass('active');
    }

    function showPage(page) {
      $('.tm-page-content').hide();
      page.show();
    }

    $(document).ready(function() {

      /***************** Pages *****************/

      initPage();

      $('.tm-page-link').click(function(event) {

        if (window.innerWidth > 991) {
          event.preventDefault();
        }

        highlightMenu($(event.currentTarget));
        showPage($(event.currentTarget.hash));
      });


      /***************** Tabs *******************/

      $('.tm-tab-link').on('click', e => {
        e.preventDefault();
        openTab(e, $(e.target).data('id'));
      });

      $('.tm-tab-link.active').click(); // Open default tab


      /************** Video background *********/

      setVideoSize();

      // Set video background size based on window size
      let timeout;
      window.onresize = function() {
        clearTimeout(timeout);
        timeout = setTimeout(setVideoSize, 100);
      };

      // Play/Pause button for video background      
      const btn = $("#tm-video-control-button");

      btn.on("click", function(e) {
        const video = document.getElementById("tm-video");
        $(this).removeClass();

        if (video.paused) {
          video.play();
          $(this).addClass("fas fa-pause");
        } else {
          video.pause();
          $(this).addClass("fas fa-play");
        }
      });
    });
  </script>

</body>

</html>

<?php

include 'form1_connect.php';


$createNewUserStatus = "";
if (isset($_POST['submit-newUser'])) {
  # code...
  $insertDate = date("Y-m-d H:i:s");
  $newUserUsername = $_POST['new-user'];
  $newUserPassword = $_POST['new-user-password'];
  $newUserRole = $_POST['new-userRole'];

  $insert_query = "INSERT INTO Users (`username`,`password`,`userRole`) VALUES ('$newUserUsername','$newUserPassword','$newUserRole') ";
  $insertQueryStatus = mysqli_query($con, $insert_query);
  if ($insertQueryStatus) {
    # code...
    $createNewUserStatus = "New Record Inserted Successfully.";

    echo '<script type="text/javascript">

            document.getElementByClass("newUserStatus").innerHTML = "New User Added";

            </script>';
    header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
    exit();
  } else {
    # code...
    $createNewUserStatus = "ERROR - TRY AGAIN.";

    echo '<script type="text/javascript">

    document.getElementByClass("newUserStatus").innerHTML = "Error Try Again";

            </script>';
    header("admin_w.php#about");
  }


  unset($newUserPassword, $newUserUsername);
}
exit();

?>