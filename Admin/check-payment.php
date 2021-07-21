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
                    <h3>Check Payment</h3>
                    <p class="text-subtitle text-muted">Check Individual Transaction</p>
                </div>
                <section class="section">
                    <div class="row notify"></div>
                    <div class="row" id="table-head">
                        <div class="col-4">
                            <?php
                            if (isset($_GET['paymentid'])) {
                                $landlordID = intVal(mysqli_real_escape_string($con, $_GET['paymentid']));

                                $retrieveLandlordSQL = "SELECT * from payment WHERE paymentid = $landlordID;";

                                $retrieveLandlordResult = mysqli_query($con, $retrieveLandlordSQL);

                                if (mysqli_num_rows($retrieveLandlordResult) > 0) {
                                    while ($retrieveLandlordRow = mysqli_fetch_array($retrieveLandlordResult)) {
                                        echo '
                                            <div class="card">
                                                <div class="card-content">
                                                        <div class="card-body">
                                                            <h5 class="card-title">' . $retrieveLandlordRow['tenantname'] . '</h5>
                                                        </div>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><strong>Landlord Name:</strong> ' . $retrieveLandlordRow['landlordname'] . '</li>
                                                    <li class="list-group-item"><strong>Number of Month To Rent:</strong> ' . $retrieveLandlordRow['monthstorent'] . '</li>
                                                    <li class="list-group-item"><strong>Amount Charged by Agency:</strong> ' . $retrieveLandlordRow['amountchargedbyagency'] . '</li>
                                                    <li class="list-group-item"><strong>Payment to Agency:</strong> ' . $retrieveLandlordRow['paymenttoagency'] . '</li>
                                                    <li class="list-group-item"><strong>paymenttolandlord:</strong> ' . $retrieveLandlordRow['paymenttolandlord'] . '</li>
                                                    <li class="list-group-item"><strong>Total Payment:</strong> ' . $retrieveLandlordRow['totalpayment'] . '</li>
                                                    <li class="list-group-item"><strong>Transaction ID:</strong> ' . $retrieveLandlordRow['transactionid'] . '</li>
                                                    <li class="list-group-item"><strong>Month:</strong> ' . $retrieveLandlordRow['month'] . '</li>
                                                    <li class="list-group-item"><strong>Year:</strong> ' . $retrieveLandlordRow['year'] . '</li>
                                                    <li class="list-group-item"><strong>Payment Date:</strong> ' . $retrieveLandlordRow['createddate'] . '</li>
                                                                        
                                                </ul>
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
                        <p>2020 &copy; Voler</p>
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