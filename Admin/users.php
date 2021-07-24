<?php require_once('../scripts/db.php'); require('session.php');?>
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
            <?php require_once('inc/nav.php'); ?>   

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
                        <p>2021 &copy; Rabdan Real Estate</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <?php require_once('inc/js.php');?>
</body>

</html>