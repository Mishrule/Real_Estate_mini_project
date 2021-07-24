<?php require_once('scripts/db.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rabdan Real Estate - Property-Single</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="Admin/assets/images/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label class="pb-2" for="Type">Keyword</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="Type">Type</label>
              <select class="form-control form-select form-control-a" id="Type">
                <option>All Type</option>
                <option>For Rent</option>
                <option>For Sale</option>
                <option>Open House</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="city">City</label>
              <select class="form-control form-select form-control-a" id="city">
                <option>All City</option>
                <option>Alabama</option>
                <option>Arizona</option>
                <option>California</option>
                <option>Colorado</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="bedrooms">Bedrooms</label>
              <select class="form-control form-select form-control-a" id="bedrooms">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="garages">Garages</label>
              <select class="form-control form-select form-control-a" id="garages">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="bathrooms">Bathrooms</label>
              <select class="form-control form-select form-control-a" id="bathrooms">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="price">Min Price</label>
              <select class="form-control form-select form-control-a" id="price">
                <option>Unlimite</option>
                <option>$50,000</option>
                <option>$100,000</option>
                <option>$150,000</option>
                <option>$200,000</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Search Property</button>
          </div>
        </div>
      </form>
    </div>
  </div><!-- End Property Search Section -->>

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.php">Rabdan Real <span class="color-b">Estate</span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="agents-grid.php">Agent</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="property-grid.php">Property</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="contact.php">Contact</a>
          </li>
        </ul>
      </div>


    </div>
  </nav><!-- End Header/Navbar -->

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">

    <?php 
        $propid = $_GET['propid'];
        $propCarouselSQL = "SELECT * FROM property WHERE propid='$propid'";
        $propCarouselResult = mysqli_query($con, $propCarouselSQL);
        if(mysqli_num_rows($propCarouselResult)>0){
          while($propCarouselRow = mysqli_fetch_array($propCarouselResult)){
            echo '
            
          <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title-single-box">
                <h1 class="title-single">'.$propCarouselRow['propname'].'</h1>
                <span class="color-text-a">'.$propCarouselRow['proplocation'].'</span>
              </div>
            </div>
            <div class="col-md-12 col-lg-4">
              <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="property-grid.php">Properties</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                  '.$propCarouselRow['propname'].'
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
  
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div id="property-single-carousel" class="swiper-container">
                <div class="swiper-wrapper">
                  <div class="carousel-item-b swiper-slide">
                    <img src="Admin/assets/images/'.$propCarouselRow['propimage'].'" alt="">
                  </div>
                </div>
              </div>
              <div class="property-single-carousel-pagination carousel-pagination"></div>
            </div>
          </div>
  
          <div class="row">
            <div class="col-sm-12">
  
              <div class="row justify-content-between">
                <div class="col-md-5 col-lg-4">
                  <div class="property-price d-flex justify-content-center foo">
                    <div class="card-header-c d-flex">
                      <div class="card-box-ico">
                        <span class="bi bi-cash">$</span>
                      </div>
                      <div class="card-title-c align-self-center">
                        <h5 class="title-c">'.$propCarouselRow['proptotal'].'</h5>
                      </div>
                    </div>
                  </div>
                  <div class="property-summary">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="title-box-d section-t4">
                          <h3 class="title-d">'.$propCarouselRow['propname'].'</h3>
                        </div>
                      </div>
                    </div>
                    <div class="summary-list">
                      <ul class="list">
                        <li class="d-flex justify-content-between">
                          <strong>Property ID:</strong>
                          <span>'.$propCarouselRow['propid'].'</span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Location:</strong>
                          <span>'.$propCarouselRow['proplocation'].'</span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Floor Type:</strong>
                          <span>'.$propCarouselRow['propfloortype'].'</span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Status:</strong>
                          <span>'.$propCarouselRow['propstatus'].'</span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Water:</strong>
                          <span>'.$propCarouselRow['propwater'].'
                          </span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Beds:</strong>
                          <span>'.$propCarouselRow['proprooms'].'</span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Baths:</strong>
                          <span>'.$propCarouselRow['propbathrooms'].'</span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Garage:</strong>
                          <span>'.$propCarouselRow['propgarage'].'</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-7 col-lg-7 section-md-t3">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d">
                        <h3 class="title-d">Property Description</h3>
                      </div>
                    </div>
                  </div>
                  <div class="property-description">
                    <p class="description color-text-a">
                    '.$propCarouselRow['propDescription'].'
                    </p>
                    
                  </div>
                  
                </div>
              </div>
            </div>
            
            <div class="col-md-12">
              <div class="row section-t3">
                <div class="col-sm-12">
                  <div class="title-box-d">
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>




            ';
          }
        }else{
          echo'
          <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-1.jpg)">
          <div class="overlay overlay-a"></div>
          <div class="intro-content display-table">
            <div class="table-cell">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="intro-body">
                      <p class="intro-title-top">Sorry
                        <br> No
                      </p>
                      <h1 class="intro-title mb-4 ">
                        <span class="color-b">No </span> Property
                        <br> Created Yet
                      </h1>
                      <p class="intro-subtitle intro-price">
                        <a href="#"><span class="price-a">Consult Agency</span></a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          ';
        }
      
      ?>

      

    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Rabdan Real Estate agents and brokers</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
              There are a variety of real estate professionals who work in the industry and help make it function. The most common examples (other than the ones listed above) are accountants, lawyers, interior designers, stagers, general contractors, construction workers, and tradespeople.
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Phone .</span> +233 244 595551
                </li>
                <li class="color-a">
                  <span class="color-text-a">Phone .</span> +233 544 816217
                </li>
                <li class="color-a">
                  <span class="color-text-a">Email .</span> RaBrokers@gmail.com
                </li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="index.php">Home</a>
              </li>
              
              <li class="list-inline-item">
                <a href="property-grid.php">Property</a>
              </li>
              <li class="list-inline-item">
                <a href="agent-grid">Agent</a>
              </li>
              <li class="list-inline-item">
                <a href="contact.php">Contact</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-linkedin" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">Rabdan Real Estate Agents and Brokers</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
            
            Designed by <a href="#">Rabdan Real Estate Agents and Brokers</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>