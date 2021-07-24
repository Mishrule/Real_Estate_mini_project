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
                    <h3>View Landlord</h3>
                    <p class="text-subtitle text-muted">View a single Landlord</p>
                </div>
                <section class="section">
                    <!-- House with internet
                    house with tiles
                    house with garage
                    house with  location -->
                    <div class="row notify"></div>
                    <div class="row" id="table-head">
                        <div class="col-4">
                            <?php
                            if (isset($_GET['landlordid'])) {
                                $landlordID = intVal(mysqli_real_escape_string($con, $_GET['landlordid']));

                                $retrieveLandlordSQL = "SELECT * from landlord WHERE landlordid = $landlordID;
                                                         ";

                                $retrieveLandlordResult = mysqli_query($con, $retrieveLandlordSQL);

                                if (mysqli_num_rows($retrieveLandlordResult) > 0) {
                                    while ($retrieveLandlordRow = mysqli_fetch_array($retrieveLandlordResult)) {
                                        echo '
                                            <div class="card">
                                                <div class="card-content">
                                                    <img src="assets/images/' . $retrieveLandlordRow['landlordimage'] . '" class="d-block w-100" alt="landlord Name">
                                                        <div class="card-body">
                                                            <h5 class="card-title">' . $retrieveLandlordRow['landlordname'] . '</h5>
                                                                <p class="card-text">
                                                                            ' . $retrieveLandlordRow['landlordbio'] . '
                                                                </p>
                                                        </div>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><strong>Landlord Location:</strong> ' . $retrieveLandlordRow['landlordlocation'] . '</li>
                                                    <li class="list-group-item"><strong>Landlord Contact:</strong> ' . $retrieveLandlordRow['landlordcontact'] . '</li>
                                                    <li class="list-group-item"><strong>Landlord Password:</strong> ' . $retrieveLandlordRow['landlordpassword'] . '</li>
                                                    <li class="list-group-item"><strong>Landlord Email:</strong> ' . $retrieveLandlordRow['landlordemail'] . '</li>
                                                    <li class="list-group-item"><strong>Created Date:</strong> ' . $retrieveLandlordRow['createddate'] . '</li>
                                                                        
                                                </ul>
                                                <div class="divider">
                                                    <div class="divider-text">Controls</div>
                                                </div>
                                                <div class="row notify"></div>
                                                <div class="card-footer d-flex justify-content-between">
                                                <button type="button" class="btn btn-primary round me-1 edit" id="' . $retrieveLandlordRow['landlordid'] . '" name="' . $retrieveLandlordRow['landlordid'] . '"  data-bs-toggle="modal" data-bs-target="#primary">Update</button>

                                                <button type="button" id="' . $retrieveLandlordRow['landlordid'] . '" name="' . $retrieveLandlordRow['landlordid'] . '" class="btn btn-danger round del">Delete</button><br />
                                            </div>
                                            </div>
                                            
                                                                
                                        ';
                                    }
                                } else {
                                    echo '
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Sorry No Landlord Records Found ' . mysqli_error($con) . '</li>
                                        </ul>
                                                            
                                    ';
                                }
                            }

                            ?>

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

</html>
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