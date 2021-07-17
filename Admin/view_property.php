<?php require_once('../scripts/db.php'); ?>
<!DOCTYPE html>
<html lang="en">

    <?php require_once('inc/head.php'); ?>

<body>
    <div id="app">
        <?php require_once('inc/aside.php'); ?>

        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notifications</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success me-3">
                                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>New Order</h6>
                                            <p class='text-xs'>
                                                An order made by Ahmad Saugi for product Samsung Galaxy S69
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-icon me-2">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="mail"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, Saugi</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>View Property</h3>
                    <p class="text-subtitle text-muted">View a single Property</p>
                </div>
                <section class="section">
                    <!-- House with internet
                    house with tiles
                    house with garage
                    house with  location -->
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <!-- <div class="card-header">
                                    <h4 class="card-title">Table head options</h4>
                                </div> -->
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                            <div  id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                            
                                                    <?php 
                                                        if(isset($_GET['propid']))
                                                        {
                                                            $propertyID = intVal(mysqli_real_escape_string($con, $_GET['propid']));
                                                       
                                                        $retrievePropSQL = "SELECT * from propertyimage WHERE propid = $propertyID;
                                                         ";
                                                       
                                                        $retrievePropResult = mysqli_query($con, $retrievePropSQL);
                                                        
                                                        if(mysqli_num_rows($retrievePropResult) > 0){
                                                            while($retrievePropRow = mysqli_fetch_array($retrievePropResult)){
                                                                echo '
                                                                <div class="carousel-inner">
                                                                    <div class="carousel-item active">
                                                                       
                                                                        <img src="assets/images/'.$retrievePropRow['propimage'].'"
                                                                            class="d-block w-100" alt="...">
                                                                        <div class="carousel-caption d-none d-md-block">
                                                                            <h5>'.$retrievePropRow['propimage'].'</h5>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                ';
                                                            }
                                                        }else{
                                                            echo '
                                                            <div class="carousel-inner">
                                                                    <div class="carousel-item active">
                                                                       
                                                                        <div class="carousel-caption d-none d-md-block">
                                                                            <h5>No Image Found '.mysqli_error($con).'</h5>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            ';
                                                        } 
                                                        }
                                                        
                                                    ?>
                                                     
                                                </div>
                                            </div>
                                            <div class="col-6">
                                            <?php 
                                                if(isset($_GET['propid']))
                                                {
                                                        $property_ID = intVal(mysqli_real_escape_string($con, $_GET['propid']));
                                                       
                                                        $retrieve_PropSQL = "SELECT * from property WHERE propid = $property_ID;
                                                         ";
                                                       
                                                        $retrieve_PropResult = mysqli_query($con, $retrieve_PropSQL);
                                                        
                                                        if(mysqli_num_rows($retrieve_PropResult) > 0){
                                                            $retrieve_PropRow = mysqli_fetch_array($retrieve_PropResult);

                                                            echo '
                                                                                                                       
                                                <center><h2>'.$retrieve_PropRow['propname'].'</h2></center>
                                                <div class="divider">
                                                    <div class="divider-text">Full Details</div>
                                                </div>
                                                <h5><strong>Description:</strong> '.$retrieve_PropRow['propDescription'].'</h5>
                                                <h5><strong>Location:</strong> '.$retrieve_PropRow['proplocation'].' </h5>
                                                <h5><strong>Status:</strong> '.$retrieve_PropRow['propstatus'].'</h5>
                                                <h5><strong>Number of Room:</strong> '.$retrieve_PropRow['proprooms'].'</h5>
                                                <h5><strong>Bathrooms:</strong> '.$retrieve_PropRow['propbathrooms'].'</h5>
                                                <h5><strong>Garage:</strong> '.$retrieve_PropRow['propgarage'].'</h5>
                                                <h5><strong>Water:</strong> '.$retrieve_PropRow['propwater'].'</h5>
                                                <h5><strong>Floor Type:</strong> '.$retrieve_PropRow['propfloortype'].'</h5>
                                                <h5><strong>Agent Name:</strong> '.$retrieve_PropRow['propagentname'].'</h5>
                                                <h5><strong>LandLord:</strong> '.$retrieve_PropRow['proplandlord'].'</h5>
                                                <h5><strong>Action:</strong> '.$retrieve_PropRow['proproomaction'].'</h5>
                                                <h5><strong>Amount by Landlord:</strong> '.$retrieve_PropRow['propamount'].'</h5>
                                                <h5><strong>Amount Charged:</strong> '.$retrieve_PropRow['propamountcharged'].'</h5>
                                                <h5><strong>Created Date:</strong> '.$retrieve_PropRow['createddate'].'</h5>
                                                <p></p><p></p>
                                                <div class="divider">
                                                    <div class="divider-text">Controls</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                    <div class="buttons">
                                                        <a href="#" id="'.$retrieve_PropRow['propid'].'" name="'.$retrieve_PropRow['propid'].'" class="btn btn-primary round">Update</a> 
                                                    </div>
                                                    </div>
                                                    <div class="col-6">
                                                    <div class="buttons">
                                                        <a href="#" id="'.$retrieve_PropRow['propid'].'" name="'.$retrieve_PropRow['propid'].'" class="btn btn-danger round">Delete</a>
                                                    </div>
                                                    </div>
                                                </div>
                                                ';
                                                        }else{
                                                            echo '
                                                            <h3>Sorry No Property Created</h3>
                                                            ';
                                                        } 
                                                    }
                                                    ?>
                                                
                                            </div>
                                        </div>
                                     </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2020 &copy; Voler</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <?php require_once('inc/js.php');?>
</body>

</html>