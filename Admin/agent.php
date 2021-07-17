<!DOCTYPE html>
<html lang="en">

<?php require_once('inc/head.php'); ?>

<body>
    <div id="app">
        <?php require_once('inc/aside.php'); ?>

        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
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
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
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
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
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
                    <h3>Create Property</h3>
                    <p class="text-subtitle text-muted">Add New Property</p>
                </div>

                <section class="section">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class='card-heading p-1 pl-3'>Add Property</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <form class="form form-horizontal">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Property Name</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="propertyName" class="form-control" name="propertyName" placeholder="Property Name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Property Location</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="propertyLocation" class="form-control" name="propertyLocation" placeholder="Property Location">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Property Status</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="propertyStatus" class="form-control" name="propertyStatus" placeholder="Property Status">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Bed Room</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="propertyBeds" class="form-control" name="propertyBeds" placeholder="Property Bed">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>No. of Baths</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="propertyBath" class="form-control" name="propertyBath" placeholder="Number of Birth">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Garage</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="propertyGarage" class="form-control" name="propertyGarage" placeholder="Property Garage">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Internet Access</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="propertyInternet" class="form-control" name="propertyInternet" placeholder="Internet">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Room Type</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="propertyRoomTypes" class="form-control" name="propertyRoomTypes" placeholder="Room Types">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Agent Name</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="propertAgentNameTxt" class="form-control" name="propertAgentNameTxt" placeholder="Agent Name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>LandLord</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="propertyLandLordTxt" class="form-control" name="propertyLandLordTxt" placeholder="LandLord">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Room Actions</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="roomActionText" class="form-control" name="roomActionText" placeholder="Room Actions">
                                                        </div>
                                                        
                                                        <div class="col-12 col-md-8 offset-md-4 form-group">
                                                            <div class='form-check'>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="propertyAgreeCheck" class='form-check-input'>
                                                                    <label for="propertyAgreeCheck">Agree to Create</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- <div class="col-md-8 col-12"> -->
                                            <!-- <canvas id="bar"></canvas> -->
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-header">
                                    <h4>Last 10 Registered Property</h4>
                                </div>
                                <div class="card-body">
                                    <div id="radialBars"></div>
                                    <div class="text-center mb-5">
                                        <h6>From last month</h6>
                                        <h1 class='text-green'>+$2,134</h1>
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
                        <p>2020 &copy; Rabdan Real Estate</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <?php require_once('inc/js.php'); ?>
</body>

</html>