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
                    <h3>View Payment</h3>
                    <p class="text-subtitle text-muted">Payment</p>
                </div>
                <section class="section">
                    
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
                                                        <th>TANANT NAME</th>
                                                        <th>PROPERTY NAME</th>
                                                        <th>LANDLORD NAME</th>
                                                        <th>NUM MONTH TO RENT</th>
                                                        <th>PAYMENT TO AGENCY</th>
                                                        <th>PAYMENT TO LANDLORD</th>
                                                        <th>TRANSACTION ID</th>
                                                        <th>TOTAL PAYMENT</th>
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
                                                                <td><a href="check-payment.php?paymentid=' . $retrieveLandlordRow['paymentid'] . '">' . $retrieveLandlordRow['tenantname'] . '</a></td>
                                                                <td>' . $retrieveLandlordRow['propertyname'] . '</td>
                                                                <td>' . $retrieveLandlordRow['landlordname'] . '</td>
                                                                <td>' . $retrieveLandlordRow['monthstorent'] . '</td>
                                                                <td>' . $retrieveLandlordRow['paymenttoagency'] . '</td>
                                                                <td>' . $retrieveLandlordRow['paymenttolandlord'] . '</td>
                                                                <td>' . $retrieveLandlordRow['transactionid'] . '</td>
                                                                 <td>' . $retrieveLandlordRow['totalpayment'] . '</td>
                                                            </tr>
                                                            ';
                                                            $count++;
                                                        }
                                                    } else {
                                                        echo '
                                                        <tr>
                                                            <td colspan="11" class="text-bold-500"><marquee>Sorry No Transaction Found</marquee></td>
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
            var landlordEdit = $(this).attr('id');
            // alert(landlordEdit);
            $.ajax({
                url: '../scripts/landlordlistScript.php',
                method: 'GET',
                dataType: 'json',
                data: {
                    landlordEdit
                },
                success: function(data) {
                    $('#landlordId').val(data.landlordId);
                    $('#landlordName').val(data.landlordName);
                    $('#landlordBiography').val(data.landlordBiography);
                    $('#landlordLocation').val(data.landlordLocation);
                    $('#landlordContact').val(data.landlordContact);
                    $('#landlordPassword').val(data.landlordPassword);
                    $('#landlordEmail').val(data.landlordEmail);
                }
            });
        })

        //Update
        $('#landlordUpdate').click(function() {

            var updateLandLordId = $('#landlordId').val();
            var updateLandLordName = $('#landlordName').val();
            var updateLandLordBiography = $('#landlordBiography').val();
            var updateLandLordLocation = $('#landlordLocation').val();
            var updateLandLordContact = $('#landlordContact').val();
            var updateLandLordPassword = $('#landlordPassword').val();
            var updateLandLordEmail = $('#landlordEmail').val();
            var landlordUpdateBTN = $('#landlordUpdate').val();
            
            
            $.ajax({
                url: '../scripts/landlordlistScript.php',
                method: 'POST',
                data: {
                    updateLandLordId,
                    updateLandLordName,
                    updateLandLordBiography,
                    updateLandLordLocation,
                    updateLandLordContact,
                    updateLandLordPassword,
                    updateLandLordEmail,
                    landlordUpdateBTN
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
            var landlordDelete = $(this).attr('id');
            if(confirm("Are you sure you want to Delete")){
                $.ajax({
                url: '../scripts/landlordlistScript.php',
                method: 'POST',
                data: {
                    landlordDelete
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
                        UPDATE LANDLORD</h5>
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
                                                            <label>Landlord Name</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="hidden" id="landlordId" class="form-control" name="landlordId" placeholder="landlord Name">
                                                            <input type="text" id="landlordName" class="form-control" name="landlordName" placeholder="landlord Name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Landlord Biograph</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            
                                                            <div class="form-group with-title mb-3">
                                                                <textarea class="form-control" id="landlordBiography" name="landlordBiography"
                                                                    rows="3"></textarea>
                                                                <label>Landlord Biography</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Landlord Location</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="landlordLocation" class="form-control" name="landlordLocation" placeholder="landlord Location">
                                                        </div>
                                                        

                                                        <div class="col-md-4">
                                                            <label>Landlord Contact</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="landlordContact" class="form-control" name="landlordContact" placeholder="landlord Phone Number">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Landlord Password</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="landlordPassword" class="form-control" name="landlordPassword" placeholder="landlord Password">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Landlord Email</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="email" id="landlordEmail" class="form-control" name="landlordEmail" placeholder="landlord Email">
                                                        </div>
                                                       
                                                        <!-- <div class="col-12 col-md-8 offset-md-4 form-group">
                                                            <div class='form-check'>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="landlordAgreeCheck" class='form-check-input'>
                                                                    <label for="landlordAgreeCheck">Agree to Register</label>
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
                    <button type="button" class="btn btn-primary ml-1" id="landlordUpdate" name="landlordUpdate">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Update</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>