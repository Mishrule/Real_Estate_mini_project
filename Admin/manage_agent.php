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
                    <h3>Manage Agent</h3>
                    <p class="text-subtitle text-muted">Manage Agent</p>
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
                                                        <th>AGENT NAME</th>
                                                        <th>AGENT BIO</th>
                                                        <th>AGENT LOCATION</th>
                                                        <th>AGENT CONTACT</th>
                                                        <th>AGENT EMAIL</th>
                                                        <th>DATE CREATED</th>
                                                        <th>CONTROLS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $retrieveAgentSQL = "SELECT * FROM agent ORDER BY createddate DESC";
                                                    $retrieveAgentResult = mysqli_query($con, $retrieveAgentSQL);
                                                    $count = 1;
                                                    if (mysqli_num_rows($retrieveAgentResult) > 0) {
                                                        while ($retrieveAgentRow = mysqli_fetch_array($retrieveAgentResult)) {
                                                            echo '
                                                            <tr>
                                                                <td>' . $count . '</td>
                                                                <td><a href="agent_list.php?agentid=' . $retrieveAgentRow['agentid'] . '">' . $retrieveAgentRow['agentname'] . '</a></td>
                                                                <td>' . $retrieveAgentRow['agentbio'] . '</td>
                                                                <td>' . $retrieveAgentRow['agentlocation'] . '</td>
                                                                <td>' . $retrieveAgentRow['agentcontact'] . '</td>
                                                                <td>' . $retrieveAgentRow['agentemail'] . '</td>
                                                                <td>' . $retrieveAgentRow['createddate'] . '</td>
                                                                
                                                                <td>
                                                                    <i style="color:blue;" data-feather="edit" id="' . $retrieveAgentRow['agentid'] . '" name="' . $retrieveAgentRow['agentid'] . '" class="edit"  data-bs-toggle="modal" data-bs-target="#primary"></i>
                                                                    <i ></i>
                                                                    <i style="color:red;" data-feather="trash" id="' . $retrieveAgentRow['agentid'] . '" name="' . $retrieveAgentRow['agentid'] . '" class="del"></i>
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
            var agentEdit = $(this).attr('id');
            // alert(agentEdit);
            $.ajax({
                url: '../scripts/agentlistScript.php',
                method: 'GET',
                dataType: 'json',
                data: {
                    agentEdit
                },
                success: function(data) {
                    $('#agentId').val(data.agentId);
                    $('#agentName').val(data.agentName);
                    $('#agentBiography').val(data.agentBiography);
                    $('#agentLocation').val(data.agentLocation);
                    $('#agentContact').val(data.agentContact);
                    $('#agentEmail').val(data.agentEmail);
                }
            });
        })

        //Update
        $('#agentUpdate').click(function() {

            var updateAgentId = $('#agentId').val();
            var updateAgentName = $('#agentName').val();
            var updateAgentBiography = $('#agentBiography').val();
            var updateAgentLocation = $('#agentLocation').val();
            var updateAgentContact = $('#agentContact').val();
            var updateAgentEmail = $('#agentEmail').val();
            var agentUpdateBTN = $('#agentUpdate').val();
            
            $.ajax({
                url: '../scripts/agentlistScript.php',
                method: 'POST',
                data: {
                    updateAgentId,
                    updateAgentName,
                    updateAgentBiography,
                    updateAgentLocation,
                    updateAgentContact,
                    updateAgentEmail,
                    agentUpdateBTN
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
            var agentDelete = $(this).attr('id');
            if(confirm("Are you sure you want to Delete")){
                $.ajax({
                url: '../scripts/agentlistScript.php',
                method: 'POST',
                data: {
                    agentDelete
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
    <!-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#primary">
        Primary
    </button> -->

    <!--primary theme Modal -->
    <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel160">
                        UPDATE AGENT</h5>
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
                                                            <label>Agent Name</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="hidden" id="agentId" class="form-control" name="agentId" placeholder="Agent Name">
                                                            <input type="text" id="agentName" class="form-control" name="agentName" placeholder="Agent Name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Agent Biograph</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            
                                                            <div class="form-group with-title mb-3">
                                                                <textarea class="form-control" id="agentBiography" name="agentBiography"
                                                                    rows="3"></textarea>
                                                                <label>Agent Biography</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Agent Location</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="agentLocation" class="form-control" name="agentLocation" placeholder="Agent Location">
                                                        </div>
                                                        

                                                        <div class="col-md-4">
                                                            <label>Agent Contact</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="agentContact" class="form-control" name="agentContact" placeholder="Agent Phone Number">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Agent Email</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="email" id="agentEmail" class="form-control" name="agentEmail" placeholder="Agent Email">
                                                        </div>
                                                       
                                                        <!-- <div class="col-12 col-md-8 offset-md-4 form-group">
                                                            <div class='form-check'>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="agentAgreeCheck" class='form-check-input'>
                                                                    <label for="agentAgreeCheck">Agree to Register</label>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        
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
                    <button type="button" class="btn btn-primary ml-1" id="agentUpdate" name="agentUpdate">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Update</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>