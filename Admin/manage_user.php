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
                    <h3>Manage Users</h3>
                    <p class="text-subtitle text-muted">Manage Users</p>
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
                                                        <th>USER NAME</th>
                                                        <th>USER FIRSTNAME</th>
                                                        <th>USER LASTNAME</th>
                                                        <th>USER PASSWORD</th>
                                                        <th>USER LOCATION</th>
                                                        <th>USER EMAIL</th>
                                                        <th>USER ACCESSLEVEL</th>
                                                        <th>DATE CREATED</th>
                                                        <th>CONTROLS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $retrieveAgentSQL = "SELECT * FROM users ORDER BY createddate DESC";
                                                    $retrieveAgentResult = mysqli_query($con, $retrieveAgentSQL);
                                                    $count = 1;
                                                    if (mysqli_num_rows($retrieveAgentResult) > 0) {
                                                        while ($retrieveAgentRow = mysqli_fetch_array($retrieveAgentResult)) {
                                                            echo '
                                                            <tr>
                                                                <td>' . $count . '</td>
                                                                <td><a href="userlist.php?userid=' . $retrieveAgentRow['userid'] . '">' . $retrieveAgentRow['username'] . '</a></td>
                                                                <td>' . $retrieveAgentRow['userfirstname'] . '</td>
                                                                <td>' . $retrieveAgentRow['userlastname'] . '</td>
                                                                <td>' . $retrieveAgentRow['userpassword'] . '</td>
                                                                <td>' . $retrieveAgentRow['userlocation'] . '</td>
                                                                <td>' . $retrieveAgentRow['useremail'] . '</td>
                                                                <td>' . $retrieveAgentRow['useraccesslevel'] . '</td>
                                                                <td>' . $retrieveAgentRow['createddate'] . '</td>
                                                                
                                                                <td>
                                                                    <i style="color:blue;" data-feather="edit" id="' . $retrieveAgentRow['userid'] . '" name="' . $retrieveAgentRow['userid'] . '" class="edit"  data-bs-toggle="modal" data-bs-target="#primary"></i>
                                                                    <i ></i>
                                                                    <i style="color:red;" data-feather="trash" id="' . $retrieveAgentRow['userid'] . '" name="' . $retrieveAgentRow['userid'] . '" class="del"></i>
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
            var userEdit = $(this).attr('id');
            // alert(userEdit);
            $.ajax({
                url: '../scripts/usersScript.php',
                method: 'GET',
                dataType: 'json',
                data: {
                    userEdit
                },
                success: function(data) {
                    $('#userid').val(data.userid);
                    $('#userFirstname').val(data.userFirstname);
                    $('#userLastname').val(data.userLastname);
                    $('#userPassword').val(data.userPassword);
                    $('#useremail').val(data.useremail);
                    
                }
            });
        })

        //Update
        $('#userUpdate').click(function() {

            var updateuserid = $('#userid').val();
            var updateuserFirstname = $('#userFirstname').val();
            var updateuserLastname = $('#userLastname').val();
            var updateuserPassword = $('#userPassword').val();
            var updateuseremail = $('#useremail').val();
            var userUpdateBTN = $('#userUpdate').val();
            
            $.ajax({
                url: '../scripts/usersScript.php',
                method: 'POST',
                data: {
                    updateuserid,
                    updateuserFirstname,
                    updateuserLastname,
                    updateuserPassword,
                    updateuseremail,
                    userUpdateBTN
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
            var userDelete = $(this).attr('id');
            if(confirm("Are you sure you want to Delete")){
                $.ajax({
                url: '../scripts/usersScript.php',
                method: 'POST',
                data: {
                    userDelete
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
                                                            <label>First Name</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="hidden" id="userid" class="form-control" name="userid" >
                                                            <input type="text" id="userFirstname" class="form-control" name="userFirstname" placeholder="User FirstName">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>User Lastname</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="userLastname" class="form-control" name="userLastname" placeholder="User Lastname">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>User Password</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="userPassword" class="form-control" name="userPassword" placeholder="User Password">
                                                        </div>
                                                        

                                                        <div class="col-md-4">
                                                            <label>User Email</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="email" id="useremail" class="form-control" name="useremail" placeholder="User Email">
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
                    <button type="button" class="btn btn-primary ml-1" id="userUpdate" name="userUpdate">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Update</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>