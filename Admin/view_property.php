<?php require_once('../scripts/db.php'); require('session.php');?>
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
                        <p>2021 &copy; Rabdan Real Estate</p>
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