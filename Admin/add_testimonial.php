<?php require_once('../scripts/db.php'); ?>
<?php 
	require_once('../scripts/datetime.php');

	$testimonalMessage = '';
	if(isset($_POST['submit'])){
     
        $testimonalName = mysqli_real_escape_string($con, $_POST['testimonalName']);
        $testimonalDescription = mysqli_real_escape_string($con, $_POST['testimonalDescription']);
        $testimonalLocation = mysqli_real_escape_string($con, $_POST['testimonalLocation']);
        
        // $testimonalImage = mysqli_real_escape_string($con, $_POST['testimonalImage']);
        $Image = $_FILES['testimonalImage']['name'];

		if($testimonalName == ''){
			$testimonalMessage = '

			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Testmonial Name cannot be empty.</strong>
			</div>
			';
		}else if($testimonalDescription == ''){
			$testimonalMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Testimonal Description Cannot be empty.</strong>
				
			</div>
			';
		}else if($testimonalLocation== ''){
			$testimonalMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Testimonal Location cannot be empty.</strong>
				
			</div>
			';
		}else if($Image == ''){
			$testimonalMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Testimal Image Cannot be empty.</strong>
				
			</div>
			';
		}else {
            $Target = "assets/images/" . basename($_FILES['testimonalImage']['name']);
			$testimonalRegisterSQL = "INSERT INTO testimonial VALUES('','$testimonalName','$testimonalDescription','$testimonalLocation','$Image','$DateTime')";

			$testimonalRegisterResult = mysqli_query($con, $testimonalRegisterSQL);
			move_uploaded_file($_FILES['testimonalImage']['tmp_name'], $Target);

			if($testimonalRegisterResult){
				$testimonalMessage = '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>'.$testimonalName.' testimonal Registered Successfully</strong>
				
			</div>
			
			';
			header("Refresh:3");
			}else{
				$testimonalMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>'.mysqli_error($con).' Failed to Create testimonal</strong>
				
			</div>
			';
			}
		}
	}
?>
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
                    <h3>Register Testimonial</h3>
                    <p class="text-subtitle text-muted">Add New Testimonial</p>
                </div>
                
                <section class="section">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class='card-heading p-1 pl-3'>Add Testimonial</h3>
                                </div>
                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                        <div class="row" id="notify">
                                            <?php echo $testimonalMessage; ?>
                                        </div>
                                            <form class="form form-horizontal" method="POST" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Testimonial Name</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="testimonalName" class="form-control" name="testimonalName" placeholder="Testimonal Name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Testimonial Description</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            
                                                            <div class="form-group with-title mb-3">
                                                                <textarea class="form-control" id="testimonalDescription" name="testimonalDescription"
                                                                    rows="3"></textarea>
                                                                <label>Testimonal Description</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Testimonal Location</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="testimonalLocation" class="form-control" name="testimonalLocation" placeholder="Testimonal Location">
                                                        </div>
                                                        

                                                                                                                
                                                        <div class="col-md-4">
                                                            <label>Testimonal Image</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <div class="form-file">
                                                                <input type="file" class="form-file-input" id="testimonalImage" name="testimonalImage">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12 col-md-8 offset-md-4 form-group">
                                                            <div class='form-check'>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="testimonalAgreeCheck" class='form-check-input'>
                                                                    <label for="testimonalAgreeCheck">Agree to Register</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="submit" id="submit" name="submit" class="btn btn-primary me-1 mb-1">Register testimonal</button>
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
                                    <h4>Last 10 Registered Testimonal</h4>
                                </div>
                                <div class="card-body">
                                <ul class="list-group">
                                <?php 
                                    $retrieveTestimonalSQL = "SELECT * FROM testimonial ORDER BY createddate DESC LIMIT 10";
                                    $retrieveTestimonalResult = mysqli_query($con, $retrieveTestimonalSQL);
                                    if(mysqli_num_rows($retrieveTestimonalResult) > 0){
                                        while($retrieveTestimonalRow = mysqli_fetch_array($retrieveTestimonalResult)){
                                            echo '
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                <span> '.$retrieveTestimonalRow['testimonalname'].'</span>
                                                <span class="badge bg-info badge-pill badge-round ml-1">'.$retrieveTestimonalRow['createddate'].'</span>
                                            </li>
                                            ';
                                        }
                                    }else{
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
                        <p>2020 &copy; Rabdan Real Estate</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <?php require_once('inc/js.php'); ?>
</body>

</html>
<script>
    $(document).ready(function(){
        $('#submit').hide();
        $('#testimonalAgreeCheck').click(function(){
            if($('#testimonalAgreeCheck').is(':checked')){
                $('#submit').show();
            }else{
                $('#submit').hide();
            }
        });
        
    })
</script>