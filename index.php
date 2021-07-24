<?php require_once('scripts/db.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rabdan Real Estate - Index</title>
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
            <a class="nav-link active" href="index.php">Home</a>
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

  <!-- ======= Intro Section ======= -->
  <div class="intro intro-carousel swiper-container position-relative">

    <div class="swiper-wrapper">
      <?php 
        $propCarouselSQL = "SELECT * FROM property";
        $propCarouselResult = mysqli_query($con, $propCarouselSQL);
        if(mysqli_num_rows($propCarouselResult)>0){
          while($propCarouselRow = mysqli_fetch_array($propCarouselResult)){
            echo '
            <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(Admin/assets/images/'.$propCarouselRow['propimage'].')">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
              <div class="table-cell">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="intro-body">
                        <p class="intro-title-top">'.$propCarouselRow['propDescription'].'
                          <br> 
                        </p>
                        <h1 class="intro-title mb-4">
                          <span class="color-b">'.$propCarouselRow['propname'].' </span> 
                          <br> '.$propCarouselRow['propstatus'].'
                        </h1>
                        <p class="intro-subtitle intro-price">
                          <a href="#"><span class="price-a">rent | $ '.$propCarouselRow['proptotal'].'</span></a>
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
                        <span class="color-b">204 </span> Property
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

    </div>
    <div class="swiper-pagination"></div>
  </div><!-- End Intro Section -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section class="section-services section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Our Services</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-cart"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Dev</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                Real estate development is a process that involves the purchase of raw land, rezoning, construction and renovation of buildings, and sale or lease of the finished product to end users. Developers earn a profit by adding value to the land (creating buildings or improvements, rezoning, etc.) and taking the risk of financing a project. Development firms create a new product, which can be thought of as the “primary market” or generation of new inventory.
                </p>
              </div>
              <div class="card-footer-c">
                <!-- <a href="#" class="link-c link-icon">Read more
                  <span class="bi bi-chevron-right"></span>
                </a> -->
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-calendar4-week"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Loans</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                Apart from selling properties, there is equally a significant number of people who are looking forward to the purchase of a property. It may be your first home or an addition to your properties. The process is daunting now that you do not have any experience or a pool of potential sellers. The real estate agents have all that you need to succeed in your property owning dreams.
                </p>
              </div>
              <div class="card-footer-c">
                <!-- <a href="#" class="link-c link-icon">Read more
                  <span class="bi bi-calendar4-week"></span>
                </a> -->
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-card-checklist"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Sell</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                Are you planning to sell some of your properties? Well, the best approach to use is a real estate agency. More so, people selling a property for the first time are safe if they use these experts. The beauty of using the agency is that they negotiate a good selling price when a possible client from their pool of many shows interest.
                </p>
              </div>
              <div class="card-footer-c">
                <!-- <a href="#" class="link-c link-icon">Read more
                  <span class="bi bi-chevron-right"></span>
                </a> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Latest Properties</h2>
              </div>
              <div class="title-link">
                <a href="property-grid.php">All Property
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div id="property-carousel" class="swiper-container">
          <div class="swiper-wrapper">
          <?php 
        $propStaticSQL = "SELECT * FROM property";
        $propStaticResult = mysqli_query($con, $propStaticSQL);
        if(mysqli_num_rows($propStaticResult)>0){
          while($propStaticRow = mysqli_fetch_array($propStaticResult)){
            echo '
           

          <div class="carousel-item-b swiper-slide">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="Admin/assets/images/'.$propStaticRow['propimage'].'" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="property-single.php">'.$propStaticRow['propname'].'</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">rent | $ '.$propStaticRow['proptotal'].'</span>
                  </div>
                  <a href="property-single.php?propid='.$propStaticRow['propid'].'" class="link-a">Click here to view
                    <span class="bi bi-chevron-right"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Num of Rooms</h4>
                      <span>'.$propStaticRow['proprooms'].'
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Water</h4>
                      <span>'.$propStaticRow['propwater'].'</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Floor</h4>
                      <span>'.$propStaticRow['propfloortype'].'</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Status</h4>
                      <span>'.$propStaticRow['propstatus'].'</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
            ';
          }
        }else{
          echo'
          <div class="carousel-item-b swiper-slide">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="assets/img/property-6.jpg" alt="" class="img-a img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <a href="property-single.php">Sorry
                          <br /> No Properties Found</a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                       
                      </div>
                      <a href="#" class="link-a">Click here to view
                        <span class="bi bi-chevron-right"></span>
                      </a>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          ';
        }
      
      ?>
          
          </div>
        </div>
        <div class="propery-carousel-pagination carousel-pagination"></div>

      </div>
    </section><!-- End Latest Properties Section -->

    <!-- ======= Agents Section ======= -->
    <section class="section-agents section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Best Agents</h2>
              </div>
              <div class="title-link">
                <a href="agents-grid.php">All Agents
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
        <?php 
        $propAgentSQL = "SELECT * FROM agent";
        $propAgentResult = mysqli_query($con, $propAgentSQL);
        if(mysqli_num_rows($propAgentResult)>0){
          while($propAgentRow = mysqli_fetch_array($propAgentResult)){
            echo '
           
        <div class="col-md-4">
        <div class="card-box-d">
          <div class="card-img-d">
            <img src="Admin/assets/images/'.$propAgentRow['agentimage'].'" alt="" class="img-d img-fluid">
          </div>
          <div class="card-overlay card-overlay-hover">
            <div class="card-header-d">
              <div class="card-title-d align-self-center">
                <h3 class="title-d">
                  <a href="agent-single.php" class="link-two">'.$propAgentRow['agentname'].'</a>
                </h3>
              </div>
            </div>
            <div class="card-body-d">
              <p class="content-d color-text-a">
              '.$propAgentRow['agentbio'].'
              </p>
              <div class="info-agents color-a">
                <p>
                  <strong>Phone: </strong> '.$propAgentRow['agentcontact'].'
                </p>
                <p>
                  <strong>Email: </strong> '.$propAgentRow['agentemail'].'
                </p>
                <p>
                  <strong>Location: </strong> '.$propAgentRow['agentlocation'].'
                </p>
              </div>
            </div>
          <!--  <div class="card-footer-d">
              <div class="socials-footer d-flex justify-content-center">
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="bi bi-facebook" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="bi bi-twitter" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="bi bi-instagram" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="bi bi-linkedin" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div> 
          -->
          </div>
        </div>
      </div>

            ';
          }
        }else{
          echo'
          <div class="col-md-4">
            <div class="card-box-d">
              <div class="card-img-d">
                <img src="assets/img/agent-4.jpg" alt="" class="img-d img-fluid">
              </div>
              <div class="card-overlay card-overlay-hover">
                <div class="card-header-d">
                  <div class="card-title-d align-self-center">
                    <h3 class="title-d">
                      <a href="agent-single.php" class="link-two">Sorry
                        <br> No Agent Registered Yet</a>
                    </h3>
                  </div>
                </div>
                <div class="card-body-d">
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
          ';
        }
      
      ?>

        </div>
      </div>
    </section><!-- End Agents Section -->



    <!-- ======= Testimonials Section ======= -->
    <section class="section-testimonials section-t8 nav-arrow-a">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Testimonials</h2>
              </div>
            </div>
          </div>
        </div>

        <div id="testimonial-carousel" class="swiper-container">
          <div class="swiper-wrapper">
          <?php 
        $propTestiSQL = "SELECT * FROM testimonial";
        $propTestiResult = mysqli_query($con, $propTestiSQL);
        if(mysqli_num_rows($propTestiResult)>0){
          while($propTestiRow = mysqli_fetch_array($propTestiResult)){
            echo '

        <div class="carousel-item-a swiper-slide">
        <div class="testimonials-box">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="testimonial-img">
                <img src="Admin/assets/images/'.$propTestiRow['testimonalimage'].'" alt="" class="img-fluid">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="testimonial-ico">
                <i class="bi bi-chat-quote-fill"></i>
              </div>
              <div class="testimonials-content">
                <p class="testimonial-text">
                '.$propTestiRow['testimonaldescription'].'
                </p>
              </div>
              <div class="testimonial-author-box">
                <img src="Admin/assets/images/'.$propTestiRow['testimonalimage'].'" alt="" class="testimonial-avatar">
                <h5 class="testimonial-author">'.$propTestiRow['testimonalname'].'</h5>
              </div>
            </div>
          </div>
        </div>
      </div>


            ';
          }
        }else{
          echo'
          <div class="carousel-item-a swiper-slide">
              <div class="testimonials-box">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-img">
                      <img src="assets/img/testimonial-1.jpg" alt="" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-ico">
                      <i class="bi bi-chat-quote-fill"></i>
                    </div>
                    <div class="testimonials-content">
                      <p class="testimonial-text">
                        Sorry There is no Testimonial at the Momoent
                      </p>
                    </div>
                    <div class="testimonial-author-box">
                      <img src="assets/img/mini-testimonial-1.jpg" alt="" class="testimonial-avatar">
                      <h5 class="testimonial-author">None</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          ';
        }
      
      ?>

          </div>
        </div>
        <div class="testimonial-carousel-pagination carousel-pagination"></div>

      </div>
    </section>
    <!-- End Testimonials Section -->

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
                Enim minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis
                sed aute irure.
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Phone .</span> contact@example.com
                </li>
                <li class="color-a">
                  <span class="color-text-a">Email .</span> +54 356 945234
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