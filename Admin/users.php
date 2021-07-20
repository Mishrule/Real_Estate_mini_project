<?php require_once('../scripts/db.php'); ?>
<?php 
	require_once('../scripts/datetime.php');

	$userMessage = '';
	if(isset($_POST['submit'])){
        $userFirstname = mysqli_real_escape_string($con, $_POST['userFirstname']);
        $userLastname = mysqli_real_escape_string($con, $_POST['userLastname']);
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $userPassword = mysqli_real_escape_string($con, $_POST['userPassword']);
        $userLocation = mysqli_real_escape_string($con, $_POST['userLocation']);
        $userEmail = mysqli_real_escape_string($con, $_POST['userEmail']);
        $accessLevel = mysqli_real_escape_string($con, $_POST['accessLevel']);
        $Image = $_FILES['userImage']['name'];

		// $userIndexNumber = mysqli_real_escape_string($con, $_POST['userIndexNumber']);

		if($userFirstname == ''){
			$userMessage = '

			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>User First Name cannot be empty.</strong>
			</div>
			';
		}else if($userLastname == ''){
			$userMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>User Last Name Cannot be empty.</strong>
				
			</div>
			';
		}else if($username== ''){
			$userMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Username can not be empty.</strong>
				
			</div>
			';
		}else if($userPassword == ''){
			$userMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Password Can not be empty.</strong>
				
			</div>
			';
		}else if($userLocation == ''){
			$userMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>User Location Cannot be empty.</strong>
				
			</div>
			';
		}else {

			
    		$Target = "assets/images/" . basename($_FILES['userImage']['name']);
			$userRegisterSQL = "INSERT INTO users VALUES('','$userFirstname','$userLastname','$username','$userPassword','$userLocation','$userEmail','$accessLevel','$Image','$DateTime')";

			$userRegisterResult = mysqli_query($con, $userRegisterSQL);
			move_uploaded_file($_FILES['userImage']['tmp_name'], $Target);

			if($userRegisterResult){
				$userMessage = '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>'.$username.'  Registered Successfully</strong>
				
			</div>
			
			';
			header("Refresh:3");
			}else{
				$userMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>'.mysqli_error($con).' Failed to Create User</strong>
				
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
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
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
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
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
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
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

            <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <div class="row" id="notify">
                                    <?php echo $userMessage; ?>
                                </div>
                                <!-- <img src="assets/images/favicon.svg" height="48" class='mb-4'> -->
                                <h3>Sign Up</h3>
                                <p>Please fill the form to register.</p>
                            </div>
                            <form method="POST" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="userFirstname">First Name</label>
                                            <input type="text" id="userFirstname" class="form-control"
                                                name="userFirstname">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="userLastname">Last Name</label>
                                            <input type="text" id="userLastname" class="form-control"
                                                name="userLastname">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" id="username" class="form-control"
                                                name="username">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="userPassword">Password</label>
                                            <input type="password" id="userPassword" class="form-control"
                                                name="userPassword">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="userLocation">Location</label>
                                            <input type="text" id="userLocation" class="form-control"
                                                name="userLocation">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label>User Image</label>
                                        <div class="form-group">
                                            <div class="col-md-8 form-group">
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input" id="userImage" name="userImage">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="userEmail">Email</label>
                                            <input type="email" id="userEmail" class="form-control"
                                                name="userEmail">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12 form-group">
                                    <label for="accessLevel">Access Level</label>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="accessLevel">Access</label>
                                                <select class="form-select" id="accessLevel" name="accessLevel">
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Landlord">Landlord</option>
                                                </select>
                                        </div>
                                                        
                                    </div>
                                </diV>

                                <!-- <a href="auth-login.html">Have an account? Login</a> -->
                                <div class="clearfix">
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary float-end">Signup</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2020 &copy; Voler</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a
                                href="http://ahmadsaugi.com">Ahmad Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <?php require_once('inc/js.php');?>
</body>

</html>