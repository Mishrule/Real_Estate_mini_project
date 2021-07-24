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
                    <h3>Payment</h3>
                    <p class="text-subtitle text-muted">Make Payment</p>
                </div>

                <section class="section">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class='card-heading p-1 pl-3'>Pay</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="row" id="notify">

                                            </div>
                                            <form class="form form-horizontal" method="POST" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Tenant Name</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="tenantName" class="form-control" name="tenantName" placeholder="Name of Tenant">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Tenant Contact</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="tenantContact" class="form-control" name="tenantContact" placeholder="Tenat Contact">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Property Name</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <select class="form-select" id="propertyname" name="propertyname">
                                                                <option>Please Select</option>
                                                                <?php
                                                                $propSQL = "SELECT * FROM property";
                                                                $propResult = mysqli_query($con, $propSQL);
                                                                if (mysqli_num_rows($propResult) > 0) {
                                                                    while ($propRow = mysqli_fetch_array($propResult)) {
                                                                        echo '
                                                                            <option value="' . $propRow['propid'] . '">' . $propRow['propname'] . '</option>
                                                                        ';
                                                                    }
                                                                } else {
                                                                    echo '
                                                                        <option value="None">None</option>
                                                                    ';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <label>Name of Landlord</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">

                                                            <select class="form-select" id="landlord" name="landlord">
                                                                <?php
                                                                $landlordSQL = "SELECT * FROM landlord";
                                                                $landlordResult = mysqli_query($con, $landlordSQL);
                                                                if (mysqli_num_rows($landlordResult) > 0) {
                                                                    while ($landlordRow = mysqli_fetch_array($landlordResult)) {
                                                                        echo '
                                                                            <option value="' . $landlordRow['landlordname'] . '">' . $landlordRow['landlordname'] . '</option>
                                                                        ';
                                                                    }
                                                                } else {
                                                                    echo '
                                                                        <option value="None">None</option>
                                                                    ';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Number of Month to rent</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="rentmonth" class="form-control" name="rentmonth" placeholder="Number of Month to Rent">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Amount per Month</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="amountpermonth" class="form-control" name="amountpermonth" placeholder="Amount per Month" disabled>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Amount Charged by Agency</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="amountChargedByAgency" class="form-control" name="amountChargedByAgency" placeholder="Amount Charged by Agency" disabled>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>Total Payment to Agency</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="totalPaymentAgency" class="form-control" name="totalPaymentAgency" placeholder="TotalPayment for Agency" disabled>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Total Payment to LandLord</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="totalPaymentLandlord" class="form-control" name="totalPaymentLandlord" placeholder="TotalPayment for Landlord" disabled>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Total Payment</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="totalPayment" class="form-control" name="totalPayment" placeholder="TotalPayment" disabled>
                                                        </div>


                                                        <div class="col-12 col-md-8 offset-md-4 form-group">
                                                            <div class='form-check'>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="agentAgreeCheck" class='form-check-input'>
                                                                    <label for="agentAgreeCheck">Agree to Register</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" id="payment" name="payment" value="payment" class="btn btn-primary me-1 mb-1">Make Payment</button>
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
                                    <h4>Last 10 Tenant</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <?php
                                        $retrieveAgentSQL = "SELECT * FROM payment ORDER BY createddate DESC LIMIT 10";
                                        $retrieveAgentResult = mysqli_query($con, $retrieveAgentSQL);
                                        if (mysqli_num_rows($retrieveAgentResult) > 0) {
                                            while ($retrieveAgentRow = mysqli_fetch_array($retrieveAgentResult)) {
                                                echo '
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                <span> ' . $retrieveAgentRow['tenantname'] . '</span>
                                                <span class="badge bg-info badge-pill badge-round ml-1">' . $retrieveAgentRow['totalpayment'] . '</span>
                                            </li>
                                            ';
                                            }
                                        } else {
                                            echo '
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>No Records Found</span>
                                            <span class="badge bg-warning badge-pill badge-round ml-1">0</span>
                                        </li>
                                        ';
                                        }
                                        ?>
                                    </ul>

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

</html>
<script>
    $(document).ready(function() {
        $('#payment').hide();
        $('#agentAgreeCheck').click(function() {
            if ($('#agentAgreeCheck').is(':checked')) {
                $('#payment').show();
            } else {
                $('#payment').hide();
            }
        });

        $('#propertyname').change(function() {
            var changeRoom = $('#propertyname').val();
            // alert(changeRoom);
            $.ajax({
                url: '../scripts/makepaymentScript.php',
                method: 'GET',
                dataType: 'json',
                data: {
                    changeRoom
                },
                success: function(data) {
                    $('#amountpermonth').val(data.amountpermonth);
                    $('#amountChargedByAgency').val(data.amountChargedByAgency);
                }
            })
        });

        $('#rentmonth').keyup(function() {
            if ($('#propertyname').val() == "Please Select") {
                alert("Please Select a property Name");
                $('#rentmonth').val('');
            } else {
                var rentmonth = parseFloat($('#rentmonth').val());
                var amountMonth = parseFloat($('#amountpermonth').val());
                var amountCharged = parseFloat($('#amountChargedByAgency').val());

                $('#totalPaymentAgency').val(rentmonth * amountCharged);
                $('#totalPaymentLandlord').val(rentmonth * amountMonth);



                var pay = amountMonth + amountCharged;
                $('#totalPayment').val(rentmonth * pay);
            }
        });

        function myMonth() {
            var month = new Array();
            month[0] = "January";
            month[1] = "February";
            month[2] = "March";
            month[3] = "April";
            month[4] = "May";
            month[5] = "June";
            month[6] = "July";
            month[7] = "August";
            month[8] = "September";
            month[9] = "October";
            month[10] = "November";
            month[11] = "December";

            var d = new Date();
            return month[d.getMonth()];

        }

        $('#payment').click(function() {
            var tenantName = $('#tenantName').val();
            var tenantContact = $('#tenantContact').val();
            var propertyname = $('#propertyname').val();
            var landlord = $('#landlord').val();
            var rentmonth = $('#rentmonth').val();
            var amountpermonth = $('#amountpermonth').val();
            var amountChargedByAgency = $('#amountChargedByAgency').val();
            var totalPaymentAgency = $('#totalPaymentAgency').val();
            var totalPaymentLandlord = $('#totalPaymentLandlord').val();
            var totalPayment = $('#totalPayment').val();
            var paymentBTN = $('#payment').val();
            var date_year = new Date().getFullYear();
            var transactionid = new Date().getTime();
            var date_month = myMonth();

            $.ajax({
                url: '../scripts/makepaymentScript.php',
                method: 'POST',
                data: {
                    tenantName,
                    tenantContact,
                    propertyname,
                    landlord,
                    rentmonth,
                    amountpermonth,
                    amountChargedByAgency,
                    totalPaymentAgency,
                    totalPaymentLandlord,
                    totalPayment,
                    paymentBTN,
                    date_year,
                    transactionid,
                    date_month
                },
                success: function(data) {
                    $('#notify').html(data);
                    setTimeout(() => {
                        window.location.reload();
                    }, 5000);
                }
            })
        });
    })
</script>