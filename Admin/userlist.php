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
                    <h3>View User</h3>
                    <p class="text-subtitle text-muted">View a Single User</p>
                </div>
                <section class="section">
                   
                    <div class="row notify"></div>
                    <div class="row" id="table-head">
                        <div class="col-4">
                            <?php
                            if (isset($_GET['userid'])) {
                                $userID = intVal(mysqli_real_escape_string($con, $_GET['userid']));

                                $retrieveUserSQL = "SELECT * from users WHERE userid = $userID; ";

                                $retrieveUserResult = mysqli_query($con, $retrieveUserSQL);

                                if (mysqli_num_rows($retrieveUserResult) > 0) {
                                    while ($retrieveUserRow = mysqli_fetch_array($retrieveUserResult)) {
                                        echo '
                                            <div class="card">
                                                <div class="card-content">
                                                    <img src="assets/images/' . $retrieveUserRow['userimage'] . '" class="d-block w-100" alt="User Name">
                                                        <div class="card-body">
                                                            <h5 class="card-title">' . $retrieveUserRow['username'] . '</h5>
                                                                
                                                        </div>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><strong>Firstname:</strong> ' . $retrieveUserRow['userfirstname'] . '</li>
                                                    <li class="list-group-item"><strong>Lastname:</strong> ' . $retrieveUserRow['userlastname'] . '</li>
                                                    <li class="list-group-item"><strong>Password:</strong> ' . $retrieveUserRow['userpassword'] . '</li>
                                                    <li class="list-group-item"><strong>Location:</strong> ' . $retrieveUserRow['userlocation'] . '</li>
                                                    <li class="list-group-item"><strong>Email:</strong> ' . $retrieveUserRow['useremail'] . '</li>
                                                    <li class="list-group-item"><strong>Access Level:</strong> ' . $retrieveUserRow['useraccesslevel'] . '</li>
                                                    <li class="list-group-item"><strong>Created Date:</strong> ' . $retrieveUserRow['createddate'] . '</li>
                                                                        
                                                </ul>
                                                
                                            </div>
                                            
                                                                
                                        ';
                                    }
                                } else {
                                    echo '
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Sorry No Agent Records Found ' . mysqli_error($con) . '</li>
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