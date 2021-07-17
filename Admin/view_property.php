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
                                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">

                                                    <?php
                                                    if (isset($_GET['propid'])) {
                                                        $propertyID = intVal(mysqli_real_escape_string($con, $_GET['propid']));

                                                        $retrievePropSQL = "SELECT * from propertyimage WHERE propid = $propertyID;
                                                         ";

                                                        $retrievePropResult = mysqli_query($con, $retrievePropSQL);

                                                        if (mysqli_num_rows($retrievePropResult) > 0) {
                                                            while ($retrievePropRow = mysqli_fetch_array($retrievePropResult)) {
                                                                echo '
                                                                <div class="carousel-inner">
                                                                    <div class="carousel-item active">
                                                                       
                                                                        <img src="assets/images/' . $retrievePropRow['propimage'] . '"
                                                                            class="d-block w-100" alt="...">
                                                                        <div class="carousel-caption d-none d-md-block">
                                                                            <h5>' . $retrievePropRow['propimage'] . '</h5>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                ';
                                                            }
                                                        } else {
                                                            echo '
                                                            <div class="carousel-inner">
                                                                    <div class="carousel-item active">
                                                                       
                                                                        <div class="carousel-caption d-none d-md-block">
                                                                            <h5>No Image Found ' . mysqli_error($con) . '</h5>
                                                                            
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
                                                <div class="row notify"></div>
                                                <?php
                                                if (isset($_GET['propid'])) {
                                                    $property_ID = intVal(mysqli_real_escape_string($con, $_GET['propid']));

                                                    $retrieve_PropSQL = "SELECT * from property WHERE propid = $property_ID;
                                                         ";

                                                    $retrieve_PropResult = mysqli_query($con, $retrieve_PropSQL);

                                                    if (mysqli_num_rows($retrieve_PropResult) > 0) {
                                                        $retrieve_PropRow = mysqli_fetch_array($retrieve_PropResult);

                                                        echo '
                                                                                                                       
                                                <center><h2>' . $retrieve_PropRow['propname'] . '</h2></center>
                                                <div class="divider">
                                                    <div class="divider-text">Full Details</div>
                                                </div>
                                                <h5><strong>Description:</strong> ' . $retrieve_PropRow['propDescription'] . '</h5>
                                                <h5><strong>Location:</strong> ' . $retrieve_PropRow['proplocation'] . ' </h5>
                                                <h5><strong>Status:</strong> ' . $retrieve_PropRow['propstatus'] . '</h5>
                                                <h5><strong>Number of Room:</strong> ' . $retrieve_PropRow['proprooms'] . '</h5>
                                                <h5><strong>Bathrooms:</strong> ' . $retrieve_PropRow['propbathrooms'] . '</h5>
                                                <h5><strong>Garage:</strong> ' . $retrieve_PropRow['propgarage'] . '</h5>
                                                <h5><strong>Water:</strong> ' . $retrieve_PropRow['propwater'] . '</h5>
                                                <h5><strong>Floor Type:</strong> ' . $retrieve_PropRow['propfloortype'] . '</h5>
                                                <h5><strong>Agent Name:</strong> ' . $retrieve_PropRow['propagentname'] . '</h5>
                                                <h5><strong>LandLord:</strong> ' . $retrieve_PropRow['proplandlord'] . '</h5>
                                                <h5><strong>Action:</strong> ' . $retrieve_PropRow['proproomaction'] . '</h5>
                                                <h5><strong>Amount by Landlord:</strong> ' . $retrieve_PropRow['propamount'] . '</h5>
                                                <h5><strong>Amount by Agent:</strong> ' . $retrieve_PropRow['propamountcharged'] . '</h5>
                                                <h5><strong>Total Amount:</strong> ' . $retrieve_PropRow['proptotal'] . '</h5>
                                                <h5><strong>Created Date:</strong> ' . $retrieve_PropRow['createddate'] . '</h5>
                                                <p></p><p></p>
                                                <div class="divider">
                                                    <div class="divider-text">Controls</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                    <div class="buttons">
                                                        <a href="#" id="' . $retrieve_PropRow['propid'] . '" name="' . $retrieve_PropRow['propid'] . '" class="btn btn-primary round edit"   data-bs-toggle="modal" data-bs-target="#primary">Update</a> 
                                                    </div>
                                                    </div>
                                                    <div class="col-6">
                                                    <div class="buttons">
                                                        <a href="#" id="' . $retrieve_PropRow['propid'] . '" name="' . $retrieve_PropRow['propid'] . '" class="btn btn-danger round del">Delete</a>
                                                    </div>
                                                    </div>
                                                </div>
                                                ';
                                                    } else {
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

    <?php require_once('inc/js.php'); ?>
</body>

<script>
    $(document).ready(function() {
        $(document).on('click', '.edit', function() {
            var propEdit = $(this).attr('id');

            $.ajax({
                url: '../scripts/managePropertyScript.php',
                method: 'GET',
                dataType: 'json',
                data: {
                    propEdit
                },
                success: function(data) {
                    $('#propertyId').val(data.propertyid);
                    $('#propertyName').val(data.propertyName);
                    $('#propertyDescription').val(data.propertyDescription);
                    $('#propertyLocation').val(data.propertyLocation);
                    $('#propertyStatus').val(data.propertyStatus);
                    $('#propertyNumRoom').val(data.propertyNumRoom);
                    $('#propertyBath').val(data.propertyBath);
                    $('#propertyGarage').val(data.propertyGarage);
                    $('#propertyWater').val(data.propertyWater);
                    $('#propertyRoomTypes').val(data.propertyRoomTypes);
                    $('#propertAgentNameTxt').val(data.propertAgentNameTxt);
                    $('#propertyLandLordTxt').val(data.propertyLandLordTxt);
                    $('#roomActionText').val(data.roomActionText);
                    $('#propertyAmount').val(data.propertyAmount);
                    $('#propertyAmountCharged').val(data.propertyAmountCharged);
                }
            });
        })

        //Update
        $('#propUpdate').click(function() {

            var updatePropertyId = $('#propertyId').val();
            var updatePropertyName = $('#propertyName').val();
            var updatePropertyDescription = $('#propertyDescription').val();
            var updatePropertyLocation = $('#propertyLocation').val();
            var updatePropertyStatus = $('#propertyStatus').val();
            var updatePropertyNumRoom = $('#propertyNumRoom').val();
            var updatePropertyBath = $('#propertyBath').val();
            var updatePropertyGarage = $('#propertyGarage').val();
            var updatePropertyWater = $('#propertyWater').val();
            var updatePropertyRoomTypes = $('#propertyRoomTypes').val();
            var updatePropertAgentNameTxt = $('#propertAgentNameTxt').val();
            var updatePropertyLandLordTxt = $('#propertyLandLordTxt').val();
            var updateRoomActionText = $('#roomActionText').val();
            var updatePropertyAmount = $('#propertyAmount').val();
            var updatePropertyAmountCharged = $('#propertyAmountCharged').val();
            var propUpdateBTN = $('#propUpdate').val();
            $.ajax({
                url: '../scripts/managePropertyScript.php',
                method: 'POST',
                data: {
                    updatePropertyId,
                    updatePropertyName,
                    updatePropertyDescription,
                    updatePropertyLocation,
                    updatePropertyStatus,
                    updatePropertyNumRoom,
                    updatePropertyBath,
                    updatePropertyGarage,
                    updatePropertyWater,
                    updatePropertyRoomTypes,
                    updatePropertAgentNameTxt,
                    updatePropertyLandLordTxt,
                    updateRoomActionText,
                    updatePropertyAmount,
                    updatePropertyAmountCharged,
                    propUpdateBTN
                },
                success: function(data) {
                    $('.notify').html(data);
                    setTimeout(() => {
                        window.location.reload();
                    }, 3000);

                }
            });
        });

        //Del
        $(document).on('click', '.del', function(){
            var propDelete = $(this).attr('id');
            if(confirm("Are you sure you want to Delete")){
                $.ajax({
                url: '../scripts/managePropertyScript.php',
                method: 'POST',
                data: {
                    propDelete
                },
                success: function(data) {
                    $('.notify').html(data);
                    setTimeout(() => {
                        window.location.reload();
                    }, 3000);

                }
            });
            }
            
        })             

    });
</script>

</html>
<div class="modal-primary me-1 mb-1 d-inline-block">
    <!-- Button trigger for primary themes modal -->
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#primary">
        Primary
    </button>

    <!--primary theme Modal -->
    <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel160">
                        UPDATE PROPERTY</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="row notify"></div>
                            <form class="form form-horizontal" method="POST" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Property Name</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="propertyName" class="form-control" name="propertyName" placeholder="Property Name">

                                            <input type="hidden" id="propertyId" class="form-control" name="propertyId" placeholder="Property Name">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Property Description</label>
                                        </div>
                                        <div class="col-md-8 form-group">

                                            <div class="form-group with-title mb-3">
                                                <textarea class="form-control" id="propertyDescription" name="propertyDescription" rows="3"></textarea>
                                                <label>Property Description</label>
                                            </div>
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
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="propertyStatus">Status</label>
                                                <select class="form-select" id="propertyStatus" name="propertyStatus">
                                                    <option value="Not Occupied">Not Occupied</option>
                                                    <option value="Occupied">Occupied</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>No. of Room</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="propertyNumRoom" class="form-control" name="propertyNumRoom" placeholder="Number of Rooms">
                                        </div>
                                        <div class="col-md-4">
                                            <label>No. of Baths</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="propertyBath" class="form-control" name="propertyBath" placeholder="Number of Bath">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Garage</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="propertyGarage">Garage</label>
                                                <select class="form-select" id="propertyGarage" name="propertyGarage">
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Water Access</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="propertyWater">Water</label>
                                                <select class="form-select" id="propertyWater" name="propertyWater">
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Room Floor Type</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="propertyRoomTypes">Floor</label>
                                                <select class="form-select" id="propertyRoomTypes" name="propertyRoomTypes">
                                                    <option value="Cement">Cement</option>
                                                    <option value="Tiled">Tiled</option>
                                                    <option value="None">None</option>

                                                </select>
                                            </div>
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
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="roomActionText">Actions</label>
                                                <select class="form-select" id="roomActionText" name="roomActionText">
                                                    <option value="Active">Active</option>
                                                    <option value="InActive">InActive</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>About by Landlord</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="propertyAmount" class="form-control" name="propertyAmount" placeholder="Property Amount by Landlord">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Amount Charged</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="propertyAmountCharged" class="form-control" name="propertyAmountCharged" placeholder="Amount Charged by Agency">
                                        </div>
                                    </div>
                                </div>
                                <div class="row notify"></div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" id="propUpdate" name="propUpdate">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Update</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>