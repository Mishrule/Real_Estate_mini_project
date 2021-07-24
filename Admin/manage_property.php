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
                    <h3>Manage Property</h3>
                    <p class="text-subtitle text-muted">Regulate Property</p>
                </div>
                <section class="section">
                    <!-- <div class="row mb-2">
                        <div class="col-12 col-md-3">
                            <div class="card card-statistic">
                                <div class="card-body p-0">
                                    <div class="d-flex flex-column">
                                        <div class='px-3 py-3 d-flex justify-content-between'>
                                            <h3 class='card-title'>BALANCE</h3>
                                            <div class="card-right d-flex align-items-center">
                                                <p>$50 </p>
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
                                            <h3 class='card-title'>Revenue</h3>
                                            <div class="card-right d-flex align-items-center">
                                                <p>$532,2 </p>
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
                                            <h3 class='card-title'>ORDERS</h3>
                                            <div class="card-right d-flex align-items-center">
                                                <p>1,544 </p>
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
                                            <h3 class='card-title'>Sales Today</h3>
                                            <div class="card-right d-flex align-items-center">
                                                <p>423 </p>
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
                                            <div class="pl-3">
                                                <h1 class='mt-5'>$21,102</h1>
                                                <p class='text-xs'><span class="text-green"><i data-feather="bar-chart"
                                                            width="15"></i> +19%</span> than last month</p>
                                                <div class="legends">
                                                    <div class="legend d-flex flex-row align-items-center">
                                                        <div class='w-3 h-3 rounded-full bg-info me-2'></div><span
                                                            class='text-xs'>Last Month</span>
                                                    </div>
                                                    <div class="legend d-flex flex-row align-items-center">
                                                        <div class='w-3 h-3 rounded-full bg-blue me-2'></div><span
                                                            class='text-xs'>Current Month</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <canvas id="bar"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Orders Today</h4>
                                    <div class="d-flex ">
                                        <i data-feather="download"></i>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0">
                                    <div class="table-responsive">
                                        <table class='table mb-0' id="table1">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>City</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Graiden</td>
                                                    <td>vehicula.aliquet@semconsequat.co.uk</td>
                                                    <td>076 4820 8838</td>
                                                    <td>Offenburg</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Dale</td>
                                                    <td>fringilla.euismod.enim@quam.ca</td>
                                                    <td>0500 527693</td>
                                                    <td>New Quay</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nathaniel</td>
                                                    <td>mi.Duis@diam.edu</td>
                                                    <td>(012165) 76278</td>
                                                    <td>Grumo Appula</td>
                                                    <td>
                                                        <span class="badge bg-danger">Inactive</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Darius</td>
                                                    <td>velit@nec.com</td>
                                                    <td>0309 690 7871</td>
                                                    <td>Ways</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Ganteng</td>
                                                    <td>velit@nec.com</td>
                                                    <td>0309 690 7871</td>
                                                    <td>Ways</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Oleg</td>
                                                    <td>rhoncus.id@Aliquamauctorvelit.net</td>
                                                    <td>0500 441046</td>
                                                    <td>Rossignol</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kermit</td>
                                                    <td>diam.Sed.diam@anteVivamusnon.org</td>
                                                    <td>(01653) 27844</td>
                                                    <td>Patna</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
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
                                        <h6>From last month</h6>
                                        <h1 class='text-green'>+$2,134</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="card widget-todo">
                                <div
                                    class="card-header border-bottom d-flex justify-content-between align-items-center">
                                    <h4 class="card-title d-flex">
                                        <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Progress
                                    </h4>

                                </div>
                                <div class="card-body px-0 py-1">
                                    <table class='table table-borderless'>
                                        <tr>
                                            <td class='col-3'>UI Design</td>
                                            <td class='col-6'>
                                                <div class="progress progress-info">
                                                    <div class="progress-bar" role="progressbar" style="width: 60%"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class='col-3 text-center'>60%</td>
                                        </tr>
                                        <tr>
                                            <td class='col-3'>VueJS</td>
                                            <td class='col-6'>
                                                <div class="progress progress-success">
                                                    <div class="progress-bar" role="progressbar" style="width: 35%"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class='col-3 text-center'>30%</td>
                                        </tr>
                                        <tr>
                                            <td class='col-3'>Laravel</td>
                                            <td class='col-6'>
                                                <div class="progress progress-danger">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class='col-3 text-center'>50%</td>
                                        </tr>
                                        <tr>
                                            <td class='col-3'>ReactJS</td>
                                            <td class='col-6'>
                                                <div class="progress progress-primary">
                                                    <div class="progress-bar" role="progressbar" style="width: 80%"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class='col-3 text-center'>80%</td>
                                        </tr>
                                        <tr>
                                            <td class='col-3'>Go</td>
                                            <td class='col-6'>
                                                <div class="progress progress-secondary">
                                                    <div class="progress-bar" role="progressbar" style="width: 65%"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class='col-3 text-center'>65%</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <!-- <div class="card-header">
                                    <h4 class="card-title">Table head options</h4>
                                </div> -->
                                <div class="card-content">
                                    <div class="card-body">
                                    <div class="row notify"></div>
                                    </div>
                                    <!-- table head dark -->
                                    <div class="container">
                                        <div class="table-responsive">
                                            <!-- <table id="propertyTable"  class="table mb-0"> -->
                                            <table class='table table-striped' id="table1">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>NAME</th>
                                                        <th>PROPERTY ID</th>
                                                        <th>DESCRIPTION</th>
                                                        <th>LOCATION</th>
                                                        <th>ROOMS</th>
                                                        <th>BATHROOM</th>
                                                        <th>AGENT</th>
                                                        <th>LANDLORD</th>
                                                        <th>AMOUNT</th>
                                                        <th>STATUS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $retrievePropSQL = "SELECT * FROM property ORDER BY createddate DESC";
                                                    $retrievePropResult = mysqli_query($con, $retrievePropSQL);
                                                    $count = 1;
                                                    if (mysqli_num_rows($retrievePropResult) > 0) {
                                                        while ($retrievePropRow = mysqli_fetch_array($retrievePropResult)) {
                                                            echo '
                                                            <tr>
                                                                <td>' . $count . '</td>
                                                                <td><a href="view_property.php?propid=' . $retrievePropRow['propid'] . '">' . $retrievePropRow['propname'] . '</a></td>
                                                                <td>' . $retrievePropRow['propid'] . '</td>
                                                                <td>' . $retrievePropRow['propDescription'] . '</td>
                                                                <td>' . $retrievePropRow['proplocation'] . '</td>
                                                                <td>' . $retrievePropRow['proprooms'] . '</td>
                                                                <td>' . $retrievePropRow['propbathrooms'] . '</td>
                                                                <td>' . $retrievePropRow['propagentname'] . '</td>
                                                                <td>' . $retrievePropRow['proplandlord'] . '</td>
                                                                <td>' . $retrievePropRow['proptotal'] . '</td>
                                                                <td>' . $retrievePropRow['propstatus'] . '</td>
                                                                <td>
                                                                    <i style="color:blue;" data-feather="edit" id="' . $retrievePropRow['propid'] . '" name="' . $retrievePropRow['propid'] . '" class="edit"  data-bs-toggle="modal" data-bs-target="#primary"></i>
                                                                    <i ></i>
                                                                    <i style="color:red;" data-feather="trash" id="' . $retrievePropRow['propid'] . '" name="' . $retrievePropRow['propid'] . '" class="del"></i>
                                                                </td>
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
                        </div>
                    </div>
                    <!-- Table head options end -->
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

</html>
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