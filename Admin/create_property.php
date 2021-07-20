<?php require_once('../scripts/db.php'); ?>
<?php 
	require_once('../scripts/datetime.php');

	$propMessage = '';
	if(isset($_POST['submit'])){
        $propertyName = mysqli_real_escape_string($con, $_POST['propertyName']);
        $propertyDescription = mysqli_real_escape_string($con, $_POST['propertyDescription']);
        $propertyLocation = mysqli_real_escape_string($con, $_POST['propertyLocation']);
        $propertyStatus = mysqli_real_escape_string($con, $_POST['propertyStatus']);
        $propertyNumRoom = mysqli_real_escape_string($con, $_POST['propertyNumRoom']);
        $propertyBath = mysqli_real_escape_string($con, $_POST['propertyBath']);
        $propertyGarage = mysqli_real_escape_string($con, $_POST['propertyGarage']);
        $propertyWater = mysqli_real_escape_string($con, $_POST['propertyWater']);
        $propertyRoomTypes = mysqli_real_escape_string($con, $_POST['propertyRoomTypes']);
        $propertAgentNameTxt = mysqli_real_escape_string($con, $_POST['propertAgentNameTxt']);
        $propertyLandLordTxt = mysqli_real_escape_string($con, $_POST['propertyLandLordTxt']);
        $roomActionText = mysqli_real_escape_string($con, $_POST['roomActionText']);
        $propertyAmount = mysqli_real_escape_string($con, $_POST['propertyAmount']);
        $propertyAmountCharged = mysqli_real_escape_string($con, $_POST['propertyAmountCharged']);
        $propertyTotalPayment = intval($propertyAmount) + intval($propertyAmountCharged);

		// $propIndexNumber = mysqli_real_escape_string($con, $_POST['propIndexNumber']);

		if($propertyName == ''){
			$propMessage = '

			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Property Name cannot be empty.</strong>
			</div>
			';
		}else if($propertyDescription == ''){
			$propMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Description Cannot be empty.</strong>
				
			</div>
			';
		}else if($propertyLocation== ''){
			$propMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Location can not be empty.</strong>
				
			</div>
			';
		}else if($propertyStatus == ''){
			$propMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Property Status Can not be empty.</strong>
				
			</div>
			';
		}else if($propertyAmount == ''){
			$propMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Amount Cannot be empty.</strong>
				
			</div>
			';
		}else if($propertyAmountCharged == ''){
			$propMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Amount Charged Cannot be empty.</strong>
				
			</div>
			';
		}else {

			$Image = $_FILES['propImage']['name'];
    		$Target = "assets/images/" . basename($_FILES['propImage']['name']);
			$propRegisterSQL = "INSERT INTO property VALUES('','$propertyName','$propertyDescription','$propertyLocation','$propertyStatus','$propertyNumRoom','$propertyBath','$propertyGarage','$propertyWater','$propertyRoomTypes','$propertAgentNameTxt','$propertyLandLordTxt','$roomActionText','$Image','$propertyAmount','$propertyAmountCharged','$propertyTotalPayment','$DateTime')";

			$propRegisterResult = mysqli_query($con, $propRegisterSQL);
			move_uploaded_file($_FILES['propImage']['tmp_name'], $Target);

			if($propRegisterResult){
				$propMessage = '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>'.$propertyName.' Property Registered Successfully</strong>
				
			</div>
			
			';
			header("Refresh:3");
			}else{
				$propMessage = '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>'.mysqli_error($con).' Failed to Create Property</strong>
				
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
                    <h3>Create Property</h3>
                    <p class="text-subtitle text-muted">Add New Property</p>
                </div>
                
                <section class="section">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class='card-heading p-1 pl-3'>Add Property</h3>
                                </div>
                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                        <div class="row" id="notify">
                                            <?php echo $propMessage; ?>
                                        </div>
                                            <form class="form form-horizontal" method="POST" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Property Name</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="propertyName" class="form-control" name="propertyName" placeholder="Property Name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Property Description</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            
                                                            <div class="form-group with-title mb-3">
                                                                <textarea class="form-control" id="propertyDescription" name="propertyDescription"
                                                                    rows="3"></textarea>
                                                                <label>Property Description</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Property Location</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="propertyLocation" class="form-control" name="propertyLocation" placeholder="Property Location">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Property Status</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text"
                                                                for="propertyStatus">Status</label>
                                                            <select class="form-select" id="propertyStatus" name="propertyStatus">
                                                                <option value="Not Occupied">Not Occupied</option>
                                                                <option value="Occupied">Occupied</option>
                                                               
                                                            </select>
                                                        </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label>No. of Room</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="propertyNumRoom" class="form-control" name="propertyNumRoom" placeholder="Number of Rooms">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>No. of Baths</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="propertyBath" class="form-control" name="propertyBath" placeholder="Number of Bath">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Garage</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text"
                                                                for="propertyGarage">Garage</label>
                                                            <select class="form-select" id="propertyGarage" name="propertyGarage">
                                                                <option value="No">No</option>
                                                                <option value="Yes">Yes</option>
                                                               
                                                            </select>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Water Access</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text" for="propertyWater">Water</label>
                                                            <select class="form-select" id="propertyWater" name="propertyWater">
                                                                <option value="No">No</option>
                                                                <option value="Yes">Yes</option>
                                                               
                                                            </select>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Room Floor Type</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text"
                                                                for="propertyRoomTypes">Floor</label>
                                                            <select class="form-select" id="propertyRoomTypes" name="propertyRoomTypes">
                                                                <option value="Cement">Cement</option>
                                                                <option value="Tiled">Tiled</option>
                                                                <option value="None">None</option>
                                                               
                                                            </select>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Agent Name</label>
                                                        </div>

                                                        <div class="col-md-8 form-group">
                                                           <select class="form-select" id="propertAgentNameTxt" name="propertAgentNameTxt">
                                                                                                                           
                                                            <?php 
                                                                $agentSQL = "SELECT * FROM agent";
                                                                $agentResult = mysqli_query($con, $agentSQL);
                                                                if(mysqli_num_rows($agentResult)>0){
                                                                    while($agentRow = mysqli_fetch_array($agentResult)){
                                                                        echo'
                                                                            <option value="'.$agentRow['agentname'].'">'.$agentRow['agentname'].'</option>
                                                                        ';
                                                                    }
                                                                }else{
                                                                    echo'
                                                                        <option value="Administrator">Administrator</option>
                                                                    ';
                                                                }
                                                            ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>LandLord</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            
                                                            <select class="form-select" id="propertyLandLordTxt" name="propertyLandLordTxt">
                                                                                                                           
                                                            <?php 
                                                                $landlordSQL = "SELECT * FROM landlord";
                                                                $landlordResult = mysqli_query($con, $landlordSQL);
                                                                if(mysqli_num_rows($landlordResult)>0){
                                                                    while($landlordRow = mysqli_fetch_array($landlordResult)){
                                                                        echo'
                                                                            <option value="'.$landlordRow['landlordname'].'">'.$landlordRow['landlordname'].'</option>
                                                                        ';
                                                                    }
                                                                }else{
                                                                    echo'
                                                                        <option value="Unknown">Unknown</option>
                                                                    ';
                                                                }
                                                            ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Room Actions</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text"
                                                                for="roomActionText">Actions</label>
                                                            <select class="form-select" id="roomActionText" name="roomActionText">
                                                                <option value="Active">Active</option>
                                                                <option value="InActive">InActive</option>
                                                               
                                                            </select>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Amount by Landlord per Month</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="propertyAmount" class="form-control" name="propertyAmount" placeholder="Property Amount by Landlord">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Amount Charged</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="number" id="propertyAmountCharged" class="form-control" name="propertyAmountCharged" placeholder="Amount Charged by Agency">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Property Image</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <div class="form-file">
                                                                <input type="file" class="form-file-input" id="propImage" name="propImage">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12 col-md-8 offset-md-4 form-group">
                                                            <div class='form-check'>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="propertyAgreeCheck" class='form-check-input'>
                                                                    <label for="propertyAgreeCheck">Agree to Create</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="submit" id="submit" name="submit" class="btn btn-primary me-1 mb-1">Create Property</button>
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
                                    <h4>Last 10 Registered Property</h4>
                                </div>
                                <div class="card-body">
                                <ul class="list-group">
                                <?php 
                                    $retrievePropSQL = "SELECT * FROM property ORDER BY createddate DESC LIMIT 10";
                                    $retrievePropResult = mysqli_query($con, $retrievePropSQL);
                                    if(mysqli_num_rows($retrievePropResult) > 0){
                                        while($retrievePropRow = mysqli_fetch_array($retrievePropResult)){
                                            echo '
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                <span> '.$retrievePropRow['propname'].'</span>
                                                <span class="badge bg-info badge-pill badge-round ml-1">'.$retrievePropRow['proptotal'].'</span>
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
        $('#propertyAgreeCheck').click(function(){
            if($('#propertyAgreeCheck').is(':checked')){
                $('#submit').show();
            }else{
                $('#submit').hide();
            }
        });
        
    })
</script>