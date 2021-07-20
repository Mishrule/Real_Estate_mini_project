<?php require_once('../scripts/db.php'); ?>
<?php 
	require_once('../scripts/datetime.php');

	$landlordMessage = '';
	if(isset($_POST['submit'])){
     
        $landlordName = mysqli_real_escape_string($con, $_POST['landlordName']);
        $landlordBiography = mysqli_real_escape_string($con, $_POST['landlordBiography']);
        $landlordLocation = mysqli_real_escape_string($con, $_POST['landlordLocation']);
        $landlordContact = mysqli_real_escape_string($con, $_POST['landlordContact']);
        $landlordEmail = mysqli_real_escape_string($con, $_POST['landlordEmail']);
        $landlordPassword = mysqli_real_escape_string($con, $_POST['landlordPassword']);
        $Image = $_FILES['landlordImage']['name'];

		if($landlordName == ''){
			$landlordMessage = '

			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>landlord Name cannot be empty.</strong>
			</div>
			';
		}else if($landlordBiography == ''){
			$landlordMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>landlord Biography Cannot be empty.</strong>
				
			</div>
			';
		}else if($landlordLocation== ''){
			$landlordMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>landlord Location cannot be empty.</strong>
				
			</div>
			';
		}else if($landlordContact == ''){
			$landlordMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>landlord Contact Cannot be empty.</strong>
				
			</div>
			';
		}else if($landlordPassword == ''){
			$landlordMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>landlord Password Cannot be empty.</strong>
				
			</div>
			';
		}else if($Image == ''){
			$landlordMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>landlord Image Cannot be empty.</strong>
				
			</div>
			';
		}else {
             
			
    		$Target = "assets/images/" . basename($_FILES['landlordImage']['name']);
			$landlordRegisterSQL = "INSERT INTO landlord VALUES('','$landlordName','$landlordBiography','$landlordLocation','$landlordContact','$landlordPassword','$landlordEmail','$Image','$DateTime')";

			$landlordRegisterResult = mysqli_query($con, $landlordRegisterSQL);
			move_uploaded_file($_FILES['landlordImage']['tmp_name'], $Target);

			if($landlordRegisterResult){
				$landlordMessage = '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>'.$landlordName.' landlord Registered Successfully</strong>
				
			</div>
			
			';
			header("Refresh:3");
			}else{
				$landlordMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>'.mysqli_error($con).' Failed to Create landlord</strong>
				
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
                    <h3>Register An Landlord</h3>
                    <p class="text-subtitle text-muted">Add New Landlord</p>
                </div>
                
                <section class="section">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class='card-heading p-1 pl-3'>Add Landlord</h3>
                                </div>
                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                        <div class="row" id="notify">
                                            <?php echo $landlordMessage; ?>
                                        </div>
                                            <form class="form form-horizontal" method="POST" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Landlord Name</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
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
                                                            <input type="password" id="landlordPassword" class="form-control" name="landlordPassword" placeholder="Landlord Password">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Landlord Email</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="email" id="landlordEmail" class="form-control" name="landlordEmail" placeholder="landlord Email">
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-4">
                                                            <label>Landlord Image</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <div class="form-file">
                                                                <input type="file" class="form-file-input" id="landlordImage" name="landlordImage">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12 col-md-8 offset-md-4 form-group">
                                                            <div class='form-check'>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="landlordAgreeCheck" class='form-check-input'>
                                                                    <label for="landlordAgreeCheck">Agree to Register Landlord</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="submit" id="submit" name="submit" class="btn btn-primary me-1 mb-1">Register Landlord</button>
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
                                    <h4>Last 10 Registered landlord</h4>
                                </div>
                                <div class="card-body">
                                <ul class="list-group">
                                <?php 
                                    $retrievelandlordSQL = "SELECT * FROM landlord ORDER BY createddate DESC LIMIT 10";
                                    $retrievelandlordResult = mysqli_query($con, $retrievelandlordSQL);
                                    if(mysqli_num_rows($retrievelandlordResult) > 0){
                                        while($retrievelandlordRow = mysqli_fetch_array($retrievelandlordResult)){
                                            echo '
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                <span> '.$retrievelandlordRow['landlordname'].'</span>
                                                <span class="badge bg-info badge-pill badge-round ml-1">'.$retrievelandlordRow['landlordcontact'].'</span>
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
        $('#landlordAgreeCheck').click(function(){
            if($('#landlordAgreeCheck').is(':checked')){
                $('#submit').show();
            }else{
                $('#submit').hide();
            }
        });
        
    })
</script>