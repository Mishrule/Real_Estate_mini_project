<?php require_once('../scripts/db.php'); 
    require('session.php');
?>

<!DOCTYPE html>
<html lang="en">

    <?php require_once('inc/head.php'); ?>

<body>
    <div id="app">
        <?php require_once('inc/aside.php'); ?>

        <div id="main">
            <?php require_once('inc/nav.php'); ?>
            

            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Dashboard</h3>
                    <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
                </div>
                <section class="section">
                    <div class="row mb-2">
                        <div class="col-12 col-md-3">
                            <div class="card card-statistic">
                                <div class="card-body p-0">
                                    <div class="d-flex flex-column">
                                        <div class='px-3 py-3 d-flex justify-content-between'>
                                            <h3 class='card-title'>PROPERTIES</h3>
                                            <div class="card-right d-flex align-items-center">
                                            <?php 
                                                $propCarouselSQL = "SELECT Count(*) AS total FROM property";
                                                $propCarouselResult = mysqli_query($con, $propCarouselSQL);
                                                if(mysqli_num_rows($propCarouselResult)>0){
                                                while($propCarouselRow = mysqli_fetch_array($propCarouselResult)){
                                                    echo '
                                                        <p>'.$propCarouselRow['total'].'</p>
                                                    ';
                                                }
                                                }else{
                                                echo'
                                                    <p>0</p>
                                                ';
                                                }
                                            
                                            ?>
                                                
                                            </div>
                                        </div>
                                        <div class="chart-wrapper">
                                            <canvas id="canvas1" style="height:100px !important"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="card card-statistic">
                                <div class="card-body p-0">
                                    <div class="d-flex flex-column">
                                        <div class='px-3 py-3 d-flex justify-content-between'>
                                            <h3 class='card-title'>AGENTS</h3>
                                            <div class="card-right d-flex align-items-center">
                                            <?php 
                                                $propAgentSQL = "SELECT Count(*) AS agentTotal FROM agent";
                                                $propAgentResult = mysqli_query($con, $propAgentSQL);
                                                if(mysqli_num_rows($propAgentResult)>0){
                                                while($propAgentRow = mysqli_fetch_array($propAgentResult)){
                                                    echo '
                                                        <p>'.$propAgentRow['agentTotal'].'</p>
                                                    ';
                                                }
                                                }else{
                                                echo'
                                                    <p>0</p>
                                                ';
                                                }
                                            
                                            ?>
                                               
                                            </div>
                                        </div>
                                        <div class="chart-wrapper">
                                            <canvas id="canvas2" style="height:100px !important"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="card card-statistic">
                                <div class="card-body p-0">
                                    <div class="d-flex flex-column">
                                        <div class='px-3 py-3 d-flex justify-content-between'>
                                            <h3 class='card-title'>LANDLORDS</h3>
                                            <div class="card-right d-flex align-items-center">
                                            <?php 
                                                $propLandLordSQL = "SELECT Count(*) AS landlordTotal FROM landlord";
                                                $propLandLordResult = mysqli_query($con, $propLandLordSQL);
                                                if(mysqli_num_rows($propLandLordResult)>0){
                                                while($propLandLordRow = mysqli_fetch_array($propLandLordResult)){
                                                    echo '
                                                        <p>'.$propLandLordRow['landlordTotal'].'</p>
                                                    ';
                                                }
                                                }else{
                                                echo'
                                                    <p>0</p>
                                                ';
                                                }
                                            
                                            ?>
                                            </div>
                                        </div>
                                        <div class="chart-wrapper">
                                            <canvas id="canvas3" style="height:100px !important"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="card card-statistic">
                                <div class="card-body p-0">
                                    <div class="d-flex flex-column">
                                        <div class='px-3 py-3 d-flex justify-content-between'>
                                            <h3 class='card-title'>TESTIMONIALS</h3>
                                            <div class="card-right d-flex align-items-center">
                                            <?php 
                                                $propTestimonialSQL = "SELECT Count(*) AS testimonialTotal FROM testimonial";
                                                $propTestimonialResult = mysqli_query($con, $propTestimonialSQL);
                                                if(mysqli_num_rows($propTestimonialResult)>0){
                                                while($propTestimonialRow = mysqli_fetch_array($propTestimonialResult)){
                                                    echo '
                                                        <p>'.$propTestimonialRow['testimonialTotal'].'</p>
                                                    ';
                                                }
                                                }else{
                                                echo'
                                                    <p>0</p>
                                                ';
                                                }
                                            
                                            ?>
                                            </div>
                                        </div>
                                        <div class="chart-wrapper">
                                            <canvas id="canvas4" style="height:100px !important"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class='card-heading p-1 pl-3'>Sales</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="pl-1">
                                            <?php 
                                                $pa = '';
                                                $tp = '';
                                                $pl = '';
                                                $propCarouselSQL = "SELECT SUM(totalpayment) AS tp, SUM(paymenttolandlord) AS pl, SUM(paymenttoagency) AS pa FROM payment";
                                                $propCarouselResult = mysqli_query($con, $propCarouselSQL);
                                                if(mysqli_num_rows($propCarouselResult)>0){
                                                while($propCarouselRow = mysqli_fetch_array($propCarouselResult)){
                                                    
                                                $pa = $propCarouselRow['pa'];
                                                $tp = $propCarouselRow['tp'];
                                                $pl = $propCarouselRow['pl'];
                                                    
                                                }
                                                }else{
                                                echo'
                                                    <p>0</p>
                                                ';
                                                }
                                            
                                            ?>
                                                <h5 class=''>Total Payments: <strong>¢<?php echo $tp;?></strong></h5>
                                                <p class='text-xs'><span class="text-green"><i data-feather="bar-chart"
                                                            width="15"></i> </span> All Payment Made</p>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <!-- <canvas id="bar"></canvas> -->
                                            <h5 class=''>Total Payments to Landlords: <strong>¢<?php echo $pl;?></strong></h5>
                                                <p class='text-xs'><span class="text-green"><i data-feather="bar-chart"
                                                            width="15"></i> </span> All Payment Made</p>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <!-- <canvas id="bar"></canvas> -->
                                            <h5 class=''>Total Payments to Agency: <strong>¢<?php echo $pa;?></strong></h5>
                                                <p class='text-xs'><span class="text-green"><i data-feather="bar-chart"
                                                            width="15"></i> </span> All Payment Made</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Tenants</h4>
                                    <div class="d-flex ">
                                        <i data-feather="download"></i>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0">
                                    <div class="table-responsive">
                                        <table class='table table-striped' id="table1">
                                            <thead class="thead-dark">
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>TENANT NAME</th>
                                                        <th>TENANT CONTACT</th>
                                                        <th>PROPERTY NAME</th>
                                                        <th>LANDLORD NAME</th>
                                                        <th>MONTHS TO RENT</th>
                                                        <th>PAYMENT DATE</th>
                                                        
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                    <?php
                                                    $retrieveLandlordSQL = "SELECT * FROM payment ORDER BY createddate DESC";
                                                    $retrieveLandlordResult = mysqli_query($con, $retrieveLandlordSQL);
                                                    $count = 1;
                                                    if (mysqli_num_rows($retrieveLandlordResult) > 0) {
                                                        while ($retrieveLandlordRow = mysqli_fetch_array($retrieveLandlordResult)) {
                                                            echo '
                                                            <tr>
                                                                <td>' . $count . '</td>
                                                                <td>' . $retrieveLandlordRow['tenantname'] . '</td>
                                                                <td>' . $retrieveLandlordRow['tenantcontact'] . '</td>
                                                                <td>' . $retrieveLandlordRow['propertyname'] . '</td>
                                                                <td>' . $retrieveLandlordRow['landlordname'] . '</td>
                                                                <td>' . $retrieveLandlordRow['monthstorent'] . '</td>
                                                                <td>' . $retrieveLandlordRow['createddate'] . '</td>
                                                                
                                                                
                                                            </tr>
                                                            ';
                                                            $count++;
                                                        }
                                                    } else {
                                                        echo '
                                                        <tr>
                                                            <td colspan="11" class="text-bold-500"><marquee>Sorry No Records Found</marquee></td>
                                                        </tr>
                                                        ';
                                                    }
                                                    ?>

                                                </tbody>
                                        </table>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-header">
                                    <h4>Your Earnings</h4>
                                </div>
                                <div class="card-body">
                                    <div id="radialBars"></div>
                                    <div class="text-center mb-5">
                                        <h6>Total</h6>
                                        <h1 class='text-green'><strong>¢<?php echo $pa;?></strong></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="card widget-todo">
                                <div
                                    class="card-header border-bottom d-flex justify-content-between align-items-center">
                                    <h4 class="card-title d-flex">
                                        <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Room Status
                                    </h4>

                                </div>
                                <div class="card-body px-0 py-1">
                                    <table class='table table-borderless'>
                                    <?php 
                                        $propCarouselSQL = "SELECT * FROM property";
                                        $propCarouselResult = mysqli_query($con, $propCarouselSQL);
                                        if(mysqli_num_rows($propCarouselResult)>0){
                                        while($propCarouselRow = mysqli_fetch_array($propCarouselResult)){
                                            echo '
                                            
                                        <tr>
                                            <td class="col-5">'.$propCarouselRow['propname'].'</td>
                                            <td></td>
                                            <td class="col-5 text-center badges"><span class="badge bg-dark">'.$propCarouselRow['propstatus'].'</span></td>
                                        </tr>
                                            ';
                                        }
                                        }else{
                                        echo'
                                        <tr>
                                            <td class="col-5">Sorry No Property Created Yet</td>
                                            <td class="col-2"></td>
                                            <td class="col-5 text-center">Consult Admin</td>
                                        </tr>
                                        ';
                                        }
                                    
                                    ?>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Rabdan Real Estate</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <?php require_once('inc/js.php');?>
</body>

</html>